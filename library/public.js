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
        var img_link =  URL + "/img/" + data.img;
        var img =  URL + "/img/" + data.img.split('.').slice(0, -1).join('.');
        $(".view").load("template/pages/i.page.php?img=" + data.img, function(){
          $("#previewImage").attr("src", img_link);
          $("#htmlCode").attr("value", '<a href="'+img+'"><img src="'+img_link+'"></a>')
          $("#bbCode").attr("value", '[url='+img+'][img]'+img_link+'[/img][/url]')
          $("#markdown").attr("value", '[![image]('+img_link+')]('+img+')')
          $("#imgPage").attr("value", img)
          $("#imgAddress").attr("value", img_link);
        });
        $(".view").css("height", "auto");
      } else {
        $(".formOverlay").show();
        form.attr("style", "");
        form.children(".loading").remove();
        alertError(data.msg);
      }
    }
  });
});
