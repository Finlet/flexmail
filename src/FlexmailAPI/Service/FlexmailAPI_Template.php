<?php

/**
 * @todo Write file documentation.
 */

namespace Finlet\flexmail\FlexmailAPI\Service;

use Finlet\flexmail\FlexmailAPI\FlexmailAPI;
use Finlet\flexmail\FlexmailAPI\Service\FlexmailAPIServiceInterface;

class FlexmailAPI_Template extends FlexmailAPI implements FlexmailAPIServiceInterface {
  /**
   * Create a new Template
   *
   * Parmeters example:
   * ------------------
   * $parameters = array (
   *      "templateType" => array (            // array mandatory
   *          "templateName" => "My template", // string mandatory
   *          "templateText" => "<html ...>",  // string mandatory
   *      )
   * );
   *
   * @param Array $parameters Associative array with properties of a
   *                          templateType object
   *
   * @return templateId
   */
  public function create($parameters) {
    $request = FlexmailAPI::parseArray($parameters);

    $response = $this->execute("CreateTemplate", $request);
    return FlexmailAPI::stripHeader($response, $this->config->get('debug_mode'));

  }

  /**
   * Update a Template
   *
   * Parmeters example:
   * ------------------
   * $parameters = array (
   *      "templateType" => array (            // array mandatory
   *          "templateId"   => 124984         // int mandatory
   *          "templateName" => "My template", // string optional
   *          "templateText" => "<html ...>",  // string optional
   *      )
   * );
   *
   * @param Array $parameters Associative array with properties of an
   *                          templateType object
   *
   * @return void
   */
  public function update($parameters) {
    $request = FlexmailAPI::parseArray($parameters);

    $response = $this->execute("UpdateTemplate", $request);

    return FlexmailAPI::stripHeader($response, $this->config->get('debug_mode'));

  }

  /**
   * Delete a Template
   *
   * Parmeters example:
   * ------------------
   * $parameters = array (
   *      "templateType" => array (  // array mandatory
   *          "templateId" => 124984 // int mandatory
   *      )
   * );
   *
   * @param Array $parameters Associative array with properties of a
   *                          templateType object
   *
   * @return void
   */
  public function delete($parameters) {
    $request = FlexmailAPI::parseArray($parameters);

    $response = $this->execute("DeleteTemplate", $request);
    return FlexmailAPI::stripHeader($response, $this->config->get('debug_mode'));

  }

  /**
   * Get all Templates
   *
   * @return templateTypeItems array with all TemplateType objects
   */
  public function getAll() {
    $request = NULL;
    $response = $this->execute("GetTemplates", $request);
    return FlexmailAPI::stripHeader($response, $this->config->get('debug_mode'));
  }
}

?>