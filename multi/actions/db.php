<?php
error_reporting( ~E_DEPRECATED & ~E_NOTICE );
# use function PHPSTORM_META\map;

class Database{

public $db_host = "localhost";
public $db_name = "booking"; //change database 
public $db_user = "root";
public $db_pw = "";
public $connection = '';


public function connect(){
    //the @sign will remove any warnings from mysqli
    $this->connection =@mysqli_connect($this->db_host,$this->db_user,$this->db_pw,$this->db_name);


    //old: $connect = new  mysqli($localhost, $username, $password, $dbname);
    //old: check connection
    if($this->connection->connect_error) {
    die("connection failed: " . $this->connection->mysqli_error());
} else {
    echo "Successfully Connected";
}

// if  ( !$conn ) {
//     die("Connection failed : " . mysqli_error());
//    }



}


public function read($table, $fields='*',$join='',$where='',$orderby=''){
    $this->connect();
    $fields = is_array($fields) ? implode (",", $fields) : $fields;
    $join = is_array($join) ? implode (" ", $join) : $join;
    $sql = "SELECT ".$fields." FROM ".$table." ".$join." ".$where." ".$orderby." ;";
    //echo $sql; //only for testing
    $result = $this->connection->query($sql); // is like: mysqli_query($conn,$sql) <=> $conn->query()
    //$return = $result->fetch_all(MYSQLI_ASSOC); //just for more than one result
if ($result->num_rows == 0){
    $row = "No result";
}else if (($result->num_rows == 1)){
    $row = $result->fetch_assoc();
}else{
    $row = $result->fetch_all(MYSQLI_ASSOC);
}
    mysqli_close($this->connection);
    return $row;
}

//example call the function
//read("users",array("first_name","last_name"));
//read("users","first_name");


//UPDATE tablename SET columnsanme = Values, col2 = val2, col3 = val3... conditions WHERE...

//$set = array ('colName' => value1, 'colName2' => value2)

//END OF VIDEO 1


public function update ($table,$set,$condition){
    $this->connect();
    $sql = '';
    $where= '';

    foreach ($set as $key => $value){
        //1stloop: $sql = '' -->  $sql = first_name = 'serri'
        // $sql = first_name = 'serri'-->  $sql = first_name = 'serri' ,
        //2nd loop: $sql = first_name = 'serri' , -->  first_name = 'serri' , last_name = ghiath

        if($sql != ''){
            $sql .=", ";
        }
        if(is_numeric($value)){
            $sql .= $key . "=".$value;
        }else{
            $sql .= $key . "='".$value. "'";
        }
    
    }

    foreach($condition as $key => $value){
        if($where != ''){
            $where .=" AND ";
        } 
        if(is_numeric($value)){ //no quotation needed - just for string
            $where .= $key . "=" . $value ;
        }else{
            $where .= $key . "='" . $value . "'";
        }
    }
  echo $sql = "UPDATE ".$table." SET ".$sql." WHERE ".$where.";";
    //$sql = "UPDATE users SET first_name = 'ghiat', last_name = 'serri', age = 30 WHERE user_id = 1";
    $this->connection->query($sql);
    mysqli_close($this->connection);
}


//INSERT INTO tableName (col1, col2, col3) VALUES ('val1', 'val2', val3);
public function insert ($table,$fields,$values){
    $this->connect();
    $fields = is_array($fields) ? implode (",", $fields) : $fields;
    //$values = implode("','", $values);
    $sql = '';
    if (is_array($values)){
        foreach ($values as $value){
            if ($sql != ''){
                $sql .=", ";
            }
            if (is_numeric($value)){
                $sql .=" ".mysqli_real_escape_string($this->connection,$value)." ";
            }else{
                $sql .="'".mysqli_real_escape_string($this->connection,$value)."'";
            }

        }
        }   
        else{
            $sql = $values;

        }

        echo $sql = "INSERT INTO ".$table." (".$fields.") VALUES (".$sql.");";
        $res = $this->connection -> query($sql);
        echo "<hr>success<hr>";
        mysqli_close($this->connection);

    }

    //DELETE FROM table user where userid = 4;
    //possible calling delete('users', array ('userID' => $_GET['id'], 'first_name'=> $_POST['first_name]))
    public function delete ($table,$condition){
        $this->connect();
        $sql='';
        foreach ($condition as $key => $value) {
        if($sql != ''){
          $sql .=" AND ";
         }
         if(is_numeric($value)){
             $sql .= $key . "=" . $value ;
         }else {
             $sql .= $key . "='" . $value . "'";
         }
         }     
      echo  $sql="DELETE FROM ".$table." WHERE ".$sql;    
        $result = $this->connection->query($sql);
        mysqli_close($this->connection);
    }

}


////////////////////////////////////////////////// CALLING ///////////////

//insert check
$obj = new Database ();
// $obj->insert('car',array('model','type','color','image','available'),array('VW','Beetle','brown','beetle.jpg',1));
// $obj->insert('car',array('model','type','color','image','available'),array('Ford','Ecosport','white','ford.jpg',1));


//read check
//$rows = $obj->read('car');
// foreach ($rows as $row){
//     echo $row['model']."<br>";
// }
#var_dump($rows);

//update
//update car set color=green where carID = 5

//check with SERRI: if just one condition
//update car set color=green where carID = 5
//$obj->update('car', array('color'=>'blue', 'model'=> 'Batmobil'),array('car_id' => 5));



// delete: check
// $obj->delete('car', array('car_id'=> 5, 'model'=>'VW')) ;

//$obj->delete('car',array('car_id' => 6)); 

?>