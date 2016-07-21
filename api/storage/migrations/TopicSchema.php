<?php

  class TopicSchema extends Schema {

    public $createQuery = <<<SQL
        CREATE TABLE *table (
          id INTEGER PRIMARY KEY AUTOINCREMENT,
          call_id INTEGER NOT NULL,
          manufacturer_id INTEGER NOT NULL,
          notes TEXT NOT NULL,
          FOREIGN KEY(call_id) REFERENCES calls(id),
          FOREIGN KEY(manufacturer_id) REFERENCES manufacturers(id)
        )
SQL;

    public $tableFields = array('call_id', 'manufacturer_id', 'notes');

    public $insertQuery =  "INSERT INTO *table (
      CALL_ID, MANUFACTUER_ID, NOTES) VALUES ()";

}  // End Class: Company

 ?>
