<?php
session_start();
include 'mysql.php';
echo"<h2>". $_SESSION['userID']."</h2>";


if (isset($_POST["editprofile"])) {
	$me = $_POST["me"];
	$pic = $_POST["pic"];

	$sql_edit = "UPDATE user SET pic='$pic', me='$me' WHERE userID=$userID";

	if ($conn->query($sql_edit)=== TRUE) {
		header("Location: profile.php?userID=$userID");
      } else {
   	 echo "Error during updating record:" .$conn->error;
   }

}
?>
<html>
<head>
<title></title>
<link rel="stylesheet" href="profile.css">
</head>
<body>

 <h1>NOSTALGRAM</h1><br>

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
        <a href="profile.edit.php">
        <img src="mango.pic/P.edit.jpg">
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

<?php
 $sql ="SELECT * FROM user WHERE userID=$userID";
 $result = $conn->query($sql);
 if($result->num_rows > 0){
 	while ($row = $result->fetch_assoc()) {
 		$userID = $row['userID'];
 		$pic = $row['pic'];
 		$me = $row['me'];
  	}
 }
 ?>

 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
 	<div class="allpic">
 		<div class="displaypic">
 			<img class="userpost" src="photoupload/user.file/<?php echo $pic; ?>">
 		</div>
 		
 		<div class="word">
 			<textarea name="word" rows=10 cols=70>
 			<?php echo $me; ?></textarea>
 			<input type="hidden" name="userID" value="<?php echo $userID; ?>">
 			<button type="submit" name="editprofile">EDIT PROFILE</button>
 		</div>
 	</div>
 </form>
</body>
</html>
