<?php

namespace CottonCart;

/**
 * Order details class.
 */
class CottonCart_Order extends CottonCart_Cart {

	/**
	 * API parameters for the order details.
	 * @var array
	 */
	protected $details = array();

	/**
	 * Instantiate an order
	 * @param string $name			name of the recipient (required)
	 * @param string $email			email of the recipient (required)
	 * @param string $country		2-char country code (required)
	 * @param string $postcode		postcode (required)
	 * @param string $region		region/state/province (required)
	 * @param string $city			city (required)
	 * @param string $address1		first line of street address (required)
 	 * @param string $address2		second line of street address (optional)
	 */
	public function __construct($name, $email, $country, $postcode, $region, $city, $address1, $address2 = null) {
		$this->details['name']		= $name;
		$this->details['email']		= $email;
		$this->details['country']	= $country;
		$this->details['postcode']	= $postcode;
		$this->details['region']	= $region;
		$this->details['city']		= $city;
		$this->details['address_1']	= $address1;
		$this->details['address_2']	= $address2;
	}

	/**
	 * Return API request parameters for the order details.
	 * @return array
	 */
	public function order_params() {
		return $this->details;
	}

	/**
	 * Calculate the details for the order via an API call.
	 * @param CottonCart $api			API client (required)
	 * @param string|null $country	2-char country code (optional)
	 * @return array
	 */
	public function calculate(CottonCart $api, $country = null) {
		return parent::calculate($api, is_null($country)? $this->details['country']: $country);
	}

	/**
	 * Test checkout (order will not be placed).
	 * @param CottonCart $api			API client (required)
	 * @return array				API response
	 */
	public function test_checkout(CottonCart $api) {
		return $api->order->test_checkout($this);
	}

	/**
	 * Real checkout (order WILL be placed).
	 * @param CottonCart $api			API client (required)
	 * @param string $return_url	URL to return to after order is placed (required)
	 * @param boolean $mobile		request payment on Paypal's mobile site (optional)
	 * @return array				API response
	 */
	public function checkout(CottonCart $api, $return_url, $mobile = false) {
		return $api->order->checkout($this, $return_url, $mobile);
	}

}