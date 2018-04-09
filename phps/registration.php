<?php
  include('connection.php');
?>
<!DOCTYPE html>
<html>
<head>
<!--  meta information-->
   <meta charset="utf-8">
   <title>Register Here</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">

     <!--style sheet and fonts  -->
   <link rel="stylesheet" href="../styles/master.css" media="screen" title="no title">
   <link rel="stylesheet" href="../styles/snackbar.css" media="screen" title="no title">
   <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Mono|Montserrat" rel="stylesheet">
   <!-- added scripts  -->
   <script src="../scripts/scripts.js" charset="utf-8"></script>
 </head>
 <body>
<header>
<center>
  <h1>Register</h1>
</center>
  <br>
  <hr>
</header>


<main>
  <div id="registrationForm">

<form name="signUpForm" action="registration.php" method="post" onsubmit="return validation()">

<div class="fullname_div">
<label class="design-border" for="fullname">Name</label><br>
<input type="" name="fullname" id="fullname" placeholder="first and last name" pattern="^\p{L}+[\p{L}\p{Pd}\p{Zs}']*\p{L}+$|^\p{L}+$" required title="Please fill the full name">
</div>
<br>
<div class="username_div">
<label class="design-border" for="username">Birthday</label><br>
<input type="date" name="birthday" id="birthday" required>
</div>
<br>
<div class="email_div">
<label class="design-border" for="userEmail">Email</label><br>
<input type="email" name="userEmail" id="userEmail" placeholder="example@domain.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
</div>
<br>
<div class="password_div">
<label class="design-border" for="regPassword">Password</label><br>
<input type="password" name="regPassword" id="regPassword" placeholder="password" required title="Password must be 8 character long">
</div>
<br>
<div class="confirm_password_div">
<label class="design-border" for="regConPassword">Confirm Password</label><br>
<input type="password" name="regConPassword" id="regConPassword" placeholder="confirm password" required>
</div>
<br>

<input type="submit" name="register" value="Register" class="success">
<span>Already a member ? <a href="../index.php">Login</a></span>

  </form>
<br>
  </div>
  <!-- Use a button to open the snackbar -->
  <!-- <button onclick="snackbar()">Show Snackbar</button> -->

  <!-- The actual snackbar -->
  <div id="snackbar"></div>
</main>

<footer>

</footer>
  </body>
</html>



<!-- script for validation -->
<script type="text/javascript">
// selecting elements
var regPassword = document.forms['signUpForm']['regPassword'];
var regConPassword = document.forms['signUpForm']['regConPassword'];

// error display elemets
var error_reg = document.getElementById('snackbar');

// setting event listner

regPassword.addEventListener('blur',passwordVerify,true);

// validation function
function validation(){
  if(regPassword.value.length < 8){
    regPassword.style.border =  "2px dotted #FD7272";
    regConPassword.style.border =  "2px dotted #FD7272";
    error_reg.innerHTML = "Password must be 8 character.";
    snackbar();
    regPassword.focus();
    regConPassword.focus();
    return false;
  }
  if (regPassword.value != regConPassword.value) {
    regPassword.style.border =  "2px dotted #FD7272";
    regConPassword.style.border =  "2px dotted #FD7272";
    error_reg.textContent = "Password and Confirm password is not matching.";
    snackbar();
    return false;
  }
}
// event handler
function passwordVerify() {
  if (regPassword.value === regConPassword.value) {
    regPassword.style.border =  "2px dotted #CAD3C8";
    regConPassword.style.border =  "2px dotted #CAD3C8";
  	return true;
  }
}

</script>
