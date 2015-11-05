<?php

namespace CottonCart;

/**
 *
 * Cotton Cart APIs Client Library for PHP
 *
 * https://github.com/mtrdesign/cottoncart-api-php-client
 *
 */
class CottonCart_Group_Order extends CottonCart_Group {

  /**
   * Calculate prices, shipping fees and totals for an order.
   *
   * @param array $func_params
   *
   * @access public
   * @return array API response
   */
  public function calculate(array $func_params = array()) {
    return $this->api->request('order/calculate', $func_params);
  }

  /**
   * Test checkout (order will not be placed).
   *
   * @param array $func_params
   *
   * @access public
   * @return array API response
   */
  public function test_checkout(array $func_params = array()) {
    $func_params['checkout'] = false;
    return $this->api->request('order/checkout', $func_params, true);
  }

  /**
   * Real checkout (order WILL be placed).
   *
   * @param array $func_params
   *
   * @access public
   * @return array API response
   */
  public function checkout(array $func_params = array()) {
    $func_params['checkout'] = true;
    return $this->api->request('order/checkout', $func_params, true);
  }

}