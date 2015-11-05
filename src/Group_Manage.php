<?php

namespace CottonCart;

/**
 *
 * Cotton Cart APIs Client Library for PHP
 *
 * https://github.com/mtrdesign/cottoncart-api-php-client
 *
 */
class Group_Manage extends Group {

  /**
   * List sub-users of the API account.
   * Your API key needs to have permission to manage sub-users for your account.
   *
   * @param array $func_params
   *
   * @access public
   * @return array API response
   */
  public function my_users(array $func_params = array()) {
    return $this->api->request('manage/my_users', $func_params, true);
  }

  /**
   * Create a new sub-user under the API account.
   * Your API key needs to have permission to manage sub-users for your account.
   *
   * @param array $func_params
   *
   * @access public
   * @return array API response
   */
  public function create_user(array $func_params = array()) {
    return $this->api->request('manage/create_user', $func_params, true);
  }

  /**
   * List stores that can be managed by the API account.
   *
   * @param array $func_params
   *
   * @access public
   * @return array API response
   */
  public function my_stores(array $func_params = array()) {
    return $this->api->request('manage/my_stores', $func_params, true);
  }

  /**
   * Return metadata necessary for creating a new store.
   *
   * @param array $func_params
   *
   * @access public
   * @return array API response
   */
  public function store_options(array $func_params = array()) {
    return $this->api->request('manage/store_options', $func_params, true);
  }

  /**
   * Create a new store.
   * Your API key must not be a single-store key. It also must have permission to manage sub-users, if you
   * wish to provide a $user_id parameter to assign the store to a sub-user account.
   *
   * @param array $func_params
   *
   * @access public
   * @return array API response
   */
  public function create_store(array $func_params = array()) {
    # We remove the hidden parameter if we don't want 
    # to hide the store from the main website listings
    if(isset($func_params['hidden']) && $func_params['hidden'] === false) {
      unset($func_params['hidden']);
    }
    # If a file is added we create for it an File instance
    if(strlen($func_params['logo_file'])) {
      $func_params['logo_file'] = new File($func_params['logo_file']);
    }
    return $this->api->request('manage/create_store', $func_params, true);
  }

  /**
   * Edit store details.
   * Passing a null value will preserve the current value of the corresponding field.
   * Passing an empty string will clear the corresponding field; this is not allowed for $name and $description.
   * At least one of the $website, $facebook_url or $twitter_id fields must remain uncleared
   * in the store record; i.e. if a store has only a website set, you cannot pass $website = '' to clear it,
   * but you may pass $website = '', $facebook_url = 'http://...' to clear the website and set a Facebook URL
   * in the same request.
   *
   * @param array $func_params
   *
   * @access public
   * @return array API response
   */
  public function edit_store(array $func_params = array()) {
    # We remove the hidden parameter if we don't want 
    # to hide the store from the main website listings
    if(isset($func_params['hidden']) && $func_params['hidden'] === false) {
      unset($func_params['hidden']);
    }
    # If a file is added we create for it an File instance
    if(strlen($func_params['logo_file'])) {
      $func_params['logo_file'] = new File($func_params['logo_file']);
    }
    return $this->api->request('manage/edit_store', $func_params, true);
  }

  /**
   * Delete a store.
   *
   * @param array $func_params
   *
   * @access public
   * @return array API response
   */
  public function delete_store(array $func_params = array()) {
    return $this->api->request('manage/delete_store', $func_params, true);
  }

  /**
   * Return metadata necessary for creating a new product.
   *
   * @param array $func_params
   *
   * @access public
   * @return array API response
   */
  public function product_options(array $func_params = array()) {
    return $this->api->request('manage/product_options', $func_params, true);
  }

  /**
   * Upload a new design.
   *
   * @param array $func_params
   *
   * @access public
   * @return array API response
   */
  public function upload_design(array $func_params = array()) {
    # If a file is added we create for it an File instance
    if(strlen($func_params['design_file'])) {
      $func_params['design_file'] = new File($func_params['design_file']);
    }
    return $this->api->request('manage/upload_design', $func_params, true);
  }

  /**
   * Create a new product.
   *
   * @param array $func_params
   *
   * @access public
   * @return array API response
   */
  public function create_product(array $func_params = array()) {
    if(!isset($func_params['product_type_id'])) {
      $func_params['product_type_id'] = 'all';
    }
    if(!isset($func_params['process'])) {
      $func_params['process'] = 'all';
    }
    if(!isset($func_params['colours'])) {
      $func_params['colours'] = 'all';
    }
    # API class forbids arrays, so we cast the array to a string
    if(isset($func_params['colours']) && is_array($func_params['colours']) && $func_params['colours']) {
      $func_params['colours'] = join(',', $func_params['colours']);
    }
    # If a file is added we create for it an File instance
    # This is used when a design_id is not set
    if(isset($func_params['design_file']) && strlen($func_params['design_file'])) {
      $func_params['design_file'] = new File($func_params['design_file']);
    }
    return $this->api->request('manage/create_product', $func_params, true);
  }

  /**
   * Edit product details.
   *
   * @param array $func_params
   *
   * @access public
   * @return array API response
   */
  public function edit_product(array $func_params = array()) {
    # API class forbids arrays, so we cast the array to a string
    if(isset($func_params['colours']) && is_array($func_params['colours']) && $func_params['colours']) {
      $func_params['colours'] = join(',', $func_params['colours']);
    }
    return $this->api->request('manage/edit_product', $func_params, true);
  }

  /**
   * Delete a product.
   *
   * @param array $func_params
   *
   * @access public
   * @return array API response
   */
  public function delete_product(array $func_params = array()) {
    return $this->api->request('manage/delete_product', $func_params, true);
  }

  /**
   * Delete a product design.
   *
   * @param array $func_params
   *
   * @access public
   * @return array API response
   */
  public function delete_design(array $func_params = array()) {
    return $this->api->request('manage/delete_design', $func_params, true);
  }

}