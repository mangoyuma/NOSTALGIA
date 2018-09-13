<?php
session_start();
include 'mysql.php';
?>  <h2>Admin:Mango</h2>

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
        <a href="admin.php">
        <img src="mango.pic/home.png" alt="home">
        </a>
    </li>    

     <li>
       <a href="logout.php">
       <img src="mango.pic/logout.jpg" alt="home">
       </a>
    </li>

  </ul>
</div>

<form action="admin.php" method="post" enctype="multipart/form-data">
        <div class="search">
         <input type="text" name="search" id="text">
         <input type="submit" value="search" name="submit">
        </div>  
</form>

<?php
  $DefaultSQL = "SELECT * FROM user";
  $result = $conn->query($DefaultSQL);
  
if(isset($_POST["submit"])){
  $search=$_POST["search"];

  $post="SELECT * FROM user WHERE user LIKE '%$search%'";
  $result=$conn->query($post);
  
    if ($result->num_rows > 0){
      while($row=$result->fetch_assoc()){
      $user = $row["user"];
 
      echo "$user<br>";
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
    echo "<a href='admin_edit.php?imgID=$imgID'>";
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

