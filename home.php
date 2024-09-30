<?php
include("header.php");
?>
    <div class="banner" style="grid-area: banner;">Home</div>

    <section class="summary">
        <h2>Summary</h2>
        <p>Total Balance: $10000</p>
        <p>Total Investments: $5000</p>
    </section>

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

<?php
include("footer.php");
?>