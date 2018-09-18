function alertError(text) {
  $.notify(text,
    {
      background: "#e84118",
      color: "#fff",
      close: true,
      align:"right", verticalAlign:"bottom"
    }
  );
}

function alertSuccess(text) {
  $.notify(text, {
      background: "#353b48",
      color: "#fff",
      close: true,
      align:"center", verticalAlign:"bottom"
    }
  );
}

$("#nav-logo").on("click", function  (e) {
  e.preventDefault();
  $(".view").load("template/pages/index.page.php");
});

$(".uploadForm").on("submit", function(e) {
  var  dataForm = this;
  var form = $(this);
  var input = $("#loadImageInput");
  var currentHtml = $(this).html();
  var loadingStyle = {
    height: "185px",
    display: "flex",
    justifyContent: "center",
    alignItems: "center",
    fontSize: "50px"
  };
  $(".formOverlay").hide();
  $(this).append("<span class='loading'> <i class='fas fa-sync-alt fa-spin'></i></span>").css(loadingStyle);
  $.ajax({
    url: URL + "/library/addimage.php",
    type: "POST",
    data: new FormData(dataForm),
    contentType: false,
    cache: false,
    processData:false,
    dataType: "json",
    success: function(data) {
      if(data.status != "danger") {
        alertSuccess(data.msg);
        $(".view").load("template/pages/i.page.php?img=" + data.img);
      } else {
        window.history.pushState(null, null, "img/" + data.img);
        $(".formOverlay").show();
        form.attr("style", "");
        form.children(".loading").remove();
        alertError(data.msg);
      }
    }
  });
});
