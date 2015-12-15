<?php

/**
 * @todo Write file documentation.
 */

namespace Finlet\flexmail\FlexmailAPI\Service;

use Finlet\flexmail\FlexmailAPI\FlexmailAPI;
use Finlet\flexmail\FlexmailAPI\Service\FlexmailAPIServiceInterface;

class FlexmailAPI_Campaign extends FlexmailAPI implements FlexmailAPIServiceInterface {
  /**
   * Create a new Campaign
   *
   * Parmeters example:
   * ------------------
   *  $parameters = array (
   *      "campaignType" => array(
   *          "campaignName"               => "Test Campaigns", // string mandatory
   *          "campaignSubject"            => "Test subject",   // string mandatory
   *          "campaignSenderName"         => "Flexmail",       // string mandatory
   *          "campaignMessageId"          => 207375,           // int mandatory
   *          "campaignMailingIds"         => array(116911),    // array of int. mandatory
   *          "campaignReplyEmailAddress"  => bar@flexmail.eu", // string mandatory
   *          "campaignSenderEmailAddress" => foo@flexmail.eu", // string mandatory
   *      )
   *  );
   *
   * @param  Array $parameters Ass. array with properties of a campaignType object
   *
   * @return campaignId
   */
  public function create($parameters) {
    $request = FlexmailAPI::parseArray($parameters);

    $response = $this->execute("CreateCampaign", $request);
    return FlexmailAPI::stripHeader($response, $this->config->get('debug_mode'));
  }

  /**
   * Update a Campaign
   *
   * Parmeters example:
   * ------------------
   *  $parameters = array (
   *      "campaignType" => array(
   *          "campaignId"                 => 300125             // int mandatory
   *          "campaignName"               => "Test Updated",    // string optional
   *          "campaignSubject"            => "Test Update",     // string optional
   *          "campaignSenderName"         => "Flexmail",        // string optional
   *          "campaignMessageId"          => 207375,            // int optional
   *          "campaignMailingIds"         => array(116911),     // array of int. optional
   *          "campaignReplyEmailAddress"  => "bar@flexmail.eu", // string optional
   *          "campaignSenderEmailAddress" => "foo@flexmail.eu", // string optional
   *      )
   *  );
   *
   * @param  Array $parameters Ass. array with properties of an campaignType object
   *
   * @return void
   */
  public function update($parameters) {
    $request = FlexmailAPI::parseArray($parameters);

    $response = $this->execute("UpdateCampaign", $request);
    return FlexmailAPI::stripHeader($response, $this->config->get('debug_mode'));

  }

  /**
   * Delete a Campaign
   *
   * Parmeters example:
   * ------------------
   * $parameters = array (
   *      "campaignType" => array(
   *          "campaignId" => 300125 // int mandatory
   *      )
   *  );
   *
   * @param  Array $parameters Ass. array with properties of an campaignType object
   *
   * @return void
   */
  public function delete($parameters) {
    $request = FlexmailAPI::parseArray($parameters);

    $response = $this->execute("DeleteCampaign", $request);
    return FlexmailAPI::stripHeader($response, $this->config->get('debug_mode'));

  }

  /**
   * Get all Campaigns
   *
   * @return campaignTypeitems array
   */
  public function getAll() {
    $request = NULL;

    $response = $this->execute("GetCampaigns", $request);
    return FlexmailAPI::stripHeader($response, $this->config->get('debug_mode'));

  }

  /**
   * Get campaign settings before sending
   *
   * Parmeters example:
   * ------------------
   * $parameters = array (
   *      "campaignType" => array(
   *          "campaignId" => 300125 // int mandatory
   *      )
   *  );
   *
   * @param  Array $parameters Ass. array with campaignId
   *
   * @return campaignsummarytype
   */
  public function getSummary($parameters) {

    $request = FlexmailAPI::parseArray($parameters);

    $response = $this->execute("GetCampaignSummary", $request);
    return FlexmailAPI::stripHeader($response, $this->config->get('debug_mode'));
  }

  /**
   * Get all links with link tracking enabled for a campaign
   *
   * Parmeters example:
   * ------------------
   * $parameters = array (
   *      "campaignType" => array(
   *          "campaignId" => 300125 // int mandatory
   *      )
   *  );
   *
   * @param  Array $parameters Ass. array with campaignId
   *
   * @return trackingLinkTypeItems array
   */
  public function getTrackingLinks($parameters) {
    $request = FlexmailAPI::parseArray($parameters);

    $response = $this->execute("GetCampaignTrackingLinks", $request);
    return FlexmailAPI::stripHeader($response, $this->config->get('debug_mode'));
  }

  /**
   * Recall all email addresses that clicked on a specified tracking link
   *
   * Parmeters example:
   * ------------------
   * $parameters = array (
   *      "trackingLidId" => 24894456 // int mandatory
   *      )
   *  );
   *
   * @param  Array $parameters Ass. array with trackingLinkId
   *
   * @return trackingLinkHitTypeItems array
   */
  public function getTrackingLinkHits($parameters) {
    $request = FlexmailAPI::parseArray($parameters);

    $response = $this->execute("GetTrackingLinkHits", $request);
    return FlexmailAPI::stripHeader($response, $this->config->get('debug_mode'));
  }

  /**
   * Send campaign to a single email address
   *
   * Parmeters example:
   * ------------------
   *  $parameters = array (
   *      "testCampaignType" => array(
   *          "testCampaignName"               => "Test Campaigns",  // string mandatory
   *          "testCampaignSubject"            => "Test subject",    // string mandatory
   *          "testCampaignSenderEmailAddress" => "foo@flexmail.eu", // string mandatory
   *          "testCampaignSenderName"         => "Flexmail",        // string mandatory
   *          "testCampaignReplyEmailAddress"  => "bar@flexmail.eu", // string mandatory
   *          "testCampaignMessageId"          => 207375,            // int mandatory
   *          "testCampaignSendToEmailAddress" => "foo@flexmail.eu"  // string mandatory
   *      )
   *  );
   *
   * @param  Array $parameters Ass. array with properties of an TestCampaignType object
   *
   * @return void
   */
  public function sendTest($parameters) {
    $request = array(
      "testCampaignType" => (object) $parameters
    );
    $response = $this->execute("SendTestCampaign", $request);
    return FlexmailAPI::stripHeader($response, $this->config->get('debug_mode'));
  }

  /**
   * Launch or plan launch of a campaign
   *
   * Parmeters example:
   * ------------------
   * $parameters = array (
   *      "campaignId"            => 12345,                // int mandatory
   *      "campaignSendTimestamp" => "2014-09-20T09:00:00" // string mandatory
   * );
   *
   * @param  Int $parameters ass. array with campaign id and timestamp
   *
   * @return void
   */
  public function send($parameters) {
    $request = array();

    foreach ($parameters as $key => $value):
      $request[$key] = $value;
    endforeach;

    $response = $this->execute("SendCampaign", $request);
    return FlexmailAPI::stripHeader($response, $this->config->get('debug_mode'));
  }

  /**
   * Request complete or partial history for all email addresses in a campaign
   *
   * Parmeters example:
   * ------------------
   * $parameters = array (
   *      "campaignId"             => 12345,                 // int mandatory
   *      "timestampFrom"          => "2008-09-20T09:00:00", // string optional
   *      "timestampTill"          => "2013-09-20T09:00:00", // string optional
   *      "campaignHistoryOptions" => array (                // array optional
   *          "campaignSend"              => true,           // boolean optional
   *          "campaignRead"              => true,           // boolean optional
   *          "campaignReadOnline"        => true,           // boolean optional
   *          "campaignLinkClicked"       => true,           // boolean optional
   *          "campaignLinkGroupClicked"  => true,           // boolean optional
   *          "campaignReadInfoPage"      => true,           // boolean optional
   *          "campaignFormVisited"       => true,           // boolean optional
   *          "campaignFormSubmitted"     => true,           // boolean optional
   *          "campaignFormSubmitted"     => true,           // boolean optional
   *          "campaignSurveySubmitted"   => true,           // boolean optional
   *          "campaignForwardSubmitted"  => true,           // boolean optional
   *          "campaignForwardVisited"    => true            // boolean optional
   *      ),
   *      "sort"                   => 0                      // integer optional
   *
   *
   *
   * @param  Array $parameters Ass. array with campaignId, optional TimeStampFrom,
   *                                  TimeStampTill and sort parameters and optional
   *                                  array with properties for campaignHistoryOptionsType object
   *
   * @return campaignHistoryType
   */
  public function history($parameters) {
    $request = FlexmailAPI::parseArray($parameters);

    $response = $this->execute("GetCampaignHistory", $request);
    return FlexmailAPI::stripHeader($response, $this->config->get('debug_mode'));

  }

  /**
   * Receive same result indicators as in web reports
   *
   * Parmeters example:
   * ------------------
   * $parameters = array (
   *      "campaignId" => 12345, // int mandatory
   *      "language"   => "EN"   // string optional
   * );
   *
   * @param  Array $parameters Ass. array with campaignId and language string
   *
   * @return void
   */
  public function report($parameters) {
    $request = array();

    foreach ($parameters as $key => $value):
      $request[$key] = $value;
    endforeach;


    $response = $this->execute("GetCampaignReport", $request);
    return FlexmailAPI::stripHeader($response, $this->config->get('debug_mode'));

  }
}

?>