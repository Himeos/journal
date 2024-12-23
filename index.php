<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("Location: /loginpage.php");
}


    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Generic Journal Name</title>
    
</head>
<body class="text-black primarybackground">

<header>

    <nav class="navbar navbar-expand-lg navbar-dark nopadding">
        <div class="container-fluid nopadding ">
            <a class="nohover ml-5 mr-5" href="/"> <i class="fa-solid fa-book-open fa-4x mr-5" style="color: #1b1b1b;"></i> </a>
            
            
                <ul class="navbar-nav mr-auto ml-auto ">
                    <li class="nav-item ">
                        <a class="nohover text-dark font-weight-bold mr-3" href="#">My Profile</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nohover text-dark font-weight-bold mr-3" href="/users.php">Users</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nohover text-dark font-weight-bold mr-3" href="#">Settings</a>
                    </li>
                </ul>
                </div>

                <div class="ml-auto d-flex align-items-center">
                    <?php
                    if(isset($_SESSION["username"])) {
                        echo '<p class="m-3 text-dark" id="welcome">Welcome, ' . $_SESSION["username"] . '</p>';
                        echo '<a href="logout.php" class="btn text-black m-2">Logout</a>';
                    } else {
                        echo '<a href="loginpage.php" class="btn btn-outline-success m-2">Login</a>';
                        echo '<a href="register.php" class="btn btn-outline-success m-2">Register</a>';
                    }
                    ?>
                </div>
            
        </div>
    </nav>
</header>

<main class="secondarybackground mt-1 ">

<?php
if(isset($_SESSION["username"])) {
    ?>
    <div class="container-fluid nopadding pt-5 pb-5 spacer layer1 ">

    <div class="container">

    <audio id="typewriterSound" src="audio/typewriter1.mp3" preload="auto"></audio>
        <div class="row justify-content-center mt-5 mb-5">

            <div class="col-md-6">
                <div class="card formborder  text-dark">
                    <div class="card-body text-center">
                        <h5 class="card-title">What Have You Learned Today?</h5>
                        <form id="journalForm" >
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <input type="text" class="form-control" id="subject" name="subject" required>
                            </div>
                            <div class="form-group">
                                <label for="journal">Journal</label>
                                <textarea class="form-control" id="journal" name="journal" rows="5" required></textarea>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="publicCheckbox" name="public">
                                <label class="form-check-label" for="publicCheckbox">Public</label>
                            </div>
                            <button type="submit" class="button-link">Submit</button>

                        </form>
                        </div>
                        <div class="background" id="message" class="container"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <?php
}
?>

<?php

if(isset($_SESSION["username"])) {
    $servername = "localhost";
$username = "root";
$password = "Ganimetaffe11";
$database = "if0_35982586_journal";
$user_id = $_SESSION["user_id"];
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}   
$sql = "SELECT * FROM posts WHERE user_id = ? ORDER BY created_at DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$entries = [];
while ($row = $result->fetch_assoc()) {
    $entries[] = $row;
}

// Close the prepared statement
$stmt->close();

$conn->close();
}
?>


<!-- MY ENTRRIES -->

<?php
if(isset($_SESSION["username"])) {
    ?>
    <div class="spacer2 layer2">
<div class="container text-dark entrypadding ">
    <div class="row">
        <div class="col">
            <h2 class="text-center">Your Entries</h2>
            <div class="table-responsive">
                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th scope="col">Number</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Journal Entry</th>
                            <th scope="col">Date</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($entries as $index => $entry): ?>
                        <tr class="entry-row" data-entry-id="<?php echo $entry['post_id']; ?>">
                            <th scope="row"></th>
                            <td><?php echo $entry['subject']; ?></td>
                            <td><?php echo $entry['journal_entry']; ?></td>
                            <td><?php echo date('d F Y', strtotime(substr($entry['created_at'], 0, 10))); ?></td>
                            <td>
                                <button type="button" class="btn tertiarybackground mt-3" onclick="deleteEntry(<?php echo $entry['post_id']; ?>)">
                                    <i class="fa-solid fa-xmark" style="color: #ffffff;"></i>
                                </button>
                            </td>
                            

                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
 <?php
}
?>


<!-- <button id="showEntriesButton" class="ml-5"> My Entries </button>


<div id="entriesContainer">

</div>
-->
</main>

<footer>
<div class="footercontainer spacer3 layer3">
 
</div>
<!-- <div class="spacer3 layer3"> </div> -->
</footer>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    
    
    // Select the textarea element
    var textarea = document.getElementById('journal');
     var newLineCharacterCount = 80;

    // Add event listener for keydown event
    textarea.addEventListener('keydown', function(event) {
        // Check if the key pressed is a printable character (excluding modifiers)
        if (!event.ctrlKey && !event.altKey && !event.metaKey && event.key !== "Backspace") {

            var text = textarea.value;
             if (text.length > 0 && text.length % newLineCharacterCount == 0 && !event.escKey) {
                var newLineAudio = new Audio('audio/return.mp3');
                newLineAudio.play();
            }

            var randomNum = Math.floor(Math.random() * 5) + 1;
            var filename = 'audio/typewriter' + randomNum + '.mp3';
            // Get the audio element
            var audio = new Audio(filename);
            audio.volume = 0.1;
            // Play the typewriter sound
            audio.play();
        }
    });
});

    $(document).ready(function () {
         $('#showEntriesButton').click(function() {
        // Make an AJAX GET request to your PHP endpoint
        $.ajax({
            url: 'myentries.php',
            method: 'GET',
            success: function(response) {
                // Handle the response data (e.g., update HTML with entries)
                $('#entriesContainer').html(response);
                
            },
            error: function(xhr, status, error) {
                // Handle errors if any
                console.error('Error fetching entries:', error);
            }
        });
    });

        $('#journalForm').submit(function (event) {
            event.preventDefault(); // Prevent the default form submission

            // Serialize form data
            var formData = $(this).serialize();

            // Send AJAX request
            $.ajax({
                type: 'POST',
                url: 'process_form.php', // Specify the URL to process the form data
                data: formData,
                success: function (response) {
                    $('#message').html('<div class="container" style="max-width: 500px;"><div class="alert alert-success text-black">Entry successfully submitted</div></div>');
                    $('#journalForm')[0].reset();
                    appendEntry(response);
                },
                error: function (xhr, status, error) {
                    $('#message').html('<div class="alert alert-danger">Error: aaaaaaaa ' + xhr.responseText + '</div>');
                }
            });
        });
    });

    function deleteEntry(entryId) {
        $.ajax({
            type: 'POST',
        url: 'delete_entry.php',
        data: { entryId: entryId },
        success: function(response) {
            // If the deletion was successful, remove the corresponding table row
            $('tr[data-entry-id="' + entryId + '"]').remove();
            updateRowNumbers();
            console.log('Entry deleted successfully.');
        },
        error: function(xhr, status, error) {
            console.error('Error deleting entry:', error);
        }
        });
    }

    function appendEntry(response) {
    // Construct the new row HTML using the entry details from the response
    var newRow = '<tr class="entry-row" data-entry-id="' + response.post_id + '">' +
                    '<th scope="row"></th>' +
                    '<td>' + response.subject + '</td>' +
                    '<td>' + response.journal_entry + '</td>' +
                    '<td>' + response.created_at + '</td>' +
                    '<td>' +
                        '<button type="button" class="btn tertiarybackground mt-3" onclick="deleteEntry(' + response.post_id + ')">' +
                            '<i class="fa-solid fa-xmark "style="color: #ffffff;"></i>' +
                        '</button>' +
                    '</td>' +
                '</tr>';
    // Prepend the new row to the table body
    $('tbody').prepend(newRow);
    updateRowNumbers();
}

    updateRowNumbers();

    function updateRowNumbers() {
    var totalRows = $('.entry-row').length;
    $('.entry-row').each(function(index) {
        var reversedIndex = totalRows - index;
        $(this).find('th').text(reversedIndex);
    });
}

</script>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"</script> -->
<script src="https://kit.fontawesome.com/97b3a5e971.js" crossorigin="anonymous"></script>
        
