<?php 

include "model.php";

$arr=$theDBA->getAllRecords($_GET['select']);

echo json_encode($arr);

?>