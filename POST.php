<?php
session_start();
include 'mysql.php';
echo"<h2>".$_SESSION['user']."</h2>";
$imgID=$_GET["imgID"];
// $_GET['imgID'] no need to prosess just use value to add in $imgID.

?>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="POST.css">
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
    
    <li> <a href="posting.php">
        <img src="mango.pic/Post_logo.png" alt="post">
       </a>
    </li>
    <li><a href="profile.php">
        <img src="mango.pic/acount_logo.jpg" alt="profile">
       </a>
    </li>
    </ul>
    <li><a href="post.edit.php?imgID=<?php echo $imgID; ?>">
      <!-- post.edit.php?imgID use URL and add $imgID=$_GET["imgID"]; to user's data -->
        <img src="mango.pic/post.edit.jpg">
        </a>
    </li>    
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
$userID=$_SESSION["userID"];
// MYSQLにユーザーの値
// 画像データ取得
$sql ="SELECT * FROM img where imgID=$imgID";
$result = $conn->query($sql);

if($result->num_rows > 0){  
    while ($row = $result->fetch_assoc()) {
      $imgID=$row['imgID'];
      // Bring DB value and show it.

        // echo "$row['img']"; isnt work

    echo "<div class='displaypic'>";
    echo "<a href='POST.php?imgID=$imgID'>";
    echo "<img class='userpost' src='photoupload/upfile/". $row['img'] ."'>";
    echo "</a>";
    echo "</div>";

    echo "<div class='word'>";
    echo "<pre>".$row['word']."</pre>";
    // <pre> show display word colect.
    echo "</div>";
}
    }else{
    echo "0 results";
}
// 画像ヘッダとしてjpegを指定（取得データがjpegの場合）
// header("Content-Type: image/jpeg");
// // バイナリデータを直接表示
// echo"$row[0]";
?>
</div>
</body>
</html>


