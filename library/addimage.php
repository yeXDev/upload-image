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
              $add = $con->prepare("INSERT INTO images SET
                image_address = :image_address,
                image_created_at = :image_created_at
              ");
              $add->execute([
                "image_address" => URL."/img/".$img->file_dst_name,
                "image_created_at" => time()
              ]);
              if($add->rowCount() > 0) {
                $resp = array(
                  "msg" => "İşlem başarıyla tamamlandı.",
                  "status" => "success",
                  "img" => $img->file_dst_name
                );
              } else {
                $resp = array("msg" => "Bir hata meydana geldi.", "status" => "danger");
                @unlink("../img/".$img->file_dst_name);
              }
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
