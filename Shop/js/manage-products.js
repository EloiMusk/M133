let mode = ""

function setMode(mode) {
    this.mode = mode
    if (mode === "create") {
        document.getElementById("productFormTitle").innerText = "Add Product"
    }
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
    var mode = this.mode
    $.ajax({
        url: 'php/controller/product.php?action=' + mode,
        type: 'post',
        data: formData.serialize() + "&image=" + getFilename(),
        success: function () {
            showToast('Sucess', 'Product ' + mode + 'ed!')
        }
    });
    if (document.getElementById('productFormImage').value !== '' || document.getElementById('productFormImage').value !== null) {
        var file_data = $('#productFormImage').prop('files')[0];
        var form_data = new FormData();
        form_data.append('image', file_data);
        $.ajax({
            url: 'php/controller/upload.php', // <-- point to server-side PHP script
            dataType: 'text',  // <-- what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function () {
                showToast('Sucess', 'Product image uploaded!', 'bg-success')
            }
        });
    }
    ;


}

function setPreviewImage() {
    var selectedFile = document.getElementById('productFormImage').files[0];
    var reader = new FileReader();

    var imgtag = document.getElementById("productFormImagePreview");
    imgtag.title = selectedFile.name;

    reader.onload = function (event) {
        imgtag.src = event.target.result;
    };

    reader.readAsDataURL(selectedFile);
}

function fileUpload() {
    $('#productFormImage').click()
}

function showToast(title, body, type) {
    var toastLiveExample = document.getElementById('toastTemplate')
    toastLiveExample.className = type;
    document.getElementById('toastTemplateTitle').innerText = title;
    document.getElementById('toastTemplateBody').innerText = body;

    var toast = new bootstrap.Toast(toastLiveExample)
    toast.show()
}

function deleteProduct(id){
    $.ajax({
        url: 'php/controller/product.php?action=delete&id=' + id,
        type: 'get',
        success: function () {
            showToast('Sucess', 'Product deleted!')
        }
    });
}

function editProduct(id){

}