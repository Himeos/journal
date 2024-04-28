<?php

session_start();
if(isset($_SESSION['username']))
{
    header("Location: /");
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
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
<title>Journal</title>
<style>

#logging {
    display: none;
}

.roboto-bold {
  font-family: "Roboto", sans-serif;
  font-weight: 700;
  font-style: normal;
}

body {
    width: 100%;
    height: 100%;
    background-color: #F1F7ED;
    margin: 0;
    height: 100vh; /* Set height to viewport height for vertical centering */
}

.primary {
    color: #243E36;
}

#message{
    padding-top: 5rem;
}



.heading {
    margin-left: 10rem;
    font-size: 90px;
    font-family: Cy Grotesk Key;
    color: #243E36;
    
}

.container {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: row;
    justify-content: flex-start;
    align-items: center;
}

.subheading {
 margin-left: 15rem;
 
 margin-bottom: 8rem;
}

.toptext{
    font-family: Cy Grotesk Key;
    color: #243E36;
    margin-bottom: 5rem;
    font-size: 45px;
    font-weight: bold;
    

}

.bottomtext{
    
    font-size: 18px;
}

.button-link {
  display: inline-block;
  padding: 25px 35px;
  background-color: #243E36;
  color: #fff;
  text-decoration: none;
  border: none;
  border-radius: 25px;
  transition: background-color 0.1s ease, padding 0.2s ease;
}

.button-link:hover {
  background-color: #5A7970; 
  cursor: pointer;
  padding: 30px 40px;
}
.formbuttons
{
    margin-top: 7rem;
}

.formbuttons button{
    margin-left: 1rem;
    font-weight: bold;
}

.montserrat-2 {
  font-family: "Montserrat", sans-serif;
  font-optical-sizing: auto;
  font-weight: 900;
  font-style: normal;
}

#login {
    color: #E0EEC6;
}

hr {
    border: none; /* Remove default border */
    height: 2px; /* Set height to make it visible */
    background-color: black; /* Set background color */
    width: 80%; /* Set width to fill the container */
    margin-top: -3rem; /* Adjust the position */
}

.loginform {
    
}

.loginform input{
    padding: 10px;
    margin: 10px 0;
    border-radius: 10px;

}

.circle {
  background-color: #243E36;
  width: 10vh;
  height: 10vh;
  border-radius: 50%;
  position: absolute;
  top: 25%;
  left: 35%;
  animation: moveCircle 3s ease-in-out infinite;
}

#registerform
{
    display: none;
}

@keyframes moveCircle {
  0% {
    transform: translate(0, -40%);
  }

  50% {
    transform: translate(0, 40%);
  }
  
  100% {
    transform: translate(0, -40%);
  }
}

.spacer {
    aspect-ratio: 1600/800;
    width: 100%;
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
}

.layer1 {
    background-image: url('./svg/register.svg');
}

@media screen and (max-width: 1355px) {
    .circle {
  position: relative; /* Change position to relative */
  top: 30px; /* Adjust the value to move the circle down */
  left: auto; /* Reset left */
  z-index: -1; /* Move the circle behind other elements */
}

.toptext{
    
    font-size: 30px;
   
    

}

@keyframes moveCircle {
  0% {
    transform: translate(0, -5%);
  }

  50% {
    transform: translate(0, 5%);
  }
  
  100% {
    transform: translate(0, -5%);
  }
}


  .container {
    flex-direction: column;
    align-items: center;
  }

  .heading {
    margin-left: 0;
    text-align: center; /* Center align text */
    font-size: 40px; /* Adjust font size for smaller screens */
  }

  .subheading {
    margin-left: 0;
    margin-bottom: 3rem; /* Adjust margin bottom for smaller screens */
    text-align: center; /* Center align text */
  }

  /* Adjust any other styles as needed for smaller screens */
}

</style>

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

        fetch('register.blade.php', {
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
            
            ;
            console.log(data);
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

        fetch('login.blade.php', {
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