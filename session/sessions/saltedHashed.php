<?php
$pwd = '1234'; // Actually comes from the login form
$hash = password_hash($pwd, PASSWORD_DEFAULT);
echo password_verify('A' . $pwd, $hash) . PHP_EOL; // false, no output
echo password_verify($pwd, $hash) . PHP_EOL; // true, output 1
?>