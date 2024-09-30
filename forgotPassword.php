<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Finance Tracker</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Finance Tracker</h1>
    </header>

    <main class="forgot-password-page">
        <div class="forgot-password-container">
            <h2>Forgot Password</h2>
            <p>Enter your email address to reset your password.</p>
            <form method="post" action="forgot_password_process.php">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <button type="submit">Reset Password</button>
            </form>
            <p><a href="login.php">Back to Login</a></p>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Finance Tracker</p>
    </footer>
</body>
</html>
