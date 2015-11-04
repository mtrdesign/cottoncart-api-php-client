<?php

include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'bootstrap.php');

try {
  
  $response = $api->order->checkout(array(
                'name' => 'Alex',
                'email' => 'test@test.tld',
                'address_1' => 'Test 1',
                'address_2' => 'Test 2',
                'city' => 'Test',
                'region' => 'Test',
                'postcode' => 'Test',
                'country' => 'GB',
                'payment_processor' => 'paypal',
                'return_url' => 'http://test.tld/',
                'item1_product_id' => 306,
                'item1_colour_id' => 73000073,
                'item1_size' => 'B640',
                'item1_quantity' => 1,
                'item2_product_id' => 306,
                'item2_colour_id' => 73000073,
                'item2_size' => 'B640',
                'item2_quantity' => 1,
              ));   
              
  debug($response);
  
} catch (Exception $e) {
    echo $e->getMessage();
}