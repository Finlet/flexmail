<?php

/**
 * @todo Write file documentation.
 */

namespace Finlet\flexmail\FlexmailAPI\Service;

use Finlet\flexmail\FlexmailAPI\FlexmailAPI;
use Finlet\flexmail\FlexmailAPI\Service\FlexmailAPIServiceInterface;

class FlexmailAPI_Email extends FlexmailAPI implements FlexmailAPIServiceInterface {
  public function __construct() {
    trigger_error("Class is deprecated, please use 'Contact' service instead of 'Email' service", E_NOTICE);

    parent::__construct();
  }
}

?>