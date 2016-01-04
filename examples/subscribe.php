<?php

/**
 * @todo Complete example.
 */

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload.
require_once '../config/config.php';

$config = new \Finlet\flexmail\Config\Config();
$config->set('wsdl', FLEXMAIL_WSDL);
$config->set('service', FLEXMAIL_SERVICE);
$config->set('user_id', FLEXMAIL_USER_ID);
$config->set('user_token', FLEXMAIL_USER_TOKEN);
$config->set('debug_mode', DEBUG_MODE);

$flexmail = new \Finlet\flexmail\FlexmailAPI\FlexmailAPI($config);

?>
<pre><?php print_r($flexmail->service('Category')->getAll()); ?></pre>
