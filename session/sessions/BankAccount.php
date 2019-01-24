<?php   
// File Name: BankAccount.php
// A simple PHP class used as part of the model.
// Other pages will deposit money to the one BankAccount object.
class BankAccount {
	
  private $balance;
	
	// Assigning the values
	public function __construct($initBalance) {
		$this->balance = $initBalance;
	}
	
	public function getBalance() {
		return $this->balance;
	}
	
	public function deposit($amount) {
		$this->balance += $amount;
	}
	
	public function withdraw($amount) {
		$this->balance -= $amount;
	}	
}
?>