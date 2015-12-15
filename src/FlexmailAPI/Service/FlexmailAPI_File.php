<?php

/**
 * @todo Write file documentation.
 */

namespace Finlet\flexmail\FlexmailAPI\Service;

use Finlet\flexmail\FlexmailAPI\FlexmailAPI;
use Finlet\flexmail\FlexmailAPI\Service\FlexmailAPIServiceInterface;

class FlexmailAPI_File extends FlexmailAPI implements FlexmailAPIServiceInterface {
  /**
   * Send images and/or documents to your Flexmail account
   *
   * Parmeters example:
   * ------------------
   * $parameters = array (
   *      "fileTypeItems" => array (
   *          array (
   *              "type" => "Document",                 // string mandatory
   *              "name" => "My-Report.pdf",            // string mandatory
   *              "file" => "/users/john/My-Report.pdf" // string mandatory
   *          ),
   *          array (
   *              "type" => "Image",                        // string mandatory
   *              "name" => "banner.jpg",                   // string mandatory
   *              "file" => "/users/john/images/banner.jpg" // string mandatory
   *          )
   *      )
   * );
   *
   * @param  Array $parameters ass. array with fileTypeItems objects array
   *
   * @return void
   */
  public function put($parameters) {

    foreach ($parameters["fileTypeItems"] as $key => $file):
      if (!file_exists($file["file"])):
        throw new Exception("Local file not found");
      endif;

      $parameters["fileTypeItems"][$key]["data"] = base64_encode(file_get_contents($file["file"]));
    endforeach;

    $response = $this->execute("PutFiles", $parameters);

    return FlexmailAPI::stripHeader($response, $this->config->get('debug_mode'));
  }
}

?>