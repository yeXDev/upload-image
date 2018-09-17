<?php
  require 'config.php';
  
  function getView () {
    $page = get("page");
    if(file_exists("template/pages/{$page}.page.php")) {
      require 'template/pages/'.$page.'.page.php';
    } else {
      require 'template/pages/index.page.php';
    }
  }

  define("THEME_URL", URL."/template");
  
  require 'template/index.php';
?>

<script>
  var URL = "<?=URL?>";
  var ADMIN_URL = "<?=ADMIN_URL?>";
</script>