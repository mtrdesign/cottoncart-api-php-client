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
If you encounter any problems, or if you have any questions please email [support@cottoncart.com](mailto:support@cottoncart.com).

#### General ####
Cotton Cart uses a RESTFul API based at https://www.cottoncart.com/api/. Each API call has a corresponding URL. Each API URL follows the pattern:

```sh
$versionID/$method_group/$method.$format
```

where:

  * $versionID is a short string identifying the API version (e.g. 'v1')
  * $method_group is a word identifying the function group (e.g. 'catalogue)
  * $method is the API call name within the funciton group (e.g. 'stores')
  * $format is the desired response format either "xml" or "json"

Sample URLs:

https://www.cottoncart.com/api/v1/catalogue/stores.xml
https://www.cottoncart.com/api/v1/catalogue/stores.json

#### Authenticated calls ####
Certain API calls require authentication, while others are anonymous. Authenticated API calls must include auth_id, auth_ts and auth_sig parameters, discussed below. API calls without auth_id are anonymous, and even if they contain auth_ts and auth_sig, these parameters are not processed or verified.

Each Cotton Cart user can create and delete multiple API Keys through the web interface. Each key has is a lowercase alphanumeric ID, appended with '@' to the store ID (e.g. 'user123@mystore'), and a shared secret value (16char, mixedcase alphanum). Authentication is performed based on the API Key and the corresponding shared secret.

To be authenticated, each call must include 3 parameters:

  * The authentication id (auth_id, e.g.'user123@mystore')
  * The timestamp (auth_ts) of the time the request was generated. This is an integer value representing an accurate Unix Time
  * The computed authentication signature (auth_sig)

To generate a valid request, the client needs to do the following:

  * Create the signature base string, consisting of the API version identifier, followed by a slash character, followed by the API method group, followed by a slash character, followed by the API method, followed by a question mark character, followed by all parameters of the request except the "auth_sig" parameter, sorted by key in lexical order and formatted as a query string, but without any percentescaping performed on the parameters and without file attachment names/values .
    * Note: The requested format is NOT included in the signature.
    * Example signature base string: v1/catalogue/store_info?auth_id=user123@mystore&auth_ts=1329130234&store_id=some_store
  * Generate a hexadecimal SHA256 HMAC of the base string hashed together with the API_KEY (see PHP docs on HMAC). Sha256 must be used as a hashing function.
  * Append that hex value to the list of arguments as auth_sig. The final request would look like:

```sh
    catalogue/store_info?store_id=some_store&auth_id=user123mystore&auth_ts=1329130234
```

The above scheme allows secure, stateless communication between the server and the client.

#### General response format ####

###### HTTP Codes ######

The Cotton Cart API always returns a response with 200 OK HTTP code. Any errors are included as a part of the response body, without affecting the HTTP headers.

###### Success state and errors ######

Every response contains a success key which can be either "true" or "false" (as string values). If success is false, the response will contain information about the error:

```sh
{
	"success": false,
	"errorCode": 400,
	"error": "Required parameter missing",
	"errorDetails": {
		"param": "store_id"
	}
}
```

The errorDetails key is optional and its contents vary on a pererror basis; it is intended for human debugging, not for automatic processing.

###### Pagination ######

Some requests support paginated response, using the count and start request parameters. By default, all available records are listed. count can be used without start (in which case the first count records are listed); however, if start is provided, count is required.

If a request asks for paginated response, the response will contain a pagination structure:

```sh
{
	"success": true,
	"pagination": {
		"start": 0,
		"count": 10,
		"total": 150
		"pages": 15,
		"prev_page": null,
		"next_page": 10
	}
}
```

  * start - Marks the starting point of the pagination.
  * count - The number of items per page.
  * total - The total number of records available for listing.
  * pages - The number of available pages.
  * prev_page - The starting index of the previous page.
  * next_page - The starting index of the next page.

The start and count keys mirror the values from the request. total holds the total number of records available for listing, pages holds the number of available pages of count items per page, while prev_page and next_page hold the starting index of the previous and the next page respectively (a value to be used for the start request parameter, in order to display previous/next page). prev_page and next_page would be null if further navigation in the respective direction is not available.

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
  * manage/edit_store_prices
  * manage/store_prices_options
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