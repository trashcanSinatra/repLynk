<?php

   abstract class ModelAdapter {

      private $connection;

      private $config =
                   array(
                      'driver'   => 'sqlite',
                      'database' => 'storage/pc501.sqlite'
                   );

      public function __construct() {

         $this->connection = new \Pixie\Connection('sqlite', $this->config, 'Pixie');
      }

   }
