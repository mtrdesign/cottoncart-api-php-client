<?php

namespace CottonCart;

/**
 * Order API methods.
 */
class CottonCart_Group_Order extends CottonCart_Group {

	/**
	 * Calculate prices, shipping fees and totals for an order.
	 * @param CottonCart_Cart $cart	shopping cart with items to order (required)
	 * @param string|null $country	2-char country code for shipping costs (optional; default: 'gb')
	 */
	public function calculate(CottonCart_Cart $cart, $country = null) {
		$params = $cart->item_params();
		$params['country'] = $country;
		return $this->api->request('order/calculate', $params);
	}

	/**
	 * Test checkout (order will not be placed).
	 * @param CottonCart_Order $order order details (required)
	 * @return array				API response
	 */
	public function test_checkout(CottonCart_Order $order) {
		$item_params = $order->item_params();
		$order_params = $order->order_params();
		$params = array_merge($item_params, $order_params);
		$params['checkout'] = 0;
		return $this->api->request('order/checkout', $params, true);
	}

	/**
	 * Real checkout (order WILL be placed).
	 * @param CottonCart_Order $order order details (required)
	 * @param string $return_url	URL to return to after order is placed (required)
	 * @param boolean $mobile		request payment on Paypal's mobile site (optional)
	 * @return array				API response
	 */
	public function checkout(CottonCart_Order $order, $return_url, $mobile = false) {
		$item_params = $order->item_params();
		$order_params = $order->order_params();
		$params = array_merge($item_params, $order_params);
		$params['mobile'] = $mobile;
		$params['return_url'] = $return_url;
		$params['checkout'] = 1;
		return $this->api->request('order/checkout', $params, true);
	}

}