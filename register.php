<?php
$conn = mysqli_connect("localhost", "root", "", "se"); // Adjust the database credentials

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user data into the 'users' table
    $sql = "INSERT INTO users (username, password_hash) VALUES ('$username', '$hashed_password')";

    if (mysqli_query($conn, $sql)) {
        // Successful registration, redirect to login page or perform other actions
        header("Location: index.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
