<?php 

include"DataBaseAdaptor.php";

session_start();

$arr=$theDBA->getAllQuote();



if(isset($_GET['Addedquote']) && isset($_GET['author'])){
	if(strlen($_GET['Addedquote'])==0||strlen($_GET['author'])==0){
		header ('Location: AddQuote.php?Error1=Quote and author can not be empty');
	}
	
	else{
		$theDBA->addQuote($_GET['Addedquote'],$_GET['author']);
		$arr=$theDBA->getAllQuote();
		header ('Location:index.php');
	}
}



if(isset($_POST['User'])&&isset($_POST['Password'])){
	
	if(strlen($_POST['User'])==0){
		header('Location:Register.php?Error2=Account name can not be empty');
	}
	
	else if(strlen($_POST['Password'])==0){
		header('Location:Register.php?Error2=Password can not be empty');
	}
	else if(strlen($_POST['User'])<4){
		header('Location:Register.php?Error2=Account name has to be at least 4 characters');
	}
	else if(strlen($_POST['Password'])<6){
		header('Location:Register.php?Error2=Password has to be at least 6 digit or character long');
	}
	
	else if($theDBA->CheckUser($_POST['User'])==false){
		header('Location:Register.php?Error2=Account name already exists');
	}
	else{
		$theDBA->addUser($_POST['User'], $_POST['Password']);
        header ( 'Location: index.php' );
	}
}

if(isset($_POST['Loguser'])&&isset($_POST['Logpwd'])){
	
	if(strlen($_POST['Loguser'])==0){
		header('Location:Login.php?Error3=Username can not be empty');
	}
	
	else if(strlen($_POST['Logpwd'])==0){
		header('Location:Login.php?Error3=Password can not be empty');
	}
	
	else if($theDBA->MatchUser($_POST['Loguser'],$_POST['Logpwd'])==false){
		header('Location:Login.php?Error3=User name does not match password');
	}
	else {
		$_SESSION['UserAccount']=$_POST['Loguser'];
		header ( 'Location: index.php' );
	}
	
}






if(isset($_GET['Logout'])){
	unset($_SESSION['UserAccount']);
	session_destroy();
	header ('Location:index.php');
}







if(isset($_GET['QuoteId']) && isset( $_GET['Rating'])){

	$theDBA->setRating($_GET['QuoteId'], $_GET['Rating']);
	$arr = $theDBA->getAllQuote();
}

if(isset($_GET['QuoteId']) && isset( $_GET['flag'])){
	
	$theDBA->updateFlag($_GET['QuoteId'], $_GET['flag']);
	$arr = $theDBA->getAllQuote();
}

if(isset($_GET['flag'])&&($_GET['flag']==0)){
	$theDBA->unFlagAll();
	$arr = $theDBA->getAllQuote();
}






echo json_encode($arr);




?>