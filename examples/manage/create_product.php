<?php

include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'bootstrap.php');

try {
  
  $response = $api->manage->create_product(array(
                # string alphanumeric ID of the store where the product will be added (required)
                'store_id'        => STORE_ID,
                # string name for the product (required)
                'name'            => PRODUCT_NAME,
                # int|string numeric ID of an existing design, or image file to upload as new design 
                # (required, if $design_file is null)
                'design_id'       => null,
                # string an image file to upload as new design (required, if $design_id is null)
                'design_file'     => __DIR__ . DS . '..' . DS . 'logo-800x800.jpg',
                # int|null numeric ID of the product type (optional; products of all types will be created if null)
                'product_type_id' => 'all',
                # string|null print process for the product 
                # (optional; products for all print processes will be created if null)
                'process'         => 'all',
                # array list of numeric colour IDs to make available for the product 
                # (optional; all colours will be created if null OR if either $product_type_id or $process is null)
                'colours'         => 'all',
                # int|null numeric ID of the colour which is displayed by default 
                # (required if all of $product_type_id, $process and $colours are provided; 
                # if any of them is null, the first available colour will be made featured)
                'featured_colour' => null,
                # int|null scale of the design in percentage of the maximum possible print size 
                # (optional; default: 100; min: 10, max: 100)
                'scale'           => null,
                # int|null horizontal position of the design within the available print area 
                # (optional: default: 0 (= center); min: -100 (= flush left), max: 100 (= flush right))
                'horiz'           => null,
                # int|null vertical position of the design within the available print area 
                # (optional: default: 0 (= center); min: -100 (= flush top), max: 100 (= flush bottom))
                'vert'            => null,
              ));
              
  debug($response);
  
} catch (Exception $e) {
    echo $e->getMessage();
}