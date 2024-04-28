
            <?php
            session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $servername = "sql304.infinityfree.com";
                $username = "if0_35982586";
                $password = "Journal21";
                $database = "if0_35982586_journal";
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