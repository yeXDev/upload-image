$("#loadImageInput").on("change", function(e){
  var fileName = '';
  fileName = e.target.value.split( '\\' ).pop();
  if(fileName) {
    if( this.files && this.files.length > 1 ) {
      fileName = this.files.length + " dosya seçildi";
    } else {
      fileName = e.target.value.split( '\\' ).pop();
    }
  } else {
    fileName = "Resim seç"
  }

  $(this).next().html(fileName);
});