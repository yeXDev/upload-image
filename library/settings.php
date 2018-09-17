<?php
  //SETTINGS
  $_SETTINGS = [
    "DB_HOST" => "localhost",
    "DB_ID" => "root",
    "DB_PW" => "",
    "DB_NAME" => "image",
    "EXT" => "/upload-image"
  ];
  //DEFINES
  define("HTTP", !empty($_SERVER["REQUEST_SCHEME"])?$_SERVER["REQUEST_SCHEME"]:"http");
  define("URL", HTTP."://".$_SERVER["HTTP_HOST"].$_SETTINGS["EXT"]);
  define("ADMIN_URL", URL."/admin");
