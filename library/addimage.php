<?php 
  require '../config.php';
  if ($_POST) {
    if(session("image_token") == post("image_token")) {
      require 'class.upload.php';
      $file = $_FILES["uploadImage"];
      if($file["size"][0]) {
        $images = array();
        foreach ($file as $k => $l) {
         foreach ($l as $i => $v) {
         if (!array_key_exists($i, $images))
           $images[$i] = array();
           $images[$i][$k] = $v;
         }
        }
        if(count($images) <= 5) {
          foreach($images as $image) {
            $img = new Upload($image);
            $img->allowed = array ('image/png', 'image/jpg', 'image/jpeg');
            $img->file_new_name_body = time();
            $img->Process('../img/');
            if ( $img->processed ) {
              $resp = array("msg" => "İşlem başarıyla tamamlandı.", "status" => "success");
            } else {
              $resp = array("msg" => $img->error, "status" => "danger");
            }
          }
        } else {
          $resp = array("msg" => "Tek seferde en fazla 5 adet resim yüklenebilir.", "status" => "danger");
        }
      } else {
        $resp = array("msg" => "Lütfen bir resim yükleyiniz.", "status" => "danger");
      }
    } else {
      $resp = array("msg" => "Geçersiz token.", "status" => "danger");
    }
  } else {
    $resp = array("msg" => "Post gönderililemedi.", "status" => "danger");  
  }

  echo resp($resp);

