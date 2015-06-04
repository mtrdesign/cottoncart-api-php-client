<?php
/**
 * Abstract API method group class.
 */
abstract class CottonCart_Group {

	/**
	 * CottonCart API client instance.
	 * @var CottonCart
	 */
	protected $api;

	/**
	 * Instantiate the API method group.
	 * @param CottonCart $api
	 */
	public function __construct(CottonCart $api) {
		$this->api = $api;
	}

}