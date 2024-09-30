<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$database = "finance_tracker"; 
// Create connection
//$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<script>
function myFunction() {
  var x = document.getElementById("Demo");
  if (x.className.indexOf("w3-show") == -1) {  
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>

<!DOCTYPE html>
<html lang="en">
<header style="grid-area: header;">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finance Tracker</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="w3.css">
</header>
<body>
    <header>
        <h1>Finance Tracker</h1>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="#">Transactions</a></li>
                <li><a href="investments.php">Investments</a>
                    <div class="w3-dropdown-content w3-bar-block w3-border">
                        <a href="#" class="w3-bar-item w3-button">Overview</a>
                        <a href="#" class="w3-bar-item w3-button">Add or Remove Asset</a>
                    </div>
                </li>
                
                <!-- Discover Menu with Dropdown -->
                <li class="w3-dropdown-hover">
                    <a href="discover.php">Discover</a>
                    <div class="w3-dropdown-content w3-bar-block w3-border">
                        <a href="#" class="w3-bar-item w3-button">Stocks</a>
                        <a href="etfOverlap.php" class="w3-bar-item w3-button">ETF Overlap Calculator</a>
                        <a href="#" class="w3-bar-item w3-button">Cripto</a>
                        <a href="stockPrediction.php" class="w3-bar-item w3-button">AI Asset Forecast</a>
                    </div>
                </li>

                <li><a href="index.html">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main></main>