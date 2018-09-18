<?php

  function clean($var) {
    return @htmlspecialchars(trim(addslashes($var)));
  }

  function post($var, $str = false) {
    if(isset($_POST[$var])) {
      if (!$str) {
        return clean($_POST[$var]);
      } else {
        return @htmlspecialchars(trim($_POST[$var]));
      }
    } else {
      return false;
    }
  }

  function get($var, $str= false) {
    if(isset($_GET[$var])) {
      if (!$str) {
        return clean($_GET[$var]);
      } else {
        return @htmlspecialchars(trim($_GET[$var]));
      }
    } else {
      return false;
    }
  }

  function session($var) {
    if(isset($_SESSION[$var])) {
      return clean($_SESSION[$var]);
    } else {
      return false;
    }
  }

  function setSession($arr) {
    foreach ($arr as $key => $value) {
      $_SESSION[$key] = $value;
    }
  }

  function deleteSession() {
    if($_SESSION[$var]) {
      unset($_SESSION[$var]);
    } else {
      return false;
    }
  }

  function alert($text, $class) {
    return '<div class="alert alert-'.$class.'">'.$text.'</div>';
  }

  function redirect($loc, $delay = 0) {
    if($loc) {
      if($delay) {
        header("Refresh: ".$delay.";  url=".$loc);
      } else {
        header("Location: ".$loc);
      }
    } else {
        header("Location: ".URL);
    }
}

  function resp($resp) {
    if(isset($resp)) {
      return json_encode($resp);
    } else {
      return json_encode(array("msg" => "Bilinmeyen hata.", "status" => "danger"));
    }
  }

  function setting($setting) {
    global $con;
    $st = $con->prepare("SELECT * FROM settings WHERE setting_key = ?");
    $st->execute([clean($setting)]);
    if($st->rowCount()) {
      $st = $st->fetch(PDO::FETCH_ASSOC);
      return $st['setting_value'];
    } else {
      return 0;
    }
  }

  function getClientIp() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        return $_SERVER['REMOTE_ADDR'];
    }
  }
  function short($text, $str = 10){
		if (strlen($text) > $str){
			if (function_exists("mb_substr")) $text = mb_substr($text, 0, $str, "UTF-8").'..';
			else $text = substr($text, 0, $str).'..';
		}
		return $text;
	}


  function is($var){
    if($var) {
      return $var;
    } else {
      return "0";
    }
  }
