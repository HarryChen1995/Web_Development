<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<title>University</title>
<link href="styles.css" rel="stylesheet" type="text/css">
</head>
<body class="B1">
<div class="banner"></div>
<Button type="button" class="YS" onclick="logout()">Logout</Button> 
<div class="student">
<?php 
session_start();
echo "<h2>Welcome "."".$_SESSION['username']."</h2>";
echo "<b>Instructor ID: ".$_SESSION['userid']."</b><br>";
echo  "<b>Email: ".$_SESSION['useremail']."</b><br>";
?>
</div>
<br><br><br><br><br><br><br><br>
<div id="enrollstudent">
</div>



<script>
showallstudent();


function convertTime(str){
    var strr="";

    strr=str[0]+str[1]+":"+str[2]+str[3]+"-"+str[4]+str[5]+":"+str[6]+str[7];
    return strr;
	
}




function showallstudent(){

	var Class=[]
	var str="";
	var allenroll=[];
	var studentcount=0;
    var Ajax=new XMLHttpRequest();

	Ajax.open("GET", "controller.php?showrouster=1&professorid="+<?php echo $_SESSION['userid'] ?>, true);
	Ajax.send();
	Ajax.onreadystatechange=function(){
		if(Ajax.readyState == 4 && Ajax.status == 200){
			allenroll=JSON.parse(Ajax.responseText);
			 for (i=0;i<allenroll.length;i++){
                   if(Class.includes(allenroll[i]['id']+" "+allenroll[i]['name']+"  "+convertTime(allenroll[i]['time']))==false){
                       Class.push(allenroll[i]['id']+" "+allenroll[i]['name']+"  "+convertTime(allenroll[i]['time']));
                   }
	             }



                for (i=0;i<Class.length;i++){
                    studentcount=0;
                    str+='<h3>&nbsp;&nbsp;&nbsp;&nbsp;'+ Class[i]+'</h3>';
                    str+='<table class="T">';
      			    str+='<tr><th>Student ID</th><th>Name</th><th>Email</th></tr>';
      			    for(j=0;j<allenroll.length;j++){

      			    if(Class[i]==allenroll[j]['id']+" "+allenroll[j]['name']+"  "+convertTime(allenroll[j]['time'])){

                          str+='<tr><td><b>'+allenroll[j]['student_id']+'</b></td><td><b>'+allenroll[j]['firstname']+' '+allenroll[j]['lastname']+'</b></td><td><b>'+allenroll[j]['email']+'</b></td></tr>'         
                          studentcount++;
      			       }
                        
      			    }

      			  str+='</table><br>';
      			  str+='<h3 class="totalenroll">'+'Total Enroll: '+studentcount+'</h3><br><br>';

                }

             
             
			    document.getElementById("enrollstudent").innerHTML=str;
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