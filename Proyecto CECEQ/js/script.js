function main() {
  $('.projects').hide();

  $('.projects-button').on('click', function() {
        $(this).next().toggle();
    if($(this).text() == " Permisos")
        $(this).text("Ver Permisos");
    else
        $(this).text("Ocultar Permisos");
    });
}



$(document).ready(main);


function greet() {
    console.log("js works");
}
greet();

addBookButton = document.getElementById("addBook");
if(addBookButton != null) {
    addBookButton.onclick = addBookInput;
}
var n = 0;
bookInputs = document.getElementsByClassName("book-input");

function addBookInput(){
    if(n < bookInputs.length){
        bookInputs[n].style.height = "86px";
        n = n+1;
        if( n >= bookInputs.length){
            addBookButton.style.display = "none";
        }
    }
}


addCatalogButton = document.getElementById("addCatalog");
if(addCatalogButton != null) {
    addCatalogButton.onclick = addCatalogInput;
}
var o = 0;
catalogInputs = document.getElementsByClassName("catalog-input");

function addCatalogInput(){
    if(o < catalogInputs.length){
        catalogInputs[o].style.height = "86px";
        o = o+1;
        if( o >= catalogInputs.length){
            addCatalogButton.style.display = "none";
        }
    }
}


//AJAX UPLOAD IMAGE WITH PREVIEW

function showPreview(objFileInput) {
    if (objFileInput.files[0]) {
        var fileReader = new FileReader();
        fileReader.onload = function (e) {
            $("#targetLayer").html('<img src="'+e.target.result+'" width="200px" height="200px" class="upload-preview" />');
//			$("#targetLayer").css('opacity','0.7');
			$(".icon-choose-image").css('opacity','0.5');
        }
        fileReader.readAsDataURL(objFileInput.files[0]);
    }
}

$(document).ready(function (e) {
    $("#uploadForm").on('submit',(function(e) {
        e.preventDefault();
        $.ajax({
            url: "upload.php",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            processData:false,
            success: function(data)
            {
            $("#targetLayer").html(data);
            $("#targetLayer").css('opacity','1');
            },
            error: function()
            {
            }
       });
    }));
});
