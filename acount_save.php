<?php 
include 'mysql.php';
if (isset($_POST["login"])) {
$user=$_POST["user"];

$pass=$_POST["pass"];
$user_type=$_POST["type"];

if ($user_type=="user"){
	$usql = "INSERT INTO user (user,pass,type)
 VALUES('$user','$pass','$user_type')";

if ($conn->query($usql)===TRUE) {
  	echo "New user record created successfuly<br>
  	     Click here and login
  	     <a href='login.php'>LOGIN HOME</a>";

    } else {
     echo "New user record is unsuccessfuly";
  }
}
 
if($user_type=="admin"){
  $asql = "INSERT INTO admin (user,pass,type)
       VALUES('$user','$pass','$user_type')"; 
      
if ($conn->query($asql)===TRUE) {
    echo "New admin record created successfuly<br>
  	     Click here and login
  	     <a href='login.php'>LOGIN HOME</a>";

    } else {
     echo "New admin record is unsuccessfuly
     Click here and login
  	     <a href='create_acount.html'>SING UP</a><br>";
  }
}
}
?>
  