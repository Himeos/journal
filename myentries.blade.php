<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["username"])) {
    // Redirect the user to the login page if not logged in
    header("Location: login.blade.php");
    exit;
}
$servername = "sql304.infinityfree.com";
                $username = "if0_35982586";
                $password = "Journal21";
                $database = "if0_35982586_journal";
                $conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}   

$user_id = $_SESSION["user_id"];
$sql = "SELECT * FROM posts WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Close the prepared statement
$stmt->close();

