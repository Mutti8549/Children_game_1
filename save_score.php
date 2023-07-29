<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['username'])) {
    // Redirect or handle the case when the user is not logged in
    exit;
}

// Retrieve the score from the AJAX request
$score = isset($_POST['score']) ? intval($_POST['score']) : 0;

// Sanitize the score if needed
// ...

// Retrieve the username from the session
$username = $_SESSION['username'];

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
$sql = "UPDATE your_table_name SET Guessgame = $score WHERE username = '$username'";

if ($conn->query($sql) === TRUE) {
    echo "Score saved successfully.";
} else {
    echo "Error updating score: " . $conn->error;
}

// Close the connection
$conn->close();
?>
