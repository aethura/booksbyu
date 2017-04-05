<?php
/**
 * Created by PhpStorm.
 * User: brute
 * Date: 4/3/2017
 * Time: 4:13 PM
 */

include('database.php');


$subject = $_POST['Category'];

$title = $_POST['title'];

$author = $_POST['author'];

$price = $_POST['price'];

$isbn = $_POST['isbn'];

$zip = $_POST['zip'];

$description = $_POST['description'];

$condition = $_POST['condition'];

$contact = $_POST['contact'];

$file = $_POST['fileToUpload'];

echo $subject;
echo $title;
echo $author;
echo $price;
echo $isbn;
echo $zip;
echo $description;
echo $condition;
echo $contact;
echo $file;

$stmt = $conn->prepare("INSERT INTO listing (department, title, author, price, isbn, zip, description, status, contact, image) VALUES (:subject, :title, :author, :price, :isbn, :zip, :description, :condition, :contact, :file)");
$stmt->bindParam(':subject', $subject);
$stmt->bindParam(':title', $title);
$stmt->bindParam(':author', $author);
$stmt->bindParam(':price', $price);
$stmt->bindParam(':isbn', $isbn);
$stmt->bindParam(':zip', $zip);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':condition', $condition);
$stmt->bindParam(':contact', $contact);
$stmt->bindParam(':file', $file);
$stmt->execute();
header('location: mainPage.php');

?>