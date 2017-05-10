<?php
session_start();

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
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
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
        $_SESSION['image'] = $target_file;
    }
}




$category = $_POST['Category'];
$bookTitle = $_POST['title'];
$author = $_POST['author'];
$price = $_POST['price'];
$isbn = $_POST['isbn'];
$description = $_POST['description'];
$condition = $_POST['condition'];
$contact = $_POST['contact'];
$image = $_SESSION['image'];
$ID = $_POST['ID'];
$email = $_SESSION['email'];
$date = date("m/d");
$sql = "UPDATE listing SET department='$category', title='$bookTitle', author='$author', price='$price', isbn='$isbn', description='$description', status='$condition', contact='$contact', image='$image', user='$email', date='$date' WHERE listingID = $ID";
$stmt = $conn->prepare($sql);
$stmt->execute();
unset($_SESSION['image']);
header('Location: account.php');

?>