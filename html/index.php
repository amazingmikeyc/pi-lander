<?php

require '../vendor/autoload.php';
require 'autoloader.php';

use Slim\Http\Request;
use Slim\Http\Response;

// Create container
$container = new \Slim\Container(['settings' => ['displayErrorDetails' => true]]);

// Register component on container
$container['view'] = function ($c) {
    $view = new \Slim\Views\Twig('../templates', [
        'cache' => '/tmp'
    ]);
    $view->addExtension(new \Slim\Views\TwigExtension(
        $c['router'],
        $c['request']->getUri()
    ));

    return $view;
};

$container['debug'] = true;

$app = new \Slim\App($container);


$app->get('/', function(Request $request, Response $response, $args) {

    $authoriser = new AmazingMikeyC\Pi\Authenticator(new Google_Client());

    if ($authoriser->tokenExists()) {
        $authoriser->logIn();

        $service = new Google_Service_Calendar($authoriser->getClient());

        $calendars = $service->events->listEvents("primary");

    }

    return $this->view->render($response, 'login.twig', ['url'=> $authoriser->getClient()->createAuthUrl()]);


    
});

$app->get('/auth', function(Request $request, Response $response, $args) {

    $code = $request->getParam("code");
    $authoriser = new AmazingMikeyC\Pi\Authenticator(new Google_Client());
    $authoriser->saveToken($code);

    return $response->withRedirect('/');
});


$app->get('/login', function($request, $response, $args) {

});

$app->run();


