# Cotton Cart APIs Client Library for PHP #

## About ##
The Cotton Cart API Client Library enables you to work with Cotton Cart APIs on your server. This library supports JSON and XML API output format.

Feedback and bug reports are appreciated.

## Requirements ##
To use this client, you will need:

  * [PHP 5.3.2 or higher](http://www.php.net/)
  * [PHP cURL extension](http://php.net/manual/en/book.curl.php)
  * Composer dependency manager <http://getcomposer.org/download> (Optional, but recommended)
  
## Getting started ##
You can get an API key by logging to your Cotton Cart account, and going to http://www.cottoncart.com/account/apikeys/.

If you encounter any problems, or if you have any questions please email [support@cottoncart.com](mailto:support@cottoncart.com).

## Online Developer Documentation ##
Preview the [documentation online] (http://www.cottoncart.com/apidoc/) at the Cotton Cart website.

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

- Copy and rename <code>src</code> folder to your codebase, perhaps to the vendor directory.
- Add the new folder to your autoloader or require the files directly.

## Basic Examples ##

#### 1. Manage calls ####

  * [manage/create_product](examples/manage/create_product.php)
  * [manage/create_store](examples/manage/create_store.php)
  * [manage/create_user](examples/manage/create_user.php)
  * [manage/delete_design](examples/manage/delete_design.php)
  * [manage/delete_product](examples/manage/delete_product.php)
  * [manage/delete_store](examples/manage/delete_store.php)
  * [manage/edit_product](examples/manage/edit_product.php)
  * [manage/edit_store](examples/manage/edit_store.php)
  * [manage/my_stores](examples/manage/my_stores.php)
  * [manage/my_users](examples/manage/my_users.php)
  * [manage/product_options](examples/manage/product_options.php)
  * [manage/store_options](examples/manage/store_options.php)
  * [manage/upload_design](examples/manage/upload_design.php)

#### 2. Catalogue calls ####

  * [catalogue/product_info](examples/catalogue/product_info.php)
  * [catalogue/store_info](examples/catalogue/store_info.php)
  * [catalogue/stores](examples/catalogue/stores.php)

#### 3. Order calls ####

  * [order/calculate](examples/order/calculate.php)
  * [order/checkout](examples/order/checkout.php)
  * [order/test_checkout](examples/order/test_checkout.php)