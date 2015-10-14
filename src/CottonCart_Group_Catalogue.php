<?php

namespace CottonCart;

/**
 * Catalogue API methods.
 */
class CottonCart_Group_Catalogue extends CottonCart_Group {

	/**
	 * List all stores.
	 * @param int|null $count 		number of stores to list (optional; default: all stores)
	 * @param int|null $start		offset to start listing stores from (optional; 0-based, default: 0)
	 * @return array				API response
	 */
	public function stores($count = null, $start = null) {
		$params = array(
			'count'	=> $count,
			'start'	=> $start,
		);
		return $this->api->request('catalogue/stores', $params);
	}

	/**
	 * Get details for a store.
	 * @param string $store_id		alphanumeric ID of the store (required)
	 * @param string|null $country	2-char country code for shipping costs (optional; default: 'gb')
	 * @param string|null $embed_settings	show embed shop settings in the response (optional; default: 'no')
	 * @param int|null $count 		number of store products to list (optional; default: all products)
	 * @param int|null $start		offset to start listing products from (optional; 0-based, default: 0)
	 * @return array				API response
	 */
	public function store_info($store_id, $country = null, $embed_settings = null, $count = null, $start = null) {
		$params = array(
			'store_id'		 => $store_id,
			'country'		 => $country,
			'embed_settings' => $embed_settings,
			'count'			 => $count,
			'start'			 => $start,
		);
		return $this->api->request('catalogue/store_info', $params);
	}

	/**
	 * Get details for a product.
	 * @param int $product_id		numeric ID of the product (required)
	 * @param string|null $country	2-char country code for shipping costs (optional; default: 'gb')
	 * @return array				API response
	 */
	public function product_info($product_id, $country = null) {
		$params = array(
			'product_id'	=> $product_id,
			'country'		=> $country,
		);
		return $this->api->request('catalogue/product_info', $params);
	}

}
