<?php 

include "model.php";

$arr=$theDBA->getAllRecords();

echo json_encode($arr);

?>