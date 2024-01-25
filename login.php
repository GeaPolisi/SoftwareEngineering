<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verify reCAPTCHA response
    $recaptchaResponse = $_POST["g-recaptcha-response"];

    // Your reCAPTCHA secret key
    $recaptchaSecretKey = "6LePJVwpAAAAAGogM98gAMBXEE4y9kPUQQ8r2izs";

    // Verify reCAPTCHA response with Google
    $url = "https://www.google.com/recaptcha/api/siteverify";
    $data = [
        'secret' => $recaptchaSecretKey,
        'response' => $recaptchaResponse,
    ];

    $options = [
        'http' => [
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data),
        ],
    ];

    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $response = json_decode($result, true);

    if ($response["success"]) {
        // CAPTCHA verification successful
echo "Success";
    } else {
        // CAPTCHA verification failed
        echo "CAPTCHA verification failed.";
    }
}

// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "se"); // Adjust the database credentials

// Check if the connection was successful
if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

//This code uses prepared statements to safely handle user inputs and prevent SQL injection. 
// We use prepared statements or parameterized queries instead of directly embedding user inputs into SQL queries. 


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data using prepared statements to prevent SQL injection
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Use a prepared statement to retrieve hashed password and other user data
    $sql = "SELECT * FROM users WHERE username=?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            if ($row) {
                $hashed_password = $row["password_hash"];

                // Verify the password using password_verify
                if (password_verify($password, $hashed_password)) {
                    // Successful login, set session variable
                    $_SESSION['username'] = $username;

                    // Successful login, redirect to home page or perform other actions
                    header("Location: profile.html");
                    exit();
                } else {
                    echo "<p style='color: red;'>Invalid password</p>";
                }
            } else {
                echo "<p style='color: red;'>User not found</p>";
            }
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Free result set
    mysqli_free_result($result);
}

// Close the database connection
mysqli_close($conn);
?>
