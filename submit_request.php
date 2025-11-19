<?php
// submit_request.php
// Handles creation of support requests

require_once 'config.php';

// Only handle POST requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customer_id      = isset($_POST['customer_id']) && $_POST['customer_id'] !== '' ? (int) $_POST['customer_id'] : null;
    $issue_description = trim($_POST['issue_description'] ?? '');
    $repair_schedule   = trim($_POST['repair_schedule'] ?? '');
    $estimated_cost    = trim($_POST['estimated_cost'] ?? '');

    if ($issue_description === '' || $repair_schedule === '' || $estimated_cost === '') {
        echo "All fields except customer ID are required.";
        exit;
    }

    // Prepared statement
    $stmt = $conn->prepare(
        "INSERT INTO support_requests (customer_id, issue_description, repair_schedule, estimated_cost)
         VALUES (?, ?, ?, ?)"
    );

    if (!$stmt) {
        echo "Database error: " . $conn->error;
        exit;
    }

    // customer_id can be null, so we use 'i' for integer or null
    // estimated_cost is decimal -> we bind as string
    $stmt->bind_param("isss", $customer_id, $issue_description, $repair_schedule, $estimated_cost);

    if ($stmt->execute()) {
        echo "<h2>Support request submitted successfully!</h2>";
        echo "<p>Your request has been saved in the system.</p>";
    } else {
        echo "Error while saving data: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid request method.";
}

$conn->close();
?>