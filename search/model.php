<?php
//
// Author: Hanlin Chen.   File name: model.php
//
class DatabaseAdaptor {
  // The instance variable used in every one of the functions in class DatbaseAdaptor
  private $DB;

  // Make a connection to an existing data based named 'first' that has table customer
  public function __construct() {
    $db = 'mysql:dbname=imdb_small; charset=utf8; host=127.0.0.1';
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
  public function getAllRecords($select) {
  	if($select=="Actors"){
    $stmt = $this->DB->prepare ( "SELECT * FROM actors" );
  	}
  	if($select=="Roles"){
  		$stmt = $this->DB->prepare ( "SELECT * FROM roles" );
  	}
    $stmt->execute ();
    // fetchall returns all records in the set as an array
    return $stmt->fetchAll ( PDO::FETCH_ASSOC );
  }
 } // End class DatabaseAdaptor

$theDBA = new DatabaseAdaptor();
// Do not put any other echo, print, or print_r here.

?>