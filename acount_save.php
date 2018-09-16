<?php 
include 'mysql.php';

$user=$_POST["user"];
$pass=$_POST["pass"];
$user_type=$_POST["type"];

if (isset($_POST["login"])) {

if ($user_type=="user"){
   $erro="SELECT * FROM user WHERE user = '$user'";
   $result_erro = $conn->query($erro);
	 $usql = "INSERT INTO user (user,pass,type)VALUES('$user','$pass','$user_type')";

  if($result_erro->num_rows > 0){
  echo "Already same user acount.";
  } elseif ($conn->query($usql)===TRUE) {
    echo "New user record created successfuly<br>
         Click here and login
         <a href='login.php'>LOGIN HOME</a>";
  } else {
    echo "New user record is unsuccessfuly
     Click here and login
         <a href='create_acount.html'>Sign UP</a><br>";
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

  