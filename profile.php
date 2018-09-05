<?php
 include 'mysql.php';
  session_start();
  
  echo"<h2>".$_SESSION['user']."</h2>";
 ?>

<html>
 <head>
  <title></title>
  <link rel="stylesheet" href="profile.css">
 </head>

<body>
 <h1>NOSTALGIA</h1><br>
<div class=logo>
  <ul>
    <li>
        <a href="user.php">
        <img src="mango.pic/home.png" alt="home">
        </a>
    </li>    
    
    <li> 
        <a href="posting.php">
        <img src="mango.pic/Post_logo.png" alt="post">
       </a>
    </li>

  
    <li>
       <a href="logout.php">
       <img src="mango.pic/logout.jpg" alt="home">
       </a>
    </li>
  </ul>
</div>

<form action="search.php" method="post" enctype="multipart/form-data">
        <div class="search">
         <input type="text" name="submit" id="text">
         <input type="submit" value="search" name="submit">
        </div>  
</form>

<div class='allpic'>
<?php
  include 'mysql.php';
  $imgID=$_SESSION["imgID"];
   $sql ="SELECT * FROM img WHERE imgID='$imgID'";
   $result = $conn->query($sql);
  if($result->num_rows > 0){ 
   while ($row = $result->fetch_assoc()) {
      $imgID=$row['imgID'];
      // Bring DB value and show it.
var_dump($_SESSION["imgID"]);
        // echo "$row['img']"; isnt work
    echo "<div class='displaypic'>";
    echo "<a href='POST.php?imgID=$imgID'>";
    echo "<img class='userpost' src='photoupload/upfile/". $row['img'] ."'>";
    echo '</a>';

    echo "</div>";
     }
    }
   else{
    echo "0 results";
}
?>
</div>

</body>
</html>