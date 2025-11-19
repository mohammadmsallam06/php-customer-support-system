CREATE TABLE customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(15),
    address VARCHAR(255),
    account_type ENUM('Individual', 'Business') NOT NULL
);

CREATE TABLE support_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT,
    issue_description TEXT,
    repair_schedule DATETIME,
    estimated_cost DECIMAL(10, 2),
    status ENUM('Pending', 'In Progress', 'Completed') DEFAULT 'Pending',
    FOREIGN KEY (customer_id) REFERENCES customers(id)
);
