<?php

namespace CottonCart;

/**
 * Shopping cart class, holding the items for an order.
 */
class CottonCart_Cart implements \Countable {

	/**
	 * Number of items in cart.
	 * @var int
	 */
	protected $item_count = 0;

	/**
	 * API parameters for the cart items.
	 * @var array
	 */
	protected $items = array();

	/**
	 * Add an item to the cart.
	 * @param int $product_id		numeric ID of the product (required)
	 * @param string $colour_id		colour ID (required)
	 * @param string $size			size (required)
	 * @param int $quantity			quantity to order (required)
	 * @return self					fluent interface
	 */
	public function add_item($product_id, $colour_id, $size, $quantity) {
		$this->item_count++;
		$prefix = 'item'.$this->item_count.'_';
		$this->items[$prefix.'product_id']	= $product_id;
		$this->items[$prefix.'colour_id']	= $colour_id;
		$this->items[$prefix.'size']		= $size;
		$this->items[$prefix.'quantity']	= $quantity;
		return $this;
	}

	/**
	 * Clear items in the order.
	 * @return self					fluent interface
	 */
	public function clear_items() {
		$this->items = array();
		$this->item_count = 0;
		return $this;
	}

	/**
	 * Return number of items in the cart.
	 * @return int
	 */
	public function count() {
		return $this->item_count;
	}

	/**
	 * Return API request parameters for the cart items.
	 * @return array
	 */
	public function item_params() {
		return $this->items;
	}

	/**
	 * Calculate the details for the order via an API call.
	 * @param CottonCart $api			API client
	 * @param string|null			2-char country code for shipping costs (optional; default: 'gb')
	 * @return array
	 */
	public function calculate(CottonCart $api, $country = null) {
		return $api->order->calculate($this, $country);
	}

}