document.addEventListener("DOMContentLoaded", () => {
    const searchInput = document.getElementById("search-input");
    const resultsBox = document.getElementById("search-results");

    let products = [];

    /* 1️⃣ Load products list */
    fetch("https://fakestoreapi.com/products")
        .then((res) => res.json())
        .then((data) => {
            products = data;

            // Load first product by default
            loadProductDetail(products[0].id);
        });

    /* 🔹 Render search results */
    function renderResults(list) {
        resultsBox.innerHTML = "";

        list.forEach((product) => {
            const item = document.createElement("div");
            item.className =
                "flex items-center gap-4 border border-gray-200 rounded-lg p-3 cursor-pointer hover:bg-gray-50";

            item.innerHTML = `
                <img src="${product.image}" class="w-10 h-10 object-contain">
                <p class="text-sm">${product.title}</p>
            `;

            item.onclick = () => {
                loadProductDetail(product.id);
                resultsBox.classList.add("hidden");
                searchInput.value = product.title;
            };

            resultsBox.appendChild(item);
        });

        resultsBox.classList.remove("hidden");
    }

    /* 2️⃣ Show products when input is focused */
    searchInput.addEventListener("focus", () => {
        // show first 6 products by default
        renderResults(products.slice(0, 6));
    });

    /* 3️⃣ Search handler */
    searchInput.addEventListener("input", () => {
        const query = searchInput.value.toLowerCase();

        if (!query) {
            renderResults(products.slice(0, 6));
            return;
        }

        const filtered = products.filter((p) =>
            p.title.toLowerCase().includes(query)
        );

        renderResults(filtered);
    });

    /* 4️⃣ Hide results when clicking outside */
    document.addEventListener("click", (e) => {
        if (
            !e.target.closest("#search-input") &&
            !e.target.closest("#search-results")
        ) {
            resultsBox.classList.add("hidden");
        }
    });
});

/* 3️⃣ Fetch SINGLE product detail */
function loadProductDetail(productId) {
    fetch(`https://fakestoreapi.com/products/${productId}`)
        .then((res) => res.json())
        .then((product) => {
            setSelectedProduct(product);
        })
        .catch((err) => {
            console.error("Failed to load product detail", err);
        });
}

/* 4️⃣ Update UI */
function setSelectedProduct(product) {
    document.getElementById("selected-image").src = product.image;
    document.getElementById("selected-title").innerText = product.title;
    document.getElementById("selected-description").innerText =
        product.description;
    document.getElementById("selected-price").innerText = `$${product.price}`;
    document.getElementById("selected-category").innerText = product.category;
    document.getElementById("selected-rating").innerText = product.rating.rate;

    // ✅ Store product data for cart
    const addToCartBtn = document.getElementById("add-to-cart-btn");
    addToCartBtn.dataset.productId = product.id;
    addToCartBtn.dataset.price = product.price;
}

document.getElementById("add-to-cart-btn").addEventListener("click", () => {
    const qty = document.getElementById("order-qty").value;
    const btn = document.getElementById("add-to-cart-btn");

    fetch("/cart/add", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        },
        body: JSON.stringify({
            product_id: btn.dataset.productId,
            quantity: qty,
        }),
    })
        .then((res) => res.json())
        .then((data) => {
            console.log("🛒 Cart:", data.cart);
            alert("Added to cart ✅");
        })
        .catch((err) => {
            console.error(err);
            alert("Failed ❌");
        });
});
