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

// function readSingleFile(e) {
//     var file = e.target.files[0];
//     if (!file) {
//       return;
//     }
//     var reader = new FileReader();
//     reader.onload = function(e) {
//       var contents = e.target.result;
//       displayContents(contents);

//     //create file 
//     //var textFile = null,
//     //makeTextFile = function (text) {
//     //var data = new Blob([text], {type: 'text/plain'});
    
//     //// If we are replacing a previously generated file we need to
//     //// manually revoke the object URL to avoid memory leaks.
//     //if (textFile !== null) {
//     //  window.URL.revokeObjectURL(textFile);
//     //}
//     //textFile = window.URL.createObjectURL(data);
    
//     //return textFile;
//     //};
//     //var create = document.getElementById('create');
    
//     //create.addEventListener('click', function () {
         
//     //var link = document.getElementById('downloadlink');
//     //link.href = makeTextFile(contents);
//     //link.style.display = 'block';
//     //}, false);
//     };
//     reader.readAsText(file);
//   }
  
//   function displayContents(contents) {
//     var element = document.getElementById('file-content');
//     element.textContent = contents;
//   }
//   document.getElementById('file-input')
//     .addEventListener('change', readSingleFile, false);


}

  