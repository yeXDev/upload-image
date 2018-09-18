<?php
  require '../config.php';
  $img = get("img");

?>



<main>
  <div class="container d-flex justify-content-center">
    <div class="centerBox d-flex justify-content-center align-items-center flex-column">
      <div class="mainBox mt-4">
        <div class="row d-flex justify-content-center align-items-center mt-4">
          <div class="col-lg-12 uploadForm uploadBox">
            <div class="row">
              <div class="col-lg-5 d-flex justify-content-center align-items-center flex-column">
                <img src="https://i.hizliresim.com/MD3mp6.jpg" id="previewImage" class="img-fluid" alt="">
                <div>
                  <small class="text-muted">2018-10-10 15:03 tarihinde yüklendi.</small>
                </div>
              </div>
              <div class="col-lg-7">
                <div class="form-group">
                  <label for="htmlCode">Web Siteleri: html</label>
                  <input type="text" id="htmlCode" class="form-control form-control-sm" value="https://i.hizliresim.com/MD3mp6.jpg">
                </div>
                <div class="form-group">
                  <label for="bbCode">Forumlar: bbcode</label>
                  <input type="text" id="bbCode" class="form-control form-control-sm" value="https://i.hizliresim.com/MD3mp6.jpg">
                </div>
                <div class="form-group">
                  <label for="markdown">Dökümanlar: markdown</label>
                  <input type="text" id="markdown" class="form-control form-control-sm" value="https://i.hizliresim.com/MD3mp6.jpg">
                </div>
                <div class="form-group">
                  <label for="imgPage">Resim Sayfası:</label>
                  <input type="text" id="imgPage" class="form-control form-control-sm" value="https://i.hizliresim.com/MD3mp6.jpg">
                </div>
                <div class="form-group">
                  <label for="imgAddress">Resim Direkt Adresi:</label>
                  <input type="text" id="imgAddress" class="form-control form-control-sm" value="https://i.hizliresim.com/MD3mp6.jpg">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
