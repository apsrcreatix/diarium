<?php
session_start();
// Create connection
$conn = new mysqli('localhost','root','','authentication');

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


if(isset($_POST['register'])){

$fullname = $_POST['fullname'];
$userEmail = $_POST['userEmail'];
$birthday = $_POST['birthday'];
$regPassword = $_POST['regPassword'];
$regPassword = md5($regPassword);

$sql_e = "SELECT * FROM users WHERE email='$userEmail'";
$result = $conn->query($sql_e);
if ($result->num_rows > 0) {
  echo "<div id="."snackbar".">Email already taken !</div>";
  echo '<script type="text/javascript">',
  "function snackbar() {",
      "var x = document.getElementById(".'"snackbar"'.");".
      " x.className = ".'"show"'.";",
      "setTimeout(function(){ x.className = x.className.replace(".'"show"'.','.' ""'.")",'; }, 3000);',
  '}',

 'snackbar();',
 '</script>';
    }
$sql = "INSERT INTO users (id,name, birthday, email, password) VALUES (NULL,'$fullname','$birthday','$userEmail','$regPassword')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  $_SESSION['message']="Thank you for joing us 😊";
  $_SESSION['username']= $fullname;
  header("location:main.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

}

//log in
if(isset($_POST['login'])){
  $loginEmail = $_POST['loginEmail'];
  $loginPassword = $_POST['loginPassword'];
  $loginPassword = md5($loginPassword);

  $sql = "SELECT * FROM users WHERE email='$loginEmail' AND password='$loginPassword'";
  $result = $conn->query($sql);

  if ($result->num_rows == 1) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
       $_SESSION['username'] = $row["name"];
     $_SESSION['loginEmail'] = $row["email"];
      $_SESSION['message'] = "How Was you day 😋 ";
      }
      header('location:phps/main.php');

  } else {
      echo "<div id="."snackbar".">Incorrect Email/Password</div>";
      echo '<script type="text/javascript">',
      "function snackbar() {",
          "var x = document.getElementById(".'"snackbar"'.");".
          " x.className = ".'"show"'.";",
          "setTimeout(function(){ x.className = x.className.replace(".'"show"'.','.' ""'.")",'; }, 3000);',
      '}',

     'snackbar();',
     '</script>';

}
}
//logout
if(isset($_GET['logout'])){
  // remove all session variables
session_unset();
  session_destroy();
  // destroy the session
  session_destroy();

  header('location:../index.php');
  $conn->close();
}

?>
