<?php

namespace CottonCart;

/**
 * Exception class.
 */
class CottonCart_Exception extends \Exception {

	/**
	 * Error details.
	 * @var mixed
	 */
	protected $details;

	/**
	 * Construct a new exception.
	 * @param string $error
	 * @param int $code
	 * @param mixed $details
	 */
	public function __construct($error, $code, $details) {
		parent::__construct($error, $code);
		$this->details = $details;
	}

	/**
	 * Return error details.
	 * @return mixed
	 */
	public function getDetails() {
		return $this->details;
	}

}