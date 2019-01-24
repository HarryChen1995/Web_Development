<!DOCTYPE html>
<html>
<head>
<!-- Your Name -->
<title>Movie Reviews</title>
<meta charset="utf-8" />
<link href="movies.css" type="text/css" rel="stylesheet" />
</head>
<body>

<?php
include 'functions.php';
$movieFolder = $_GET['movie'];

 

 $result='<div class="banner">';
 $result.='<img src="images/rancidbanner.png" alt="Rancid Tomatoes"style="height: 50px">';
	
 $result.='</div>';

 
 
 $fileLocation=$movieFolder.'/info.txt';
 $fileArray = file($fileLocation);
 
 
 
 
 $result.='<h1>'.substr($fileArray[0],0,strlen($fileArray[0])-1).'('.substr($fileArray[1],0,strlen($fileArray[1])-1).')'.'</h1>';
 $result.='<div class="overall">';
  
 $result.='<div class="rotten">';

 
 if((int)$fileArray[2]<50){
 $result.='<img src="images/rottenlarge.png" alt="Rotten" style="height: 83px" />';
 }
 else {
 	$result.='<img src="images/freshlarge.png" alt="Rotten" style="height: 83px" />';
 }
 $result.='<span class="s1">'.$fileArray[2].'%</span>';
 $result.='</div>';

 $result.='<div>';
 $result.='<img src="'.$movieFolder.'/overview.png" alt="general overview" style="display: block" />';
 $result.='</div>';




 if($movieFolder==="tmnt"){
 	$Reviewfilecount=8;
 }
 
 if($movieFolder==="tmnt2"){
 	$Reviewfilecount=11;
 }
 
 if($movieFolder==="mortalkombat"){
 	$Reviewfilecount=9;
 }
 
 if($movieFolder==="princessbride"){
 	$Reviewfilecount=7;
 }
 
 
 $result.='<div class="div2">';
 
 
 $result.='<div class="p1">';
 
 
 for($i=0;$i<$Reviewfilecount;$i++){
				
				
	if((($i+1)%2)!=0){
				
				$arr = file ( $movieFolder.'/review'.($i+1).'.txt' );
				
				if(count($arr)==4){
				
		$result.='<p class="quote"><img src="images/'.strtolower(substr($arr[1],0,strlen($arr[1])-1)).'.gif" alt="Rotten" style="float: left" /><q>';
		$result.=substr($arr[0],0,strlen($arr[0])-1).'</q></p>';
				

				
		  $result.='<p><img src="images/critic.gif" alt="Critic" style="float: left" />';
		  $result.= $arr[2].'<br/><i>'.$arr[3].'</i></p>';
				}
				
				
		if(count($arr)==3){
					
			$result.='<p class="quote"><img src="images/'.strtolower(substr($arr[1],0,strlen($arr[1])-1)).'.gif" alt="Rotten" style="float: left" /><q>';
			$result.=substr($arr[0],0,strlen($arr[0])-1).'</q></p>';
					
					
					
					$result.='<p><img src="images/critic.gif" alt="Critic" style="float: left" />';
					$result.= $arr[2].'</p>';
				}
				
				
				
	}

 }


		$result.='</div>';

		
		
		$result.='<div class="p2">';
		
		
		for($i=0;$i<$Reviewfilecount;$i++){
			
			
			if((($i+1)%2)==0){
				
				$arr = file ( $movieFolder.'/review'.($i+1).'.txt' );
				
				if(count($arr)==4){
					
					$result.='<p class="quote"><img src="images/'.strtolower(substr($arr[1],0,strlen($arr[1])-1)).'.gif" alt="Rotten" style="float: left" /><q>';
					$result.=substr($arr[0],0,strlen($arr[0])-1).'</q></p>';
					
					
					
					$result.='<p><img src="images/critic.gif" alt="Critic" style="float: left" />';
					$result.= $arr[2].'<br/><i>'.$arr[3].'</i></p>';
				}
				
				
				if(count($arr)==3){
					
					$result.='<p class="quote"><img src="images/'.strtolower(substr($arr[1],0,strlen($arr[1])-1)).'.gif" alt="Rotten" style="float: left" /><q>';
					$result.=substr($arr[0],0,strlen($arr[0])-1).'</q></p>';
					
					
					
					$result.='<p><img src="images/critic.gif" alt="Critic" style="float: left" />';
					$result.= $arr[2].'</p>';
				}
			}
			
		}
		
		
		$result.='</div></div>';
		
		
		
		
		
		
		

		$result.='<div class="div3">';

		$result.=definitionList($movieFolder);

		$result.='</div></div>';







		echo $result;


?>
















</body>
</html>