function addToCart(productId, price) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]');
    if (!csrfToken) return;

    fetch("/cart/add", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrfToken.content,
        },
        body: JSON.stringify({
            product_id: productId,
            price: price,
        }),
    })
        .then((res) => res.json())
        .then((data) => {
            console.log(data.cart);
            alert(data.message);

            updateCartCount(data.cart);
        });
    // .catch((err) => console.error(err));
}

document
    .getElementById("add-to-cart-btn")
    .addEventListener("click", function () {
        const productId = this.dataset.productId;
        const price = this.dataset.price;

        if (!productId) {
            alert("Please select a product first");
            return;
        }

        addToCart(productId, price);
    });

function updateCartCount(cart) {
    console.log(cart);
    const count = cart.items ? cart.items.length : 0;
    document.getElementById("cart-count").innerText = count;
}
