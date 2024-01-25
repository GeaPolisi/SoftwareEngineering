<?php
// Start the session to access session variables
session_start();

// Check if the user is logged in
if (!isset($_SESSION["username"])) {
    // If not logged in, redirect to the login page
    header("Location: index.php");
    exit();
}
?>
<?php
// In profile.php (Change Profile Picture functionality)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["profile_picture"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);
    $uploadOk = 1;

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["profile_picture"]["tmp_name"]);
    if ($check !== false) {
        move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file);
        echo "Profile picture uploaded successfully!";
    } else {
        echo "File is not an image.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Picture</title>
    <link rel="stylesheet" href="styles2.css">
    <style>
        /* Additional styles specific to the profile picture page */
        body {
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }

        header {
            background-color: #33425b;
            color: #fff;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo img {
            width: 170px;
            height: 90px;
        }

        .user-profile {
            display: flex;
            align-items: center;
        }

        .user-profile img {
            border-radius: 50%;
            margin-right: 8px;
        }

        .profile-container {
            max-width: 400px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .profile-image {
            width: 100%;
            max-height: 300px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .change-button {
            background-color: #4961c1;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        footer {
            background-color: #33425b;
            color: #fff;
            padding: 10px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .footer-row {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <header>
        <a href="main.html"> <!-- Added anchor tag for logo linking -->
            <div class="logo">
                <img src="SELogo2.jpg" alt="Logo">
            </div>
        </a>
        <div class="user-profile" id="userProfile">
            <img src="user-avatar.jpg" alt="User Avatar" width="40" height="40" onclick="toggleUserMenu()">
            <div class="user-menu" id="userMenu">
                <ul>
                    <li><a href="#">Account Information</a></li>
                    <li><a href="profile.html">Profile Picture</a></li>
                    <li><a href="#">Sign Out</a></li>
                </ul>
            </div>
        </div>
    </header>

    <div class="profile-container">
        <h2>Your Profile Picture</h2>
        <img class="profile-image" src="user-avatar.jpg" alt="Current Profile Picture">
        <button class="change-button" onclick="changeProfilePicture()">Change Profile Picture</button>
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
        function changeProfilePicture() {
            // You can implement the logic for changing the profile picture here
            alert('Change Profile Picture functionality will be implemented here.');
        }

        function toggleUserMenu() {
            var userMenu = document.getElementById('userMenu');
            userMenu.style.display = (userMenu.style.display === 'block') ? 'none' : 'block';
        }
    </script>
</body>
</html>
