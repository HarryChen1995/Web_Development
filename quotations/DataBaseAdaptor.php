<?php
class DatabaseAdaptor {
  // The instance variable used in every one of the functions in class DatbaseAdaptor
  private $DB;

  // Make a connection to an existing data based named 'first' that has table customer
  public function __construct() {
    $db = 'mysql:dbname=quotes; charset=utf8; host=127.0.0.1';
    $user = 'root';
    $password = ''; 

    try {
      $this->DB = new PDO ( $db, $user, $password );
      $this->DB->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    } catch ( PDOException $e ) {
    echo ('Error establishing Connection');
      exit ();
    }
  }

  // Return all records as an associative array.
  public function getAllQuote() {
  	$stmt = $this->DB->prepare ( "SELECT * FROM quotations ORDER BY rating DESC");
    $stmt->execute ();
    // fetchall returns all records in the set as an array
    return $stmt->fetchAll ( PDO::FETCH_ASSOC );
  }
  
  
  public function getAllUser(){
  	$stmt = $this->DB->prepare ( "SELECT * FROM users");
  	$stmt->execute ();
  	// fetchall returns all records in the set as an array
  	return $stmt->fetchAll ( PDO::FETCH_ASSOC );
  }
  
  
  public function  setRating($ID,$Rating){
  	$stmt = $this->DB->prepare ( "UPDATE quotations SET rating = " . $Rating .
  			                     " WHERE id = " . $ID);
  	$stmt->execute ();
  	
  }
  
  
  
  public function  updateFlag($ID,$flag){
  	$stmt = $this->DB->prepare ( "UPDATE quotations SET flagged =".$flag.
  			" WHERE id = " . $ID);
  	$stmt->execute ();
  	
  }
  
  
  public function  unFlagAll(){
  	$stmt = $this->DB->prepare ( "UPDATE quotations SET flagged =false");
  	$stmt->execute ();
  	}
  
  
  public function addQuote($quote,$author){
  	
  	$stmt = $this->DB->prepare('INSERT INTO quotations ( added, quote, author,rating,flagged)'.
		                              'VALUES (CURRENT_TIMESTAMP,"' . $quote.'","'.$author.'",0,0)');
  	$stmt->execute();
  }
  	
  
  
  public function CheckUser($username){
  	  $Arr=$this->getAllUser();
  	  
  	  for($i=0;$i<count($Arr);$i++){
  	  	 if($username==$Arr[$i]['username']){
  	  	 	return false;
  	  	 }
  	  }
  	  
  	  return true;
  }
  
  
  public function MatchUser($username,$pwd){
  	   $Arr=$this->getAllUser();
  	   for($i=0;$i<count($Arr);$i++){
  	   	if($username==$Arr[$i]['username']&&password_verify($pwd,$Arr[$i]['hash'])){
  	   		return true;
  	   	}
  	   }
  	   
  	   return false;
  	
  }
  
  
  public function addUser($username,$pwd){
  	
  	$stmt = $this->DB->prepare('INSERT INTO users (username,hash)'.
  			'VALUES ("' .$username.'","'.password_hash($pwd, PASSWORD_DEFAULT).'")');
  	$stmt->execute();
  	
  }
  	
  	
  
 } // End class DatabaseAdaptor

 
 
 
 
 
 
$theDBA = new DatabaseAdaptor();
// Do not put any other echo, print, or print_r here.

?>