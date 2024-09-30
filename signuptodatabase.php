<?php
session_start(); // Start the session

try {
    // Step 1: Connect to the database
    $servername = "localhost";
    $username_db = "root"; // Replace with your database username
    $password_db = ""; // Replace with your database password
    $database = "finance_tracker";

    // Create connection
    $conn = new mysqli($servername, $username_db, $password_db, $database);

    // Step 2: Check for connection errors
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }

    // Step 3: Retrieve user input from the signup form
    $user = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password for security

    // Step 4: Check if the username or email already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $user, $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $_SESSION['error_message'] = "Username or Email already exists.";
        $stmt->close();
        header("Location: signup.php");
        exit;
    }
    $stmt->close();

    // Step 5: Prepare and execute the INSERT statement
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $user, $email, $hashed_password);

    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Registration successful. You can now log in.";
        header("Location: login.php"); // Redirect to login page after successful signup
        exit;
    } else {
        throw new Exception("Error: " . $stmt->error);
    }

    $stmt->close();
} catch (Exception $e) {
    // Set the error message in session variable
    $_SESSION['error_message'] = $e->getMessage();
    header("Location: signup.php");
    exit;
}

// Close the database connection
$conn->close();
?>
