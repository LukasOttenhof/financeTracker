<?php
session_start();
// Include the SimpleHTMLDOM library
include 'simple_html_dom.php';

// Function to scrape analyst recommendations from Yahoo Finance
function scrapeAnalystRecommendations($symbol) {
    // URL of the Yahoo Finance page with analyst recommendations
    $url = 'https://finance.yahoo.com/quote/' . $symbol . '/analysts?p=' . $symbol;

    // Create a DOM object
    $html = file_get_html($url);

    // Find and extract analyst recommendations
    $recommendations = [];
    foreach($html->find('div#Col1-1-AnalystLeafPage-Proxy table tbody tr') as $row) {
        $analyst = $row->find('td')[0]->plaintext;
        $recommendation = $row->find('td')[1]->plaintext;
        $recommendations[$analyst] = $recommendation;
    }

    // Clean up memory
    $html->clear();
    unset($html);

    return $recommendations;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Symbol of the stock inputted by the user
    $stockSymbol = $_POST['stockSymbol'];
    
    // Scrape analyst recommendations
    $analystRecommendations = scrapeAnalystRecommendations($stockSymbol);
    
    // Store recommendations in session for display on the page
    $_SESSION['analystRecommendations'] = $analystRecommendations;

    // Redirect back to the page with the recommendations
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit;
}
?>
