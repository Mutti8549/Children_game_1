<?php
session_start();

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['email'])) {
    header("Location: login_signin.php");
    exit;
}

// Retrieve the user's name from the session or database (based on your implementation)
$username = ""; // Set the default value

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
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url("background.jpg");
            background-repeat: no-repeat;
            background-position: auto;
            background-size: cover;
        }

        .profile-container {
            justify-content: center;
            align-items: center;
            text-align: center;
            max-width: 300px;
            height: 400px;
            margin: auto;
            margin-top: 4cm;
            padding: 10px;
            background: white;
            border: 2px solid rgba(255, 255, 255, 0.5);
            border-radius: 20px;
        }

        .avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
        }

        .change-avatar-button {
            font-size: 14px;
            width: 100px;
            height: auto;
            color: white;
            cursor: pointer;
            text-decoration: underline;
            border: 2px solid rgba(255, 255, 255, 0.5);
            border-radius: 5px;
            background-color: lightblue;
            text-decoration: none;
            margin: 0 auto;
        }

        .kidoo-id {
            font-family: monospace;
            margin-top: 20px;
            font-size: 20px;
            font-weight: bold;
        }

        .btn {
            padding: 10px 30px;
            background-color: lightblue;
            border: 2px solid rgba(255, 255, 255, 0.5);
            border-radius: 30px;
            backdrop-filter: blur(15px);
            color: black;
            text-decoration: none;
            margin-top: -155px;

        }

        .btn:hover {
            background-color: skyblue;
            cursor: pointer;
        }
    </style>
</head>

<body>



    <div class="profile-container">
        <img class="avatar" src="a1.png" alt="Avatar">
        <div class="change-avatar-button" onclick="changeAvatar()">Change Avatar</div>
        <div class="kidoo-id" id="kidooId" name="kidooId">Kidoo name: </div><br>
        <div class="level" id="level" name="level">Level : Kid </div><br>
        <a class="btn" href="gamemenu.php">Show Score</a>
    </div>  

    <script>
        function changeAvatar() {
            // Logic to change the avatar goes here
        }

        // Get the username from registration
        var username = "<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>";

        // Update the Kidoo ID with the username
        var kidooIdElement = document.getElementById("kidooId");
        kidooIdElement.textContent.innerHTML += username;
    </script>




</body>

</html>