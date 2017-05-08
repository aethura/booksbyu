<?php
/**
 * Created by PhpStorm.
 * User: brute
 * Date: 4/25/2017
 * Time: 3:45 PM
 */
include('database.php');
session_start();

$category = $_POST['Category'];
$bookTitle = $_POST['title'];
$author = $_POST['author'];
$price = $_POST['price'];
$isbn = $_POST['isbn'];
$description = $_POST['description'];
$condition = $_POST['condition'];
$contact = $_POST['contact'];
$ID = $_POST['ID'];
$image = $_POST['fileToUpload'];
$email = $_SESSION['email'];
$date = date("m/d");

$sql = "UPDATE listing SET department='$category', title='$bookTitle', author='$author', price='$price', isbn='$isbn', description='$description', status='$status', contact='$contact', image='$image', user='$email', date='$date' WHERE listingID = $ID";
$stmt = $conn->prepare($sql);
$stmt->execute();
header('Location: account.php');

?>