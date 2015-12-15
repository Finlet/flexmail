<?php

/**
 * @todo Write file documentation.
 */

namespace Finlet\flexmail\FlexmailAPI;

use Finlet\flexmail\FlexmailAPI\FlexmailAPIInterface;

class FlexmailAPI implements FlexmailAPIInterface {
  private $soapClient = NULL;

  /**
   * Get the request Service Instance
   *
   * @param String $service Requested service name
   *
   * @return Object An instance of the requested service
   */
  public static function service($service) {
    $classname = "\Finlet\flexmail\FlexmailAPI\Service\FlexmailAPI_{$service}";

    return new $classname();
  }

  /**
   * Reove header/error codes from the response
   *
   * @param stdClass $response The response from the API
   *
   * @return stdClass The same stdClass without the header information
   */
  public static function stripHeader($response) {
    if (!DEBUG_MODE):
      $valuesToStrip = array("header", "errorCode", "errorMessage");

      foreach ($valuesToStrip as $value):
        if (property_exists($response, $value)):
          unset ($response->$value);
        endif;
      endforeach;
    endif;

    return $response;
  }

  /**
   * Convert two-(or-more)-dimensional arrays to an stdClass object
   *
   * @param array $arr The array to convert
   * @param stdClass $parent The object to convert it to
   *
   * @return stdClass The converted array
   */
  protected function parseArray(array $arr, stdClass $parent = NULL) {
    if ($parent === NULL):
      $parent = $this;
    endif;

    foreach ($arr as $key => $val):
      if (is_array($val) AND $key != "custom" AND substr($key, -3) != "Ids"):
        $parent->$key = $this->parseArray($val, new stdClass);
      else:
        $parent->$key = $val;
      endif;
    endforeach;

    return $parent;
  }

  /**
   * Execute the requested call
   *
   * @param string $service The name of the service to execute
   * @param array $parameters All parameter in an assiociative array
   *
   * @return type
   *
   * @throws Exception
   */
  protected function execute($service, $parameters) {
    // make sure a SOAP client exists
    if (is_null($this->soapClient)):
      $this->createSoapClient();
    endif;

    // create a request object (an stdClass) from the parameters array
    $request = (object) $parameters;

    // add authentication to the request object
    $request->header = $this->getRequestHeader();

    // execute the call
    $response = $this->soapClient->__soapCall($service, array($request));

    // check if we have get an error code, in which case we throw an exeception
    if ($response->errorCode != 0 || $response->errorCode === ""):
      throw new Exception($response->errorMessage, $response->errorCode);
    endif;

    // return the response
    return $response;
  }

  /**
   * Create a new SOAP Client
   *
   * @returns void
   */
  private function createSoapClient() {
    // create a new SoapClient instance
    $this->soapClient = new SoapClient(
      FLEXMAIL_WSDL,
      array(
        "location" => FLEXMAIL_SERVICE,
        "uri" => FLEXMAIL_SERVICE,
        "trace" => 1,
      )
    );
  }

  /**
   * Function to create the user's personal request header
   *
   * @return stdClass The user's personal header
   */
  private function getRequestHeader() {
    //check of module aanwezig is, geef waarschuwing indien niet.
    $header = new stdClass();

    $header->userId = FLEXMAIL_USER_ID;
    $header->userToken = FLEXMAIL_USER_TOKEN;

    return $header;
  }
}

?>