<?php

namespace Database;

use mysqli;

class Database 
{
  private $host, $username, $password, $database, $connection;

  public function __construct($host, $username, $password, $database) 
  {
    $this->host = $host;
    $this->username = $username;
    $this->password = $password;
    $this->database = $database;

    $this->open();
  }

  public function open() {
    $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
  }

  public function close() {
    $this->connection->close();
  }

  public function query($query) {
    return $this->connection->query($query);
  }
}