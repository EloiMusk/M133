function updateAdress() {
    console.log("updateAdress");
    const form = document.querySelector('#adressForm');
    $.ajax({
        url: 'php/controller/adress.php?update=1',
        dataType: 'text',
        type: 'POST',
        data: $(form).serialize()
    });
}

function fillAdress() {
    console.log("fillAdress");
    $.ajax({
        url: 'php/controller/adress.php',
        dataType: 'json',
        type: 'GET',
        success: function (data) {
            $('#adressForm #street').val(data.street);
            $('#adressForm #nr').val(data.nr);
            $('#adressForm #zip').val(data.zip);
            $('#adressForm #city').val(data.city);
        }
    });
}

