<?php
session_start();
include 'mysql.php';
echo"<h2>".$_SESSION['userID']."</h2>";

if ($_GET){
	$imgID=$_GET["imgID"];

} else {
	$imgID = $_POST["imgID"];
}

if (isset($_POST["editpost"])) {
	$word = $_POST["word"];

	$sql_edit = "UPDATE img SET word='$word' WHERE imgID=$imgID";

	if ($conn->query($sql_edit)=== TRUE) {
		header("Location: POST.php?imgID=$imgID");
      } else {
   	 echo "Error during updating record:" .$conn->error;
   }

}
?>

<html>
<head>
	<link rel="stylesheet" href="POST.css">
</head>
<title></title>
</head>
<body>
 
<!-- <form method="post" action="upload_pic.php" enctype="multipart/form-data">

   <p>share your memories.</p><textarea rows="5" cols="250" name="letter" required></textarea> <br>
   <input type="submit" name="submit" value="submit"><br>
</form>
 
    <p>Tell me your another story.</p><textarea rows="5" cols="250" name="me" required></textarea> <br>
</form>  -->

<h1>NOSTALGRAM</h1><br>
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

<?php

 $sql ="SELECT * FROM img WHERE imgID=$imgID";
 $result = $conn->query($sql);
 if($result->num_rows > 0){
 	while ($row = $result->fetch_assoc()) {
 		$imgID = $row['imgID'];
 		$word = $row["word"];
 		$img = $row["img"];
 	}
 }
 ?>

 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
 	<div class="allpic">
 		<div class="displaypic">
 			<img class="userpost" src="photoupload/upfile/<?php echo $img; ?>">
 		</div>

 		<div class="word">
 			<textarea name="word" rows=10 cols=70><?php echo $word; ?></textarea>
 			<input type="hidden" name="imgID" value="<?php echo $imgID; ?>">
              
<!-- <?php echo $imgID; ?> is method GET -->
 			<button type="submit" name="editpost">EDIT POST</button>
 		</div>
 	</div>
 </form>
</body>
</html>
