<?php
// CSC 337 Project Best Reads
//
// 1) Use a query parameter from AJAX to echo back an array of image urls. 
// To return an array to a JavaScript you need json_encode. Do not hard 
// code the array. This service should work if more folders are added.
if($_GET["book"]=="nothing"){
$urls =glob('./books/*', GLOB_ONLYDIR);


for($i=0;$i<sizeof($urls);$i++){
	$array[$i] = $urls[$i];
}

echo json_encode ( $array );
}
// Output would be this (json_encode adds an escape character: \ before /
// [".\/books\/2001spaceodessy",".\/books\/wizardofoz"]


// 2) Use a different query parameter to echo back the html for one information
// page containing the book cover, title, author, ...


if($_GET["book"]!="nothing"){
$book=$_GET["book"];
$result='<div style="height:320px;margin:20px 40px;padding:10px;box-shadow:0px 0px 20px grey;border-radius:5px;background-color: #fefcf1">';
$result.='<img src="'.$book.'/cover.jpg" style="margin:20px">';
$filelocation=$book.'/info.txt';
$arr=file($filelocation);
$result.='<b>'.$arr[0].'</b><br>';
$result.=$arr[1];
$result.='<br><br>';
$result.=file_get_contents($book.'/description.txt');
$result.='<br><br>';
$filelocation=$book.'/review.txt';
$array=file($filelocation);

$result.='<b>'.$array[0];

for($i=0;$i<$array[1];$i++){
	$result.='*';
}
$result.='</b><br>';
$result.=$array[2];
$result.='</div>';
echo $result;

}



?>