<?php

include(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'bootstrap.php');

try {
  
  $response = $api->manage->create_user(array(
                # string email address of the sub-user (required; used for logging in)
                'email' => USER_EMAIL, 
                # string|null full name of the sub-user (optional)
                'name' => null, 
                # string|null password for the sub-user 
                # (optional; a random password will be generated and returned in the response if not provided)
                'password' => null,
              ));
              
  debug($response);
  
} catch (Exception $e) {
    echo $e->getMessage();
}