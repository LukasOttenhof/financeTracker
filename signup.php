<?php
session_start(); // Start the session

// Check if there is an error message in session variable
echo isset($_SESSION['error_message']);
if (isset($_SESSION['error_message'])) {
    $error_message = $_SESSION['error_message'];
//    echo "<p>Error: $error_message</p>";
    unset($_SESSION['error_message']); // Clear the session variable
}

 //Check if there is a success message in session variable
 if (isset($_SESSION['success_message'])) {
    $success_message = $_SESSION['success_message'];
    echo "<p>Success: $success_message</p>";
    unset($_SESSION['success_message']); // Clear the session variable
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - Finance Tracker</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Finance Tracker</h1>
    </header>

    <main class="signup-page">
        <div class="signup-container">
            <h2>Sign Up</h2>
            <form method="post" action="signuptodatabase.php">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <button type="submit">Sign Up</button>
            </form>
            <p>Already have an account? <a href="login.php">Login</a></p>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Finance Tracker</p>
    </footer>
</body>
</html>
