<?php
// register.php
// Handles new customer registration

require_once 'config.php';

// Only handle POST requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Basic validation & trimming
    $name         = trim($_POST['name'] ?? '');
    $email        = trim($_POST['email'] ?? '');
    $phone        = trim($_POST['phone'] ?? '');
    $address      = trim($_POST['address'] ?? '');
    $account_type = trim($_POST['account_type'] ?? 'Individual');

    if ($name === '' || $email === '') {
        echo "Name and email are required.";
        exit;
    }

    // Use a prepared statement to avoid SQL injection
    $stmt = $conn->prepare(
        "INSERT INTO customers (name, email, phone, address, account_type)
         VALUES (?, ?, ?, ?, ?)"
    );

    if (!$stmt) {
        echo "Database error: " . $conn->error;
        exit;
    }

    $stmt->bind_param("sssss", $name, $email, $phone, $address, $account_type);

    if ($stmt->execute()) {
        echo "<h2>Registration successful!</h2>";
        echo "<p>Your customer record has been created.</p>";
        echo '<p><a href="submit_request.html">Click here to submit a support request</a></p>';
    } else {
        echo "Error while saving data: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid request method.";
}

$conn->close();
?>