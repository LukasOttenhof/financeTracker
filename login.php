<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$database = "finance_tracker";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve username and password from the login form
$username = $_POST['username'];
$password = $_POST['password'];

// Prepare and execute a SELECT query to retrieve user data based on the provided username
$sql = "SELECT id, username, password FROM users WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User found, verify the password
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        // Password matches, set up session or perform further actions
        session_start();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        // Redirect to the home page or any other page
        header("Location: home.php");
        exit;
    } else {
        // Password does not match
        echo "Incorrect password";
    }
} else {
    // User not found
    echo "User not found";
}

$conn->close(); // Close the database connection
?>
