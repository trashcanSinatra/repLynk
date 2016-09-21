<?php
   class HomeController {

      public function __construct($container) {
         $this->container = $container;
      }


      public function dispatch($app) {
         $app->get('/', function ($request, $response, $args) {
      	    return $this->view->render($response, 'dashboard.php',
             ['current_url' => $_SERVER['SERVER_NAME'],
              'root' => 'repLynk']);
      	})->setName('dashboard');
      }

   }
 ?>
