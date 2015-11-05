<?php

namespace CottonCart;

/**
 *
 * Cotton Cart APIs Client Library for PHP
 *
 * https://github.com/mtrdesign/cottoncart-api-php-client
 *
 */
abstract class Group {

  /**
   * CottonCart API client instance.
   * @var CottonCart
   */
  protected $api;

  /**
   * Instantiate the API method group.
   *
   * @param Client $api
   *
   * @access public
   * @return void
   */
  public function __construct(Client $api) {
    $this->api = $api;
  }

}