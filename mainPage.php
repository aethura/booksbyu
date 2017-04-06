<?php
/**
 * Created by PhpStorm.
 * User: brute
 * Date: 2/16/2017
 * Time: 2:19 PM
 */
include('database.php');

$sql2 = "SELECT * FROM department";
$stmt2 = $conn->prepare($sql2);
$stmt2->execute();
$department = $stmt2->fetchAll();

echo "Today is " . date("m/d") . "<br>";

$min = $_GET['min'];
$max = $_GET['max'];
$condition = $_GET['condition'];
$zip = $_GET['zip'];
$view = $_GET['view'];
$category = $_GET['category'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Books 4 U</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>
<body>

<form action="post.php" method="post">
        <input class="button" type = "submit" value="Post" onClick="location.href='post.php'" title="Post"/>
</form>


<form action="filters.php" method="post">
    <select name="Category" selected="Categories">
        <option selected="selected">Categories</option>
        <?php foreach($department as $departments){ ?><option value="<?php echo $departments['name'];?>"><?php echo($departments['name']); }?></option></select>


    <select name="view">
        <option value="view">View</option>
        <option value="list">List</option>
        <option value="pic">Pictures</option>
    </select>
        </div>

         <div class="div2">
        <u>Price:</u>
             <br>
             <input type = "text" value ="min" name = "min">    <br>
             <input type = "text" value ="max" name = "max">    <br>

         <u>Condition</u>
             <br>
             <input type="radio" name="condition" value="new">New<br>
             <input type="radio" name="condition" value="used">Used<br>

         <u>Distance</u>
             <br>
             <input type="text" value="zip" name="zip"> <br>

             <input type="submit" value="Apply Filters">
    </div>
</form>

<b><u>MOST RECENT POSTS</u></b><br>



<?php
///////////////////////Apply different SQL statements based off of what the user wants to filter the listings by////////////////////////////


 if($category != 'Categories')   //Filter if the user enters a different department
 {
     $sql = "SELECT * FROM listing WHERE department='".$category."' ORDER BY listingID DESC";
     $stmt = $conn->prepare($sql);
     $stmt->execute();
     $listing = $stmt->fetchAll();
 }
 else  //Displays all the posts by the most recent without any filters
 {
     $sql = "SELECT * FROM listing ORDER BY listingID DESC";
     $stmt = $conn->prepare($sql);
     $stmt->execute();
     $listing = $stmt->fetchAll();
 }

?>

    <?php foreach ($listing as $listings) : ?>

        <a href="listing.php?ID=<?php echo $listings['listingID']; ?>">
                <?php echo $listings['description']; ?> </a> <?php echo '$'. $listings['price'];?><br>
    <?php endforeach; ?>

    </form>

</body>
</html>




