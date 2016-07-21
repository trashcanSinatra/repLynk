<?php

  class ContactSchema extends Schema {

    public $createQuery = <<<SQL
        CREATE TABLE *table (
          id INTEGER PRIMARY KEY AUTOINCREMENT,
          first_name TEXT NOT NULL,
          last_name TEXT NOT NULL,
          email TEXT NOT NULL,
          phone TEXT,
          company_id INTEGER NOT NULL,
          company_type char(1) NOT NULL,
          FOREIGN KEY(company_id) REFERENCES companies(id)
        )
SQL;

    public $tableFields = array('first_name', 'last_name', 'email',
                                 'phone', 'company_id', 'company_type');

    public $insertQuery =  "INSERT INTO *table (
      FIRST_NAME, LAST_NAME, EMAIL, PHONE, COMPANY_ID, COMPANY_TYPE
    ) VALUES ()";

  }  // End Class: CONTACT

 ?>
