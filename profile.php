<?php
 session_start();
 include 'mysql.php';
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

<form action="profile.php" method="post" enctype="multipart/form-data">
        <div class="search">
         <input type="text" name="search" id="text">
         <input type="submit" value="search" name="submit">
        </div>  
</form>

<?php
  $DefaultSQL = "SELECT * FROM img";
  $result = $conn->query($DefaultSQL);
  
if(isset($_POST["submit"])){
  $search=$_POST["search"];

  $post="SELECT * FROM img WHERE user LIKE '%$search%'";
  $result=$conn->query($post);
  
    if ($result->num_rows > 0){
      while($row=$result->fetch_assoc()){
      $user = $row["user"];
      echo "Finding List<br>";
      echo "$user<br>";
      }
   } else{
   echo "No match found";
  }
}  
?>

<div class='allpic'>
<?php
  include 'mysql.php';
  
  $who=$_SESSION['user'];
   $sql ="SELECT * FROM img WHERE user='$who'";
   $result = $conn->query($sql);
  if($result->num_rows > 0){ 
   while ($row = $result->fetch_assoc()) {
      $imgID=$row['imgID'];
      // Bring DB value and show it.

        // echo "$row['img']"; isnt work
    echo "<div class='displaypic'>";
    echo "<a href='post.edit.php?imgID=$imgID'>";
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