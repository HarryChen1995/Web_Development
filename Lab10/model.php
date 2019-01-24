<?php
   //Name: Hanlin Chen
class DatabaseAdaptor {
  private $DB; // The instance variable used in every function
  // Connect to an existing data based named 'imdb_small'
  public function __construct() {
    $db = 'mysql:dbname=imdb_small; host=127.0.0.1; charset=utf8';
    $user = 'root';
    $password = ''; // an empty string
    try {
      $this->DB = new PDO ( $db, $user, $password );
      $this->DB->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    } catch ( PDOException $e ) {
      echo ('Error establishing Connection');
      exit ();
    }
  }
  public function getAllMoviesAndRoles() {
    // TODO 1: Complete this method
    $stmt = $this->DB->prepare ("
                         SELECT movies.name, actors.first_name, actors.last_name,roles.role FROM actors ".
                         "JOIN roles ON actors.id=roles.actor_id ".
    		             "JOIN movies ON movies.id=roles.movie_id; 

     ");
        
       
    $stmt->execute ();
    return $stmt->fetchAll ( PDO::FETCH_ASSOC );
  }
} // End class DatabaseAdaptor

$theDBA = new DatabaseAdaptor ();
$array = $theDBA->getAllMoviesAndRoles ();

//print_r($array);

// TODO 2: Output as specified in project
$movie=[];
for($i=0;$i<count($array);$i++){
	if(!in_array($array[$i]['name'], $movie)){
		array_push($movie,$array[$i]['name']);
	}
}

for($i=0;$i<count($movie);$i++){
	echo $movie[$i].PHP_EOL;
	for($j=0;$j<count($array);$j++){
		 if($movie[$i]==$array[$j]['name']){
		 	
		 	
		 	echo "   ".$array[$j]['first_name']." ".$array[$j]['last_name']."----".$array[$j]['role'].PHP_EOL;
		 	
		 }
	}
	echo PHP_EOL.PHP_EOL;
	
}

  

?>

