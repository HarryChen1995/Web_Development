<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Sessions index.php</title>
</head>
<body>
<?php
// Leave this alone, it is complete enough
require_once 'BankAccount.php';
session_start ();

// TODO 7: Show the crazy transaction that only deposits 22.22
if (isset ( $_SESSION ['user'] ))
  $_SESSION['account']->deposit ( 22.22 );

header ( 'Location: index.php' );
?>
</body>
</html>
