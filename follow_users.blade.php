
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();

    if (!isset($_SESSION['user_id'])) {
        http_response_code(403); // Forbidden
        exit("You are not logged in.");
    }

    if (!isset($_POST['userId'])) {
        http_response_code(400); // Bad Request
        exit("followed ID is missing.");
    }

    $followerId = $_SESSION['user_id'];

    $followedId = $_POST['userId'];


    $servername = "sql304.infinityfree.com";
                $username = "if0_35982586";
                $password = "Journal21";
                $database = "if0_35982586_journal";
                $conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}   

$stmt = $conn->prepare("INSERT INTO user_follows (follower_id, followed_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $followerId, $followedId);

    // Execute the statement
    if ($stmt->execute()) {
        http_response_code(200); // OK
        echo "User followed successfully!";
    } else {
        http_response_code(500); // Internal Server Error
        echo "Error: " . $conn->error;
    }

    // Close the database connection and statement
    $stmt->close();
    $conn->close();

}
?>
