<?php
session_start();
include 'mysql.php';
echo"";

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

if(isset($_POST["submit"])){
  $comment = $_POST["usercomment"];
  $user_name = $_SESSION["user"];

  $sql_comment = "INSERT INTO comment (user,comment,imgID) VALUES ('$user_name','$comment','$imgID')";

  if ($conn->query($sql_comment) === TRUE) {
    header('Location: user.php');
  } else {
    echo "Unsuccessfuly";
    echo $conn->error;
  }
}
?>

<html>
<head>
  <link rel="stylesheet" href="POST_user.css">
</head>
<title></title>
</head>
<body>
 
<h1>NOSTAGIA</h1><br>
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
      $user= $row["user"];
      $word = $row["word"];
      $img = $row["img"];
      $_SESSION["userID"]=$user;
      echo "$user";
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
      <textarea value="" name="word" rows=10 cols=82><?php echo $word; ?></textarea>
      <input type="hidden" name="imgID" value="<?php echo $imgID; ?>">
    </div>
</form>

<!-- Comment -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
  <textarea name="usercomment" cols=82 rows=5 required></textarea><br>
  
  <input type="hidden" name="imgID" value=<?php echo $imgID ?> >
  <input type="submit" name="submit" value="Comment">

</form>

 <div class='user'>
<?php
  $SQL ="SELECT * FROM comment WHERE imgID=$imgID";
  $result = $conn->query($SQL);
 
  if($result->num_rows > 0){
    while ($row = $result->fetch_assoc()) {
      $commentID = $row['commentID'];
      $user = $row["user"];
      $comment = $row["comment"];  
      echo"$user <br>";
      echo"$comment <br><br>";   
    }
  } else {
    echo"No comment";
  }
?> 
</div> 

</body>
</html>















<?php
session_start();
include 'mysql.php';
echo"<h2>".$_SESSION['user']."</h2>";

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

    <li> 
      <a href=" post.edit.php">
       <img src="mango.pic/post.edit.jpg"> 
      </a>
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
      <!-- file location and bring DB value.(img) -->
    </div>

    <div class="word">
      <textarea value="" name="word" rows=13 cols=71><?php echo $word; ?></textarea>
      <input type="hidden" name="imgID" value="<?php echo $imgID; ?>">
      <!-- $imgID USER's word -->
              
<!-- <?php echo $imgID; ?> is method GET -->
 </div>


<?php
 $sql ="SELECT * FROM comment WHERE commentID=$ID";
 $result = $conn->query($sql);
 if($result->num_rows > 0){
  while ($row = $result->fetch_assoc()) {
    $imgID = $row['imgID'];
    $word = $row["word"];
    $img = $row["img"];
  }
 }
 ?>

 <p>User:<?php echo $_SESSION['user']; ?></p>
   <textarea name="comment" required style="width:564px;
  height:35px;
  border:2px solid green;"></textarea><br>

  <input type="hidden" name="cid" value="<?php echo $commentID ?>">
  <input type="submit" name="submit" valuea="Comment">


<!-- Comment -->
<?php
if(isset($_POST["submit"])){
  $user_name = $_SESSION["user"];
  $Comment = $_POST["comment"];

  $sql_comment = "INSERT INTO comment (user,comment) VALUES ('$user_name','$Comment')";

  if ($conn->query($sql_comment) === TRUE) {
    header('Location: POST.php');
  } else {
    echo "Unsuccessfuly";
  }
  echo "<br><br>";

  $sql_show = "SELECT * FROM comment  WHERE commentID = '$cID'";
  $result = $conn->query($sql_show);
   if ($result->num_rows>0) {
    $DB_name=$row["user"];
    $comment=$row["Comment"];
    }
}
?>

  


  </div>
 </form>
</body>
</html>







