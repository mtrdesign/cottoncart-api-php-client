<?php

include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'bootstrap.php');

try {
  
  $response = $api->order->test_checkout(array(
                # string name of the recipient (required)
                'name' => NAME,
                # string email of the recipient (required)
                'email' => EMAIL,
                # string first line of street address (required)
                'address_1' => ADDRESS_1,
                # string second line of street address (optional)
                'address_2' => null,
                # string city (required)
                'city' => CITY,
                # string region/state/province (required)
                'region' => REGION,
                # string postcode (required)
                'postcode' => POSTCODE,
                # string 2-char country code (required)
                'country' => COUNTRY,
                # string payment processor - paypal or stripe (required)
                'payment_processor' => PAYMENT_PROCESSOR,
                # string URL address (required, if $payment_processor is paypal)
                'return_url' => RETURN_URL,
                # string stripe token (required, if $payment_processor is stripe)
                'stripe_token' => STRIPE_TOKEN,
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