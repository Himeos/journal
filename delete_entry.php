<?php
session_start();

if(isset($_SESSION["username"])) {
    $servername = "sql304.infinityfree.com";
    $username = "if0_35982586";
    $password = "Journal21";
    $database = "if0_35982586_journal";
    $user_id = $_SESSION["user_id"];

    // Check if entryId is set and is a valid integer
    if(isset($_POST["entryId"]) && filter_var($_POST["entryId"], FILTER_VALIDATE_INT)) {
        $entryId = $_POST["entryId"];

        // Create database connection
        $conn = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and execute delete query
        $sql = "DELETE FROM posts WHERE post_id = ? AND user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $entryId, $user_id);
        $stmt->execute();

        // Close the prepared statement and database connection
        $stmt->close();
        $conn->close();

        // Return success message
        echo "Entry deleted successfully.";
    } else {
        // Return error message if entryId is not set or is not a valid integer
        echo "Invalid entry ID " . $entryId;
        echo $entryId;
    }
} else {
    // Return error message if user is not logged in
    echo "User not logged in.";
}
?>
