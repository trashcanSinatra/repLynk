<?php
include('migrations/Schema.php');
include('migrations/CompanySchema.php');
include('migrations/ContactSchema.php');
include('migrations/CallSchema.php');
include('migrations/ManufacturerSchema.php');
include('migrations/TopicSchema.php');
include('migrations/MeetingSchema.php');

$cmd = "";

$options = [
   'up' => 'up',
   'down' => 'down',
   'backup' => 'data_backup',
   'seed' => 'seed'
];

$db_tables = ['companies', 'contacts', 'calls', 'manufacturers', 'topics', 'meetings'];

   foreach($argv as $arg) {
      foreach ($options as $key => $val) {
         if($arg == $key) {
            $cmd = $val;
         }
      }
   }

  if ($cmd == 'down')
  {
      $db_tables = array_reverse($db_tables);
  }
    foreach ($db_tables as $table_name)
    {
      $model = Schema::parseTable($table_name);
      $table = new $model($table_name);
      $table->$cmd();
    }
