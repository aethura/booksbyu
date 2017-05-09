<?php
/**
 * Created by PhpStorm.
 * User: brute
 * Date: 4/3/2017
 * Time: 4:13 PM
 */
session_start();
if( !isset($_SESSION['logged_in']) ){
    die( "Login required." );

}

include('database.php');

$target_dir = "MyUploadImages/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    }
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

echo '<b>';
echo $imageFileType;
echo '</b>';

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" && $imageFileType != '') {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $_SESSION['image'] = $target_file;
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$subject = $_POST['Category'];

$title = $_POST['title'];

$author = $_POST['author'];

$price = $_POST['price'];

$isbn = $_POST['isbn'];

$description = $_POST['description'];

$condition = $_POST['condition'];

$contact = $_POST['contact'];


if($_FILES['fileToUpload'] == ''){
    $file = NULL;
}
else{
    $file = $_SESSION['image'];
}

$email = $_SESSION['email'];

$date = date("m/d");

echo $subject;
echo $title;
echo $author;
echo $price;
echo $isbn;
echo $description;
echo $condition;
echo $contact;
echo "<br>";
echo " FILE: ". $file;
echo $email;
echo $date;

$stmt = $conn->prepare("INSERT INTO listing (department, title, author, price, isbn, description, status, contact, image, user, date) VALUES (:subject, :title, :author, :price, :isbn, :description, :condition, :contact, :file, :user, :date)");
$stmt->bindParam(':subject', $subject);
$stmt->bindParam(':title', $title);
$stmt->bindParam(':author', $author);
$stmt->bindParam(':price', $price);
$stmt->bindParam(':isbn', $isbn);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':condition', $condition);
$stmt->bindParam(':contact', $contact);
$stmt->bindParam(':file', $file);
$stmt->bindParam(':user', $email);
$stmt->bindParam(':date', $date);
 $stmt->execute();

unset($_SESSION['image']);

header('location:mainPage.php');

?>