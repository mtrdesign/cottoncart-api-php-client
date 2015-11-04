<?php

include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'bootstrap.php');

try {
  
  $response = $api->order->calculate(array(
                'country' => COUNTRY,
                'item1_product_id' => ITEM1_PRODUCT_ID,
                'item1_colour_id' => ITEM1_COLOUR_ID,
                'item1_size' => ITEM1_SIZE,
                'item1_quantity' => ITEM1_QUANTITY,
                'item2_product_id' => ITEM2_PRODUCT_ID,
                'item2_colour_id' => ITEM2_COLOUR_ID,
                'item2_size' => ITEM2_SIZE,
                'item2_quantity' => ITEM2_QUANTITY,
              ));  
              
  debug($response);
  
} catch (Exception $e) {
    echo $e->getMessage();
}