<?php
/**
 * Created by PhpStorm.
 * User: brute
 * Date: 2/16/2017
 * Time: 2:19 PM
 */
session_start();
include('database.php');

$sql2 = "SELECT * FROM department";
$stmt2 = $conn->prepare($sql2);
$stmt2->execute();
$department = $stmt2->fetchAll();

if($_SESSION['logged_in'] != 1)
{
    header('location:index.html');
}

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $sql3 = "SELECT * FROM user WHERE email = :user";
    $stmt3 = $conn->prepare($sql3);
    $stmt3->bindValue(':user', $email);
    $stmt3->execute();
    $user = $stmt3->fetchAll();
    foreach($user as $users) {
        $firstName = $users['firstName'];
        $lastName = $users['lastName'];
    }
}else
{
    $email = NULL;
    $firstName = '';
    $lastName = '';
}
///////////////////////
if (isset($_GET['min'])){
    $min = $_GET['min'];
    }
    else
    {
        $min = NULL;
    }
///////////////////////////////
if (isset($_GET['max'])){
    $max = $_GET['max'];
    }
    else
    {
      $max = NULL;
    }
//////////////////////////////////
if (isset($_GET['condition'])){
    $condition = $_GET['condition'];
    }
    else
    {
        $condition = NULL;
    }
//////////////////////////////////
if (isset($_GET['zip'])){
    $zip = $_GET['zip'];
    }
    else
    {
        $zip = NULL;
    }
///////////////////////////////////
if (isset($_GET['category'])){
    $category = $_GET['category'];
    }
    else
    {
     $category = NULL;
    }
///////////////////////////////////
if (isset($_GET['view'])){
    $view = $_GET['view'];
}
else
{
    $view = NULL;
}
/////////////////////////////////////
if (isset($_GET['search'])){
    $search = $_GET['search'];
}
else
{
    $search = NULL;
}
/////////////////////////////////////
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="IE-edge">
    <meta name="viewpoint" content="width=device-width, initial-scale=1">
    <meta name="description" content>
    <meta name="author" content>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/searchFilter.css">
    <link rel="stylesheet" href="fonts">

    <title>Books By U</title>
    <link rel="stylesheet" type="text/css" href="main.css" />


    <!-- START OF NAV BAR -->
    <nav class="navbar navbar-inverse" role="navigation" style="background-color:#00703C">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" style="color:#ffffff">Welcome back: <?php echo $firstName . " " . $lastName; ?></a>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="mainPage.php" style="color:#ffffff">Home</a>
                        </li>

                        <li>
                            <a href="post.php" style="color:#ffffff">Post</a>
                        </li>

                        <li>
                            <a href="account.php" style="color:#ffffff">Account</a>
                        </li>

                        <li>
                            <a href="logout.php" style="color:#ffffff">Sign Out</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!--END OF NAV BAR-->
</head>

<body>
<!--START OF FILTERS/SEARCH BAR-->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="input-group" id="adv-search">
                        <div class="dropdown dropdown-lg open">
                            <div class="dropdown-menu dropdown-menu-right" role="menu" style="position:fixed; left:1%; top:25%; width:1px">

                                <form class="form-horizontal" role="form" method="post" action="filters.php" >
                                    <div class="form-group">
                                        <label for="filter">Filter By</label>
                                        <select class="form-control" name="Category">
                                            <option selected>Departments</option>
                                            <?php foreach($department as $departments){ ?><option value="<?php echo $departments['name'];?>"><?php echo($departments['name']); }?></option></select>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="contain">Price</label>
                                        <input class="form-control" type="text" placeholder="minimum" name = "min"/>
                                        <input class="form-control" type = "text" placeholder="maximum" name = "max"/>
                                    </div>

                                    <div class="form-group">
                                        <label for="contain">Condition</label><br>
                                          <input type="radio" name="condition" value="new">New<br>
                                          <input type="radio" name="condition" value="used">Used<br>
                                    </div>

                                    <button type="submit" class="btn btn-primary" style="background-color: #00703C; color:#ffffff">
                                       Apply Filters
                                    </button>
                                </form>
                           </div>
                        </div>
            </div>
        </div>
    </div>
</div>


<!--END OF FILTERS-->

<form action="filters.php" method="post">
      <div class="btn-toolbar form-inline" role="toolbar">
    <div class="input-group" style="padding:10px;margin:20px 10px 10px 10px; position:absolute; left:550px; top:100px;">
    <input type="text" class="form-control" name="search" placeholder="Search by title or ISBN..">
        <span class="input-group-btn">
            <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
        </span>
        </div>
      </div>
</form>


<div style="position:absolute; left:550px; top:200px; right:10px">
<b><u><h2>MOST RECENT POSTS</h2></u></b><br>



<?php
///////////////////////Apply different SQL statements based off of what the user wants to filter the listings by////////////////////////////

     $line = "SELECT * FROM listing";

     $first = TRUE;
     if ($category != 'Departments' && $category != NULL) {
         if ($first) {
             $first = FALSE;
             $line = $line . " WHERE";
         } else {
             $line = $line . " AND ";
         }
         $line = $line . " department = '" . $category . "'";
     }

     if ($condition != "") {
         if ($first) {
             $first = FALSE;
             $line = $line . " WHERE";
         } else {
             $line = $line . " AND ";
         }
         $line = $line . " status = '" . $condition . "'";
     }
     //////////////////////////////////
if ($search != "") {
    if ($first) {
        $first = FALSE;
        $line = $line . " WHERE";

        $lastChar = substr($search, 0);
        $stringToInt = (int)$lastChar;

        if($stringToInt == 0){
            $line = $line . " title = '" . $search . "'";
        }
        else{
            $line = $line . " isbn = '" . $search . "'";
            $tok = strtok($search, "-");
            while($tok !== false){
               // echo $tok;
                $tok = strtok("-");
            }
        }
    }
    else {
        $line = $line . " AND ";

        $lastChar = substr($search, -1);
        $stringToInt = (int)$lastChar;

        if($stringToInt == 0){
            $line = $line . " title = '" . $search . "'";
        }
        else{
            $line = $line . " isbn = '" . $search . "'";
        }
    }
}

    /////////////////////////////////////////////////////
    if($min != "" && $max == ""){
        if ($first) {
            $first = FALSE;
            $line = $line . " WHERE";
        } else {
            $line = $line . " AND ";
        }
        $line = $line . " price >= '" . $min . "'";
    }


    if($max != "" && $min == ""){
        if ($first) {
            $first = FALSE;
            $line = $line . " WHERE";
        } else {
            $line = $line . " AND ";
        }
        $line = $line . " price <= '" . $max . "'";
    }

    if($max != "" && $min != ""){
        if ($first) {
            $first = FALSE;
            $line = $line . " WHERE";
        } else {
            $line = $line . " AND ";
        }
        $line = $line . " price <= '" . $max . "'" . " AND " . " price >= '" . $min . "'";
    }

    if($min == "" && $max == "" && $condition == "" && $zip == "" && $view == '' && $category == 'Departments' && $search == "")
    {
     $line = "SELECT * FROM listing ORDER BY listingID DESC";
    }

    if($line == "SELECT * FROM listing")
    {
        $line = $line . " ORDER BY listingID DESC ";
    }
     $stmt = $conn->prepare($line);
     $stmt->execute();
     $listing = $stmt->fetchAll();

?>

    <?php foreach ($listing as $listings) : ?>
     <div>
        <div class="row">
            <div class="testiminial-block">
                <div class="row">

                    <?php echo '<div class="col-md-2 col-sm-2 comp-logo"><img src="'.$listings['image'].'" width="200px" height="200px" class="img-responsive"/></div>'; ?>
                    <div class="col-md-8 col-sm-8 testimonial-content">
                        <h3><a href="listing.php?ID=<?php echo $listings['listingID']; ?>">
                                <?php echo $listings['title']; ?> (<?php echo $listings['department'];?>)</a> <?php echo '$'. $listings['price'];?> </h3>
                        <p> <?php echo $listings['description']; ?> </p>
                        <div class="testimonial-author">
                            Author: <?php echo $listings['author']; ?> <span>(ISBN: <?php echo $listings['isbn']; ?>)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>
            <b><hr></b>
    <?php endforeach; ?>



</div>
</body>
</html>