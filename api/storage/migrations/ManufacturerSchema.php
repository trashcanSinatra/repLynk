<?php

  class ManufacturerSchema extends Schema {

    public $createQuery = <<<SQL
        CREATE TABLE *table (
          id INTEGER PRIMARY KEY AUTOINCREMENT,
          name TEXT NOT NULL,
          display TEXT NOT NULL
        )
SQL;

    public $tableFields = array('name', 'display');
    public $insertQuery =  "INSERT INTO *table (NAME, DISPLAY) VALUES ()";

}  // End Class: Company

 ?>
