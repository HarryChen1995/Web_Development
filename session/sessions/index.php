<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Sessions index.php</title>
</head>
<body>
<?php
// Need this 'include' anywhere class BankAccount is used
require_once './BankAccount.php';
// TODO 0: Explain session_start();
// Need session_start in every file using $_SESSION.  If you do not include
// it, you will get a silent error (does not work, but no error message)
session_start ();

// TODO 1: Build an ugly menu system with hrefs, a place to start
?>
<h2>Bank Teller</h2>
	<a href="login.php">Login</a>
	<br>
	<a href="transact.php">Transaction</a>

<?php
// TODO 4: Set a new BankAccount as $_SESSION variable
// We will make this BankAccount available to all pages when 
// the first time this php file is loaded
if(! isset($_SESSION['account']))
    $_SESSION['account'] = new BankAccount(0.00);
?> 

  <br> <br>
  <!-- Clicking logout button goes the controller 
       where $_SESSION['user'] will be unset -->
	<form action="controller.php" method="POST">
		<input type="submit" name="logout" value="Logout">
	</form>
<br>

<?php
 // TODO 8: Show the current balance and user name if someone is logged in 
 if(isset($_SESSION['user'])) {
   echo '<h4>Hello ' . $_SESSION['user'] . '</h4>';
   echo '<h4>Current Balance ' . $_SESSION['account']->getBalance() . '</h4>';
 }
?>
  
</body>
</html>