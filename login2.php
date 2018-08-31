<?php
include 'mysql.php';
session_start();
$user=$_POST["user"];
$pass=$_POST["pass"];
$usertype=$_POST["login_user"];

$sql="SELECT * FROM user WHERE user='$user' AND pass='$pass'";
    $login = $conn->query($sql);
    $count = mysqli_num_rows($login);
    $row = $login->fetch_assoc();
    $userID = $row["userID"];
    $_SESSION['user'] = $user;
    $login_user = $_POST["login_user"];

if($login_user=="User"){
    $user=$_POST["user"];
    $pass =$_POST["pass"];

$sql = "SELECT * FROM user WHERE user='$user' AND pass='$pass'";
    $login = $conn->query($sql);
    $count = mysqli_num_rows($login);
if($count ==1){ 
    $row = $login->fetch_assoc();
    $userID = $row["userID"]; 
    $_SESSION['user'] = $user;
    $_SESSION['userID'] = $userID;
    $_SESSION['pass'] = $pass;
    $_SESSION['usertype'] = $usertype;
    header('Location:user.php');
    exit;
}
else{
    echo "<a href='login.html'>please try again</a>";
    }
}

var_dump($count);

if($login_user=="Admin"){
    $user=$_POST["user"];
    $pass =$_POST["pass"];
     
    $sql = "SELECT * FROM admin WHERE user='$user' AND pass='$pass'";
    $login = $conn->query($sql);
    $count = mysqli_num_rows($login);
if($count ==1){ 
    $row = $login->fetch_assoc();
    $userID = $row["userID"];
    $_SESSION['admin'] = $admin;
    $_SESSION['pass'] = $pass;
    $_SESSION['usertype'] = $usertype;
    header('Location: admin.php');
    exit;
}      
else {
    echo "<a href='login.html'>please try again</a>";
    }
}

if ($count == 1) {
    $_SESSION['user'] = $user;
    $_SESSION['admin'] = $admin;
    $_SESSION['pass'] = $pass;
    $_SESSION['usertype'] = $usertype;
      }
?>




 
  