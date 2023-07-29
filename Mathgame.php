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

// Assuming you have a database connection established, update the score
$score = "100"; // Replace with the actual score value you want to save

// Perform the database update
$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "game";

// Create a new connection
$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute the update query
$sql = "UPDATE user_info SET Mathgame_score = $score WHERE username = '$username'";

if ($conn->query($sql) === TRUE) {
    echo "Score saved successfully.";
} else {
    echo "Error updating score: " . $conn->error;
}

// Close the connection
$conn->close();
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Math Addition Game</title>

    <style>
    * {
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
        font-family: roboto;
    }

    .main-container {
        width: 100%;
        height: 100vh;
        background: lightblue;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .main-box {
        width: 400px;
        height: 400px;
        background: lightskyblue;
        display: flex;
        flex-direction: column;
        align-items: center;
        border-top-right-radius: 10px;
        border-top-left-radius: 10px;
    }

    .show-anwser {
        width: 100%;
        height: 55px;
        background: aquamarine;
        margin: 0px 0px 60px 0px;
        border-top-right-radius: 10px;
        border-top-left-radius: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: black;
        font-size: 18px;
        font-weight: 500;
    }


    .box1 {
        display: flex;
    }


    .intext11,
    #intext2 {
        width: 76px;
        font-size: 20px;
        font-weight: 600;
        height: 55px;
        padding: 0px 10px;
        text-align: center;
        border: none;
        background: #fff;
        box-shadow: 1px 1px 0px #999,
            2px 2px 0px #999,
            3px 2px 0px #999,
            4px 4px 0px #999,
            5px 5px 0px #999;
    }

    .add-s {
        margin: 13px 20px 12px 21px;
        font-size: 25px;
    }

    #intext2 {
        width: 180px;
        height: 35px;
        margin: 30px 0px;
        padding: 0px 15px;
        text-align: center;
        font-size: 20px;
        font-weight: 600;
        border: none;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .btn {
        padding: 8px 20px;
        border: none;
        font-size: 16px;
        color: black;
        background: aquamarine;
        box-shadow: 1px 1px 0px #999,
            2px 2px 0px #999,
            3px 2px 0px #999,
            4px 4px 0px #999,
            5px 5px 0px #999;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;

    }

    .main h1 {
        margin: 30px 0px;
    }

    .main h1 span {
        color: black;
    }

    .score-container {
        width: 100%;
        height: 55px;
        background: aquamarine;
        margin: 0px 0px 60px 0px;
        border-bottom-right-radius: 10px;
        border-bottom-left-radius: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: black;
        font-size: 18px;
        font-weight: 500;
    }

    .score-container p {
        display: block;
    }
    </style>
</head>

<body>

    <!-- Main Container -->
    <div class="main-container">
        <div class="main">

            <!-- Heading -->
            <h1>Math Addition <span>Quiz Game :)</span></h1>

            <!-- Main Box -->
            <div class="main-box">
                <div class="show-anwser"><span id="ans"></span></div>

                <div class="box1">
                    <div class="box-col">
                        <input type="text" id="intext" class="intext11">
                    </div>

                    <div class="add-s">
                        <p>+</p>
                    </div>

                    <div class="box-col">
                        <input type="text" id="intext1" class="intext11">
                    </div>

                </div>

                <!-- text input -->
                <div class="box2">
                    <input type="number" id="intext2">
                </div>

                <!-- button -->
                <div class="box2">
                    <button class="btn" onclick="Game()">Check Answer</button>


                </div>

            </div>

            <!-- Score and Rounds -->
            <div class="score-container">
                <p>Score: <span id="scoreValue" name="scoreValue">0</span></p>
            </div>
            <div class="score-container">
                <p>Rounds: <span id="roundsValue">0</span></p>
            </div>
        </div>
    </div>

    <script>
    let n1 = Math.floor(Math.random() * 20 + 1);
    let n2 = Math.floor(Math.random() * 20 + 1);
    let score = 0;
    let rounds = 0;
    let mcq = 0;

    document.getElementById("intext").value = n1;
    document.getElementById("intext1").value = n2;

    let adds = n1 + n2;

    function Game() {
        var user = parseInt(document.getElementById("intext2").value);

        if (user === adds) {
            document.getElementById("ans").innerHTML = "Well Done! Your answer is correct";
            score++;
        } else {
            document.getElementById("ans").innerHTML = "Correct answer: " + adds + ". Try again";
            score;
        }
        mcq++;
        if (mcq == 5) {
            rounds++;
        }

        document.getElementById("scoreValue").textContent = score;
        document.getElementById("roundsValue").textContent = rounds;

        document.getElementById("intext2").value = "";  

        n1 = Math.floor(Math.random() * 20 + 1);
        n2 = Math.floor(Math.random() * 20 + 1);

        document.getElementById("intext").value = n1;
        document.getElementById("intext1").value = n2;

        adds = n1 + n2;
    }

    </script>

</body>

</html>