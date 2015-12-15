<?php

/**
 * @todo Write file documentation.
 */

namespace Finlet\flexmail\FlexmailAPI\Service;

use Finlet\flexmail\FlexmailAPI\FlexmailAPI;
use Finlet\flexmail\FlexmailAPI\Service\FlexmailAPIServiceInterface;

class FlexmailAPI_LandingPage extends FlexmailAPI implements FlexmailAPIServiceInterface {
  /**
   * Create a new Landing Page
   *
   * @param Array $parameters Associative array with properties of a landingPageType object
   *
   *  Parmeters example:
   * ------------------
   * $parameters = array (
   *      "landingPageType"     => array (                  // array mandatory
   *          "landingPageName" => "My landing page",       // string mandatory
   *          "landingPageText" => "HTML code landing page" // string mandatory
   *      )
   * );
   *
   * @return landingPageId
   */
  public function create($parameters) {
    $request = FlexmailAPI::parseArray($parameters);

    $response = $this->execute("CreateLandingPage", $request);
    return FlexmailAPI::stripHeader($response, $this->config->get('debug_mode'));

  }

  /**
   * Update a Landing Page
   *
   *  Parmeters example:
   * ------------------
   * $parameters = array (
   *      "landingPageType"     => array (            // array mandatory
   *          "landingPageId    => 14954
   *          "landingPageName" => "My Landing Page", // string optional
   *          "landingPageText" => "HTML code"        // string optional
   *      )
   * );
   *
   * @param Array $parameters Associative array with properties of an landingPageType object
   *
   * @return void
   */
  public function update($parameters) {
    $request = FlexmailAPI::parseArray($parameters);

    $response = $this->execute("UpdateLandingPage", $request);
    return FlexmailAPI::stripHeader($response, $this->config->get('debug_mode'));
  }

  /**
   * Delete a Landing Page
   *
   *  Parmeters example:
   * ------------------
   * $parameters = array (
   *      "landingPageType"     =>  array ( // array mandatory
   *          "landingPageId"   =>  14954   // intmandatory
   *      )
   * );
   *
   * @param Array $parameters Associative array with properties of an landingPageType object
   *
   * @return void
   */
  public function delete($parameters) {
    $request = FlexmailAPI::parseArray($parameters);

    $response = $this->execute("DeleteLandingPage", $request);
    return FlexmailAPI::stripHeader($response, $this->config->get('debug_mode'));
  }

  /**
   * Get all Landing Pages
   *
   * @return landingPageTypeItems array
   */
  public function getAll() {
    $request = NULL;

    $response = $this->execute("GetLandingPages", $request);
    return FlexmailAPI::stripHeader($response, $this->config->get('debug_mode'));

  }
}

?>