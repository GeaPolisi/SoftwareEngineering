<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles2.css">
    <title>Account Information</title>
</head>
<body>
    <header>
        <a href="main.php">
            <div class="logo">
                <img src="SELogo2.jpg" alt="Logo">
            </div>
        </a>
        <div class="user-profile" id="userProfile">
            <img src="user-avatar.jpg" alt="User Avatar" width="40" height="40" onclick="toggleUserMenu()">
            <div class="user-menu" id="userMenu">
                <ul>
                    <li><a href="account_info.php">Account Information</a></li>
                    <li><a href="profile.php">Profile Picture</a></li>
                    <li><a href="logout.php">Sign Out</a></li>
                </ul>
            </div>
        </div>
    </header>

    <div class="container">
        <?php
        session_start();
        if (isset($_SESSION["username"])) {
            // User is logged in, show account information
            echo "<h1>Account Information</h1>";
            echo "<p>Username: " . $_SESSION["username"] . "</p>";
            echo '<img src="user-avatar.jpg" alt="User Avatar" width="100" height="100">';
            // Add more information here as needed
        } else {
            // User is not logged in, redirect to login page
            header("Location: index.php");
            exit();
        }
        ?>
    </div>

    <footer>
        <div class="footer-row">
            <p>Copyright © 2024, Kevin Gisela Gea</p>
        </div>
        <div class="footer-row">
            <p>University Of New York Tirana, Albania</p>
        </div>
    </footer>

    <script>
        function toggleUserMenu() {
            var userMenu = document.getElementById('userMenu');
            userMenu.style.display = (userMenu.style.display === 'block') ? 'none' : 'block';
        }
    </script>
</body>
</html>
