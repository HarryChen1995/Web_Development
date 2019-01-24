<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<title>Student Login</title>
<link href="styles.css" rel="stylesheet" type="text/css">
</head>

<body class="Home">

<div class="sheader">
<img class="Logo3" src="images/image1.png" alt="Univeristy Logo">
<Button type="button" class="pHome" onclick="location.href='index.php'">Home Page</Button>
</div>
<div class="Enroll">
    <div class="Enroll2">
    <form  action="controller.php" method="post">
    <b>Email</b><input class="enrollinput2" type="text" name="Email" required><br><br>
    <b>Password</b><input class="enrollinput3" type="password" name="password" required><br><br>
    <input class = "enrollinput4" type="submit" value="Login">
   </form>
   <?php  
   
     if(isset($_GET['Error2'])){
     	
     	echo '<b>'.$_GET['Error2'].'</b>';
     }
   	
   	
   	
   	?>
   </div>
</div>



</body>
</html>