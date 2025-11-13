<?php

namespace Jmk25\Middlewares;

class AuthMiddleware {
  public static function userAuth() {
    session_start();

    if (!isset($_SESSION["login"])) {
      header("Location: /signin");
      exit;
    }
  }
}