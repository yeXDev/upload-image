<?php
  require '../../config.php';
  $imgname = get("img");
  $checkimg = $con->prepare("SELECT * FROM images WHERE image_name = ?");
  $checkimg->execute([$imgname]);
?>



<main>
  <div class="container d-flex justify-content-center">
    <div class="centerBox d-flex justify-content-center align-items-center flex-column">
      <div class="mainBox mt-4">
        <div class="row d-flex justify-content-center align-items-center mt-4">
          <div class="col-lg-12 uploadForm uploadBox">
            <?php if($checkimg->rowCount() == 1):
              $imgdata = $checkimg->fetch(PDO::FETCH_ASSOC);
              $imglink = URL."/img/".$imgdata["image_name"];
              $img =  URL."/img/".pathinfo($imgdata["image_name"], PATHINFO_FILENAME);
            ?>
            <div class="row">
              <div class="col-lg-5 d-flex justify-content-center align-items-center flex-column">
                <img src="<?=$imglink?>" id="previewImage" class="img-fluid" alt="">
                <div>
                  <small class="text-muted"><?=date("Y-m-d H:i:s", $imgdata["image_created_at"]);?> tarihinde yüklendi.</small>
                </div>
              </div>
              <div class="col-lg-7">
                <div class="form-group">
                  <label for="htmlCode">Web Siteleri: html</label>
                  <input type="text" id="htmlCode" class="form-control form-control-sm" value='<a href="<?=$img?>"><img src="<?=$imglink?>"></a>'>
                </div>
                <div class="form-group">
                  <label for="bbCode">Forumlar: bbcode</label>
                  <input type="text" id="bbCode" class="form-control form-control-sm" value="[url=<?=$img?>][img]<?=$imglink?>[/img][/url]">
                </div>
                <div class="form-group">
                  <label for="markdown">Dökümanlar: markdown</label>
                  <input type="text" id="markdown" class="form-control form-control-sm" value="[![image](<?=$imglink?>)](<?=$img?>)">
                </div>
                <div class="form-group">
                  <label for="imgPage">Resim Sayfası:</label>
                  <input type="text" id="imgPage" class="form-control form-control-sm" value="<?=$img?>">
                </div>
                <div class="form-group">
                  <label for="imgAddress">Resim Direkt Adresi:</label>
                  <input type="text" id="imgAddress" class="form-control form-control-sm" value="<?=$imglink?>">
                </div>
              </div>
            </div>
            <?php else: ?>
              <h2 class="text-danger text-center">Aradığınız resim bulunamıyor.</h2>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
