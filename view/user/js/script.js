
function addcart(el) {
    const id = el.nextElementSibling.value; 
    const quantity_new = el.nextElementSibling.nextElementSibling.value * 1;
    const quantity = el.nextElementSibling.nextElementSibling.nextElementSibling.value * 1;
    const quantity_cart = el.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.value * 1;
    if((quantity_new + quantity_cart) <= quantity ){
        $.post("model/jQuery/load_addcart.php", {
            'id': id,
            'quantity_new': quantity_new
        },
            function (data, textStatus, jqXHR) {
                $('.header-quantity').html(data);
            },
        );
        document.querySelectorAll('#quantity_cart').forEach (el => {
            el.value = (quantity_new + quantity_cart);
        })
        var cart_add_success = document.createElement('div');
        cart_add_success.classList.add('cart_add_success');
        cart_add_success.textContent = 'Thêm vào giỏ hàng thành công!';
        document.body.appendChild(cart_add_success);
        setTimeout(() => {
            document.body.removeChild(cart_add_success);
        }, 500);
        document.getElementById('quantity_cart').vlaue = quantity_new + quantity_cart
    }
}

function like(el) {
    const id = el.nextElementSibling.value
    if (el.firstElementChild.innerText == 'favorite' ) {
        $.post("model/jQuery/load_like.php", {
            "id": id,
            "status": 1
        },);
        el.firstElementChild.innerText = 'heart_check'
        el.firstElementChild.classList.add('product-icon-active')
    } else {
        $.post("model/jQuery/load_like.php", {
            "id": id,
            "status": 0
        },);
        el.firstElementChild.innerText = 'favorite'
        el.firstElementChild.classList.remove('product-icon-active')
    }
}
function deletelike(el) {
    const id = el.nextElementSibling.value
    $.post("model/jQuery/load_like.php", {
        "id": id,
        "status": 0
    },
        function (data, textStatus, jqXHR) {
            $('.account_product_like-box').html(data);
        },
    );
}