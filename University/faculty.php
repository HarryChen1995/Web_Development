<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<title>University</title>
<link href="styles.css" rel="stylesheet" type="text/css">
</head>

<body class="Home">

<div class="fheader">
<img class="Logo2" src="images/image1.png" alt="Univeristy Logo">
<Button type="button" class="pHome" onclick="location.href='index.php'">Home Page</Button>
</div>
<div id="plist" class="professor">
</div>







<script>
showprofessor();
function showprofessor(){
	var Ajax=new XMLHttpRequest();
    var arr=[]; 
    var i=0;
    var plist=document.getElementById("plist");
        plist.innerHTML="";
	Ajax.open("GET", "controller.php?showprofessor=1", true);
	Ajax.send();
	Ajax.onreadystatechange=function(){
		if(Ajax.readyState == 4 && Ajax.status == 200){
		    arr=JSON.parse(Ajax.responseText);
		    for(i=0;i<arr.length;i++){
		    plist.innerHTML+='<div class="Pro">'+'<p><b>'+arr[i]['first_name']+'&nbsp'+arr[i]['last_name']+'</b></p>'+'<p>Assistant Professor</p>'+'<p>'+arr[i]['email']+'<p>'+'</div>';
        
			
			}
		  }
     }
	
}

</script>















</body>
</html>