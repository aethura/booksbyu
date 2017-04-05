<?php
/**
 * Created by PhpStorm.
 * User: brute
 * Date: 2/16/2017
 * Time: 2:19 PM
 */
include('database.php');

$sql = "SELECT * FROM listing ORDER BY listingID DESC";
$stmt = $conn->prepare($sql);
$stmt->execute();
$listing = $stmt->fetchAll();

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



<form>
    <select>
        <option value="Categories">Categories</option>
        <option value="Accounting">Accounting</option>
        <option value="Computer Science">Computer Science</option>
        <option value="Mathematics">Mathematics</option>
        <option value="....">....</option>
    </select>

    <select>
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
             <input type="checkbox" name="new" value="new">New<br>
             <input type="checkbox" name="used" value="used">Used<br>

         <u>Distance</u>
             <br>
             <input type="text" value="zip" name="zip"> <br>
    </div>
</form>

<b><u>MOST RECENT POSTS</u></b><br>

    <?php foreach ($listing as $listings) : ?>

        <a href="<?php echo "hi" ?>">
                <?php echo $listings['description']; ?> </a> <br>
    <?php endforeach; ?>

    </form>

</body>
</html>




