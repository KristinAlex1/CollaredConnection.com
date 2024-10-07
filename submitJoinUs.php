<?php
// Assuming db_connection.php is correctly pointing to your database connection script
include 'db_connection.php';

// Check if the script is accessed via a POST request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and validate inputs
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $accountName = filter_var($_POST['account-name'], FILTER_SANITIZE_STRING); // Make sure the name attribute matches your form
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    if ($_POST['password'] !== $_POST['confirm-password']) { // Ensure the name attributes match your form fields
        echo "Passwords do not match.";
        exit;
    }

    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

    // Check for duplicate email or account name
    $stmt = $conn->prepare("SELECT * FROM your_table_name WHERE email = ? OR account_name = ?");
    $stmt->bind_param("ss", $email, $accountName);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        echo "Account name or email already exists.";
        exit;
    }

    // If everything's OK, insert the data into the database
    $stmt = $conn->prepare("INSERT INTO your_table_name (name, account_name, password, email) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $accountName, $password, $email);
    
    if ($stmt->execute()) {
        echo "Registration successful";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "This script can only be accessed via a POST request.";
}
?>
