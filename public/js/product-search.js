document.addEventListener("DOMContentLoaded", () => {
    const searchInput = document.getElementById("search-input");
    const resultsBox = document.getElementById("search-results");

    let products = [];

    /* 1️⃣ Load products list (for search only) */
    fetch("https://fakestoreapi.com/products")
        .then((res) => res.json())
        .then((data) => {
            products = data;

            // 🔥 Load first product DETAIL by default
            loadProductDetail(products[0].id);
        });

    /* 2️⃣ Search handler */
    searchInput.addEventListener("input", () => {
        const query = searchInput.value.toLowerCase();
        resultsBox.innerHTML = "";

        if (!query) {
            resultsBox.classList.add("hidden");
            return;
        }

        const filtered = products.filter((p) =>
            p.title.toLowerCase().includes(query)
        );

        filtered.forEach((product) => {
            const item = document.createElement("div");
            item.className =
                "flex items-center gap-4 border rounded p-3 cursor-pointer hover:bg-gray-50";

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
}
