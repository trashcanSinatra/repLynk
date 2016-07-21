<?php
   class ViewContainer {

      public function __construct($app) {

         $container = $app->getContainer();

         // Register Twig View helper
         $container['view'] = function ($c) {
             $view = new \Slim\Views\Twig('app/templates');

             // Instantiate and add Slim specific extension
             $basePath = rtrim(str_ireplace('index.php', '', $c['request']->getUri()->getBasePath()), '/');
             $view->addExtension(new Slim\Views\TwigExtension($c['router'], $basePath));
             return $view;
         };

         return $container;
      }


   }
 ?>
