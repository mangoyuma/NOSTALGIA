<?php
session_start();
include 'mysql.php';

$target_dir = "photoupload/upfile/";
$target_file = $target_dir . basename($_FILES["upfile"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["upfile"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
// Check if file already exists
// if (file_exists($target_file)) {
//     echo "Sorry, file already exists.";
//     $uploadOk = 0;
// }
// Check file size
if ($_FILES["upfile"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "mp4") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["upfile"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["upfile"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
// MYSQLにユーザーの値

// // データ追加
    // $IMG = "INSERT INTO img (img,userID,word,) VALUES ('$upfile','$user','$me')";
      $userID=$_SESSION['userID'];
      $img=basename( $_FILES["upfile"]["name"]);
      $word=$_POST["letter"];
      $user=$_SESSION['user'];

       var_dump($img);
       $SQL = "INSERT INTO img (img,user,word) VALUES ('$img','$user','$word')";
       $upload = mysqli_query($conn,$SQL);

     echo mysqli_error($conn);
     var_dump($user);
     echo "<br>";

    if (!$upload){
        print("Unsuccessful.<BR>");
        exit;
       }else
       {header('Location: user.php');
        exit;
  }
 }
?>