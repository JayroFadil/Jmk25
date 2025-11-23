<?php

namespace Jmk25\Models;

class UserModel {
  private \PDO $connection;

  public function __construct($conn) {
    $this->connection = $conn;
  }
}