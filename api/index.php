<?php

// App dependecies.
require 'vendor/autoload.php';
require 'models/ModelAdapter.php';
require 'models/ModelBase.php';
require 'models/CompanyModel.php';
require 'models/ContactModel.php';

// Create instance of the app on request.
// Define app configuration.
$app = new \Slim\Slim(array(
    'mode' => 'development',
    'debug' => true,
    'log.enabled' => true,
    'cookies.encrypt' => true,
    'cookies.secret_key' => 'rMtab79lIsoAbQLryIzQqJHBFRamvvG4oP1FWa26RwsD3zcyFVSiXcRa2HA7QOO'
));

// Default Routes
$app->get('/', function () use ($app){
    $auth = array();
    $auth['status'] = "Not Authorized.";
    $app->halt(403, json_encode($auth));
});


// Define API Service Routes
require 'services/ContactService.php';

ContactService::handle_routes($app);


// Run app.
$app->run();

?>
