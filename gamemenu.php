<?php
session_start();

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['email'])) {
    header("Location: login_signin.php");
    exit;
}

// Retrieve the user's name from the session or database (based on your implementation)
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

// Retrieve the username from the session variable
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="main.css">
    <link rel="stylesheet" type="text/css" href="gamemenu.css">
</head>

<body>
    <!-- Navigation bar -->
    <header>
        <h2 class="logo">Kidoo</h2>
        <nav>
            <a href="main.php">Home</a>
            <!-- <a href="login_signup.php" target="--">Register</a> -->
            <a href="about_us.php">About Us</a>
            <a href="login_signin.php" target="--">Log In</a>
            <a href="logout.php" target="--">Log out</a>
        </nav>
    </header>

    <h3 class="container">

        <?php echo "Good Morning " . $username; ?>

        <br>
        <br>
        <?php echo "We are Happy to see you here. Please select any game below and Enjoy it !! " ?>
    </h3>

    <div class="container">
        <h1>Educational Games</h1>
    </div>
    <div class="game1">
        <a href="Mathgame.php">
            <button class="image-button1"></button>
        </a>
        <div class="game-info">
            <div class="game-name">Add Them Up</div>
            <div class="score" id="math-game-score">Score: 0</div>
        </div>
    </div>

    <div class="game2">
        <a href="Guessgame.php">
            <button class="image-button2"></button>
        </a>
        <div class="game-info">
            <div class="game-name">Guess the Word</div>
            <div class="score" id="guess-game-score">Score: 0</div>
        </div>
    </div>

    <div class="game3">
        <a href="Fruitgame.php">
            <button class="image-button3"></button>
        </a>
        <div class="game-info">
            <div class="game-name">Fruit guess</div>
            <div class="score" id="fruit-game-score">Score: 0</div>
        </div>


    </div>
</body>

</html>