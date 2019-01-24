<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Login</title>
<link href="styles.css" rel="stylesheet" type="text/css">
</head>
 <body>
 <h1>Login</h1>
 <div class="LoginDiv">
   <form action="controller.php" method="post">
    <b>Username</b><input class="loginput1" type="text" name="Loguser"><br><br>
    <b>Password</b><input class="loginput2" type="password" name="Logpwd">
    <input class = "loginput3" type="submit" value="Login">
    </form>
    <?php 
    if(isset($_GET['Error3'])){
    	echo  '<br><b>'.$_GET['Error3'].'</b>';
    }
     ?>
 </div>
 
 
 
</body>
</html>