<?php

require_once __DIR__ . '/vendor/autoload.php';
session_start();
if(!isset($_SESSION['username']))
{
    header("Location: loginpage.php");
}
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

$id = $_SESSION["user_id"];


$sql_users = "SELECT username, id FROM users WHERE id <> ?";
$stmt_users = $conn->prepare($sql_users);
$stmt_users->bind_param("i", $id);
$stmt_users->execute();
$result = $stmt_users->get_result();
$users = [];
while ($row_users = $result->fetch_assoc()) {
    $user = array(
        "id" => $row_users["id"],
        "username" => $row_users["username"]
    );
    $users[] = $user;
}
$stmt_users->close();

$sql_posts = "SELECT p.*
              FROM posts p
              INNER JOIN user_follows u ON p.user_id = u.followed_id
              WHERE p.public = 1
              AND u.follower_id = ?";
$stmt_posts = $conn->prepare($sql_posts);
$stmt_posts->bind_param("i", $id);
$stmt_posts->execute();
$result_posts = $stmt_posts->get_result();
$posts = [];
while ($row_posts = $result_posts->fetch_assoc()) {
    $post = array(
        "id" => $row_posts["id"],
        "content" => $row_posts["journal_entry"],
        // Add more columns as needed
    );
    $posts[] = $post;
}
$stmt_posts->close();

// Close database connection
$conn->close();


    ?>



<!DOCTYPE html>
<html lang="en">
<head>
<title> Journal </title>
<meta charset="UTF-8">

<style>
*{
    margin: 0;
}

#bodycontainer
{
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
}

body{
    width: 100%;
    background-color: #F1F7ED;
    height: 100vh;
}

.entries {

    
    
}


</style>
</head>

<body>
<div class="background" id="bodycontainer">
<div class="entries">
<table>
<th> Post </th>
<?php

foreach($posts as $post){
    echo "<tr>";
    echo "<td>" . $post["content"] . "<td>";
    echo "</tr>";
}
?>
</table>

</div>






<table>
    <th> USERS </th>
    <th> </th>
<?php

foreach ($users as $user) {
        echo "<tr>";
        echo "<td>" .  $user["username"] . "</td>" ;
        echo "<td>" . '<button class="follow" data-user-id="' . $user["id"] . '"> Follow </button>' . "</td>";
        
        echo "</tr>";
        
    }

    ?>
    </table>

    <td id="message"> </td>

    




</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var followButtons = document.querySelectorAll('.follow');
    followButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var userId = this.getAttribute('data-user-id');

            // Create FormData object
            var formData = new FormData();
            formData.append('userId', userId);

            // Send fetch request
            fetch('follow_users.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.text();
            })
            .then(data => {
                // Handle success response
                //document.getElementById('message').innerHTML = '<div class="container" style="max-width: 500px;"><div class="">Followed </div></div>';
            })
            .catch(error => {
                // Handle error response
                //document.getElementById('message').innerHTML = '<div class="alert alert-danger">Error: ' + error.message + '</div>';
            });
        });
    });
});

</script>
</body>
</html>

    