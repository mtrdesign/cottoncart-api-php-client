<?php

namespace CottonCart;

/**
 *
 * Cotton Cart APIs Client Library for PHP
 *
 * https://github.com/mtrdesign/cottoncart-api-php-client
 *
 */
class CottonCart_Exception extends \Exception {

  /**
   * Error details.
   * @var mixed
   */
  protected $details;

  /**
   * Construct a new exception.
   *
   * @param string $error
   * @param int    $code
   * @param mixed  $details
   *
   * @access public
   * @return void
   */
  public function __construct($error, $code, $details) {
    parent::__construct($error, $code);
    $this->details = $details;
  }

  /**
   * Return error details.
   *
   * @access public
   * @return mixed
   */
  public function getDetails() {
    return $this->details;
  }

}