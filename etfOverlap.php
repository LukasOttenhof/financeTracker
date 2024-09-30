<?php// include("header.php") ;?>

<h1>ETF Overlap Calculator</h1>
    
    <form id="etf-form">
        <label for="etf1">First ETF Ticker:</label>
        <input type="text" id="etf1" name="etf1" required>
        
        <label for="etf2">Second ETF Ticker:</label>
        <input type="text" id="etf2" name="etf2" required>
        
        <button type="submit">Calculate Overlap</button>
    </form>
    
    <div id="results"></div>

    <script src="getEtfInfo.js"></script>