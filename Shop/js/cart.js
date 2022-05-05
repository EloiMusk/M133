function addToCart(id){
    let $productId = id;
    let $quantity = document.getElementById('product-quantity').value;
    $.ajax({
        url: '/php/controller/cart.php',
        type: 'POST',
        data: {
            add: {id: $productId, quantity: $quantity}
        },
        success: function(data){
            $('#cart-count').html(data);
            $('#cart-modal').modal('show');
        }
    });
}