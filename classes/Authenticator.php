<?php

namespace AmazingMikeyC\Pi;

use \AmazingMikeyC\Pi\Value\Authentication\AuthValue;
/**
 * Description of Authenticator
 *
 * @author mike
 */
class Authenticator {
    
    private $authValues;
    
    public function __construct(AuthValue $values) 
    {
        $client = new \Google_Client();
        $client->setApplicationName("magicpi");
        $client->setScopes([\Google_Service_Calendar::CALENDAR_READONLY]);
        
        $client->setAuthConfigFile(__DIR__."/../config/piauth.json");
        $client->setAccessType('offline');
       
        $authUrl = $client->createAuthUrl();
        echo $authUrl;
        
        
    }
    
    public function logIn()
    {
        
    }
    
    
    
}
