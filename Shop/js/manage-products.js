let mode = ""

function setMode(mode) {
    this.mode = mode
    if (mode === "create") {
        document.getElementById("productFormTitle").innerText = "Add Product"
    }
    console.log(this.mode)
}

function getFilename() {
    var fullPath = document.getElementById('productFormImage').value;
    if (fullPath) {
        var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
        var filename = fullPath.substring(startIndex);
        if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
            filename = filename.substring(1);
        }
        return filename
    }
}

function submitForm() {
    const formData = $('#productForm')
    console.log("Submitting this", formData.serialize() + "&image=" + getFilename())
    $.ajax({
        url: 'php/controller/product.php?action=' + this.mode,
        type: 'post',
        data: formData.serialize() + "&image=" + getFilename(),
        success: function () {
            alert("worked");
        }
    });
    if (document.getElementById('productFormImage').value !== '' || document.getElementById('productFormImage').value !== null) {
        var file_data = $('#productFormImage').prop('files')[0];
        var form_data = new FormData();
        form_data.append('image', file_data);
        alert(form_data);
        $.ajax({
            url: 'php/controller/upload.php', // <-- point to server-side PHP script
            dataType: 'text',  // <-- what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (php_script_response) {
                alert(php_script_response); // <-- display response from the PHP script, if any
            }
        });
    };

}