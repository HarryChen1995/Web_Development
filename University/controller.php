<?php 

include "model.php";
 session_start();

 
 
 
 function checkconflict($t1,$t2,$T1,$T2){
 
 	     
 	    if($t1<$T2&&$t1>=$T1){
 	    	return true;
 	    }
 	    if($t2>$T1&&$t2<=$T2){
 	    	return true;
 	    }
 	return false;
  }


 
  

if(isset($_POST['firstname'])&&isset($_POST['lastname'])&&isset($_POST['email'])&&isset($_POST['pwd'])){
	
	if($theDBA->checkstudentexsit($_POST['firstname'],$_POST['lastname'],$_POST['email'])==false){
		
		$theDBA->addstudent($_POST['firstname'],$_POST['lastname'],$_POST['email'],$_POST['pwd']);
		header('Location:index.php');
	}
	else{
		header ('Location: studentenroll.php?Error1=Student already enrolled !');
	}
	
}


if(isset($_POST['Email'])&&isset($_POST['password'])){
	
	if($theDBA->studentlogin($_POST['Email'],$_POST['password'])==true){
		$arr=$theDBA->getstudentnameidbyemail($_POST['Email']);
		$_SESSION['useremail']=htmlspecialchars($_POST['Email']);
		$_SESSION['userid']=$arr[0]['id'];
		$_SESSION['username']=$arr[0]['firstname']." ".$arr[0]['lastname'];
		header('Location:studentmenu.php');
	}
	else{
		header ('Location: studentlogin.php?Error2=User does not exist !');
	}
	
}






if(isset($_POST['professor_email'])&&isset($_POST['professor_password'])){
	
	if($theDBA->professorlogin($_POST['professor_email'],$_POST['professor_password'])==true){
		$arr=$theDBA->getprofessornameidbyemail($_POST['professor_email']);
		$_SESSION['useremail']=htmlspecialchars($_POST['professor_email']);
		$_SESSION['userid']=$arr[0]['id'];
		$_SESSION['username']=$arr[0]['first_name']." ".$arr[0]['last_name'];
		header('Location:professormenu.php');
	}
	else{
		header ('Location:professorlogin.php?Error3=User does not exist !');
	}
	
}






if(isset($_GET['showclass'])){
	
	echo json_encode($theDBA->showallclass());
}



if(isset($_GET['showrouster'])&&isset($_GET['professorid'])){
	
	echo json_encode($theDBA->getenrollstudentbyprofessorid($_GET['professorid']));
}




if(isset($_GET['showschedule'])&&isset($_GET['SID'])){
	echo json_encode($theDBA->getstudentschedule($_GET['SID']));
}

if(isset($_GET['showprofessor'])){
	echo json_encode($theDBA->getallprofessor());
}


if(isset($_GET['class_id'])&&isset($_GET['student_id'])){
	$flag=0;
	$str="";
	$enrolltime=$theDBA->getallenrolltime($_GET['student_id']);
	$time=$theDBA->gettimebyclassid($_GET['class_id']);
	
	
	for($i=0;$i<count($enrolltime);$i++){
		if(checkconflict($enrolltime[$i]['TIME1'], $enrolltime[$i]['TIME2'], $time[0]['TIME1'], $time[0]['TIME2'])){
			$str.="ECE".$_GET['class_id']." conflict with enrolled ECE".$enrolltime[$i]['id']."!\n";
			$flag++;
		}
	}
	
	if($theDBA->checkifenroll($_GET['class_id'],$_GET['student_id'])==false){
		if($flag==0){
			
			
			$theDBA->enroll($_GET['class_id'],$_GET['student_id']);
			
			echo "You successfully enroll ECE".(string)($_GET['class_id'])."!";
		}
		else{
			echo $str;
		}
			
	}
	

	else{
		echo "You already enrolled ECE".(string)($_GET['class_id'])."! Pick a different class";
	}
 
  
}





if(isset($_GET['drop'])&&isset($_GET['CID'])&&isset($_GET['sd'])){
	
	$theDBA->dropclass($_GET['sd'], $_GET['CID']);
	
}





if(isset($_GET['logout'])){
	
	unset($_SESSION['useremail']);
	unset($_SESSION['userid']);
	unset($_SESSION['username']);
	session_destroy();
}










?>