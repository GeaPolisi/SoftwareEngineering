<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles2.css">
    <title>Financial Tracker</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            color: #333;
        }

        header {
            background-color: #333;
            padding: 10px;
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .container{
            display: flex;
            flex-direction: column;
            margin: auto;
            justify-content: center;
            align-items: center;
            text-align: center;

        }

        .logo img {
            max-width: 50px;
        }

        .user-profile img {
            border-radius: 50%;
            cursor: pointer;
        }

        .user-menu {
            display: none;
            position: absolute;
            top: 60px;
            right: 10px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1;
        }

        .user-menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .user-menu li {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .user-menu li:last-child {
            border-bottom: none;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        h1 {
            color: #333;
        }

        .lead {
            font-size: 1.2rem;
            margin-bottom: 20px;
            color: #555;
        }

        .graph-container {
            width: 50%;
            box-sizing: border-box;
            margin-bottom: 20px;
        }

        table {
            width: 50%;
            box-sizing: border-box;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .mt-5 {
            margin-top: 30px;
        }

        .footer-row {
            padding: 10px 0;
            background-color: #333;
            color: #fff;
            text-align: center;
        }

        footer p {
            margin: 0;
        }

        .tips-container {
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .tips-container h2 {
            color: #333;
        }

        .tips-container ul {
            list-style: none;
            padding: 0;
            margin: 0;
            color: #555;
        }

        .tips-container li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<header>
    <a href="main.php">
        <div class="logo">
            <img src="SELogo2.jpg" alt="Logo">
        </div>
    </a>
    <div class="user-profile" id="userProfile">
        <img src="profile.jpeg" alt="User Avatar" width="40" height="40" onclick="toggleUserMenu()">
        <div class="user-menu" id="userMenu">
            <ul>
                <li><a href="http://localhost/SE/main.php">Account Information</a></li>
                <li><a href="profile.html">Profile Picture</a></li>
                <li><a href="index.html">Sign Out</a></li>
            </ul>
        </div>
    </div>
</header>

<div class="container mt-5">
    <?php
    // Ensure that there is no whitespace or output before this line
    session_start();

    if (isset($_SESSION["username"])) {
        // User is logged in, show main content
        echo "<h1 class='mb-4'>Welcome, " . $_SESSION["username"] . "!</h1>";

        // Placeholder data for expenses (you would fetch this from your database)
        $expensesData = [
            "January" => 700,
            "February" => 900,
            "March" => 800,
            // Add more months and data as needed
        ];

        // Calculate total expenses
        $totalExpenses = array_sum($expensesData);

        // Display total expenses
        echo "<p class='lead'>Total Expenses: $" . $totalExpenses . "</p>";

        // Display a simple bar chart using Chart.js
        echo "<div class='graph-container'>";
        echo "<canvas id='expensesChart'></canvas>";
        echo "</div>";

        // Display a line chart for expense trends
        echo "<div class='graph-container'>";
        echo "<canvas id='expenseTrendsChart'></canvas>";
        echo "</div>";

        // Display a doughnut chart for expense distribution
        echo "<div class='graph-container'>";
        echo "<canvas id='expenseDistributionChart'></canvas>";
        echo "</div>";

        // Display a table with monthly expenses and goals
        echo "<br><h2 class='mt-5 mb-3'>Monthly Expenses and Goals</h2>";
        echo "<table class='table'>";
        echo "<thead class='thead-light'><tr><th>Month</th><th>Expense</th><th>Goal</th></tr></thead><tbody>";
        foreach ($expensesData as $month => $expense) {
            // You can customize the goal calculation based on your requirements
            $goal = $expense * 1.2; // For example, set a goal 20% higher than the expense
            echo "<tr><td>$month</td><td>$goal</td><td>$expense</td></tr>";
        }
        echo "</tbody></table>";

        // Additional tips and suggestions
        echo "<div class='tips-container'>";
        echo "<br><h2>Tips for Better Financial Management</h2>";
        echo "<ul>";
        
        echo "<li>Limit unnecessary expenses and focus on needs over wants.</li>";
        echo "<li>Regularly review your spending patterns and adjust your budget accordingly.</li>";
        echo "<li>Consider setting financial goals for saving and investments.</li>";
        echo "</ul>";
        echo "</div>";

        // ... (additional content for logged-in users)
    } else {
        // User is not logged in, redirect to login page
        header("Location: index.php");
        exit();
    }
    ?>
</div>

<footer class="mt-5">
    <div class="footer-row">
        <p>Copyright © 2024, Kevin Gisela Gea</p>
    </div>
    <div class="footer-row">
        <p>University Of New York Tirana, Albania</p>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Function to create a simple bar chart using Chart.js
    function createExpensesChart(expensesData) {
        var ctx = document.getElementById('expensesChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: Object.keys(expensesData),
                datasets: [{
                    label: 'Expenses',
                    data: Object.values(expensesData),
                    backgroundColor: 'rgba(75, 192, 192, 0.7)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    // Function to create a line chart for expense trends
    function createExpenseTrendsChart(expensesData) {
        var ctx = document.getElementById('expenseTrendsChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: Object.keys(expensesData),
                datasets: [{
                    label: 'Expense Trends',
                    data: Object.values(expensesData),
                    fill: false,
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    // Function to create a doughnut chart for expense distribution
    function createExpenseDistributionChart(expensesData) {
        var ctx = document.getElementById('expenseDistributionChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: Object.keys(expensesData),
                datasets: [{
                    data: Object.values(expensesData),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(255, 205, 86, 0.7)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 205, 86, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                cutout: '70%',
            }
        });
    }

    // Call the functions with your expenses data
    var expensesData = <?php echo json_encode($expensesData); ?>;
    createExpensesChart(expensesData);
    createExpenseTrendsChart(expensesData);
    createExpenseDistributionChart(expensesData);

    function toggleUserMenu() {
        var userMenu = document.getElementById('userMenu');
        userMenu.style.display = (userMenu.style.display === 'block') ? 'none' : 'block';
    }
</script>

</body>
</html>
