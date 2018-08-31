<?php
session_start();
include 'mysql.php';
 $user_file = "photoupload/user.file/";
  //this is where the picture will be saved in file.
 $target_file = $user_file . basename($_FILES["profile"]["name"]);
 // receive pic and save to file

 $uploadOK = 1; 
 // 1 is successful

$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["profile"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
// Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
// Check file size
    if ($_FILES["profile"]["size"] > 500000) {
       echo "Sorry, your file is too large.";
       $uploadOk = 0;
    }
// Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" && $imageFileType != "mp4") {
       echo "Sorry, only JPG, JPEG, PNG, GIF & mp4 files are allowed.";
       $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
    if (move_uploaded_file($_FILES["profile"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["profile"]["name"]). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
     
      $userID=$_SESSION['userID'];
      $pass=$_SESSION['pass'];
      $type=$_SESSION['usertype'];
      $pic=$_FILES["profile"]["name"];
      $me=$_POST["me"];
    $SQL = "INSERT INTO user (user,pass,type,pic,me) VALUES ('$userID','$pass','$type','$pic','$me')";
     $upload = mysqli_query($conn,$SQL);
      echo mysqli_error($conn);
      var_dump($upload);

    if (!$upload){
        print("Unsuccessful.<BR>");
        exit;
       }else
       {header('Location: profile.php');
        exit;
  }
 }
?>
