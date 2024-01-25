<?php

use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase
{
    public function testSuccessfulLogin()
    {
        $_POST["username"] = "valid_username"; // Replace with a valid username
        $_POST["password"] = "valid_password"; // Replace with a valid password

        include "login.php"; /

        // Add assertions based on your login logic
        $this->assertTrue(isset($_SESSION["username"]));
        $this->assertStringContainsString("Location: profile.html", xdebug_get_headers()[0]);
    }

    public function testInvalidLogin()
    {
        $_POST["username"] = "invalid_username"; // Replace with an invalid username
        $_POST["password"] = "invalid_password"; // Replace with an invalid password

        include "login.php"; // Include your login script

        // Add assertions based on your login logic
        $this->assertFalse(isset($_SESSION["username"]));
        $this->assertStringNotContainsString("Location: profile.html", xdebug_get_headers()[0]);
        // You might add more specific assertions based on your login failure conditions
    }
}
