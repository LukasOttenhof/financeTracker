<?php
session_start();

$apiKey = '2GZW40P5XO38GODH';
if(isset($_POST['stockSymbol'])) {
    
    $stockSymbol = $_POST['stockSymbol'];

    // Construct the URL for the API request
    $url = "https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol=$stockSymbol&apikey=$apiKey";

    // Make the API request
    $response = file_get_contents($url);

    // Check if the response is successful
    if ($response !== false) {
        // Decode JSON response
        $data = json_decode($response, true);

        // Check if data contains price information
        if (isset($data['Global Quote']['05. price'])) {
            // Extract relevant information
            $price = $data['Global Quote']['05. price'];
            $openPrice = $data['Global Quote']['02. open'];
            $highPrice = $data['Global Quote']['03. high'];
            $lowPrice = $data['Global Quote']['04. low'];
            $change = $data['Global Quote']['09. change'];
            $changePercent = $data['Global Quote']['10. change percent'];
            
            // Store information in session
            $_SESSION['checkedStockPrice'] = [
                'symbol' => $stockSymbol,
                'price' => $price,
                'open' => $openPrice,
                'high' => $highPrice,
                'low' => $lowPrice,
                'change' => $change,
                'change_percent' => $changePercent
            ];
            
            // Redirect back to the investments page
            header("Location: investments.php");
            exit(); // Ensure script stops execution after redirection
        } else {
            $_SESSION['checkedStockPrice'] = "Unable to retrieve information for $stockSymbol";
            header("Location: investments.php");
            exit();
        }
    } else {
        echo "Failed to fetch data from Alpha Vantage API.";
    }
}
?>
