<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<title>University</title>
<link href="styles.css" rel="stylesheet" type="text/css">
</head>
<body class="B1">
<div class="banner"></div>
<Button type="button" class="YS" onclick="location.href='yourschedule.php'">Your Class Schedule</Button>
<Button type="button" class="YS" onclick="logout()">Logout</Button> 
<div class="student">
<?php 
session_start();
echo "<h2>Welcome "."".$_SESSION['username']."</h2>";
echo "<b>Student ID: ".$_SESSION['userid']."</b><br>";
echo  "<b>Email: ".$_SESSION['useremail']."</b><br>";
?>
</div>
<br><br><br><br><br><br><br><br>
<div id="allclass">
</div>



<script>
showclass();

function convertTime(str){
    var strr="";

    strr=str[0]+str[1]+":"+str[2]+str[3]+"-"+str[4]+str[5]+":"+str[6]+str[7];
    return strr;
	
}



function showclass(){
var Ajax=new XMLHttpRequest();
var str="";
var arr=[];
Ajax.open("GET", "controller.php?showclass=1", true);
Ajax.send();
Ajax.onreadystatechange=function(){
	if(Ajax.readyState == 4 && Ajax.status == 200){
		arr=JSON.parse(Ajax.responseText);
		 for (i=0;i<arr.length;i++){
		        str+='<div class="eachclass">'+'<b>ECE'+arr[i]['id']+'</b>&nbsp;&nbsp;&nbsp;'+arr[i]['name']+'&nbsp;&nbsp;&nbsp;';
		        str+='<b>Room:</b> '+arr[i]['location']+'&nbsp;&nbsp&nbsp'+'<b>Instructor:</b> '+arr[i]['first_name']+' '+arr[i]['last_name']+'&nbsp;&nbsp;&nbsp;';
		        str+='<b>Time:</b> '+convertTime(arr[i]['time'])+'&nbsp;'+'<b>Unit:</b> '+arr[i]['unit']+'<br><br><br>';
		        str+='<button class="CB" type="button" onclick="enrollclass(' + arr[i]['id'] + ')">Enroll</button></div>';
		    }
		    document.getElementById("allclass").innerHTML=str;
		}
 	}
}



function enrollclass(class_id){
	var Ajax=new XMLHttpRequest();
	Ajax.open("GET", "controller.php?class_id="+class_id+"&student_id="+"<?php echo $_SESSION['userid']?>", true);
	Ajax.send();
	Ajax.onreadystatechange=function(){
		if(Ajax.readyState == 4 && Ajax.status == 200){
			window.alert(Ajax.responseText);
		}
	}
}
function logout(){
	var Ajax=new XMLHttpRequest();
	Ajax.open("GET", "controller.php?logout=1", true);
	Ajax.send();
	Ajax.onreadystatechange=function(){
		if(Ajax.readyState == 4 && Ajax.status == 200){
			location.href='index.php';
		}
	}
}

</script>





</body>
</html>
