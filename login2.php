<?php
   include 'mysql.php';
   session_start();


 if(isset($_POST["login"])){

    $Username="";
    $Pass="";
    $user=$_POST["user"];
    $pass=$_POST["pass"];
    $usertype=$_POST["login_user"];
    $_SESSION["user"] = $user;
// USER & PASS colect
    $sql="SELECT * FROM user WHERE user='$user' AND pass='$pass'";
    $result = $conn->query($sql); 
    
    if($result->num_rows>0){
         while($rows=$result->fetch_assoc()){
         $User=$row["user"];
         $Pass=$row["pass"];
         $id=$rows["userID"];
         $_SESSION["userID"]=$id;
        header('Location:user.php');
        }
        }else{
     echo"<a href='login.php'>please try again</a>";
         }

// ADMIN login
    if($usertype == "Admin"){
    if(($user == "mango") && ($pass =="yuma")){
        header("location:admin.php");
    }else{
        echo "Your username or password is wrong.";
    }
// USER login
    // }elseif($usertype == "User"){
    // if(($UserName == $User) && ($PassWord == $Pass)){
    //     header("location:user.php");
    // }else{
    //     echo "Your username or password is wrong.";
    // }
   }
  }
?>  