<?php

require 'vendor/autoload.php';
require 'app/classes/container.php';
require 'app/controllers/HomeController.php';
require 'app/controllers/ContactController.php';
	// App dependecies.
	$app = new \Slim\App();

	// Fetch DI Container
	$container = new ViewContainer($app);

	// Intantiate Controllers
	$homeView = new HomeController($container);
	$contactView = new ContactController($container);


	// Dispatch Routes
	$homeView->dispatch($app);
	$contactView->dispatch($app);

	$app->get('/test', function ($request, $response, $args) {
		 echo $_SERVER['PATH_INFO'];
	});

	// Run App
	$app->run();


?>
