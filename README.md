# Cotton Cart APIs Client Library for PHP #

## Description ##
The Cotton Cart API Client Library enables you to work with Cotton Cart APIs on your server. This library supports JSON an API output format.

## Requirements ##
* [PHP 5.3.2 or higher](http://www.php.net/)
* [PHP cURL extension](http://php.net/manual/en/book.curl.php)

## Developer Documentation ##
[http://www.cottoncart.com/apidoc/](http://www.cottoncart.com/apidoc/)

## Installation ##

#### 1. Using Composer ####

The recommended installation method is through <a href="http://getcomposer.org/">Composer</a>, a dependency manager for PHP. Just add <code>mtrdesign/cottoncart-api-php-client</code> to your project's <code>composer.json</code> file:

```json
"require": {
  "mtrdesign/cottoncart-api-php-client": "dev-master"
}
```  

and then run <code>composer install</code>. For further details you can find the package at <a href="https://packagist.org/packages/mtrdesign/cottoncart-api-php-client">Packagist</a>. 

#### 2. Cloning from GitHub ####

The library is available on GitHub. You can clone it into a local repository with the git clone command.

```sh
git clone https://github.com/mtrdesign/cottoncart-api-php-client.git
```

#### 3. Manual way  ####

Or you can install the package manually by:

- Copy <code>project</code> folder to your codebase, perhaps to the vendor directory.
- Add the <code>project</code> folder to your autoloader or require the files directly.

## Basic Example ##
```php
<?
  # Sample unauthenticated call
  $api = new \CottonCart\CottonCart();

  # Add authentication
  $api->set_credentials($auth_id, $api_key);
  
  # Returns the full information about the requested store.
  $store_info = $api->catalogue->store_info('cottoncart');
  
  # Return all stores that can be managed by the API client.
  $my_stores = $api->manage->my_stores();
  
  # Returns a list of stores with their essential properties.
  $all_stores = $api->catalogue->stores(5);
?>
```