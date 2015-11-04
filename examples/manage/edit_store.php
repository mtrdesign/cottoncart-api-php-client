<?php

include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'bootstrap.php');

try {
  
  $response = $api->manage->edit_store(array(
                # string alphanumeric ID of the store (required)
                'store_id'		 => STORE_ID,
                # string|null name of the store (optional)
                'name'		     => null,
                # string|null description of the store (optional)
                'description'	 => null,
                # boolean if the store will be visible (optional)
                'hidden'	     => null,
                # string|null path to image file to upload as store logo (optional)
                'logo_file' 	 => __DIR__ . DS . '..' . DS . 'logo-800x800.jpg',
                # string|null prepare and create an embed store (optional, values: "yes" or "no")
                'embed_shop'	 => null,
                # string|null URL of the store's website (optional, but see note below *)
                'website'	     => null,
                # string|null URL of the store's Facebook page (optional, but see note below *)
                'facebook_url' => null,
                # string|null twitter username (optional, but see note below *)
                'twitter_id'	 => null,
                # string|null	URL of a RSS feed (optional)
                'rss_feed_url' => null,
              ));
              
  debug($response);
  
} catch (Exception $e) {
    echo $e->getMessage();
}

# * At least one of the $website, $facebook_url or $twitter_id parameters is required.   