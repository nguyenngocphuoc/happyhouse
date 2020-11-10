<script src="../dropzone-5.7.0/dist/dropzone.js"></script>
<link rel="stylesheet" href="../dropzone-5.7.0/dist/dropzone.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<form id="dzform" action="{{route('admin.gallery.store')}}" method="POST" enctype="multipart/form-data">
  <div class="fallback">
    <input id="news_id" name="news_id" type="hidden" value="1"/>
    <div class="dropzone" id="myDropzone"></div>
  </div>
</form>
<script>
  Dropzone.options.myDropzone= {
      url: "{{route('admin.gallery.store')}}",
      acceptedFiles: 'image/*',
      addRemoveLinks: true,
      init: function() {
          dzClosure = this; // Makes sure that 'this' is understood inside the functions below.
          //send all the form data along with the files:
          this.on("sending", function(data, xhr, formData) {
              formData.append("_token", "{{ csrf_token() }}");
              formData.append("news_id", jQuery("#news_id").val());
              formData.append("size", data.upload.total);
          });
          var mockFile = { name: "haha", size:  1234567};
          this.options.addedfile.call(this, mockFile);
          this.options.thumbnail.call(this, mockFile, "https://image.thanhnien.vn/660/uploaded/ngocthanh/2020_07_13/ngoctrinhmuonsinhcon1_swej.jpg");
      }
  }
  
</script>