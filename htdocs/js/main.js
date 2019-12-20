function openFileExplorer() {
  }


window.onload=function() {

$(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });
  
$('#button').on('click', function() {
    $('#file-input').trigger('click');
});


}

