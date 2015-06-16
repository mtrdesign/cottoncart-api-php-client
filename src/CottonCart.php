<?php

namespace CottonCart;

/**
 * API client class
 */
class CottonCart {

	/**
	 * Default API endpoint URL.
	 */
	const API_URL = 'http://www.cottoncart.com/api/v1/';

	/**
	 * API endpoint URL.
	 * @var string
	 */
	protected $api_url;

	/**
	 * API ID from authenticated requests.
	 * @var string
	 */
	protected $auth_id;

	/**
	 * API key for authenticated requests.
	 * @var string
	 */
	protected $api_key;

	/**
	 * Create a new CottonCart API client.
	 * @param string|null $api_url		URL of the API (optional)
	 */
	public function __construct($api_url = null) {
		$this->api_url = isset($api_url)? rtrim($api_url, '/').'/': CottonCart::API_URL;
	}

	/**
	 * Set API credentials for authenticated requests.
	 * @param string $auth_id			API ID
	 * @param string $api_key			API key
	 * @return self						fluent interface
	 */
	public function set_credentials($auth_id, $api_key) {
		$this->auth_id = $auth_id;
		$this->api_key = $api_key;
		return $this;
	}

	/**
	 * Sign a request.
	 * @param string $method			method to call
	 * @param array $params				parameters for the method
	 * @return array					parameters with added authentication fields
	 */
	protected function sign($method, array $params) {
		if (!(strlen($this->auth_id) && strlen($this->api_key))) {
			$details = array(
				'method' => $method,
				'params' => $params,
			);
			throw new CottonCart_Exception('API credentials not configured', 401, $details);
		}
		$params['auth_id'] = $this->auth_id;
		$params['auth_ts'] = time();
		unset($params['auth_sig']);
		ksort($params);
		$base = 'v1/'.$method.'?'.urldecode(http_build_query($params));
		$params['auth_sig'] = hash_hmac('sha256', $base, $this->api_key);
		return $params;
	}

	/**
	 * Perform a generic API request.
	 * @param string $method			method to call
	 * @param array|null $params		parameters for the method
	 * @param boolean $signed			sign the request
	 * @return array					response
	 * @throws CottonCart_Exception		in case of failure
	 */
	public function request($method, array $params = array(), $signed = false) {
		$uploads = array();
		foreach ($params as $name => $value) {
			if ($value instanceof CottonCart_File) {
				$uploads[$name] = '@'.$value->get_path();
				unset($params[$name]);
			}
		}
		if ($signed) {
			$params = $this->sign($method, $params);
		}

		$ch = curl_init($this->api_url.$method.'.json?'.http_build_query($params));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		if (count($uploads)) {
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $uploads);
		}
		$json = curl_exec($ch);
		$info = curl_getinfo($ch);
		curl_close($ch);

		if (!is_null($json)) {
			$response = json_decode($json, true);
			if (is_null($response)) {
				throw new CottonCart_Exception('Unparsable API response', 500, array('response' => $json));
			}
			if ($response['success']) {
				return $response;
			}
			throw new CottonCart_Exception($response['error'], $response['errorCode'], @$response['errorDetails']);
		}

		$details = array(
			'url' => $info['url'],
			'http_status' => $info['http_code'],
		);
		throw new CottonCart_Exception('HTTP request failed', $details);
	}

	/**
	 * Return an API method group.
	 * @param string $group				API method group name
	 * @return CottonCart_Group			instance of the API method group
	 */
	public function __get($group) {
		static $instances = array();
		if (isset($instances[$group])) {
			return $instances[$group];
		}
		$class = 'CottonCart\\CottonCart_Group_'.ucfirst($group);
		if (!class_exists($class)) {
			$details = array(
				'group' => $group,
			);
			throw new CottonCart_Exception('Unsupported API method group', 400, $details);
		}
		$instances[$group] = new $class($this);
		return $instances[$group];
	}

}