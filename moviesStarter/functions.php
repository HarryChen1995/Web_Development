<?php
// Name: Hanlin Chen 
function definitionList($folderName){
	
     $result='<dl>';
     
     $fileName=$folderName.'/overview.txt';
     $file=fopen($fileName,'r');
     
     while($line=fgets($file)){
     	
     	$colon=strpos($line,':');
     	$title=substr($line,0,$colon);
     	$data=substr($line,$colon+1);
     	$result.='<dt>'.$title.'</dt>';
     	$result.='<dd>'.$data.'</dd>';
     	
     }
     
     $result.='</dl>';
     return $result;
}

?>
