
<?php
ob_start();
session_start();
require_once 'actions/db_connect.php';

// admin start: if session is not set this will redirect to login page
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
//admin end:

if ($_GET['car_id']) {
    $car_id = $_GET['car_id'];
    "car id = " . $car_id;

    $sql = "SELECT * FROM car WHERE car_id = $car_id";
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();
    $conn->close();

?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style1.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <title>Edit Car <?php echo $userRow['userEmail']; ?></title>

        <style type="text/css">
            fieldset {
                margin: auto;
                margin-top: 100px;
                width: 50%;
            }

            table tr th {
                padding-top: 20px;
            }
        </style>

    </head>

    <body>

        <div class="container-fluid">

            <nav class="navbar navbar-dark bg-dark">

                <div class="mx-auto">
                    <a class="btn btn-outline-warning" href="index.php" role="button">Home</a>
                    <a class="btn btn-outline-warning" href="create.php" role="button">Add Medium</a>

                </div>
            </nav>


            <?php
            //$text =  $_GET['text'];
            ?>




            <div class="parallax_section1 parallax_image">

            </div>
            <!--END PARALLAX-->

            <!-- <h1 class='mx-auto'>good morning</h1> -->
            <div class="parallax_section2 parallax_image">

                <div class="row">


                    <!--CARS-->

                    <div class='card border-dark bg-light'>



                        <div class='card-body form'>



           
                                <legend class="text-success">Update car</legend>

                                <form action="actions/a_update.php" method="post">
                                    <table cellspacing="0" cellpadding="0">

                                        <tr>
                                            <th>Model</th>
                                            <td><input type="text" name="model" placeholder="model" value="<?php echo $data['model'] ?>" /></td>
                                        </tr>
                                        <tr>
                                            <th>available</th>
                                            <td><input type="text" name="available" placeholder="available" value="<?php echo $data['available'] ?>" /></td>
                                        </tr>
                                        <tr>
                                            <th>Image path</th>
                                            <td><input type="text" name="image" placeholder="image" value="<?php echo $data['image'] ?>" /></td>
                                        </tr>
                                        <tr>
                                            <th>Type</th>
                                            <td><input type="text" name="type" placeholder="type" value="<?php echo $data['type'] ?>" /></td>
                                        </tr>
                                        <tr>
                                            <th>Color</th>
                                            <td><input type="text" name="color" placeholder="color" value="<?php echo $data['color'] ?>" /></td>
                                        </tr>

                                        <tr>
                                            <input type="hidden" name="car_id" value="<?php echo $data['car_id'] ?>" />
                                            <!-- <td><button type="submit">Save Changes</button></td> -->
                                            <td><input class="form-control btn btn-outline-success" type="submit" name="submit" value="Save Changes" /><a href="admin.php" class="btn btn-outline-success">Back</a></td>

                                        </tr>
                                    </table>
                                </form>

             


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
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>





    </body>

    </html>

<?php
}
?>