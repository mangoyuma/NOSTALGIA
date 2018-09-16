<?php
 session_start();
 include 'mysql.php';
?>

<?php
// 検索したuser名をクリックするとそのユーザーが表示される

 $found=$_POST['Clickuser'];
if(isset($_POST["Clickuser"])){
   echo "$found";
    }
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

  </ul>
</div>

<form action="userfound.php" method="post" enctype="multipart/form-data">
        <div class="search">
         <input type="text" name="search" id="text">
         <input type="submit" value="search" name="submit">
        </div>  
</form>

<?php
 if(isset($_POST["submit"])){
  $search=$_POST["search"];

  $post="SELECT user FROM user WHERE user LIKE '%$search%'";
  $result=$conn->query($post);
     
    if ($result->num_rows > 0){
      while($row=$result->fetch_assoc()){
      $user = $row["user"];

    // Display user's name　検索したuser名　表示
      echo "Finding List<br>";
      echo "<form action='userfound.php' method='POST'>";
      echo "<input type='hidden' name='user' value= <?php echo $user ?> >";
      echo "<input type='submit' name='Clickuser' value= $user>";
      // Inside 'Clickuser'  の中に検索したユーザーが入ってる
      echo "</form>";   
        }
   }  else{
      echo "No match found";
  }
}  
?> 


<div class='allpic'>
<?php  
// * Can bring all value. $found is when you search user name
   $sql ="SELECT * FROM img WHERE user='$found'";
   $result = $conn->query($sql);

  if($result->num_rows > 0){ 
   while ($row = $result->fetch_assoc()) {
      $imgID=$row['imgID'];

      // Bring DB value and show it.

    echo "<div class='displaypic'>";
    echo "<a href='post_user.php?imgID=$imgID'>";
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