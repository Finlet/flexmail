<?php

/**
 * @todo Write file documentation.
 */

namespace Finlet\flexmail\FlexmailAPI\Service;

use Finlet\flexmail\FlexmailAPI\FlexmailAPI;
use Finlet\flexmail\FlexmailAPI\Service\FlexmailAPIServiceInterface;

class FlexmailAPI_Account extends FlexmailAPI implements FlexmailAPIServiceInterface {
  /**
   * Recall all bounced email addresses, either by campaign or by mailing list
   *
   * Parmeters example:
   * ------------------
   * $parameters = array (
   *      "campaignId"     => 12345,                // int optional
   *      "mailingListId"  => 12345,                // int optional
   *      "timestampSince" => "2010-09-20T09:00:00" // string (YYY-MM-DDTHH:ii:ss) optional
   * );
   *
   * @param Array $parameters Associative array with campaignid or
   *                          mailinglistid and optional timestampsince
   *
   * @return bounces
   */
  public function getBounces($parameters) {
    $request = array();

    foreach ($parameters as $key => $value):
      $request[$key] = $value;
    endforeach;

    $response = $this->execute("GetBounces", $request);
    return FlexmailAPI::stripHeader($response, $this->config->get('debug_mode'));
  }

  /**
   * Recall all subscribed email addresses by mailing list and/or timestamp
   *
   * Parmeters example:
   * ------------------
   * $parameters = array (
   *      "mailingListId"  => 12345,                // int optional
   *      "timestampSince" => "2010-09-20T09:00:00" // string (YYY-MM-DDTHH:ii:ss) optional
   * );
   *
   * @param Array $parameters Associative array with optional mailinglistid
   *                          and optional timestampsince
   *
   * @return subscriptions
   */
  public function getSubscriptions($parameters) {
    $request = array();

    foreach ($parameters as $key => $value):
      $request[$key] = $value;
    endforeach;

    $response = $this->execute("GetSubscriptions", $request);
    return FlexmailAPI::stripHeader($response, $this->config->get('debug_mode'));
  }

  /**
   * Recall all unsubscribed email addresses, either by mailing list or by
   * campaign
   *
   * Parmeters example:
   * ------------------
   * $parameters = array (
   *      "campaignId"     => 12345,                // int optional
   *      "mailingListId"  => 12345,                // int optional
   *      "timestampSince" => "2010-09-20T09:00:00" // string (YYY-MM-DDTHH:ii:ss) optional
   * );
   *
   * @param Array $parameters Associative array with optional mailinglistid
   *                          and optional timestampsince
   *
   * @return unsubscriptions
   */
  public function getUnsubscriptions($parameters) {
    $request = array();

    //when requesting by campaign id, timestampSince becomes obsolete
    if (array_key_exists("campaignId", $parameters)
      && array_key_exists("timestampSince", $parameters)
    ):
      unset($parameters["timestampSince"]);
    endif;

    foreach ($parameters as $key => $value):
      $request[$key] = $value;
    endforeach;

    $response = $this->execute("GetUnsubscriptions", $request);
    return FlexmailAPI::stripHeader($response, $this->config->get('debug_mode'));
  }

  /**
   * Recall all email addresses which profiles have been updated, either by
   * mailing list or by campaign
   *
   * Parmeters example:
   * ------------------
   * $parameters = array (
   *      "campaignId"     => 12345,                // int optional
   *      "mailingListId"  => 12345,                // int optional
   *      "timestampSince" => "2010-09-20T09:00:00" // string (YYY-MM-DDTHH:ii:ss) optional
   * );
   *
   * @param  Array $parameters Associative array with optional mailinglistid
   *                           and optional timestampsince
   *
   * @return unsubscriptions
   */
  public function getProfileUpdates($parameters) {
    $request = array();

    //when requesting by campaign id, timestampSince becomes obsolete
    if (array_key_exists("campaignId", $parameters)
      && array_key_exists("timestampSince", $parameters)
    ):
      unset($parameters["timestampSince"]);
    endif;

    foreach ($parameters as $key => $value):
      $request[$key] = $value;
    endforeach;

    $response = $this->execute("GetProfileUpdates", $request);
    return FlexmailAPI::stripHeader($response, $this->config->get('debug_mode'));
  }

  /**
   * Return # of email, fax and sms credits
   *
   * @return balance
   */
  public function getBalance() {
    $request = NULL;

    $response = $this->execute("GetBalance", $request);
    return FlexmailAPI::stripHeader($response, $this->config->get('debug_mode'));
  }

}

?>