<?php

require_once __DIR__ . '/vendor/autoload.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    $servername = $_ENV['DB_HOST'];
    $username = $_ENV['DB_USER'];
    $password = $_ENV['DB_PASS'];
    $database = $_ENV['DB_NAME'];
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);



    $sql = "SELECT id, password FROM users WHERE name = ?";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];


        if (password_verify($password, $hashed_password)) {
            $_SESSION["username"] = $username;
            $_SESSION["user_id"] = $row["id"];
            echo "success";
            exit;
        }

    }

    $conn->close();
}
 

?>