// if(document.readyState == 'loading') {
//     document.addEventListener('DOMContentLoaded', ready) 
// } 
// else {
//     ready();
// }
// function ready() {
//     var deleteCart = document.getElementsByClassName('btn-delete');
//     console.log(deleteCart); 
//     for(var i = 0 ; i < deleteCart.length; i++) {
//         var button = deleteCart[i];
//         button.addEventListener('click', delectCart) 
//     }
//     var quantity_product = document.getElementsByClassName('quantity_product');
//     for(var i =0; i<quantity_product.length; i++) {
//         var input = quantity_product[i];
//         input.addEventListener('change', quantityChange)
//     }

//     var btn_add_pro = document.getElementsByClassName('btn_add_pro');
//     for(var i =0; i<btn_add_pro.length; i++) {
//         var button = btn_add_pro[i];
//         button.addEventListener('click', addCartClick)
//     }
// }

// function quantityChange(event) {
//     var input = event.target;
//     if(isNaN(input.value) || input.value <= 0) {
//         input.value = 1;
//     }
//     updatePrice();
// }

// function delectCart(event) {
//     var buttonClick = event.target
//         buttonClick.parentElement.parentElement.remove();
//         updatePrice();
// }

// function addCartClick(event) {
//     var add = event.target;
//     var shopItem = add.parentElement.parentElement;
//     console.log(shopItem)
//     var title = shopItem.getElementsByClassName('title')[0].innerText;
//     var price = shopItem.getElementsByClassName('pricee')[0].innerText;
//     var img = shopItem.getElementsByClassName('model')[0].src;
//     console.log(title, price, img);
//     addItemtoCart(title, price, img);
// }

// function addItemtoCart(title, price, img) {
//     var carRow = document.createElement('th');
//     carRow.innerText = title;
//     var cart_items = document.getElementsByClassName('cart-items')[0];
//     cart_items.append(carRow);
// }

// function updatePrice() {
//     var cart_items = document.getElementsByClassName('cart-items')[0];
//     var cart_rows = cart_items.getElementsByClassName('cart-row');
//     var sum = 0;
//     for(var i=0;i<cart_rows.length;i++) {
//         var cart_row = cart_rows[i];
//         var price_product = cart_row.getElementsByClassName('price_product')[0];
//         var quantity_product = cart_row.getElementsByClassName('quantity_product')[0]
//         var price = parseFloat(price_product.innerText);
//         var quantity = quantity_product.value;
//         sum = sum + (quantity*price);

//         console.log(quantity*price)
//     }
//     sum = Math.round(sum * 100 ) / 100;
//     document.getElementsByClassName('place_price')[0].innerText = sum;
// }

let add_cart = document.querySelectorAll('.btn_add_pro');
function product(id, producName, price, img) {
    this.id = id;
    this.producName = producName;
    this.price = price;
    this.img = img;
}


for(let i =0; i<add_cart.length; i++) {
    add_cart[i].addEventListener('click', () => {
        cartNumber(products[i]);
    })
}

function cartNumber(product) {
    console.log("Product is :" + product)
    let productNumbers = localStorage.getItem('cartNumber');
    productNumbers = parseInt(productNumbers);

    if(productNumbers) {
        localStorage.setItem('cartNumber', productNumbers + 1);
        document.querySelector('.cart_Number').textContent = productNumbers +  1;
    } else {
        localStorage.setItem('cartNumber',1);
        document.querySelector('.cart_Number').textContent = 1;
    }

}
function loadCartNumber() {
    let productNumbers = localStorage.getItem('cartNumber');
    productNumbers = parseInt(productNumbers);
    if(productNumbers) {
        localStorage.setItem('cartNumber', productNumbers + 1);
        document.querySelector('.cart_Number').textContent = productNumbers ;
    }
}
loadCartNumber();