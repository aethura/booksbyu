<?php
/**
 * Created by PhpStorm.
 * User: brute
 * Date: 4/3/2017
 * Time: 8:16 PM
 */

include('database.php');

$ID = $_GET['ID'];

$sql = "SELECT * FROM listing WHERE listingID='".$ID."'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$listing = $stmt->fetchAll();


foreach ($listing as $listings){
    echo '<img src="data:image/jpeg;base64,'.base64_encode( $listings['image'] ).'"/>';
    echo $listings['image'];
    echo "Department: ".$listings['department']."<br>";
    echo "Title: " .$listings['title']."<br>";
    echo "Author: ".$listings['author']."<br>";
    echo "ISBN #: ".$listings['isbn']."<br>";
    echo "Status: ".$listings['status']."<br>";
    echo "Description: ".$listings['description']."<br>";
    echo "Contact Information: ".$listings['contact']."<br>";
}


?>

<form action="mainPage.php" method="post">
    <input class="button" type = "submit" value="Back" onClick="location.href='mainPage.php'" title="Back"/>
</form>
