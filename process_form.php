<?php
session_start();
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Collect the form data
    $subject = htmlspecialchars($_POST["subject"]);
    $entry = htmlspecialchars($_POST["journal"]);

    $public = isset($_POST["public"]) ? 1 : 0;
    // Establish a database connection
    $servername = "sql304.infinityfree.com";
                $username = "if0_35982586";
                $password = "Journal21";
                $database = "if0_35982586_journal";
                $conn = new mysqli($servername, $username, $password, $database);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("INSERT INTO posts (user_id, subject, journal_entry, public) VALUES (?, ?, ?, ?)");
    // Assuming you have a session variable storing the user ID
    $user_id = $_SESSION["user_id"];
    $stmt->bind_param("issi", $user_id, $subject, $entry, $public);
    if ($stmt->execute()) {
        $post_id = $conn->insert_id;
        
        // Retrieve the entry from the database using the post ID
        $sql = "SELECT * FROM posts WHERE post_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $post_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $entry = $result->fetch_assoc();
        $entry['created_at'] = date('d F Y', strtotime($entry['created_at']));
        
        // Close the prepared statement
        $stmt->close();
        
        // Close the database connection
        $conn->close();
        
        // Return the entry data as JSON response
        echo json_encode($entry);
    } else {
        echo json_encode(["error" => "Error inserting entry"]);
        $stmt->close();
    $conn->close();
    }
    

    
} else {
    echo json_encode(["error" => "method not post?"]);
}
?>
