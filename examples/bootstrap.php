<?php

error_reporting(0);
ini_set('display_errors', 'no');

header('Content-type: text/html; charset=utf-8');
  
define('DS', DIRECTORY_SEPARATOR);
define('API_ID', API_ID);
define('API_KEY', API_KEY);

include(__DIR__ . DS . '..' . DS . 'src' . DS . 'CottonCart.php');
include(__DIR__ . DS . '..' . DS . 'src' . DS . 'CottonCart_Exception.php');
include(__DIR__ . DS . '..' . DS . 'src' . DS . 'CottonCart_File.php');
include(__DIR__ . DS . '..' . DS . 'src' . DS . 'CottonCart_Group.php');
include(__DIR__ . DS . '..' . DS . 'src' . DS . 'CottonCart_Group_Catalogue.php');
include(__DIR__ . DS . '..' . DS . 'src' . DS . 'CottonCart_Group_Manage.php');
include(__DIR__ . DS . '..' . DS . 'src' . DS . 'CottonCart_Group_Order.php');

function debug($output = null) {
  $output = json_decode($output, true);
  echo '<pre>';
  print_r($output);
  echo '</pre>';
  exit;
}

$api = new \CottonCart\CottonCart();

$api->set_credentials(API_ID, API_KEY);