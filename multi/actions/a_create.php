<?php 

require_once 'db_connect.php';

if ($_POST) {
   $brand = $_POST['brand'];
   $available = $_POST['available'];
   $image = $_POST['image'];
   $location = $_POST['location'];
   $price = $_POST['price'];
   $year = $_POST['year'];

   $sql = "INSERT INTO car (brand, available, image, location, price, year) VALUES ('$brand', '$available', '$image','$location', '$price', '$year')";
    if($connect->query($sql) === TRUE) {
       echo "<p>New Record Successfully Created</p>" ;
       echo "<a href='../create.php'><button type='button'>Back</button></a>";
        echo "<a href='../index.php'><button type='button'>Home</button></a>";
   } else  {
       echo "Error " . $sql . ' ' . $connect->connect_error;
   }

   $connect->close();
}

?>