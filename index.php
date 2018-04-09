<?php
  include('phps/connection.php');
?>
<!DOCTYPE html>
<html>
<head>
<!--  meta information-->
   <meta charset="utf-8">
   <title>Login | Diarium</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

     <!--style sheet and fonts  -->
   <link rel="stylesheet" href="styles/master.css" media="screen" title="no title">
   <link rel="stylesheet" href="styles/snackbar.css" media="screen" title="no title">
   <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Mono|Montserrat" rel="stylesheet">
   <!-- added scripts  -->
   <script src="scripts/scripts.js" charset="utf-8"></script>

 </head>
  <body>
<header>
    <center>
    <h1>📔 Diarium | </h1><sup>Open book for literators</sup>

  </center>
  <br>
<hr>
</header>
<main>
  <ul>
<li><div id="loginForm">
<form name="loginFrom" action="index.php" method="post">
  <br>
  <div class="login_email_div">
  <label class="design-border" for="userEmail">Email</label><br>
  <input type="email" name="loginEmail" id="loginEmail" placeholder="example@domain.com" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
  </div>
  <br>
  <div class="login_password_div">
  <label class="design-border" for="loginPassword">Password</label><br>
  <input type="password" name="loginPassword" id="loginPassword" placeholder="password" required>
  </div>
  <br>
  <input type="submit" name="login" value="Sign In" class="success">
  <p>New to the community? <a href="phps/registration.php">Register</a></p>

</form>
  <div id="snackbar">Incorrect Email/Password</div>

</div></li>
<li>
  <div>
  <h2>About Diarium</h2>
    <h3>by <a class="no-border" target="_blank" href="https://www.twitter.com/apsrsince97">Aditya Pratap Singh Rajput</a>🙂</h3>
<div>
  Lorem ipsum dolor sit amet, consectetur adipisicing elit,
  sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
  ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
  esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
  sunt in culpa qui officia deserunt mollit anim id est laborum.
</div>
</div>
</li>
  </ul>

</main>
<footer>
  <ul>
    <li></li>
  </ul>
</footer>
  </body>
</html>
