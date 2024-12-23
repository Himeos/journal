<?php
require_once __DIR__ . '/vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    $servername = $_ENV['DB_HOST'];
    $username = $_ENV['DB_USER'];
    $password = $_ENV['DB_PASS'];
    $database = $_ENV['DB_NAME'];
    $conn = new mysqli($servername, $username, $password, $database);


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    $check_query = "SELECT username, email FROM users WHERE username = ? OR email = ?";
    $check_stmt = $conn->prepare($check_query);
    $check_stmt->bind_param("ss", $username, $email);
    $check_stmt->execute();
    $check_stmt->store_result();
    $num_rows = $check_stmt->num_rows;
    $check_stmt->close();

    if ($num_rows > 0) {
        echo "Username or email is already in use.";
        exit();
    }


    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password, name) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $username, $email, $hashed_password, $username);

    if ($stmt->execute()) {
        session_start();

        $user_id = $stmt->insert_id;
        $_SESSION["username"] = $username;
        $_SESSION["user_id"] = $user_id;
        echo "success";
        exit();


    } else {
        echo '<p style="margin-top:2rem;"> Incorrect username or password </p>';

    }
    $stmt->close();


}
?>