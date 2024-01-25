<?php
// process_bank_details.php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $total_budget = $_POST["total_budget"];
    $monthly_spendings = $_POST["monthly_spendings"];
    $money_saved = $_POST["money_saved"];

    // Validate and sanitize the input if needed

    // Store the bank details in the session or database
    $_SESSION["bank_details"] = [
        "total_budget" => $total_budget,
        "monthly_spendings" => $monthly_spendings,
        "money_saved" => $money_saved,
        // Add more details as needed
    ];

    // Redirect back to main.php after submitting the form
    header("Location: main.php");
    exit();
}
?>
