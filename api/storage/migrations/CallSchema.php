<?php

  class CallSchema extends Schema {

    public $createQuery = <<<SQL
        CREATE TABLE *table (
          id INTEGER PRIMARY KEY AUTOINCREMENT,
          call_date DATE NOT NULL,
          company_id INTEGER NOT NULL,
          notes TEXT NOT NULL,
          FOREIGN KEY(company_id) REFERENCES companies(id)
        )
SQL;

    public $tableFields = array('call_date', 'company_id', 'notes');

    public $insertQuery =  "INSERT INTO *table (
      CALL_DATE, COMPANY_ID, NOTES) VALUES ()";

}  // End Class: Company

 ?>
