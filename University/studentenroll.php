<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<title>University</title>
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
    <b>Fisrt Name</b><input class="enrollinput1" type="text" name="firstname" required><br><br>
    <b>Last Name</b><input class="enrollinput1" type="text" name="lastname"  required><br><br>
    <b>Email</b><input class="enrollinput2" type="text" name="email" required><br><br>
    <b>Password</b><input class="enrollinput3" type="password" name="pwd" required><br><br>
    <input class = "enrollinput4" type="submit" value="Enroll">
   </form>
   <?php  
   
     if(isset($_GET['Error1'])){
     	
     	echo '<b>'.$_GET['Error1'].'</b>';
     }
   	
   	
   	
   	?>
   </div>
</div>



</body>
</html>