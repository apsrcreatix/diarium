<?php
  include('connection.php');
  if(isset($_POST['write'])&&isset($_SESSION['username'])){
    // the path to store the uploaded image
    // $target = "images/".basename($_FILES['image']['name']);
    // $images = $_FILES['image']['name'];
    $text = $_POST['text'];
    $title = $_POST['title'];
    $username = $_SESSION['username'];
    $sql_p = "INSERT INTO posts (id,title,name,text) VALUES (NULL,'$title','$username','$text')";
    if ($conn->query($sql_p) === TRUE) {
      header("location:main.php");
    } else {
      echo "<div id="."snackbar".">There was a problem uploading data.</div>";
      echo '<script type="text/javascript">',
      "function snackbar() {",
          "var x = document.getElementById(".'"snackbar"'.");".
          " x.className = ".'"show"'.";",
          "setTimeout(function(){ x.className = x.className.replace(".'"show"'.','.' ""'.")",'; }, 3000);',
      '}',

     'snackbar();',
     '</script>';
        }

  }else {
echo "You can create posts from here !";
  }
?>

<!DOCTYPE html>
<html>
<head>
<!--  meta information-->
   <meta charset="utf-8">
   <title>Diarium</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

     <!--style sheet and fonts  -->
   <link rel="stylesheet" href="../styles/master.css" media="screen" title="no title">
   <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Mono|Montserrat" rel="stylesheet">
   <script src="../scripts/scripts.js" charset="utf-8"></script>
   <script src="../scripts/jquery-3.3.1.min.js" charset="utf-8"></script>
   <link rel="stylesheet" href="../styles/snackbar.css" media="screen" title="no title">

 </head>

  <body>

    <header>
        <center>
    <h1>📔 Diarium | </h1><sup>Open book for literators</sup>
      </center>
    </header>

<nav>

  <ul>
<li><div class="content">
  <h3> <?php if(isset($_SESSION['message'])){
  echo $_SESSION['message'];
  unset($_SESSION['message']);
  } ?>
</h3>
  </div></li>
<li><h3> <?php if(isset($_SESSION['fullname'])){
echo $_SESSION['fullname'];
echo $_SESSION['loginEmail'];
  } ?>
</h3>
</li>
<li>
<span>
  <a href="../index.php?llogout='1'">Logout</a>
</span></li>
<li><a href="main.php">Home</a></li>
  </ul>
</nav>

<main>
<div>
<form enctype="multipart/form-data" name="postForm" method="post" action="posts.php">
  <div id="main-content">
    <br>
    <div>
    <input  type="text" name="title" placeholder="Title">
    </div>
    <br>
    <div>
    <!-- <input  type="file" name="image" value="upload"> -->
    </div>
    <br>
    <div>
    <textarea  name="text" rows="5" cols="50" placeholder="Write your content here." wrap="off"></textarea>
    </div>
    <br>
    <div>
      <br>
      <input type="submit" name="write" value="publish">
    </div>
  </div>
</form>
</div>

</main>
<footer>

</footer>
  </body>
</html>
