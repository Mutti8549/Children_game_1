<?php
session_start();

// Destroy the session
session_destroy();

echo "<script>window.location.href = 'login_signin.php';</script>";
?>
