<main>
  <div class="container d-flex justify-content-center">
    <div class="centerBox d-flex justify-content-center align-items-center flex-column">
      <h1 class="heading">Resimleriniz kaybolmasın!</h1>
      <span class="heading-alt">Resimlerini buraya yükleyin sınırsız şekilde saklayabilirsin.</span>
      <div class="mainBox mt-4">
        <div class="row d-flex justify-content-center align-items-center mt-4">
          <form class="col-lg-8 rounded uploadForm uploadBox" action="" method="post" enctype="multipart/form-data" onsubmit="return false;">
          <div class="formOverlay">
              <div class="input-group mb-3 uploadOverlay">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="loadImageInput" name="uploadImage[]" multiple  aria-describedby="loadImageInput">
                  <label class="custom-file-label" for="inputGroupFile01">Resim seçilmedi</label>
                </div>
              </div>
              <input type="text" name="image_token" hidden value="<?php
                $randch = bin2hex(openssl_random_pseudo_bytes(10));
                setSession(["image_token" => $randch]);
                echo $randch;
              ?>">
              <div class="form-group mt-2 mb-0">
                <textarea name="imageComment" id="" cols="30" rows="2" class="form-control" placeholder="Açıklama"></textarea>
              </div>
              <div class="float-right mt-2">
                <button type="submit" class="btn uploadBtn btn-rounded">
                  Yükle
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>
