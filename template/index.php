<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="author" content="yeXDev">
  <link rel="stylesheet" href="<?=URL?>/library/assets/notify.css">
  <link rel="stylesheet" href="<?=THEME_URL?>/assets/css/fontawesome/css/all.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800,900" rel="stylesheet">
  <link rel="stylesheet" href="<?=THEME_URL?>/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=THEME_URL?>/assets/css/custom.css">
  <title>Image Project</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container">
        <a class="navbar-brand" id="nav-logo" href="#">Image</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
      
        <div class="collapse navbar-collapse" id="nav">
          <ul class="navbar-nav mr-auto"></ul>
          <div class="div-inline my-2 my-lg-0">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#">
                   Ana Sayfa
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                   Yardım
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                    İletişim
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <section class="view">
      <?=getView()?>
    </section>
    <footer>
      <div class="container">
        <span>Image &copy; all right reserved.</span>
        <div>
          <ul class="social-media">
            <li>
              <a href="">
                  <i class="fab fa-facebook"></i>
              </a>
            </li>
            <li>
              <a href="">
                  <i class="fab fa-instagram"></i>
              </a>
            </li>
            <li>
              <a href="">
                  <i class="fab fa-twitter"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </footer>
  <script src="<?=THEME_URL?>/assets/js/jquery.min.js"></script>
  <script src="<?=THEME_URL?>/assets/js/popper.min.js"></script>
  <script src="<?=THEME_URL?>/assets/js/bootstrap.min.js"></script>
  <script src="<?=THEME_URL?>/assets/js/custom.js"></script>
  <script src="<?=URL?>/library/assets/notify.js"></script>
  <script src="<?=URL?>/library/public.js"></script>
  
</body>
</html>
