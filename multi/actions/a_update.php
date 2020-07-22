<?php 

require_once 'db.php';
#require_once 'db_connect.php';

if ($_POST) {
   $model = $_POST['model'];
   $available = $_POST['available'];
   $image = $_POST['image'];
   $color = $_POST['color'];
   $type = $_POST['type'];


   $car_id = $_POST['car_id'];

   // $sql = "UPDATE car SET brand = '$brand', available = '$available', image = '$image', location = '$location', price = '$price', location = '$location' WHERE car_id = {$car_id}" ;
   // if($connect->query($sql) === TRUE) {
   //     echo  "<p>Successfully Updated</p>";
   //     echo "<a href='../update.php?car_id=" .$car_id."'><button type='button'>Back</button></a>";

        echo  "<a href='../index.php'><button type='button'>Home</button></a>";
   // } else {
   //      echo "Error while updating record : ". $connect->error;
   // }

   // $connect->close();


   //

   $obj->update('car', array('model'=>$model, 'available'=> $available,'image'=>$image,'color'=>$color,'type'=>$type),array('car_id'=> $car_id ));


}

?>
