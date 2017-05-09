<?php
/**
 * Created by PhpStorm.
 * User: brute
 * Date: 4/19/2017
 * Time: 2:45 PM
 */
include('database.php');
session_start();
$listingID = $_POST['update'];

$sql = "SELECT * FROM listing WHERE listingID=". $listingID . "";
$stmt = $conn->prepare($sql);
$stmt->execute();
$listing = $stmt->fetchAll();

$sql2 = "SELECT * FROM department";
$stmt2 = $conn->prepare($sql2);
$stmt2->execute();
$department = $stmt2->fetchAll();

foreach ($listing as $listings){
    $departmentName = $listings['department'];
    $bookTitle = $listings['title'];
    $author = $listings['author'];
    $price = $listings['price'];
    $ISBN = $listings['isbn'];
    $description = $listings['description'];
    $condition = $listings['status'];
    $contact = $listings['contact'];


}

if($_SESSION['logged_in'] != 1)
{
    header('location:index.html');
}

?>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="IE-edge">
    <meta name="viewpoint" content="width=device-width, initial-scale=1">
    <meta name="description" content>
    <meta name="author" content>
    <link rel="stylesheet" href="css/bootstrap.css">

    <title>Books By U</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<body>
<nav class="navbar navbar-inverse" role="navigation" style="background-color:#00703C">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#" style="color:#ffffff">Books By U</a>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="mainPage.php" style="color:#ffffff">Home</a>
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

<div class="container">
    <div class="row">

        <h1>Update Post</h1>
        <form method="post" action="updateHandler.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Department <span class="require"></span></label>
                <select name="Category" class="form-control"><?php foreach($department as $departments){ ?><option value="<?php echo $departments['name'];?>"><?php echo($departments['name']); }?></option><option value="<?php echo $departmentName;?>" selected><?php echo $departmentName;?></select>
            </div>

            <div class="form-group">
                <label for="title">Book Title <span class="require"></span></label>
                <input type = "text" class="form-control" value ="<?php echo $bookTitle;?>" name = "title">
            </div>

            <div class="form-group">
                <label for="title">Author <span class="require"></span></label>
                <input type = "text" class="form-control" value ="<?php echo $author;?>" name = "author">
            </div>

            <div class="form-group">
                <label for="title">Price <span class="require"></span></label>
                <input type = "text" class="form-control" value ="<?php echo $price;?>" name = "price">
            </div>

            <div class="form-group">
                <label for="title">ISBN <span class="require"></span></label>
                <input type = "text" class="form-control" value ="<?php echo $ISBN;?>" name = "isbn">
            </div>

            <div class="form-group">
                <label for="title">Condition <span class="require"></span></label><br>
                <input type="radio" name="condition" value="new" checked>New <input type="radio" name="condition" value="used">Used
            </div>

            <div class="form-group">
                <label for="title">Contact <span class="require"></span></label>
                <input type="text" class="form-control" value="<?php echo $contact;?>" name="contact">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea rows="5" class="form-control" name="description"><?php echo $description;?></textarea>
            </div>

            <div class="form-group">
                <label for="title">Select image to upload <span class="require"></span></label>
                <input type="file" class="btn btn-primary" name="fileToUpload" id="fileToUpload" style="background-color: #00703C; color:#ffffff" />
                <input type="hidden" name="ID" value="<?php echo $listingID;?>">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary" style="background-color: #00703C; color:#ffffff">
                    Update
                </button>
                <button class="btn btn-default" style="background-color: #00703C; color:#ffffff">
                    Cancel
                </button>
            </div>
        </form>

    </div>
</div>
</body>


</html>
