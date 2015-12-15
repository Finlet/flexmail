<?php

/**
 * @todo Write file documentation.
 */

namespace Finlet\flexmail\FlexmailAPI\Service;

use Finlet\flexmail\FlexmailAPI\FlexmailAPI;
use Finlet\flexmail\FlexmailAPI\Service\FlexmailAPIServiceInterface;

class FlexmailAPI_Blacklist extends FlexmailAPI implements FlexmailAPIServiceInterface {
  /**
   * Import multiple email adresses to the overall or a specific mailing list blacklist
   *
   *
   * $importBlacklistParameters  = array (
   *  "emailAddressTypeItems" =>  array(             // array mandatory
   *      array (
   *          "emailAddress"  =>  "foo@flexmail.eu"  // string mandatory
   *      ),
   *      array (
   *          "emailAddress"  =>  "bar@flexmail.eu"  // string mandatory
   *      )
   *  ),
   *  "mailingListTypeItems"  =>  array (            // array optional
   *      array (
   *          "mailingListId" =>  117115             // int mandatory
   *      ),
   *      array (
   *          "mailingListId" =>  117081             // int mandatory
   *      )
   *  )
   * );
   *
   * @param  Array $parameters Array with array of emailAddressType objects
   *                               and array with mailingListType objects
   *
   * @return importBlackListREspTypeItems array
   */
  public function import($parameters) {
    $request = FlexmailAPI::parseArray($parameters);

    $response = $this->execute("ImportBlacklist", $request);
    return FlexmailAPI::stripHeader($response, $this->config->get('debug_mode'));
  }
}

?>