<?php

namespace Jmk25\Config;

class Database {
  private $pdo = null;

  public static function getConnectionDB(): \PDO {
    if (self::$pdo == null) {
      require __DIR__ . "/../../config/database.php";
      $conn = getConfigDB();
      self::$pdo = new \PDO($conn["path"], $conn["username"], $conn["password"]);
    }
    return $pdo;
  }
}