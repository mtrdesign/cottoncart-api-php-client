<?php

include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'bootstrap.php');

try {
  
  $response = $api->catalogue->product_info(array(
                # int numeric ID of the product (required)
                'product_id' => PRODUCT_ID,
                # string|null 2-char country code for shipping costs (optional; default: 'gb')
                'country'    => null,
              ));
              
  debug($response);
  
} catch (Exception $e) {
    echo $e->getMessage();
}