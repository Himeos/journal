<?php

 
if(isset($_SESSION['username']))
{
    header("Location: /index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/loginpage.css">
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
<title>Journal</title>


</head>
<body>


<div class="container">

    <div class="circle"> <p1 class="adjust"></div>

    <div class="heading">
     <h2 class="montserrat-2"> JOURNAL </h2>
      </div>
    

        <div class="subheading">
            <h3 class="toptext montserrat-2"> WHAT HAVE YOU <br>LEARNED TODAY?</h3>
            
            <div class="formbuttons">
            <button  class="button-link roboto-bold" id="login">Log In</a>
            <button  class="button-link roboto-bold" id="register">Sign Up</a>
            </div>

        <div id="logging">
            <form method="POST" action="" class="loginform" id="loginformid">
                    <div class="">
                        <label for="name" class=""> Username </label>
                        <div class="col-sm-4">
                            <input class="input" id="name" type="text" placeholder="Username" name="username"
                                aria-label="Username">
                        </div>
                    </div>
                    <div class="">
                        <label for="password" class="" > Password </label>
                        <div class="">
                            <input class="form-control" id="password" type="password" placeholder="Password"
                                name="password"
                                aria-label="Password">
                        </div>
                        <button type="submit" class="button-link roboto-bold"> Log In </button>
                    </div>


            </form>
            <div class="" id="errorMessage"> </div>
        </div>  

        <div id="registerform">
            <form method="POST" action="" class="loginform" id="registerformid">
                    <div class="">
                    <label for="email" class=""> Email </label>
                    <div class="col-sm-4">
                    <input class="input" id="email" type="email" placeholder="E-mail" name="email" required>
                    </div>
                        <label for="registername" class=""> Username </label>
                        <div class="col-sm-4">
                            <input class="input" id="registername" type="text" placeholder="Username" name="username"
                                aria-label="Username" required>
                        </div>
                    </div>
                    <div class="">
                        <label for="registerpassword" class="" > Password </label>
                        <div class="">
                            <input class="form-control" id="registerpassword" type="password" placeholder="Password"
                                name="password"
                                aria-label="Password" required>
                        </div>
                        <div class="">
                        <label for="registerpassword2" class="" > Repeat Password </label>
                        <div class="">
                            <input class="form-control" id="registerpassword2" type="password" placeholder="Password"
                                name="password2"
                                aria-label="Password"
                                required>
                        </div>
                        <button type="submit" id="registersubmit" class="button-link roboto-bold"> Register </button>
                    </div>


            </form>
            <div class="" id="errorMessageRegister"> </div>

  
   
        </div>  
              
    </div>
    

    </div>
</div>

 <hr width="100%" size="5" color="blue">
    

<script>
document.getElementById('register').addEventListener('click', function() {
    event.preventDefault();
    document.querySelector('.formbuttons').style.display = 'none';
    document.getElementById('registerform').style.display = 'block';




});

document.getElementById('registerformid').addEventListener('submit', function(event) {
        event.preventDefault();
        const form = event.target;

        const password = form.querySelector('#registerpassword').value;
        const password2 = form.querySelector('#registerpassword2').value;
    if (password !== password2) {
    
        document.getElementById('errorMessageRegister').innerHTML = "Passwords do not match";
        event.preventDefault(); // Prevent form submission if passwords don't match
        return false;
    }
    else {
        document.getElementById('errorMessageRegister').innerHTML = "";
    }

        const formData = new FormData(form);

        fetch('register.php', {
            method: form.method,
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
        
            
            return response.text();
        })
        .then(data => {
            // Handle successful login response
            if (data.trim() === 'success') {
            
                // Redirect or show success message
                console.log("Register successful. Redirecting...");
                window.location.href = '/';
            } else {
                // Display error message
                console.log("349");
                document.getElementById('errorMessageRegister').innerHTML = data;
            }
        })
        .catch(error => {
            console.error('There was an error!', error);
        });
    });

document.getElementById('login').addEventListener('click', function() {
event.preventDefault();
document.querySelector('.formbuttons').style.display = 'none';
document.getElementById('logging').style.display = 'block';



document.getElementById('loginformid').addEventListener('submit', function(event) {
        event.preventDefault();
        const form = event.target;
        const formData = new FormData(form);

        fetch('login.php', {
            method: form.method,
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            console.log("Line 208");
            
            return response.text();
        })
        .then(data => {
            
            ;
            console.log(data);
            // Handle successful login response
            if (data.trim() === 'success') {
                
                // Redirect or show success message
                console.log("Login successful. Redirecting...");
                window.location.href = '/';
            } else {
                // Display error message
                document.getElementById('errorMessage').innerHTML = "Username Or Password incorrect";
            }
        })
        .catch(error => {
            console.error('There was an error!', error);
        });
    });

    



});



document.addEventListener("DOMContentLoaded", function() {
  var circle = document.querySelector('.circle');

  function getRandomPosition() {
    var x = Math.random() * (window.innerWidth - circle.offsetWidth);
    var y = Math.random() * (window.innerHeight - circle.offsetHeight);
    return { x: x, y: y };
  }

  circle.addEventListener('mouseover', function() {
    var pos = getRandomPosition();
    circle.style.left = pos.x + 'px';
    circle.style.top = pos.y + 'px';
  });
});







</script>


</body>
</html>