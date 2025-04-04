# 🐄 Milk Dairy Management System

A web-based Milk Dairy Management System designed for farmers to **record**, **manage**, and **review** daily milk entries offered to **Vishaka Dairy**. This project is built using **HTML**, **CSS**, **JavaScript**, **PHP**, and runs using **XAMPP** with **MySQL database**.

---

## 💡 Key Features

- 📋 **Milk Offering Form**
  - Farmer Number
  - Auto-filled Farmer Name & Milk Type (Cow/Buffalo)
  - Number of Liters
  - Rate per Liter
  - Fat Content
  - SNF (Solids-Not-Fat)
  - Water Content
  - Total Price Calculation

- 📈 **Farmer Dashboard**
  - Easy navigation between modules:
    - Milk Offering
    - Farmer Data View
    - Monthly Total Summary
  - Redirects after submission (no scrolling)
  - Farmer-themed compact UI with background image

- 💾 **Data Storage**
  - PHP-based backend handles form submissions
  - MySQL database stores all milk-related data
  - Uses XAMPP (Apache + MySQL + PHP)

---

## 🧰 Technologies Used

| Technology | Purpose                  |
|------------|---------------------------|
| HTML       | Page structure             |
| CSS        | Styling with farmer theme |
| JavaScript | Form interactivity         |
| PHP        | Backend form processing   |
| MySQL      | Database storage           |
| XAMPP      | Local server (Apache + MySQL) |

---

## 📁 Project Folder Structure
milk_dairy_management/ │ ├── index.html # Main form ├── dashboard.html # Dashboard with links ├── farmer_data.php # Farmer record view ├── monthly_total.php # Farmer's monthly summary ├── submit_milk.php # Handles form submission ├── css/ │ └── form.css # Styling for all pages ├── images/ │ └── bg.jpg # Background image (farmer theme) ├── config/ │ └── db.php # Database connection └── README.md # Project documentation


---

## 🛠️ Setup Instructions

1. **Install XAMPP**
   - Download from [https://www.apachefriends.org](https://www.apachefriends.org)

2. **Place Project Files**
   - Copy `milk_dairy_management/` folder into `htdocs/` directory of XAMPP

3. **Start Apache & MySQL**
   - Open XAMPP Control Panel and start both

4. **Create Database**
   - Go to [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
   - Create a database: `milk_dairy_db`
   - Import your `.sql` file (if available) to create necessary tables

5. **Run the App**
   - Visit [http://localhost/milk_dairy_management](http://localhost/milk_dairy_management)

---

## 📌 Notes

- This project is made for educational and demonstration purposes.
- Data will be stored locally in your MySQL database via PHP.
- Make sure the MySQL credentials in `db.php` match your XAMPP setup.

---

## 🙌 Developer

A dedicated learner building digital tools for real-world applications in agriculture and dairy sectors.


# milk_dairy_managments
