<?php

//$GLOBALS['force_development'] = 'force_development';
// nebo
$GLOBALS['force_production'] = 'force_production';

include 'vendor/pes/pes/src/Bootstrap/Bootstrap.php';

use Pes\Http\Factory\EnvironmentFactory;
use Pes\Application\AppFactory;

use Pes\Http\Request;
use Pes\Http\ResponseSender;
use Pes\Middleware\UnprocessedRequestHandler;  //NoMatchSelectorItemRequestHandler;

use Middleware\Web\Application;
use Middleware\Web\ApplicationDevelopment;


ini_set ('session.use_cookies',1);  //všude default v php.ini

$environment = (new EnvironmentFactory())->createFromGlobals();
$app = (new AppFactory())->createFromEnvironment($environment);

//if (PES_PRODUCTION OR !PES_DEVELOPMENT) {
//    $response = $app->run(new Application(), new UnprocessedRequestHandler());
//} else {
    $response = $app->run((new ApplicationDevelopment()), new UnprocessedRequestHandler());
//}

(new ResponseSender())->send($response);
