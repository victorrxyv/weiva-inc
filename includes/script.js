

function addToCart(productName, productPrice, productImage, storeName) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    cart.push({ name: productName, price: productPrice, image: productImage, store: storeName });

    localStorage.setItem('cart', JSON.stringify(cart));

    Swal.fire({
        position: "top",
        toast: true,
        icon: "success",
        title: "adicionado ao carrinho!",
        showConfirmButton: false,
        timer: 800
    });
}

function loadCart() {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let cartItems = document.getElementById('cart-items');
    let totalPrice = 0;

    if (cart.length === 0) {
        cartItems.innerHTML = "<p>Seu carrinho está vazio.</p>";
    } else {
        // exibe os itens do carrinho
        cartItems.innerHTML = cart.map(item => `
            <div class="cart-item-card">
                <div class="store-name"><i class="fa-solid fa-shop"></i>  ${item.store} </div> 
                <div class="product-info">
                    <img src="${item.image}" alt="${item.name}">
                    <div class="product-details">
                        <div class="product-name">${item.name}</div>
                        <div class="product-price">R$ ${item.price.toFixed(2)}</div>
                    </div>
                </div>
            </div>
        `).join('');

        totalPrice = cart.reduce((sum, item) => sum + item.price, 0);

        document.getElementById('total-price').innerText = `Total: R$ ${totalPrice.toFixed(2)}`;
    }
}

function clearCart() {
    localStorage.removeItem('cart');

    loadCart();
}

document.addEventListener('DOMContentLoaded', function () {
    if (document.title === 'Seu Carrinho') {
        loadCart();
    }
});
