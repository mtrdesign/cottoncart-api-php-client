<?php
/**
 * Manage API methods.
 */
class CottonCart_Group_Manage extends CottonCart_Group {

	/**
	 * List sub-users of the API account.
	 * Your API key needs to have permission to manage sub-users for your account.
	 * @param int|null $count 		number of sub-users to list (optional; default: all sub-users)
	 * @param int|null $start		offset to start listing sub-users from (optional; 0-based, default: 0)
	 * @return array 				API response
	 */
	public function my_users($count = null, $start = null) {
		$params = array(
			'count'	=> $count,
			'start'	=> $start,
		);
		return $this->api->request('manage/my_users', $params, true);
	}

	/**
	 * Create a new sub-user under the API account.
	 * Your API key needs to have permission to manage sub-users for your account.
	 * @param string $email			email address of the sub-user (required; used for logging in)
	 * @param string|null $name		full name of the sub-user (optional)
	 * @param string|null $password password for the sub-user (optional; a random password will be generated and returned in the response if not provided)
	 * @return array				API response
	 */
	public function create_user($email, $name = null, $password = null) {
		$params = array(
			'email'		=> $email,
			'name'		=> $name,
			'password'	=> $password,
		);
		return $this->api->request('manage/create_user', $params, true);
	}

	/**
	 * List stores that can be managed by the API account.
	 * @param int|null $count 		number of stores to list (optional; default: all stores)
	 * @param int|null $start		offset to start listing stores from (optional; 0-based, default: 0)
	 * @param int|null $user_id		list only stores owned by this sub-user (optional; default: list all stores; if 0, list only stores NOT belonging to sub-users)
	 * @return array				API response
	 */
	public function my_stores($count = null, $start = null, $user_id = null) {
		$params = array(
			'count'		=> $count,
			'start'		=> $start,
			'user_id'	=> $user_id,
		);
		return $this->api->request('manage/my_stores', $params, true);
	}

	/**
	 * Return metadata necessary for creating a new store.
	 * @return array				API response
	 */
	public function store_options() {
		return $this->api->request('manage/store_options', array(), true);
	}

	/**
	 * Create a new store.
	 * Your API key must not be a single-store key. It also must have permission to manage sub-users, if you
	 * wish to provide a $user_id parameter to assign the store to a sub-user account.
	 * @param string $store_id			alphanumeric unique identifier for the store (required; new store will be http://$store_id.cottoncart.com)
	 * @param string $name				name of the store (required)
	 * @param string $description		description of the store (required)
	 * @param string|null $logo_file	path to image file to upload as store logo (optional)
	 * @param string|null $website		URL of the store's website (optional, but see note below)
	 * @param string|null $facebook_url	URL of the store's Facebook page (optional, but see note below)
	 * @param string|null $twitter_id	twitter username (optional, but see note below)
	 * @param string|null $rss_feed_url	URL of a RSS feed (optional)
	 * @param int|null $user_id			sub-user who will be owner of the store (optional)
	 * @return array					API response
	 * At least one of the $website, $facebook_url or $twitter_id parameters is required.
	 */
	public function create_store($store_id, $name, $description, $logo = null, $website = null, $facebook_url = null, $twitter_id = null, $rss_feed_url = null, $user_id = null) {
		$params = array(
			'store_id'		=> $store_id,
			'name'			=> $name,
			'description'	=> $description,
			'logo_file'		=> strlen($logo)? new CottonCart_File($logo): null,
			'website'		=> $website,
			'facebook_url'	=> $facebook_url,
			'twitter_id'	=> $twitter_id,
			'rss_feed_url'	=> $rss_feed_url,
			'user_id'		=> $user_id,
		);
		return $this->api->request('manage/create_store', $params, true);
	}

	/**
	 * Edit store details.
	 * @param string $store_id			alphanumeric ID of the store (required)
	 * @param string|null $name			name of the store (optional)
	 * @param string|null $description	description of the store (optional)
	 * @param string|null $logo_file	path to image file to upload as store logo (optional)
	 * @param string|null $website		URL of the store's website (optional, but see note below)
	 * @param string|null $facebook_url	URL of the store's Facebook page (optional, but see note below)
	 * @param string|null $twitter_id	twitter username (optional, but see note below)
	 * @param string|null $rss_feed_url	URL of a RSS feed (optional)
	 * @return array					API response
	 * Passing a null value will preserve the current value of the corresponding field.
	 * Passing an empty string will clear the corresponding field; this is not allowed for $name and $description.
	 * At least one of the $website, $facebook_url or $twitter_id fields must remain uncleared
	 * in the store record; i.e. if a store has only a website set, you cannot pass $website = '' to clear it,
	 * but you may pass $website = '', $facebook_url = 'http://...' to clear the website and set a Facebook URL
	 * in the same request.
	 */
	public function edit_store($store_id, $name, $description, $logo = null, $website = null, $facebook_url = null, $twitter_id = null, $rss_feed_url = null) {
		$params = array(
			'store_id'		=> $store_id,
			'name'			=> $name,
			'description'	=> $description,
		);
		$clearable_params = array(
			'logo_file'		=> strlen($logo)? new CottonCart_File($logo): $logo,
			'website'		=> $website,
			'facebook_url'	=> $facebook_url,
			'twitter_id'	=> $twitter_id,
			'rss_feed_url'	=> $rss_feed_url,
		);
		$clear = array();
		foreach ($clearable_params as $name => $value) {
			if (!is_null($value) && ($value === '')) {
				$clear[] = ($value == 'logo_file')? 'logo': $name;
				unset($clearable_params[$name]);
			}
		}
		$params['clear'] = join(',', $clear);
		$params = array_merge($params, $clearable_params);

		return $this->api->request('manage/edit_store', $params, true);
	}

	/**
	 * Delete a store.
	 * @param string $store_id		alphanumeric ID of the store (required)
	 * @return array				API response
	 */
	public function delete_store($store_id) {
		$params = array(
			'store_id' => $store_id,
		);
		return $this->api->request('manage/delete_store', $params, true);
	}

	/**
	 * Return metadata necessary for creating a new product.
	 * @param string $store_id		alphanumeric ID of the store where the product will be added (required)
	 * @return array				API response
	 */
	public function product_options($store_id) {
		$params = array(
			'store_id' => $store_id,
		);
		return $this->api->request('manage/product_options', $params, true);
	}

	/**
	 * Create a new product.
	 * @param string $store_id			alphanumeric ID of the store where the product will be added (required)
	 * @param string $name				name for the product (required)
	 * @param int|string $design		numeric ID of an existing design, or image file to upload as new design (required)
	 * @param int|null $product_type_id	numeric ID of the product type (optional; products of all types will be created if null)
	 * @param string|null $process		print process for the product (optional; products for all print processes will be created if null)
	 * @param array $colours			list of numeric colour IDs to make available for the product (optional; all colours will be created if null OR if either $product_type_id or $process is null)
	 * @param int|null $featured_colour	numeric ID of the colour which is displayed by default (required if all of $product_type_id, $process and $colours are provided; if any of them is null, the first available colour will be made featured)
	 * @param int|null $scale			scale of the design in percentage of the maximum possible print size (optional; default: 100; min: 10, max: 100)
	 * @param int|null $horiz			horizontal position of the design within the available print area (optional: default: 0 (= center); min: -100 (= flush left), max: 100 (= flush right))
	 * @param int|null $vert			vertical position of the design within the available print area (optional: default: 0 (= center); min: -100 (= flush top), max: 100 (= flush bottom))
	 * @return array					API response
	 */
	public function create_product($store_id, $name, $design, $product_type_id, $process, array $colours, $featured_colour = null, $scale = null, $horiz = null, $vert = null) {
		$params = array(
			'store_id'			=> $store_id,
			'name'				=> $name,
			'product_type_id'	=> is_null($product_type_id)? 'all': $product_type_id,
			'process'			=> is_null($process)? 'all': $process,
			'colours'			=> count($colours)? join(',', $colours): 'all',
			'featured_colour'	=> $featured_colour,
			'scale'				=> $scale,
			'horiz'				=> $horiz,
			'vert'				=> $vert,
		);
		if (is_int($design)) {
			$params['design_id'] = $design;
		} else {
			$params['design_file'] = new CottonCart_File($design);
		}
		return $this->api->request('manage/create_product', $params, true);
	}

	/**
	 * Edit product details.
	 * @param int $product_id			numeric ID of the product (required)
	 * @param string|null $name			new name for the product (optional; will not change name if null or empty string is passed)
	 * @param array $colours			list of numeric colour IDs to make available for the product (optional; will not change colours if empty array is passed)
	 * @param int|null $featured_colour	numeric ID of the colour which is displayed by deafult (optional; will not change featured colour if null or empty string id passed)
	 * @return array					API response
	 */
	public function edit_product($product_id, $name = null, array $colours = array(), $featured_colour = null) {
		$params = array(
			'product_id'		=> $product_id,
			'name'				=> $name,
			'colours'			=> join(',', $colours),
			'featured_colour'	=> $featured_colour,
		);
		return $this->api->request('manage/edit_product', $params, true);
	}

	/**
	 * Delete a product.
	 * @param int $product_id			numeric ID of the product (required)
	 * @return array					API response
	 */
	public function delete_product($product_id) {
		$params = array(
			'product_id' => $product_id,
		);
		return $this->api->request('manage/delete_product', $params, true);
	}

}