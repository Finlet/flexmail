<?php

/**
 * @todo Write file documentation.
 */

namespace Finlet\flexmail\FlexmailAPI\Service;

use Finlet\flexmail\FlexmailAPI\FlexmailAPI;
use Finlet\flexmail\FlexmailAPI\Service\FlexmailAPIServiceInterface;

class FlexmailAPI_Form extends FlexmailAPI implements FlexmailAPIServiceInterface {
  /**
   * Return list of all forms in a Flexmail account
   *
   * Parmeters example:
   * ------------------
   * $parameters = array (
   * );
   *
   * @return forms
   */
  public function getAll() {
    $request = NULL;

    $response = $this->execute("GetForms", $request);
    return FlexmailAPI::stripHeader($response, $this->config->get('debug_mode'));
  }

  /**
   * Return list of all user submitted date for a given form and optionally
   * a campaign
   *
   * Parmeters example:
   * ------------------
   * $parameters = array (
   *     "formId"     =>  12345, //int mandatory
   *     "campaignId" =>  12345,  /int optional
   * );
   *
   * @param Array $parameters Associative array with formId and optional
   *               campaignId
   *
   * @return formdata
   */
  public function getResults($parameters) {
    $request = array();

    foreach ($parameters as $key => $value):
      $request[$key] = $value;
    endforeach;

    $response = $this->execute("GetFormResults", $request);

    return FlexmailAPI::stripHeader($response, $this->config->get('debug_mode'));
  }
}

?>