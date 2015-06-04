# Cotton Cart APIs Client Library for PHP #

## Description ##
The Cotton Cart API Client Library enables you to work with Cotton Cart APIs on your server. This library supports JSON an API output format.

## Requirements ##
* [PHP 5.3.2 or higher](http://www.php.net/)
* [PHP cURL extension](http://php.net/manual/en/book.curl.php)

## Developer Documentation ##
[http://www.cottoncart.com/apidoc/](http://www.cottoncart.com/apidoc/)

## Installation ##

** 1. Using Composer **

You can install the library by adding it as a dependency to your composer.json.

```json
"require": {
  "google/apiclient": "1.0.*@beta"
}
```   

** 2. Cloning from GitHub **

The library is available on GitHub. You can clone it into a local repository with the git clone command.

```sh
git clone https://github.com/mtrdesign/cottoncart-api-php-client.git
```

## Basic Example ##
```php
<?
  # Sample unauthenticated call
  $api = new CottonCart();
  $store_info = $api->catalogue->store_info('cottoncart');

  # Add authentication
  $api->set_credentials($auth_id, $api_key);
  $my_stores = $api->manage->my_stores();
?>
```