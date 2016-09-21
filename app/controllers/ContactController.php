<?php
   class ContactController {

      public function __construct($container) {
         $this->container = $container;
      }


      public function dispatch($app) {
         $app->get('/contacts', function ($request, $response, $args) {
      	    return $this->view->render($response, 'contacts/contactBase.php',
                     ['current_url' => $_SERVER['SERVER_NAME'],
                      'root' => 'repLynk']);
      	})->setName('contacts');
      }

   }
 ?>
