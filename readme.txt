Flexmail API PHP Wrapper                                            version: 1.4


What:
-----
This PHP wrappers wraps around Flexmail's SOAP/WSDL API.


Prerequisites:
--------------
PHP's SOAP extension: http://www.php.net/manual/en/book.soap.php


Usage:
------
Update the config.php file replacing the required information: USER_ID and 
USER_TOKEN with your personal Flexmail User Id and User Token, which can be 
found within the Flexmail platform. Browse to Home > Profile to view your 
User ID and User Token

Within you existing PHP code require the FlexmailAPI wrapper

<?php

require_once "FlexmailAPI.php";

?>

To call a service on an objet: Request the instance, execute the function.
Required parameters can be found within the FlexmailAPI_Class files themselfs or
on: http://www.flexmail.eu/en/api/manual

<?php 

$response = FlexmailAPI::service("Contact")->create(array(
    "mailingListId"    => 10000,
    "emailAddressType" => array (
        "emailAddress" => "john.doe@example.com",
        "name"         => "John",
        "surname"      => "Doe"
    )
));

?>


Available objects with their functions:
---------------------------------------

FlexmailAPI_Account
    getBounces
    getSubscriptions
    getUnsubscriptions
    getProfileUpdates
    getBalance

FlexmailAPI_Blaclist
    import

FlexmailAPI_Campaign
    create
    update
    delete
    getAll
    sendTest
    send
    history
    report
    getSummary
    getTrackingLinks
    getTrackingLinkHits
    

FlexmailAPI_Category
    create
    update
    delete
    getAll    

FlexmailAPI_Contact
    create
    update
    delete
    getAll
    import
    history

FlexmailAPI_File
    put

FlexmailAPI_Form
    getAll
    getResults

FlexmailAPI_Group
    create
    update
    delete
    getAll
    createSubscription
    deleteSubscription

FlexmailAPI_LandingPage
    create
    update
    delete
    getAll

FlexmailAPI_List
    create
    update
    delete
    getAll

FlexmailAPI_Message
    create
    update
    delete
    getAll

FlexmailAPI_Tempalte
    create
    update
    delete
    getAll