function addToCart(productId, price) {
    fetch("/cart/add", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
                .content,
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
        });
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
