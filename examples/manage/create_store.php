<?php

include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'bootstrap.php');

try {
  
  $response = $api->manage->create_store(array(
                'store_id'		 => 'test2233',
                'name'		     => 'Test',
                'description'	 => 'Test',
                'hidden'	     => null,
                'logo_file' 	 => __DIR__ . DS . '..' . DS . 'logo-800x800.jpg',
                'embed_shop'	 => null,
                'website'	     => 'http://test.tld',
                'facebook_url' => null,
                'twitter_id'	 => null,
                'rss_feed_url' => null,
                'user_id'	     => null,
              ));
              
  debug($response);
  
} catch (Exception $e) {
    echo $e->getMessage();
}