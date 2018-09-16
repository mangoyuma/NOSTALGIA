<?php
session_start();
include 'mysql.php';


if ($_GET){
	$imgID=$_GET["imgID"];

} else {
	$imgID = $_POST["imgID"];
}

if (isset($_POST["Delete"])) {
	
$sql = "DELETE FROM img WHERE imgID='$imgID'";
  if ($conn->query($sql)===TRUE) {
    header("Location: admin.php?imgID=$imgID");
      } else {
     echo "Error during updating record:" .$conn->error;
  }
}
  ?>
    
<h2>Admin:Mango</h2>

<html>
<head>
	<link rel="stylesheet" href="admin_edit.css">
</head>
<title></title>
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

<?php
 $sql ="SELECT * FROM img WHERE imgID=$imgID";
 $result = $conn->query($sql);
 if($result->num_rows > 0){
 	while ($row = $result->fetch_assoc()) {
 		$imgID = $row['imgID'];
    $founduser =$row['user'];
 		$word = $row["word"];
 		$img = $row["img"];
    $IMGuser = $row["user"];
 	}
 }
 ?>

 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
  <div class="allpic">
 		<div class="displaypic">
 			<img class="userpost" src="photoupload/upfile/<?php echo $img; ?>">
 			<!-- file location and bring DB value.(img) -->
 		</div>

 		<div class="word">
      <textarea name="word" rows=16 cols=83><?php echo $founduser; ?>:<?php echo $word;?></textarea>
 			<input type="hidden" name="imgID" value="<?php echo $imgID; ?>">
 			<!-- $imgID USER's word -->
    </div>

   <button type="submit" name="Delete">Delete</button>
          
    <div class='user'>
     <?php
      $SQL ="SELECT * FROM comment WHERE imgID=$imgID";
      $result = $conn->query($SQL);
 
      if($result->num_rows > 0){
      while ($row = $result->fetch_assoc()) {
      $commentID = $row['commentID'];
      $user = $row["user"];
      $comment = $row["comment"];  
      echo"$user:<br>";
      echo"$comment <br><br>";   
      }
     } else 
     {echo"No comment";
    }
  ?> 
    </div> 	
  </div>
 </form>
</body>
</html>
