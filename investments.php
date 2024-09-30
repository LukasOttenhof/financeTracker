
<?php include("header.php");?>
        <div class="banner" style="grid-area: banner;">Investments</div>
        <section class="summary">
            <h2>Summary</h2>
            <p>Total Balance: $10000</p>
            <p>Total Investments: $5000</p>
            <button>Add Account</button>
        </section>

        <form method="post" action="getCurrentStockPrice.php" action="getStockRecomendation">
            <label>To get current information about a stock input a stocks symbol below</label>
            <br>
            <label for="stockSymbol">Stock Symbol:</label>
            <input type="text" id="stockSymbol" name="stockSymbol" required>
            <button type="post">Retrieve</button>
            <?php
            session_start();
            if(isset($_SESSION['checkedStockPrice'])){
                $symbol = $_SESSION['checkedStockPrice']['symbol'];
                $price = $_SESSION['checkedStockPrice']['price'];
                $open = $_SESSION['checkedStockPrice']['open'];
                $high = $_SESSION['checkedStockPrice']['high'];
                $low = $_SESSION['checkedStockPrice']['low'];
                $change = $_SESSION['checkedStockPrice']['change'];
                $changePercent = $_SESSION['checkedStockPrice']['change_percent'];
                
                echo 
                "<table class=\"transactions\">
                    <tr>
                        <th>Symbol</th>
                        <th>Price</th>
                        <th>Open</th>
                        <th>High</th>
                        <th>Low</th>
                        <th>Change</th>
                        <th>Change Percent</th>
                    </tr>
                    <tr>
                        <th>$symbol</th>
                        <th>$price</th>
                        <th>$open</th>
                        <th>$high</th>
                        <th>$low</th>
                        <th>$change</th>
                        <th>$changePercent</th>
                    </tr>
                </table>
                ";

            }
            else{
                echo "<p></p>";
            }
            if(isset($_SESSION['morningRec'])){
                $morningRec = $_SESSION['morningRec'];
                echo "<p>Stock recommendation Morning Star: $morningRec</p>";
            }
            else{
                echo "error";
            }
            ?>
        </form>
        
        <section class="transactions">
            <h2>Recent Transactions</h2>
            <table>
                <tr>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Category</th>
                </tr>
                <tr>
                    <td>2024-06-01</td>
                    <td>$100</td>
                    <td>Salary</td>
                </tr>
                <!-- Add more rows dynamically -->
            </table>
        </section>

<?php include("footer.php");?>