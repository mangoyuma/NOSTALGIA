<?php
session_start();
include 'mysql.php';
echo"<h2>".$_SESSION['admin']."</h2>";
?>

<html>
<head>
  <title></title>
  <link rel="stylesheet" href="user.css">
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
    
    <li> <a href="posting.php">
        <img src="mango.pic/Post_logo.png" alt="post">
       </a>
    </li>

    <li><a href="profile.php">
        <img src="mango.pic/acount_logo.jpg" alt="profile">
       </a>
    </li>
  </ul>
</div>

<form action="user.php" method="post" enctype="multipart/form-data">
        <div class="search">
         <input type="text" name="search" id="text">
         <input type="submit" value="search" name="submit">
        </div>  
</form>

<?php
  $DefaultSQL = "SELECT * FROM user,img";
  $result = $conn->query($DefaultSQL);
  
if(isset($_POST["submit"])){
  $search=$_POST["search"];

  $post="SELECT * FROM img,user WHERE img LIKE '%$search%'";
  $result=$conn->query($post);
  
    if ($result->num_rows > 0){
      while($row=$result->fetch_assoc()){
      $user = $row["user"];
      $img = $row["img"];

      echo "$user<br>";
      echo "$img";
      }
   } else{
   echo "No match found";
  }
}  


echo "<div class='allpic'>";
// MYSQLにユーザーの値
// 画像データ取得
$sql ="SELECT * FROM img";
$result = $conn->query($sql);

if($result->num_rows > 0){  
    while ($row = $result->fetch_assoc()) {
      $imgID=$row['imgID'];
      // Bring DB value and show it.

        // echo "$row['img']"; isnt work

   echo "<div class='displaypic'>";
    echo "<a href='post.edit.php?imgID=$imgID'>";
    echo "<img class='userpost' src='photoupload/upfile/". $row['img'] ."'>";
    echo "</a>";
   echo "<div>";
}
    }else{
    echo "0 results";
}
 ?>
</body>
</html>

