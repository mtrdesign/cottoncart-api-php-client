<?php

namespace CottonCart;

/**
 *
 * Cotton Cart APIs Client Library for PHP
 *
 * https://github.com/mtrdesign/cottoncart-api-php-client
 *
 */
class CottonCart {

	/**
	 * Default API endpoint URL.
   * This parameter could be changed via `set_api_endpoint` method.
	 */
	const API_URL = 'http://www.cottoncart.com/api/v1/';
  
	/**
	 * Default API response format.
   * This parameter could be changed via `set_api_format` method.
	 */
	const API_FORMAT = 'json';

	/**
	 * API endpoint URL.
	 * @var string|null
	 */
	protected $api_url = null;
  
	/**
	 * API response format.
	 * @var string|null
	 */
	protected $api_format = null;

	/**
	 * API ID from authenticated requests.
	 * @var string|null
	 */
	protected $auth_id = null;

	/**
	 * API key for authenticated requests.
	 * @var string|null
	 */
	protected $api_key = null;

  /**
   * Constructor
   *
   * @access public
   */
	public function __construct() {
		$this->api_url = self::API_URL;
		$this->api_format = self::API_FORMAT;
	}
  
	/**
	 * Set API endpoint URL address. By default API client uses `self::API_URL`.
   *
	 * param string|null $api_url URL of the API (optional)
   *
   * @access public
	 * @return self fluent interface
	 */
	public function set_api_endpoint($api_url = null) {
		if(is_string($api_url) && $api_url) {
      $this->api_url = rtrim($api_url, '/') . '/';
    }
		return $this;
	}
  
	/**
	 * Set API response format. By default API client uses `self::api_format`.
   *
	 * param string|null $api_format API response format (optional)
   *
   * @access public
	 * @return self fluent interface
	 */
	public function set_api_format($api_format = null) {
		if(is_string($api_format) && $api_format) {
      $this->api_format = $api_format;
    }
		return $this;
	}

	/**
	 * Set API credentials for authenticated requests.
   *
	 * @param string $auth_id API ID
	 * @param string $api_key API key
   *
   * @access public
	 * @return self fluent interface
	 */
	public function set_credentials($auth_id, $api_key) {
    if(is_string($auth_id) && $auth_id) {
      $this->auth_id = $auth_id;
    }
    if(is_string($api_key) && $api_key) {
      $this->api_key = $api_key;
    }
		return $this;
	}

	/**
	 * Perform a generic API request.
   *
	 * @param string     $method method to call
	 * @param array|null $params parameters for the method
	 * @param boolean    $signed sign the request
   *
   * @access public
	 * @return array
   *
	 * @throws CottonCart_Exception
	 */
	public function request($method, array $params = array(), $signed = false) {
		$uploads = array();
    
		foreach($params as $name => $value) {
			if ($value instanceof CottonCart_File) {
				$uploads[$name] = '@' . $value->get_path();
				unset($params[$name]);
			}
		}
    
		if($signed) {
			$params = $this->sign($method, $params);
		}

		$ch = curl_init($this->api_url . $method . '.' . $this->api_format . '?' . http_build_query($params));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
		if (count($uploads)) {
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $uploads);
		}
    
		$response = curl_exec($ch);
		$info = curl_getinfo($ch);
		curl_close($ch);

		if (!is_null($response)) {
      if($this->api_format == 'xml') {
        $parsed_response = simplexml_load_string($response, 'SimpleXMLElement', LIBXML_NOCDATA);
        $parsed_response = json_decode(json_encode($parsed_response), true);
      } else {
        $parsed_response = json_decode($response, true);
      }
			if (isset($parsed_response['success']) && $parsed_response['success']) {
				return $response;
			}
			throw new CottonCart_Exception(     
                                      @$parsed_response['error'], 
                                      @$parsed_response['errorCode'], 
                                      @$parsed_response['errorDetails']
                                    );
		}

		$details = array(
			'url' => $info['url'],
			'http_status' => $info['http_code'],
		);
    
		throw new CottonCart_Exception('HTTP request failed', $details);
	}

	/**
	 * Return an API method group.
   *
	 * @param string $group API method group name
   *
   * @access public
	 * @return CottonCart_Group instance of the API method group
	 */
	public function __get($group) {
		static $instances = array();
		if (isset($instances[$group])) {
			return $instances[$group];
		}
		$class = 'CottonCart\\CottonCart_Group_' . ucfirst($group);
		if (!class_exists($class)) {
			$details = array(
				'group' => $group,
			);
			throw new CottonCart_Exception('Unsupported API method group', 400, $details);
		}
		$instances[$group] = new $class($this);
		return $instances[$group];
	}

	/**
	 * Sign a request.
   *
	 * @param string $method method to call
	 * @param array  $params parameters for the method
   *
   * @access protected
	 * @return array parameters with added authentication fields
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
		$base = 'v1/' . $method . '?' . urldecode(http_build_query($params));
		$params['auth_sig'] = hash_hmac('sha256', $base, $this->api_key);
		return $params;
	}

}