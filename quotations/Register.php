<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<title>Register Account</title>
<link href="styles.css" rel="stylesheet" type="text/css">
</head>
 <body>
 <h1>Register</h1>
 <div class="RegisterDiv">
   <form action="controller.php" method="post">
    <b>Username</b><input class="reginput1" type="text" name="User"><br><br>
    <b>Password</b><input class="reginput2" type="password" name="Password">
    <input class = "reginput3" type="submit" value="Register">
    </form>
    <?php 
    if(isset($_GET['Error2'])){
    	echo  '<br><b>'.$_GET['Error2'].'</b>';
    }
     ?>
 </div>
 
 
 
</body>
</html>