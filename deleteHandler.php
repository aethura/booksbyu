<?php
/**
 * Created by PhpStorm.
 * User: brute
 * Date: 4/25/2017
 * Time: 4:19 PM
 */
include('database.php');

$ID = $_POST['ID'];

$sql = "DELETE FROM listing WHERE listingID='$ID'";
$stmt = $conn->prepare($sql);
$stmt->execute();

header('Location: account.php');


?>