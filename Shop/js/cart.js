function addToCart(id){
    let $productId = id;
    let $quantity = 1;
    try{
        $quantity = document.getElementById('product-quantity').value;
    }catch(e){
        console.log('item added to cart');
    }
    console.log($quantity);
    $.ajax({
        url: '/php/controller/cart.php',
        type: 'POST',
        data: {
            add: {id: $productId, quantity: $quantity}
        },
        success: function(data){
            location.reload();
        }
    });
}

function removeFromCart(id){
    $.ajax({
        url: '/php/controller/cart.php',
        type: 'POST',
        data: {
            remove: {id: id}
        },
        success: function(){
            location.reload();
        }
    });
}