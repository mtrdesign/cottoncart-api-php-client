<?php

include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'bootstrap.php');

try {
  
  $response = $api->manage->edit_product(array(
                # int numeric ID of the product (required)
                'product_id'      => PRODUCT_ID,
                # string|null new name for the product 
                # (optional; will not change name if null or empty string is passed)
                'name'            => null,
                # array list of numeric colour IDs to make available for the product 
                # (optional; will not change colours if empty array is passed)
                'colours'         => array(),
                # int|null numeric ID of the colour which is displayed by deafult 
                # (optional; will not change featured colour if null or empty string id passed)
                'featured_colour' => null,
              ));
              
  debug($response);
  
} catch (Exception $e) {
    echo $e->getMessage();
}