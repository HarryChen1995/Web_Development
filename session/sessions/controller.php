<?php
// This file contains a bridge between the view and the model
// and redirects back to the proper page with after processing
// whatever form this code absorbs. The C in MVC (Controller)
//
// Author: Rick Mercer
//
session_start ();

// TODO 2: Let one user login: (Rick, 1234) or go back to login.php and show
// one error message Avoid undefined indexes with isset. You can also tell
// which form was submitted to get here.
unset($_SESSION['loginError'] );

if(isset($_POST['ID'])  && isset($_POST['password'])) {
   // See if we can log in. Avoid database needs by only allowing 
   // 'Rick' to login with password = '1234'
  if($_POST['ID'] === 'Rick'  && $_POST['password'] === '1234') {
     $_SESSION['user'] = 'Rick';
     header('Location: index.php');
   }
   else {
     $_SESSION['loginError'] = 'Invalid credentials. Try Rick and 1234';
     header('Location: login.php');
   }    
}

// TODO 9: Unset everything upon logout
// Avoid undefined indexes with isset
if (isset ( $_POST ['logout'] ) && $_POST ['logout'] === 'Logout') {
  session_destroy ();
  header ( 'Location: index.php' );
}


// else 
//   header ( 'Location: index.php' );

if (isset ( $_POST ['action'] ) && $_POST ['action'] === 'Transact') {
  header ( 'Location: transact.php' );
}
?>