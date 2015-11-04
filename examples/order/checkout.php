<?php

include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'bootstrap.php');

try {
  
  $response = $api->order->checkout(array(
                'name' => NAME,
                'email' => EMAIL,
                'address_1' => ADDRESS_1,
                'address_2' => null,
                'city' => CITY,
                'region' => REGION,
                'postcode' => POSTCODE,
                # string 2-char country code (required)
                'country' => COUNTRY,
                'payment_processor' => PAYMENT_PROCESSOR,
                'return_url' => RETURN_URL,
                # int numeric ID of the product (required)
                'item1_product_id' => ITEM1_PRODUCT_ID,
                # string colour ID (required)
                'item1_colour_id' => ITEM1_COLOUR_ID,
                # string size (required)
                'item1_size' => ITEM1_SIZE,
                # int quantity to order (required)
                'item1_quantity' => ITEM1_QUANTITY,
              ));   
              
  debug($response);
  
} catch (Exception $e) {
    echo $e->getMessage();
}