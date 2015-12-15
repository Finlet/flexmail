<?php

// Set your API User Id. Can be found under the Profile tab on flexmail.eu
define("FLEXMAIL_USER_ID", 0);

// Set your API User Token. Can be found under the Profile tab on flexmail.eu
define("FLEXMAIL_USER_TOKEN", "xxxxxxx-xxxxxxx-xxxxxxxx-xxxxxxx-xxxxxx");

// WSDL Location
define("FLEXMAIL_WSDL", "http://soap.flexmail.eu/3.0.0/flexmail.wsdl");

// Service Location
define("FLEXMAIL_SERVICE", "http://soap.flexmail.eu/3.0.0/flexmail.php");


// Toggle debug mode. 
// If debug mode is on, the response header, errorCode and errorMessage will be 
//                                                          returned as an object
// 
// If debug mode is off, methods that provide a relevant response parameter
//                                          (like getters) will return them
//                                                          
define("DEBUG_MODE", true);