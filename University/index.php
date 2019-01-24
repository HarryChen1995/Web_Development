<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<title>University</title>
<link href="styles.css" rel="stylesheet" type="text/css">
</head>
 <body class="Home">
 
 
 
 <div class="HeaderImage">
 <img id="headerimg" class="headerpic" src="images/header1.png"  alt="headerpic">
 </div>
 <div class="main">
 <div class="welcome">
 <img class="Logo" src="images/image1.png" alt="Univeristy Logo">
 <Button type="button" class="Button" onclick="location.href='studentlogin.php'">Student Login</Button>
 <Button type="button" class="Button" onclick="location.href='professorlogin.php'">Professor Login</Button>
 <Button type="button" class="Button" onclick="location.href='studentenroll.php'">Student Enroll</Button>
 <Button type="button" class="Button" onclick="location.href='faculty.php'">Faculty</Button>
 </div>
 <div class="Introduction">
 <h2>&nbsp;&nbsp;ECE Bachelor's Degree Now Available Online</h2>
 <p class="P1"><img class="introPic" src="images/intro.png" alt="Intro">
 Juniors, seniors and transfer students are invited to apply to the SA new online bachelor degree in electrical and computer engineering, offered in fall 2017 through SA Online.
    Students with the appropriate prerequisites will have the opportunity to complete their degree on their own schedule, from anywhere! Explore advanced embedded systems, wireless technology, robotics and more.
    Required courses include introductory programming, chemistry, mechanics and thermodynamics, as well as mid-level circuits, digital logic and mathematics.</p>
  <hr>
  <p class="P1"><img class="introPic" src="images/intro2.png" alt="Intro">Electrical and computer engineering graduates have career opportunities in a number of industries and fields including, but not limited to, computing, telecommunications, manufacturing, maintenance, utilities, aerospace, automotive, defense/military, medical and consumer products. 
     Electrical and computer engineers also design and operate a wide array of complex technological systems, 
     such as power generation and distribution systems and modern computer-controlled manufacturing plants.
     The degree also provides an excellent background for graduate study in electrical or computer engineering as well as medicine and law.</p>
 </div>
 </div>
 
 
 
 
 
 
 
 
 
 <script>
 var headpic=[];
 headpic[0]="images/header1.png";
 headpic[1]="images/header2.png";
 headpic[2]="images/header3.png";
 headpic[3]="images/header4.png";
 headpic[4]="images/header5.png";

 setInterval(function(){
   var img=headpic[Math.floor(Math.random() * headpic.length)];
   document.getElementById("headerimg").src=img;  
 },2000);

 </script>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
</body>
</html>