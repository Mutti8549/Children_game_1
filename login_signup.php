<?php
session_start();

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


if (isset($_POST['register'])) {

    // Retrieve user input from the form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    // Validate password match
    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match. Please try again.');</script>";
        exit;
    }

    // Check if the username already exists in the database
    $sql = "SELECT * FROM user_info WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<script>alert('Username already exists. Please choose a different username.');</script>";
        exit;
    }

    // Insert user information into the database
    $sql = "INSERT INTO user_info (username, email, password) VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        // User registration successful
        $_SESSION['username'] = $username;
        // You can add more session variables if needed

        echo "<script>alert('Registration successful.');</script>";
        echo "<script>window.location.href = 'main.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
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
                <form action="#" method="POST">

                    <h2>Register</h2>
                    <div class="inputbox">
                        <ion-icon name="person-circle"></ion-icon>

                        <input type="text" name="username" id="username" required>
                        <label for="">Username</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" name="email" id="email" required>
                        <label for="">Email</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="password" id="password" required>
                        <label for="">Password</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="confirm_password" id="confirm_password" required>
                        <label for="">Confirm Password</label>
                    </div>

                    <div class="forget">
                        <label for=""><input type="checkbox">Remember Me <a href="#">Forget Password</a></label>

                    </div>
                    <button name="register" onclick="validateForm()">Register</button>
                    <div class="register">
                        <p>Don't have a account <a href="#">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script>
        function validateForm() {
            var password = document.getElementById("password").value;
            var confirm_password = document.getElementById("confirm_password").value;

            if (password !== confirm_password) {
                alert("Passwords do not match. Please try again.");
                return false;
            }

            return true;
        }
    </script>
</body>

</html>