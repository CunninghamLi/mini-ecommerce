# Mini E‑Commerce Website (PHP)

A lightweight PHP & MySQL online store built for learning and demonstration purposes.

---

## Overview

This project is a simple e‑commerce site that lets users browse products, add them to a cart, and simulate checkout. It also includes a basic admin panel to manage products.

---

## Features

* Product listing and details page
* Shopping cart (add, remove, update)
* Checkout simulation (no real payments)
* Basic login/register (optional)
* Admin panel for products

---

## Tech Stack

* **Frontend:** HTML, CSS, a bit of Bootstrap
* **Backend:** PHP 8+
* **Database:** MySQL / MariaDB
* **Server:** Apache (via XAMPP, MAMP, or WAMP)

---

## Setup Instructions

1. Copy the project folder into your web root (e.g., `htdocs/ecommerce`).
2. Create a MySQL database named `ecommerce`.
3. Import the `database.sql` file (if provided) to create tables.
4. Edit the database settings in `config.php`:

   ```php
   $conn = new mysqli('localhost', 'root', '', 'ecommerce');
   ```
5. Open your browser and go to:

   * `http://localhost/ecommerce` → customer site
   * `http://localhost/ecommerce/admin` → admin area

---


## How It Works

* `index.php` lists all products from the DB.
* `cart.php` uses PHP sessions to store selected items.
* `checkout.php` confirms orders and resets the cart.
* Admin can add or delete products from the `admin/` area.

---

## License

Free to use for learning and educational purposes.
