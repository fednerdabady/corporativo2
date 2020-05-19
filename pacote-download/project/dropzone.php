<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="assets/images/logo-simbolo.png">
        <title></title>
        <!-- Bootstrap Core CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
    </head>
    <body>
        <div class="container">
            <br/>
            <h3>Upload file dropzone.js with PHP</h3>
            <br/>
            <form action="upload.php" class="dropzone" id="dropzoneForm">
                
            </form>
            
            <br/>
            <br/>
            
            <div align ="center">
                <button type="button" class="btn btn-info" id="submit-all">Upload</button>
            </div>
            
            <br/>
            <br/>
            
            <div id="preview"></div>
            
            <br/>
            <br/>
        </div>
        
    </body>
</html>
<script>
$(document).ready(function(){
 
 Dropzone.options.dropzoneFrom = {
  autoProcessQueue: false,
  acceptedFiles:".png,.jpg,.gif,.bmp,.jpeg",
  init: function(){
   var submitButton = document.querySelector('#submit-all');
   myDropzone = this;
   submitButton.addEventListener("click", function(){
    myDropzone.processQueue();
   });
   this.on("complete", function(){
    if(this.getQueuedFiles().length === 0 && this.getUploadingFiles().length === 0)
    {
     var _this = this;
     _this.removeAllFiles();
    }
    list_image();
   });
  }
 };

 list_image();

 function list_image()
 {
  $.ajax({
   url:"upload.php",
   success:function(data){
    $('#preview').html(data);
   }
  });
 }

 $(document).on('click', '.remove_image', function(){
  var name = $(this).attr('id');
  $.ajax({
   url:"upload.php",
   method:"POST",
   data:{name:name},
   success:function(data)
   {
    list_image();
   }
  });
 });
 
});

</script>

