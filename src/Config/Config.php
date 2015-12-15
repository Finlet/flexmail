<?php

/**
 * @todo Write file documentation.
 */

namespace Finlet\flexmail\Config;

use Finlet\flexmail\Config\ConfigInterface;

class Config implements ConfigInterface {

  private $container = array();

  public function get($key) {
    return $this->set($key);
  }

  public function set($key, $value = NULL) {
    if ($value !== NULL) {
      $this->container[$key] = $value;
    }

    return $this->container[$key];
  }
}

?>