<?php 
ob_start();
session_start();
require_once 'actions/db_connect.php';

// if session is not set this will redirect to login page
if( !isset($_SESSION['admin' ]) && !isset($_SESSION['user'])) {
   header("Location: index.php");
   exit;
  }
  if(isset($_SESSION["user"])){
      header("Location: home.php");
      exit;
  }
  // select logged-in users details
  $res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['admin']);
  $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);

  //end login admin part

if ($_POST) {
   $car_id = $_POST['car_id'];

   $sql = "DELETE FROM car WHERE car_id = {$car_id}";
    if($connect->query($sql) === TRUE) {
       echo "<p>Successfully deleted!!</p>" ;
       echo "<a href='../admin.php'><button type='button'>Back</button></a>";
   } else {
       echo "Error updating record : " . $connect->error;
   }

   $connect->close();
}

?>

<!DOCTYPE html>
   <html>

   <head>
      <title>Delete Car</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
   </head>

   <body>
      <div class="container-fluid">

         <nav class="navbar navbar-dark bg-dark">

            <div class="mx-auto">
               <a class="btn btn-outline-warning" href="index.php" role="button">Home</a>
               <a class="btn btn-outline-success" href="logout.php?logout" role="button">Sign out</a>

            </div>
         </nav>


         <?php
         //$text =  $_GET['text'];
         ?>




         <div class="parallax_section1 parallax_image">

         </div>
         <!--END PARALLAX-->

         <div class="parallax_section2 parallax_image">

            <div class="row">


               <!--CARS-->

               <div class='card border-dark'>



                  <div class='card-body'>





                  </div>
                  <!--END BODY-->



               </div>
               <!--END books-->



               <!--END showmore-->


            </div>


         </div>
         <!--END PARALLAX -->

         <div class="parallax_section1 parallax_image">
         </div>
         <!--END PARALLAX-->










         <nav class="navbar navbar-light bg-light">

            <div class="mx-auto">
               <a class="btn btn-outline-success" href="index.php" role="button">Home</a>
               <a class="btn btn-outline-success" href="create.php" role="button">Add Medium</a>
               <a class="btn btn-outline-success" href="create.php" role="button">Add Author</a>
               <a class="btn btn-outline-success" href="create.php" role="button">Add Publisher</a>
            </div>
         </nav>
         <!--END FOOTER-->



      </div>
      <!--END CONTAINER-->


      </script>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.boots

</body>
</html>


