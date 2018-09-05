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
    if($result->num_row>0){
        while($rows=$result->fetch_assoc()){
         $User=$row["user"];
         $Pass=$row["pass"];
         $id=$rows["userID"];
         $_SESSION["userID"]=$id;
        header('Location:user.php');
        }
        }else{
     echo"<a href='login.html'>please try again</a>";
    }

// ADMIN login
    if($usertype == "Admin"){
    if(($user == "mango") && ($pass =="yuma")){
        header("location:admin.php");
    }else{
        echo "Your username or password is wrong.";
    }
// USER login
    }elseif($usertype == "User"){
    if(($UserName == $User) && ($PassWord == $Pass)){
        header("location:user.php");
    }else{
        echo "Your username or password is wrong.";
    }
   }
  }
?>
<!-- 
    $row = $login->fetch_assoc();
    $userID = $row["userID"];
    $_SESSION['user'] = $user;
    $login_user = $_POST["login_user"];

if($login_user=="user"){
    $user=$_POST["user"];
    $pass =$_POST["pass"];

$sql = "SELECT * FROM user WHERE user='$user' AND pass='$pass'";
    $login = $conn->query($sql);
    $count = mysqli_num_rows($login);
if($sql == TRUE){ 
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
 -->



 
  