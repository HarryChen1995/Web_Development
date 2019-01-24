<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<title>Quotations</title>
<link href="styles.css" rel="stylesheet" type="text/css">
</head>
 <body>
 <h1 class="heading"><i>Quotations Service</i></h1>
 
 <div class="ButtonDiv">
    <Button type="button" class="Button" onclick="location.href='Register.php'">Register</Button> 
    <Button type="button" class="Button" onclick="location.href='Login.php'">Login</Button> 
    <Button type="button" class="Button" onclick="location.href='AddQuote.php'">Add Quote</Button> 
 </div>
 <div class="LogBox" id="logout">
 <?php 
 session_start();
 if(isset($_SESSION['UserAccount'])){
 	echo '<button type="button" class="B1" onclick="UnflagAll()">Unflag All</button> ';
 	echo '<button type="button" class="B2" onclick="LogOut()">Logout</button> ';
 }
 
 ?>
 </div>
 <div id="Quote"></div>
</body>

<script>

var quote=document.getElementById("Quote");
var Ajax=new XMLHttpRequest();
Showquote();

function Showquote(){

	Ajax.open("GET", "controller.php", true);
	Ajax.send();
	Ajax.onreadystatechange=function(){
		if(Ajax.readyState == 4 && Ajax.status == 200){
				printquote(Ajax);
			}
     	}
}

function printquote(Ajax){

    var arr=JSON.parse(Ajax.responseText);

    var str="";
    var i=0;
    console.log(arr);
    for (i=0;i<arr.length;i++){
           if(arr[i]['flagged']!=true){
                    str+='<div class="quote">';
                    str+='"'+arr[i]['quote']+'"'+'<br><br>';
                    str+='--'+arr[i]['author']+"<br><br>&nbsp;&nbsp;"
                    str+= '<button type="button"  id="IR" class="Rating"  onclick="IncRate(' +  arr[i]['id'] + ',' + i + ')">+</button>';
            		str+= '<div class ="RA" id= "R' + i + '">' + arr[i]['rating'] + '</div>';
            		str+= '<button type="button" id="DR" class="Rating"  onclick="DecRate(' + arr[i]['id'] + ',' + i + ')">-</button>&nbsp; &nbsp; &nbsp;';
            		str+= '<button type="button" onclick="setFlag(' + arr[i]['id'] + ')">Flag</button>';
            		str+= '</div>';
             }
       }
   console.log(str);
    quote.innerHTML=str;
    
}



function IncRate(Id,i){
   var rating=document.getElementById("R"+i);
       rating.innerHTML++;         
    	Ajax.open("GET", "controller.php?Rating="+rating.innerHTML+"&QuoteId="+Id, true);
	    Ajax.send();
	    Ajax.onreadystatechange=function(){
		if(Ajax.readyState == 4 && Ajax.status == 200){
				printquote(Ajax);
			}
     	}

}


function DecRate(Id,i){
	var rating=document.getElementById("R"+i);
    rating.innerHTML--;

  	Ajax.open("GET", "controller.php?Rating="+rating.innerHTML+"&QuoteId="+Id, true);
    Ajax.send();
    Ajax.onreadystatechange=function(){
	if(Ajax.readyState == 4 && Ajax.status == 200){
			printquote(Ajax);
		}
 	}
        	
}


function setFlag(Id){


  	Ajax.open("GET", "controller.php?flag=1"+"&QuoteId="+Id, true);
    Ajax.send();
    Ajax.onreadystatechange=function(){
	if(Ajax.readyState == 4 && Ajax.status == 200){
			printquote(Ajax);
		}
 	}
        	
}
	



function UnflagAll(){
	Ajax.open("GET", "controller.php?flag=0", true);
    Ajax.send();
    Ajax.onreadystatechange=function(){
	if(Ajax.readyState == 4 && Ajax.status == 200){
			printquote(Ajax);
		}
 	}
	
}


function LogOut(){

	Ajax.open("GET", "controller.php?Logout=1", true);
	Ajax.send();
	Ajax.onreadystatechange=function(){
		if(Ajax.readyState == 4 && Ajax.status == 200){
			  document.getElementById("logout").innerHTML="";
			}
     	}
}




</script>



</html>