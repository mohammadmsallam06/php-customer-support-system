# PHP Customer Support System

A simple *PHP + MySQL* demo project that showcases:

- Customer registration  
- Support request submission  
- Clean and responsive HTML/CSS forms  
- Secure backend using *prepared statements*  
- Organized file structure  
- Realistic mini-system for learning and practice  

Built as a personal learning project to demonstrate basic web development skills and connecting PHP with a MySQL database.

---

## 📌 Features

### *1. Customer Registration*
Users can create a customer profile by providing:
- Name  
- Email  
- Phone  
- Address  
- Account type (Individual / Business)

The data is securely stored in the customers table.

---

### *2. Submit Support Request*
Customers can submit:
- Issue description  
- Preferred repair schedule  
- Estimated cost  
- (Optional) Customer ID  

The data is saved into the support_requests table.

---

## 🗂 Project Structure
/PHP
│── config.php                # Database connection
│── create_tables.sql         # Database schema
│── register.html             # Registration form (frontend)
│── register.php              # Registration handler (backend)
│── submit_request.html       # Support request form
│── submit_request.php        # Support request handler
---

## 🛢 Database Setup

Run the SQL script below to create the necessary tables:

```sql
-- Customers table
CREATE TABLE customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(15),
    address VARCHAR(255),
    account_type ENUM('Individual', 'Business') NOT NULL
);

-- Support requests table
CREATE TABLE support_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT,
    issue_description TEXT,
    repair_schedule DATETIME,
    estimated_cost DECIMAL(10, 2),
    status ENUM('Pending', 'In Progress', 'Completed') DEFAULT 'Pending',
    FOREIGN KEY (customer_id) REFERENCES customers(id)
);
⚙ How to Run
	1.	Move the project folder into your local server (htdocs for XAMPP or www for WAMP).
	2.	Create a database in phpMyAdmin.
	3.	Run the SQL script to create the tables.
	4.	Update config.php with your database credentials.
	5.	Open in browser:
	•	http://localhost/PHP/register.html
	•	http://localhost/PHP/submit_request.html

⸻

📚 Purpose of the Project

This project was created as:
	•	A hands-on learning exercise
	•	A demonstration of basic PHP backend skills
	•	A practice project for MySQL integration
	•	A simple showcase to include on GitHub and LinkedIn

⸻

🧑‍💻 Author

Mohammad Musallam
Computer Engineering Student

⸻

✔ License

This project is for learning and educational purposes.
Feel free to use or modify it.
