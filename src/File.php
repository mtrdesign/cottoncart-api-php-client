<?php

namespace CottonCart;

/**
 *
 * Cotton Cart APIs Client Library for PHP
 *
 * https://github.com/mtrdesign/cottoncart-api-php-client
 *
 */
class File {

  /**
   * Path to the file to upload.
   * @var string
   */
  protected $path;

  /**
   * Wrap a file in an instance.
   *
   * @param string $path path to the file to upload
   *
   * @access public
   * @return void
   *
   * @throws Excepiton  if file does not exist, or is not an actual file, or is unreadable
   */
  public function __construct($path) {
    if (!strlen($path)) {
      throw new Exception('Missing filename', 400);
    }
    $details = array(
      'path' => $path,
    );
    if (!file_exists($path)) {
      throw new Exception('File does not exist', 400, $details);
    }
    if (!is_file($path)) {
      throw new Exception('Not a file', 400, $details);
    }
    if (!is_readable($path)) {
      throw new Exception('File is not readable', 400, $details);
    }
    $this->path = $path;
  }

  /**
   * Get the path to the file to upload.
   *
   * @access public
   * @return string
   */
  public function get_path() {
    return $this->path;
  }

}