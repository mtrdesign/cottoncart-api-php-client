<?php

namespace CottonCart;

/**
 *
 * Cotton Cart APIs Client Library for PHP
 *
 * https://github.com/mtrdesign/cottoncart-api-php-client
 *
 */
abstract class CottonCart_Group {

  /**
   * CottonCart API client instance.
   * @var CottonCart
   */
  protected $api;

  /**
   * Instantiate the API method group.
   *
   * @param CottonCart $api
   *
   * @access public
   * @return void
   */
  public function __construct(CottonCart $api) {
    $this->api = $api;
  }

}