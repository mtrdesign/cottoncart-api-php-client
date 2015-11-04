<?php

include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'bootstrap.php');

try {
  
  $response = $api->manage->create_store(array(
                # string alphanumeric unique identifier for the store 
                # (required; new store will be http://$store_id.cottoncart.com)
                'store_id'     => STORE_ID,
                # string name of the store (required)
                'name'         => STORE_NAME,
                # string description of the store (required)
                'description'  => STORE_DESCRIPTION,
                # boolean if the store will be visible (optional)
                'hidden'       => null,
                # string|null path to image file to upload as store logo (optional)
                'logo_file'    => __DIR__ . DS . '..' . DS . 'logo-800x800.jpg',
                # string|null prepare and create an embed store (optional, values: "yes" or "no")
                'embed_shop'   => null,
                # string|null URL of the store's website 
                # (required, if $facebook_url and $twitter_id are null)
                'website'      => null,
                # string|null URL of the store's Facebook page 
                # (required, if $website and $twitter_id are null)
                'facebook_url' => null,
                # string|null twitter username 
                # (required, if $website and $facebook_url are null)
                'twitter_id'   => null,
                # string|null  URL of a RSS feed (optional)
                'rss_feed_url' => null,
                # int|null sub-user who will be owner of the store (optional)
                'user_id'      => null,
              ));
              
  debug($response);
  
} catch (Exception $e) {
    echo $e->getMessage();
}