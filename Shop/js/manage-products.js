let mode = ""

function setMode(mode, id) {
    this.mode = mode
    if (mode === "create") {
        document.getElementById("productFormTitle").innerText = "Add Product"
        document.getElementById("productFormSubmit").onclick = function () {
            createProduct()
        }
        initSVGMorpheus()
        setForm()
    } else if (mode === "edit") {
        document.getElementById("productFormTitle").innerText = "Edit Product"
        document.getElementById("productFormSubmit").onclick = function () {
            editProduct(id)
        }
        fillForm(id)
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

function createProduct() {
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

let svgPlaceholder = document.getElementById("uploadSvg");
const imgtag = document.getElementById("productFormImagePreview");
const uploadContainer = document.getElementById("uploadContainer");
function setPreviewImage() {
    var selectedFile = document.getElementById('productFormImage').files[0];
    var reader = new FileReader();
    reader.onload = function (event) {
        imgtag.title = selectedFile.name;
        imgtag.src = event.target.result;
        uploadContainer.innerHTML= imgtag.outerHTML;
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

function editProduct(){
    const formData = $('#productForm')
    var mode = this.mode
    $.ajax({
        url: 'php/controller/product.php?action=' + mode,
        type: 'post',
        data: formData.serialize() + "&image=" + getFilename(),
        success: function (data) {
            var product = JSON.parse(data)
            setForm(product)
        }
    });
}

function fillForm(id){
    $.ajax({
        url: 'php/controller/product.php?action=getById&id=' + id,
        type: 'get',
        success: function (data) {
            var product = JSON.parse(data)
            setForm(product)
        }
    });
}

function setForm(product){
    if (product == null) {
        document.getElementById('productFormName').value = ''
        document.getElementById('productFormDescription').value = ''
        document.getElementById('productFormPrice').value = ''
        document.getElementById('productFormTitle').innerText = "Create Product"
        return
    }
    if (product.id != null){
        document.getElementById('productFormId').value = product.id
    }
    document.getElementById('productFormName').value = product.name
    document.getElementById('productFormDescription').value = product.description
    document.getElementById('productFormPrice').value = product.price
    document.getElementById('productFormTitle').innerText = "Edit Product"
    document.getElementById('productFormCategory').value = product.categoryId


    if (product.image !== null) {
        uploadContainer.innerText = imgtag.outerHTML;
        imgtag.title = product.image;
        imgtag.src = "images/productImage/" + product.image;
        uploadContainer.innerHTML= imgtag.outerHTML;
    }else {
        uploadContainer.innerHTML= svgPlaceholder.outerHTML;
    }
}

