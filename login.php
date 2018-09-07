<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>

<div class="vid-container">
  <video class="bgvid" autoplay="autoplay" muted="muted" preload="auto" loop>
      <source src="http://mazwai.com/system/posts/videos/000/000/109/webm/leif_eliasson--glaciartopp.webm?1410742112" type="video/webm">
  </video>


  <div class="inner-container">
      <video class="bgvid inner" autoplay="autoplay" muted="muted" preload="auto" loop>
      <source src="http://mazwai.com/system/posts/videos/000/000/109/webm/leif_eliasson--glaciartopp.webm?random=1" type="video/webm">
  </video>
  
  <div class="box">
    <h1>NOSTALGIA</h1> 
    <form action="login2.php" method="POST">
      <input type="text" name="user" placeholder="user"/>
      <input type="password" name="pass" placeholder="password"/>
      <div class="user">     
        Login Type<br> 
        USER
        <input type="radio" name="login_user" value="User"  required>
        ADMIN
        <input type="radio" name="login_user" value="Admin" required>
      </div>     
      <button name="login" value="login">Login </button>
    </form>
    <p>Not a member? 
    <a href="create_acount.html">Sign Up</a>
    </p> 
  </div>
</div>
</div>
</body>
</html>