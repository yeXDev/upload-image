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
  
  function getMonth($date) {
    $months = [1 => "Oca",2 => "Şub",3 => "Mar",4 => "Nis",5 => "May",6 => "Haz",7 => "Tem",8 => "Ağu",9 => "Eyl",10 => "Eki",11 => "Kas",12 => "Ara"];
    return $months[$date];
  }

  function timeConvert ($zaman){
    $zaman =  strtotime($zaman);
    $zaman_farki = time() - $zaman;
    $saniye = $zaman_farki;
    $dakika = round($zaman_farki/60);
    $saat = round($zaman_farki/3600);
    $gun = round($zaman_farki/86400);
    $hafta = round($zaman_farki/604800);
    $ay = round($zaman_farki/2419200);
    $yil = round($zaman_farki/29030400);
    if( $saniye < 60 ){
      if ($saniye == 0){
        return "az önce";
      } else {
        return $saniye .' saniye önce';
      }
    } else if ( $dakika < 60 ){
      return $dakika .' dakika önce';
    } else if ( $saat < 24 ){
      return $saat.' saat önce';
    } else if ( $gun < 7 ){
      return $gun .' gün önce';
    } else if ( $hafta < 4 ){
      return $hafta.' hafta önce';
    } else if ( $ay < 12 ){
      return $ay .' ay önce';
    } else {
      return $yil.' yıl önce';
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