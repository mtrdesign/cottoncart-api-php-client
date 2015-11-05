<?php

namespace CottonCart;

/**
 *
 * Cotton Cart APIs Client Library for PHP
 *
 * https://github.com/mtrdesign/cottoncart-api-php-client
 *
 */
class CottonCart_Group_Catalogue extends CottonCart_Group {

  /**
   * List all stores.
   *
   * @param array $func_params
   *
   * @access public
   * @return array API response
   */
  public function stores(array $func_params = array()) {
    return $this->api->request('catalogue/stores', $func_params);
  }

  /**
   * Get details for a store.
   *
   * @param array $func_params
   *
   * @access public
   * @return array API response
   */
  public function store_info(array $func_params = array()) {
    return $this->api->request('catalogue/store_info', $func_params);
  }

  /**
   * Get details for a product.
   *
   * @param array $func_params
   *
   * @access public
   * @return array API response
   */
  public function product_info(array $func_params = array()) {
    return $this->api->request('catalogue/product_info', $func_params);
  }

}
