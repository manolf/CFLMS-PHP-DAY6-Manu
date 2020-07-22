<?php
ob_start();
session_start();
require_once 'actions/db_connect.php';

// if session is not set this will redirect to login page
if( !isset($_SESSION['user' ]) ) {
 header("Location: index.php");
 exit;
}
// select logged-in users details
$res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);

$resCar=mysqli_query($conn, "SELECT * FROM car WHERE available = 'yes'");

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<title>Welcome - <?php echo $userRow['userEmail' ]; ?></title>
</head>






<body >



           Hi <?php echo $userRow['userEmail' ]; ?>
            <span class="text-success">status: user</span>
           <a  href="logout.php?logout">Sign Out</a><br><hr>

    

           <!-- <div class="container-fluid"> -->

<nav class="navbar navbar-light bg-dark">

    <div class="mx-auto">
        <a class="btn btn-outline-success" href="index.php" role="button">Home</a>
        <a class="btn btn-outline-success" href="logout.php?logout" role="button">Logout</a>
    

    </div>
</nav>


<?php
//$text =  $_GET['text'];
?>




<div class="parallax_section1 parallax_image">

</div>
<!--END PARALLAX-->

<!-- <h1 class='text-success mx-auto'>good morning</h1> -->
<div class="parallax_section2 parallax_image">

    <div class="row">

        <?php
        require_once 'actions/db_connect.php';

		$sql = "SELECT * FROM car";
		$result = mysqli_query($conn, $sql);
		// fetch the next row (as long as there are any) into $row
		while($row = mysqli_fetch_assoc($result)) {
		$available =  $row["available"];
        $model =  $row["model"];
        $image =  $row["image"];
        $type = $row["type"];
        $color = $row["color"];

    ?>

	<div class="card border-dark ">

			<img src="img/<?= $image?>" class="card-img-top foto" alt="..." style="height: 30vh"	>
			<div class="card-body">
				<h4 class="card-title"><?php 
				if ($available == 'no') {
                        echo "<b>available:</b> " . "<span style='color:red'>No </span>";
                    } else {
                        echo "<b>available:</b> " . "<span style='color:green'>" . $available;
                    } 
                    ?></h4>
				<h4 class="card-text">Model: <?= $model?>, <span  ></span></h4>
                <h5 class="card-text">Type: <?= $type?></h5>
                <h5>Colour: <?= $color?></h5>
			</div>
			<div class="card-footer text-center">
				<a href="book.php?car_id=<?= $row['car_id'];?>" class="btn btn-outline-success btn-block">Book</a>
				
			</div>

    </div>	
        
	<?php	
		}
		
		// Free result set
		mysqli_free_result($result);
		// Close connection
		mysqli_close($conn);
	?>
        <!--END booking-->




        <!--END showmore-->




</div>
<!--END PARALLAX -->

<div class="parallax_section1 parallax_image">
</div>
<!--END PARALLAX-->









<nav class="navbar navbar-light bg-light">

    <div class="mx-auto">
        <a class="btn btn-outline-success" href="home.php" role="button">Home</a>
        <a class="btn btn-outline-success" href="advanced.php" role="button">Advanced</a>

    </div>
</nav>
<!--END FOOTER-->



</div>
<!--END CONTAINER-->


</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>      

 
       
 
</body>
</html>
<?php ob_end_flush(); ?>