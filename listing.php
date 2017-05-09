<?php
/**
 * Created by PhpStorm.
 * User: brute
 * Date: 4/3/2017
 * Time: 8:16 PM
 */
session_start();
if( !isset($_SESSION['logged_in']) )
    die( "Login required." );
include('database.php');

$ID = $_GET['ID'];

$sql = "SELECT * FROM listing WHERE listingID='".$ID."'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$listing = $stmt->fetchAll();
$email = $_SESSION['email'];


?>


<!doctype html>
<html lang="en">
<head>

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/listing.css">

    <!-- CSS Files -->

</head>

<body class="product-page">

<div class="section" style="padding: 25px 0; background-color:#00703C">
    <div class="container" style="width:100%;">
        <div class="main main-raised main-product">
            <div class="row">
                <?php foreach ($listing as $listings){
                if($listings['image'] != "MyUploadImages/"){
                ?>
                <div class="col-md-6 col-sm-6">
                    <div class="tab-content">
                        <div class="tab-pane active"">
                        <img src="<?php echo $listings['image'] ?>"/>
                    </div>
                </div>
            </div>
            <?php } ?>
            <div class="col-md-6 col-sm-6">
                <h1 class="title"> <?php echo $listings['title'] ?> </h1>
                <?php
                {
                    $date1 = new DateTime(date("m/d"));
                    $date2 = new DateTime($listings['date']);

                    $diff = $date2->diff($date1)->format("%a");
                }?>
                <h3 class="h3"><b> $<?php echo $listings['price'] . " - " . $listings['department'] ?> - Posted:  <i><?php echo $diff ?> days ago</i></b></h3>

                <div id="acordeon">
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-border panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <b>Information</b>
                                </h4>
                            </div>
                            <div class="panel-body">
                                <b>Author:</b> <?php echo $listings['author']?><br>
                                <b>ISBN:</b> <?php echo $listings['isbn']?><br>
                                <b>Condition:</b> <?php echo $listings['status']?>
                            </div>
                        </div>
                        <div class="panel panel-border panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <b>Description</b>
                                </h4>
                            </div>
                            <div class="panel-body">
                                <?php echo $listings['description']?>
                            </div>
                        </div>
                        <div class="panel panel-border panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <b>Contact Information</b>
                                </h4>
                            </div>
                            <div class="panel-body">
                                <?php echo $listings['contact']?>
                            </div>
                        </div>
                    </div>
                </div><!--  end acordeon -->

                <div class="row text-right">
                    <a href="mainPage.php"><button class="btn btn-round" style="background-color: #00703C; color:#ffffff">Back </button></a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
</div>


</body>

</html>