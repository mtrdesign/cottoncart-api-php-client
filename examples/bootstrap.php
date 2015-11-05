<?php

error_reporting(0);
ini_set('display_errors', 'no');

header('Content-type: text/html; charset=utf-8');
  
define('DS', DIRECTORY_SEPARATOR);
define('API_ID', API_ID);
define('API_KEY', API_KEY);

include(__DIR__ . DS . '..' . DS . 'src' . DS . 'Client.php');
include(__DIR__ . DS . '..' . DS . 'src' . DS . 'Exception.php');
include(__DIR__ . DS . '..' . DS . 'src' . DS . 'File.php');
include(__DIR__ . DS . '..' . DS . 'src' . DS . 'Group.php');
include(__DIR__ . DS . '..' . DS . 'src' . DS . 'Group_Catalogue.php');
include(__DIR__ . DS . '..' . DS . 'src' . DS . 'Group_Manage.php');
include(__DIR__ . DS . '..' . DS . 'src' . DS . 'Group_Order.php');

function debug($output = null) {
  $output = json_decode($output, true);
  echo '<pre>';
  print_r($output);
  echo '</pre>';
  exit;
}

$api = new \CottonCart\Client();

$api->set_credentials(API_ID, API_KEY);