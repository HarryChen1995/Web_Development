<?php

$arr =array("cool"=>"Used to express aprroval, admiration,etc.He got the job? Cool!",
            "anime"=>"a style of Japanese film and television animation, typically aimed at adults as well as children.",
            "ajax"=>"Ajax is a client-side script that communicates to and from a server/database without the need for a postback or a complete page refresh.",
            "bro"=>"Brother (used before a first name when referring in writing to a member of a religious order of men).",
            "fnord"=>"A fnord is a propaganda word conditioned in the masses from a very young age to respond to, usually with fear");


$q=$_GET["enter"];

if(($q==="cool")||($q==="anime")||($q==="ajax")||($q==="bro")||($q==="fnord")){
	
	echo "<b>".$q."</b>:".$arr[$q];
	
}

else {
	
	echo "<b>".$q."</b>:not found in my small dictionary";
	
	
}

?>