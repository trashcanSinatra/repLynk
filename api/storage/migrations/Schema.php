<?php

class Schema {

  public $tableName;
  public $tableFields = array();
  public $createQuery;
  public $insertQuery;
  public $dropQuery;
  public $conn;
  public $data_file;


  function __construct($table)
  {
    $this->tableName = $table;
    $this->conn = new SQLite3('/var/www/html/PC501/api/storage/pc501.sqlite');
    $this->dropQuery = "DROP TABLE $this->tableName";

    $this->createQuery =
      str_replace('*table', $this->tableName, $this->createQuery);
    $this->insertQuery =
      str_replace('*table', $this->tableName, $this->insertQuery);
    $this->data_file = "/var/www/html/pc501/api/storage/data/$this->tableName.txt";
  }

  public function up()
  {
    $conf = $this->conn->exec($this->createQuery);
    if(!$conf) {
      echo "Create Error: " . $this->conn->lastErrorMsg();
    } else {
      echo strtoupper($this->tableName) .
         " table created successfully! \n";
    }
    return $this;
  }  // End Function: UP



  public function down()
  {
    $conf = $this->conn->exec($this->dropQuery);
    if(!$conf) {
      echo "Drop Error: " . $this->conn->lastErrorMsg();
    } else {
      echo ucfirst($this->tableName) .
         " table dropped successfully! \n";
    }
    return $this;
  }  // End Function: DOWN


  public function seed()
  {
    $handle = fopen($this->data_file, 'r');

    // Array holding a collection of strings. Each
    // representing and insertable field of values.
    $querySet = array();

    // Read each line from the data file
    if ($handle) {
        while (($line = fgets($handle)) !== false) {
           // Remove spaces, tabs, white space, etc.
          $line = str_replace(array("\n", "\t", "\r"), '', $line);
          // Split each value into an array
          $row = explode(',', $line);
          // Declare a new holder string.
          $fields = "";
          // Add quations around each value, and a comma unless
          // it's the last in the array.
          foreach ($row as $field) {
             $fields .= $field == end($row) ? "'$field'" : "'$field',";
          }
          // Insert our new values into the class insert query template.
          $query = substr_replace($this->insertQuery, $fields, -1, -1);
          // Push the formatted query into a new array.
          array_push($querySet, $query);
        }
        fclose($handle);

        // Execute Insert statement for each array element.
        foreach($querySet as $insert)
        {
          $conf = $this->conn->exec($insert);
            if($conf) {
              echo "Successful Queries: \r\n . $insert \r\n";
            } else {
              echo "Failed Queries: \r\n . $insert \r\n";
            }
        }
    } else {
        // error opening the file.
    }
    return $this;
  } // End Function: SEED


  public function data_backup()
  {
    $query = "SELECT * FROM $this->tableName";
    $resultSet = $this->conn->query($query);
    $backUpHandler = fopen($this->data_file, 'w');

      while ($row = $resultSet->fetchArray())
      {
        $last = end(array_reverse($row));

        foreach ($this->tableFields as $key => $field)
        {
          if($row[$field] == end($row) && $key == sizeof($this->tableFields) - 1)
          {
             fwrite($backUpHandler, $row[$field] . "\r\n" );
            } else {
             fwrite($backUpHandler, $row[$field] . ",");
          }
        }
      }

    fclose($backUpHandler);
  }  // End Function: DATA_BACKUP


  static function parseTable($t) {

    if(substr($t, -3, -1) == 'ie') {
        $model = ucfirst(substr($t, 0, -3)) . 'ySchema';
        return $model;
      } elseif(substr($t, -1) == 's') {
        $model = ucfirst(substr($t,0, -1)) . 'Schema';
        return $model;
      }
        return false;
  } // End Function: PARSE_TABLE



}  // End Class: MODEL
