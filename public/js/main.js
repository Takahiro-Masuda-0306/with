$(function(){
  $('.form-image').on('change', 'input[type="file"]', function(e) {
    var file = e.target.files[0],
        reader = new FileReader(),
        $preview = $(".drop-area");

    if(file.type.indexOf("image") < 0){
      return false;
    }

    reader.onload = (function(file) {
      return function(e) {
        $preview.empty();
        $preview.append($('<img>').attr({
                  src: e.target.result,
                  width: "100%",
                  height: "100%",
                  class: "preview",
                  title: file.name
              }));
      };
    })(file);

    reader.readAsDataURL(file);
  });
});

function updateProgress(e) {
  if (e.lengthComputable) {
    var percent = e.loaded / e.total;
    $("progress").attr("value", percent * 100);
  }
}

$("#image").on("change", function() {
  var formData = new FormData();
  formData.append("file", document.getElementById("image").files[0]);

  var request = new XMLHttpRequest();
  request.upload.addEventListener("progress", updateProgress, false);
  request.open("POST", "./upload");
  request.send(formData);
});