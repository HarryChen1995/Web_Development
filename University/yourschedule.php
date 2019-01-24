<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<title>University</title>
<link href="styles.css" rel="stylesheet" type="text/css">
</head>
<body class="B1">
<div class="banner"></div>
<Button type="button" class="YS" onclick="location.href='studentmenu.php'">Go Back</Button>
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
<div id="table">
</div>



<script>
showschedule();
function convertTime(str){
    var strr="";

    strr=str[0]+str[1]+":"+str[2]+str[3]+"-"+str[4]+str[5]+":"+str[6]+str[7];
    return strr;
	
}

function showschedule(){

	var Ajax=new XMLHttpRequest();
	var str="";
	var unit=0;
	var arr=[];
	Ajax.open("GET", "controller.php?showschedule=1&SID="+<?php echo $_SESSION['userid'] ?>, true);
	Ajax.send();
	Ajax.onreadystatechange=function(){
		if(Ajax.readyState == 4 && Ajax.status == 200){
			arr=JSON.parse(Ajax.responseText);
			  str+='<table class="T">';
			  str+='<tr><th>Class#</th><th>Room</th><th>Instructor</th><th>Time</th><th>Unit</th></th><th>Drop</th></tr>';
			 for (i=0;i<arr.length;i++){
			        str+='<tr><td>'+'<b>ECE'+arr[i]['id']+'</b>&nbsp;&nbsp&nbsp'+arr[i]['name']+'</td>';
			        str+='<td>'+arr[i]['location']+'</td>'+'<td>'+arr[i]['first_name']+' '+arr[i]['last_name']+'</td>';
			        str+='<td>'+convertTime(arr[i]['time'])+'</td>'+'<td>'+arr[i]['unit']+'</td><td> <Button type="button" class="DB" onclick="dropclass('+ arr[i]['id']+')"><b>drop this class</b></Button></td></tr>';
			        unit+=parseInt(arr[i]['unit']);
			    }
			    str+='</table>'
				str+='<h2 class="unit">Your total unit: '+unit.toString()+'</h2>';    
			    document.getElementById("table").innerHTML=str;
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


function dropclass(classid){

	var Ajax=new XMLHttpRequest();
	Ajax.open("GET", "controller.php?drop=1&CID="+classid+"&sd="+<?php echo $_SESSION['userid'] ?>, true);
	Ajax.send();
	Ajax.onreadystatechange=function(){
		if(Ajax.readyState == 4 && Ajax.status == 200){
			 showschedule();
		}
	}
}

</script>

</body>
</html>