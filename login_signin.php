<?php
session_start();
if (isset($_POST['login'])) {
    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "game";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the user is already logged in
    if (isset($_SESSION['email'])) {
        // User is already authenticated, redirect to gamemenu.php
        header("Location: gamemenu.php");
        exit;
    }

    // Check if "remember me" checkbox is checked
    if (isset($_POST['remember']) && $_POST['remember'] == "on") {
        // Set a cookie to remember the user Cookie expires after 30 days
        setcookie('email', $_POST['email'], time() + (86400 * 30), "/"); 
    }

    // Retrieve user input from the form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate user's email and password
    $sql = "SELECT * FROM user_info WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // User authenticated successfully
        $_SESSION['email'] = $email;
        // You can add more session variables if needed

        // Redirect to gamemenu.php
        header("Location: gamemenu.php");
        exit;
    } else {
        echo "<script>alert('Incorrect email or password. Please try again.');</script>";
    }

    $conn->close();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="main.css">
</head>

<body>

    <header>
        <h2 class="logo">Kidoo</h2>
        <nav>
            <a href="main.php">Home</a>
            <a href="login_signup.php" target="--">Register</a>
            <a href="about_us.php">About Us</a>
            <a href="login_signin.php" target="--">Log In</a>
        </nav>
    </header>

    <section>
        <div class="form-box">
            <div class="form-value">
                <form id="loginForm" action="#" onsubmit="return validation()" method="post">
                    <h2>Sign In</h2>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" id="email" name="email" required>
                        <label for="email">Email</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" id="password" name="password" required>
                        <label for="password">Password</label>
                    </div>
                    <div class="forget">
                        <label for="remember">
                            <input type="checkbox" id="remember" name="remember">Remember Me
                            <a href="#">Forget Password</a>
                        </label>
                    </div>
                    <button type="submit" name="login">Log in</button>
                    <div class="register">
                        <p>Don't have an account? <a href="login_signup.php">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="login_signin.js"></script>
</body>

</html>