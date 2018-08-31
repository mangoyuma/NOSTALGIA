<?php 
include 'end.conect.php';
$user=$_POST ["name"];
$pass=$_POST ["pass"];
$user_type=$_POST ["type"];
?>
USER:<?php echo "$user"?><br>
PASS:<?php echo "$pass"?><br>
USER TYPE:<?php echo "$user_type"?><br>


<?php 
var_dump($user);
 $sql = "INSERT INTO id (user,pass,type)
 VALUES('$user','$pass', '$type')";

  if ($conn->query($sql)===TRUE) {
  	echo "New record created successfuly";
  } else {
  	 echo "Error: " . $sql . "<br>"
  	       . $conn->error;
  }
  ?>
  <a href="login.html">LOGIN HOME</a>
 	<!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>

 
 </body>
 </html>
