<?php
//
// Author: Hanlin Chen.   File name: model.php
//
class DatabaseAdaptor {

  private $DB;

 
  public function __construct() {
    $db = 'mysql:dbname=university; charset=utf8; host=127.0.0.1';
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


  public function getallprofessor() {
    $stmt = $this->DB->prepare ( "SELECT * FROM professor" );
    $stmt->execute ();
 
    return $stmt->fetchAll ( PDO::FETCH_ASSOC );
  }
  
  public function setprofessorpwd($pwd,$id){
  	$pass=password_hash($pwd, PASSWORD_DEFAULT);
  	$stmt = $this->DB->prepare ( "UPDATE professor SET hash=:pwd WHERE id=:ID");
  	$stmt->bindParam(':pwd', $pass);
  	$stmt->bindParam(':ID',$id);
  	$stmt->execute ();
   }
   
   public function getallstudent(){
   	$stmt = $this->DB->prepare ( "SELECT * FROM student" );
   	$stmt->execute ();
   	
   	return $stmt->fetchAll ( PDO::FETCH_ASSOC );
   }
   public function checkstudentexsit($firstname,$lastname,$email){
   
   	$arr=$this->getallstudent();
   	for($i=0;$i<count($arr);$i++){
   		if((htmlspecialchars($firstname)==$arr[$i]['firstname'])&&(htmlspecialchars($lastname)==$arr[$i]['lastname'])&&(htmlspecialchars($email)==$arr[$i]['email'])){
   		  return true;
   		}
   	}
    return false;
 }
   
 public function addstudent($firstname,$lastname,$email,$pwd){
 	$pass=password_hash($pwd, PASSWORD_DEFAULT);
 	$stmt = $this->DB->prepare('INSERT INTO student ( firstname, lastname, email, hash )'.
 			'VALUES (:f,:l,:e,:h)');
 	$stmt->bindParam(':f', htmlspecialchars($firstname));
 	$stmt->bindParam(':l', htmlspecialchars($lastname));
 	$stmt->bindParam(':e', htmlspecialchars($email));
 	$stmt->bindParam(':h', htmlspecialchars($pass));
 	$stmt->execute();
 	
  }
   
   
   
   public function studentlogin($email,$pwd){
   	
   	$arr=$this->getallstudent();
   	for($i=0;$i<count($arr);$i++){
   		if((htmlspecialchars($email)==$arr[$i]['email'])&&password_verify(htmlspecialchars($pwd), $arr[$i]['hash'])){
   			return true;
   		}
   	}
   	 return false;
 }
   
   
  public function getstudentnameidbyemail($email){
  	$e=htmlspecialchars($email);
  	$stmt = $this->DB->prepare ( "SELECT id,firstname,lastname FROM student WHERE email=:e" );
  	        $stmt->bindParam(':e',$e);
  	$stmt->execute ();
  	
  	return $stmt->fetchAll ( PDO::FETCH_ASSOC );
  	
  }
   
   
  
  
  public function showallclass(){
  	
  	$stmt = $this->DB->prepare ("SELECT class.id,class.name,class.location,class.location,class.time,class.unit,".
  			                     "professor.first_name,professor.last_name FROM class JOIN professor ON class.professor_id=professor.id"
  			);
  	$stmt->execute();
  	
  	return $stmt->fetchAll ( PDO::FETCH_ASSOC );
  }
  
  
  
  
  public function getallenroll(){
  	$stmt = $this->DB->prepare("SELECT *  FROM enroll");
  	
  	$stmt->execute();
  	
  	return $stmt->fetchAll ( PDO::FETCH_ASSOC );
  }
  
  public function checkifenroll($class_id, $student_id){
  	  $arr=$this->getallenroll();
  	  for($i=0;$i<count($arr);$i++){
  	  	if($class_id==$arr[$i]['class_id']&&$student_id==$arr[$i]['student_id']){
  	  		return true;
  	  	}
  	  	
  	  }
  	  
  	 return false;  
  }
  
  public function enroll($class_id, $student_id){
  	$c=htmlspecialchars($class_id);
  	$s= htmlspecialchars($student_id);
  	$stmt = $this->DB->prepare("INSERT INTO enroll (class_id,student_id) VALUES ( :c, :s)");
  	$stmt->bindParam(':c', $c);
  	$stmt->bindParam(':s', $s);
  	$stmt->execute();
  	
  }
  
   
   
 public function getallenrolltime($id){
 	$ID=htmlspecialchars($id);
 	$stmt = $this->DB->prepare ("SELECT class.id, class.TIME1, class.TIME2 FROM class JOIN enroll ON enroll.class_id=class.id WHERE enroll.student_id= :id");
 	$stmt->bindParam(':id', $ID) ; 
 	$stmt->execute();
 	  return $stmt->fetchAll ( PDO::FETCH_ASSOC );
     }
   
     
     
     public function gettimebyclassid($id){
     	
     	$ID=htmlspecialchars($id);
     	$stmt = $this->DB->prepare ("SELECT TIME1, TIME2 from class WHERE id=:id");
     	$stmt->bindParam(':id', $ID) ;
     	$stmt->execute();
     	return $stmt->fetchAll ( PDO::FETCH_ASSOC );
      }
    
      
      
      public function getstudentschedule($studentid){
      	$ID=htmlspecialchars($studentid);
      	$stmt = $this->DB->prepare ("select class.id,class.name,class.location,class.time,class.time,class.unit,professor.first_name,professor.last_name from enroll join class on  enroll.class_id=class.id join professor on class.professor_id= professor.id where enroll.student_id=:ID"
      			                                             
      			);
      	$stmt->bindParam(':ID', $ID);
      	$stmt->execute();
      	
      	return $stmt->fetchAll ( PDO::FETCH_ASSOC );
      }
      
      
      
  public function dropclass($studentid,$classid){
  	$ID=htmlspecialchars($studentid);
  	$CD=htmlspecialchars($classid);
  	$stmt = $this->DB->prepare ("DELETE FROM enroll WHERE class_id=:CD AND student_id=:ID");
  	$stmt->bindParam(':CD', $CD);
  	$stmt->bindParam(':ID', $ID);
  	$stmt->execute();
  	
  }
      
 
  
  
  public function professorlogin($email,$pwd){
  	$arr=$this->getallprofessor();
  	for($i=0;$i<count($arr);$i++){
  		if((htmlspecialchars($email)==$arr[$i]['email'])&&password_verify(htmlspecialchars($pwd), $arr[$i]['hash'])){
  			return true;
  		}
  	}
  	return false;
  }
  
  
  
  public function getprofessornameidbyemail($email){
  	
  	$e=htmlspecialchars($email);
  	$stmt = $this->DB->prepare ( "SELECT id,first_name,last_name FROM professor WHERE email=:e" );
  	$stmt->bindParam(':e',$e);
  	$stmt->execute ();
  	
  	return $stmt->fetchAll ( PDO::FETCH_ASSOC );
  	
  }
  
  
  
  public function getenrollstudentbyprofessorid($id){
  	
  	$ID=htmlspecialchars($id);
  	$stmt = $this->DB->prepare ( "SELECT class.id, class.time, class.name, enroll.student_id, student.firstname, student.lastname, student.email  FROM class JOIN enroll on class.id = enroll.class_id JOIN student on enroll.student_id = student.id WHERE professor_id =:ID" );
  	$stmt->bindParam(':ID',$ID);
  	$stmt->execute ();
  	
  	return $stmt->fetchAll ( PDO::FETCH_ASSOC );
  	
   }
  
  
  
 } 
 


$theDBA = new DatabaseAdaptor();

?>