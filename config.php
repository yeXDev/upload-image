<?php
  
  session_start();
  ob_start();

  require 'library/settings.php';
  require 'library/functions.php';
  
  //CONNECTION
  try {
    $con = new PDO("mysql:host={$_SETTINGS["DB_HOST"]};dbname={$_SETTINGS["DB_NAME"]};charset=utf8;", $_SETTINGS["DB_ID"], $_SETTINGS["DB_PW"]);
  } catch (PDOExpection $e) {
    echo  "<b>DB ERROR:</b>".$e->errorInfo;
  }