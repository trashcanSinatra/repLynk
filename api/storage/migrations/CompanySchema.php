<?php

  class CompanySchema extends Schema {

    public $createQuery = <<<SQL
        CREATE TABLE *table (
          id INTEGER PRIMARY KEY AUTOINCREMENT,
          biz_name TEXT NOT NULL,
          address TEXT NOT NULL,
          city TEXT NOT NULL,
          zip TEXT NOT NULL,
          state CHAR(2) NOT NULL,
          phone TEXT NOT NULL,
          type CHAR(1) NOt NULL
        )
SQL;

    public $tableFields = array('biz_name', 'address', 'city', 'zip',
                           'state', 'phone', 'type');

    public $insertQuery =  "INSERT INTO *table (
      BIZ_NAME, ADDRESS, CITY, ZIP, STATE, PHONE, TYPE
    ) VALUES ()";

}  // End Class: Company

 ?>
