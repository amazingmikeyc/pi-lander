<?php

require '../vendor/autoload.php';
require 'autoloader.php';


//$app = new \Slim\App;

//$app->get('/', function($request, $response, $args) {
    
    $authSettings = new \AmazingMikeyC\Pi\Value\Authentication\AuthValue(
        json_decode(file_get_contents('../config/oauth.json'), true)
    );
    
    $authoriser = new AmazingMikeyC\Pi\Authenticator($authSettings);
    
//});

//$app->run();