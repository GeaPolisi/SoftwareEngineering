<!-- bank_details_form.php -->
<div class="right-section">
    <h2>Enter Bank Details</h2>
    <form action="process_bank_details.php" method="post">
        <label for="total_budget">Total Budget:</label>
        <input type="text" id="total_budget" name="total_budget" required><br>

        <label for="monthly_spendings">Monthly Spendings:</label>
        <input type="text" id="monthly_spendings" name="monthly_spendings" required><br>

        <label for="money_saved">Money Saved:</label>
        <input type="text" id="money_saved" name="money_saved" required><br>

        <!-- Add more fields as needed -->

        <input type="submit" value="Submit">
    </form>
</div>
