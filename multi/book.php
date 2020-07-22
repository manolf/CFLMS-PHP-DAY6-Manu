<?php
    session_start();
    require_once 'actions/db_connect.php';

    
    // if session is not set this will redirect to login page
    if( !isset($_SESSION['user' ]) ) {
     header("Location: index.php");
     exit;
    }


    //just for checking
   // echo $_SESSION["user"] . " -- " . $_GET["car_id"];

   if(isset($_POST["submit"])){
       $carId = $_GET["car_id"];
       $userId = $_SESSION["user"];
       $booking_date_start = $_POST["booking_date_start"];
       $booking_date_end = $_POST["booking_date_end"];

        $sql = "INSERT INTO booking (booking_date_start, booking_date_end, userId, car_id) VALUES ('$booking_date_start', '$booking_date_end', $userId, $carId)";

        $sql2 = "UPDATE car SET available = 'no' WHERE car_id = $carId";

       if (mysqli_query($conn, $sql) && mysqli_query($conn,$sql2) ){
           echo "Booking success <br> <a href='home.php'>Back to Home</a><br>";
       } else  {
       echo "Error " . $sql . ' ' . $conn->conn_error;
   }

   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<title>Welcome - <?php echo $userRow['userEmail' ]; ?></title>

    <title>Booking</title>
</head>
<body>
    
Hi <?php echo $userRow['userEmail' ]; ?>
            <span class="text-success">status: user</span>
           <a  href="logout.php?logout">Sign Out</a><br><hr>

    
<nav class="navbar navbar-light bg-dark">

    <div class="mx-auto">
        <a class="btn btn-outline-success" href="index.php" role="button">Home</a>
        <a class="btn btn-outline-success" href="logout.php?logout" role="button">Logout</a>
    

    </div>
</nav>


    <form method = "post">
        <input type="date" name="booking_date_start">
        <input type="date" name="booking_date_end">

        <input type="submit" name="submit">
    </form>
    
</body>
</html>