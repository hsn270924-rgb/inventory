# inventory system

A simple **Laravel-based e-commerce prototype** with product search, dynamic product details, cart management, and order creation. The project demonstrates a full-stack approach using Laravel for backend APIs and vanilla JavaScript for frontend interactions.

---

## Features

-   Product search with live suggestions (powered by Fake Store API for demo)
-   Dynamic product details display
-   Add to cart functionality with global cart badge
-   Order creation via API
-   Responsive header and navigation
-   Basic UX enhancements (hover states, badges, etc.)

---

## Installation

Clone the repository:

```bash
git clone https://github.com/hsn270924-rgb/inventory.git
cd inventory-ui

composer install
npm install
npm run dev
php artisan key:generate
php artisan migrate

Run the seeder:

npm run db:seed --class=ProductSeeder

```
