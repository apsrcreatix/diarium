<?php
  include('connection.php');


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
<li> <h3> <?php if(isset($_SESSION['username'])){
echo $_SESSION['username'];
  } ?>
</h3>
</li>
<li>
<span>
  <a href="../index.php?llogout='1'">Logout</a>
</span></li>
<li><a href="posts.php">Publish A Post</a></li>
  </ul>

</nav>
<main>
<?php
if(isset($_SESSION['username'])){
$sql_q = "SELECT * FROM posts";
$result_p = $conn->query($sql_q);
while ($row = mysqli_fetch_array($result_p)) {
      echo "<div id=".'"posts"'.">";
      echo "<h2>".$row['title']."<h2>";
      echo "<h4>↳".$row['name']."<h4>";
      	echo "<br>";
      	echo "<h3><h3>";
      	echo "<span>".$row['text']."</span>";
      echo "</div>";
      echo "<br>";
      echo "<br>";
    }}
    else{
      echo "please login first";
    }
?>
</main>
<footer>

</footer>
  </body>
</html>
