# 🛒 E-Commerce Management System (Vanilla PHP)

A comprehensive, session-based E-commerce web application built from scratch using **Vanilla PHP**. This project features a robust Admin Panel to manage products, categories, orders, and users efficiently.

---

## 🌟 Key Features

- **Product Management:** Full CRUD (Create, Read, Update, Delete) functionality for managing products.
- **Category Management:** Organise products into dynamic categories for easier navigation.
- **Secure Admin Panel:** Exclusive access for admins, protected by **PHP Sessions** to ensure data security.
- **Intuitive Dashboard:** A centralized overview of total products, orders, and users.
- **Responsive Design:** Optimized for all devices using **Bootstrap**.

## 🛠 Tech Stack

- **Backend:** PHP (Vanilla)
- **Frontend:** Bootstrap 5, HTML5, CSS3,
- **Database:** MySQL
- **Authentication:** PHP Session Management

## Project Structure
```
E-Commerce php/
│
├── Admin/(admin pannel)
│   ├── Navbar.php
│   ├── Header.php
│   ├── Sidebar.php
│   └── Footer.php
├── Admin_Components/
│   ├── Navbar.php
│   ├── Header.php
│   ├── Sidebar.php
│   └── Footer.php
│
├── User_Components/
│   ├── Navbar.php
│   ├── Head.php
│   ├── Sidebar.php
	└── Footer.php
│
├── Assets/
│   ├── Custom CSS
│   ├── Bootstrap Files
│   ├── Js
│   └── Image
│
├── SQL_File/
│   └── bechakena.sql
│
├── index.php
├── registration.php
├── login.php
├── logout.php
├── add_cart.php
├── cart_product.php
├── confirm_order.php
├── db_connection.php
├── functions.php
├── db_connection.php
├── remove_cart.php
├── search.php
├── about.php
```



## Setup Instructions
To run this project on your local machine (using XAMPP/WAMP):
- Follow these 5 simple steps to run the project locally:

### Step 1
#### Clone the Repository
```bash
git clone https://github.com/dev-roni/ECommarce-php.git
```

### Step 2
#### Move Project Folder
- Run the project on your local server, or if using XAMPP, move the project folder to:
```
xampp/htdocs/
```

### Step 3
#### Create Database
- Open phpMyAdmin, click New, enter the database name:
```
bechakena
```
and then click Create.

### Step 4
#### Import SQL File
- Import the database file:
```
bechakena.sql
```
- You can find it inside:
```
SQL_File/
```

### Step 5
#### Run the Project
- Open your browser and visit:
```
http://localhost/bechakena
```
## 🔐 Default Credentials

After setting up the project, you can log in to the admin panel with the following information:


| Role | Email | Password |
| :--- | :--- | :--- |
| **Admin** | `boss@gmail.com` | `12345678` |

Manage project and add product 

## Purpose of the Project
This project was developed to:
- Practice Core PHP
- Understand CRUD operations
- Work with MySQL databases
- Implement date-based scheduling logic
- Build a real-world system using PHP
- Improve backend development skills

## Author
- Roni Singha
- Backend Developer (PHP & Laravel)

## License
- This project is created for learning and practice purposes.
