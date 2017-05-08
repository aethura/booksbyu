<?php
/**
 * Carrie Mao
 * Michael Blackley
 * Group9_HW06
 * Homework 6
 */

include('database.php');


$error = 0;

$password = $_POST['password'];
$firstname = $_POST['firstname'];
$email = $_POST['email'];
$lastname = $_POST['lastname'];
$confirmpassword = $_POST['confirmpassword'];

/////////////CHECK IF EMAIL EXISTS////////////

$sql = "SELECT * FROM users";
$stmt = $conn->prepare($sql);
$stmt->execute();
$user = $stmt->fetchAll();

foreach($user as $users){
    if($email == $users['email']){
       $error = 1;
        header('location:signup.php?error='.$error);
        break;
    }
}
///////////////////PASSWORD//////////////////////
if(preg_match('/^(.{0,7}|[^A-Z]*|[a-zA-Z0-9]*)$/', $password))
{
    $error = 2;
    header('location:signup.php?error='.$error);
}

///////////////////FIRST NAME//////////////////////
elseif(!preg_match('/^[a-zA-Z]+$/', $firstname))
{
    $error = 3;
    header('location:signup.php?error='.$error);
}

///////////////////LAST NAME//////////////////////
elseif(!preg_match('/^[a-zA-Z]+$/', $lastname))
{
    $error = 3;
    header('location:signup.php?error='.$error);
}

///////////////////CONFIRM PASSWORD///////////////
elseif($password != $confirmpassword)
{
    $error = 4;
    header('location:signup.php?error='.$error);
}

///////////////////EMAIL//////////////////////
elseif (!preg_match("/^[a-zA-Z0-9._%+-]+@uncc+\.edu$/", $email)) {
    $error = 5;
    header('location:signup.php?error='.$error);
}

else {
    $stmt = $conn->prepare("INSERT INTO user (email, password, firstName, lastName) VALUES (:email, :password, :firstname, :lastname)");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->execute();
}

//header('location:index.html');
?>
