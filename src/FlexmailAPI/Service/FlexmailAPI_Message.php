<?php

/**
 * @todo Write file documentation.
 */

namespace Finlet\flexmail\FlexmailAPI\Service;

use Finlet\flexmail\FlexmailAPI\FlexmailAPI;
use Finlet\flexmail\FlexmailAPI\Service\FlexmailAPIServiceInterface;

class FlexmailAPI_Message extends FlexmailAPI implements FlexmailAPIServiceInterface {
  /**
   * Create a new Message
   *
   * Parmeters example:
   * ------------------
   * $parameters = array (
   *      "messageType" => array (                     // array mandatory
   *          "messageName"       => "My message",     // string mandatory
   *          "messageText"       => "<html ... />",   // string mandatory
   *          "messageTextMessage => "textual message" // string optional
   *      )
   * );
   *
   * @param Array $parameters Associative array with properties of a
   *                          messageType object
   *
   * @return messageId
   */
  public function create($parameters) {
    $request = FlexmailAPI::parseArray($parameters);

    $response = $this->execute("CreateMessage", $request);
    return FlexmailAPI::stripHeader($response, $this->config->get('debug_mode'));
  }

  /**
   * Update an Email Address
   *
   * Parmeters example:
   * ------------------
   * $parameters = array (
   *      "messageType" => array (                     // array mandatory
   *          "messageId"         => 1254355           // int mandatory
   *          "messageName"       => "My message",     // string optional
   *          "messageText"       => "<html ... />",   // string optional
   *          "messageTextMessage => "textual message" // string optional
   *      )
   * );
   *
   * @param Array $parameters Associative array with properties of a
   *                          messageType object
   *
   * @return void
   */
  public function update($parameters) {
    $request = FlexmailAPI::parseArray($parameters);

    $response = $this->execute("UpdateMessage", $request);
    return FlexmailAPI::stripHeader($response, $this->config->get('debug_mode'));
  }

  /**
   * Delete a Message
   *
   * Parmeters example:
   * ------------------
   * $parameters = array (
   *      "messageType" => array (                     // array mandatory
   *          "messageId"         => 1254355           // int mandatory
   *      )
   * );
   *
   * @param Array $parameters Associative array with properties of a
   *                          messageType object
   *
   * @return void
   */
  public function delete($parameters) {
    $request = FlexmailAPI::parseArray($parameters);

    $response = $this->execute("DeleteMessage", $request);
    return FlexmailAPI::stripHeader($response, $this->config->get('debug_mode'));
  }

  /**
   * Get all Messages
   *
   * @param Array $parameters Associative array with archivedMessages property.
   *
   * @return messageTypeItems array
   */
  public function getAll($parameters = NULL) {
    $request = NULL;

    if (isset($parameters) && (array_key_exists("archivedMessages", $parameters) && ($parameters["archivedMessages"]))):

      $request = FlexmailAPI::parseArray($parameters);

    endif;

    $response = $this->execute("GetMessages", $request);

    return FlexmailAPI::stripHeader($response, $this->config->get('debug_mode'));
  }
}

?>