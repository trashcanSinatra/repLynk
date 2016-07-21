<?php

  class MeetingSchema extends Schema {

    public $createQuery = <<<SQL
        CREATE TABLE *table (
          id INTEGER PRIMARY KEY AUTOINCREMENT,
          call_id INTEGER NOT NULL,
          contact_id INTEGER NOT NULL,
          notes TEXT NOT NULL,
          FOREIGN KEY(call_id) REFERENCES calls(id),
          FOREIGN KEY(contact_id) REFERENCES contacts(id)
        )
SQL;

    public $tableFields = array('call_id', 'contact_id', 'notes');

    public $insertQuery =  "INSERT INTO *table (
      CALL_ID, CONTACT_ID, NOTES) VALUES ()";

}  // End Class: Company

 ?>
