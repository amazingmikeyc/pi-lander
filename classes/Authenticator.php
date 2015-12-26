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
    private $client;

    const ACCESS_TOKEN_PATH = "/tmp/access-token";

    public function __construct(\Google_Client $client)
    {

        $client->setApplicationName("magicpi");
        $client->setScopes([\Google_Service_Calendar::CALENDAR_READONLY]);
        
        $client->setAuthConfigFile(__DIR__."/../config/piauth.json");
        $client->setAccessType('offline');
        $client->setRedirectUri('http://'.$_SERVER['HTTP_HOST'].'/auth');
        
        $this->client = $client;
    }
    
    public function logIn()
    {
        $accessToken = file_get_contents(self::ACCESS_TOKEN_PATH);
//var_dump($accessToken);die;
        $this->client->setAccessToken($accessToken);

    }

    public function tokenExists() : bool
    {
        return file_exists(self::ACCESS_TOKEN_PATH);
    }
    
    public function getClient() : \Google_Client
    {
        return $this->client;
    }

    public function getAuthUrl() : string
    {
        return $this->client->createAuthUrl();
    }
    

    public function saveToken($code)
    {
        $this->client->authenticate($code);

        file_put_contents(self::ACCESS_TOKEN_PATH, json_encode($this->client->getAccessToken()));
    }

}
