<?php
/**
 * Carrie Mao
 * Michael Blackley
 * Group9_HW06
 * Homework 6
 */

include('database.php');


$error = 0;

$userName = $_POST['username'];

$password = $_POST['password'];

$firstname = $_POST['firstname'];

$email = $_POST['email'];

$lastname = $_POST['lastname'];

$confirmpassword = $_POST['confirmpassword'];

$gender = $_POST['gender'];

/////////////CHECK IF USERNAME EXISTS////////////

$sql = "SELECT * FROM users";
$stmt = $conn->prepare($sql);
$stmt->execute();
$user = $stmt->fetchAll();

foreach($user as $users){
    if($userName == $users['userName']){
       $error = 1;
        header('location:user_signup_form.php?error='.$error);
        break;
    }
}

///////////////////USER NAME//////////////////////
if (!preg_match('/^[a-zA-Z0-9]{4,10}$/',$userName))
{
    $error = 2;
    header('location:signup.php?error='.$error);
}

///////////////////PASSWORD//////////////////////
elseif(preg_match('/^(.{0,7}|[^A-Z]*|[a-zA-Z0-9]*)$/', $password))
{
    $error = 3;
    header('location:signup.php?error='.$error);
}

///////////////////FIRST NAME//////////////////////
elseif(!preg_match('/^[a-zA-Z]+$/', $firstname))
{
    $error = 9;
    header('location:signup.php?error='.$error);
}

///////////////////LAST NAME//////////////////////
elseif(!preg_match('/^[a-zA-Z]+$/', $lastname))
{
    $error = 9;
    header('location:signup.php?error='.$error);
}

///////////////////CONFIRM PASSWORD///////////////
elseif($password != $confirmpassword)
{
    $error = 4;
    header('location:signup.php?error='.$error);
}

/////////////////GENDER///////////////////////////
elseif($gender != 'male' && $gender != 'female')
{
    $error = 6;
    header('location:signup.php?error='.$error);
}

///////////////////EMAIL//////////////////////
elseif (!preg_match("/^[a-zA-Z0-9_\-.]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-.]+$/", $email)) {
    $error = 7;
    header('location:signup.php?error='.$error);
}

else {
    $stmt = $conn->prepare("INSERT INTO user (userName, email, password, firstName, lastName, gender) VALUES (:username, :email, :password, :firstname, :lastname, :gender)");
    $stmt->bindParam(':username', $userName);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':gender', $gender);
    $stmt->execute();
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
    "http://www.w3.org/TR/html4/strict.dtd">

<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Registration Handler</title>
    <!-- Framework CSS -->
    <link rel="stylesheet" href="screen.css" type="text/css" media="screen, projection">
    <link rel="stylesheet" href="print.css" type="text/css" media="print">
    <!--[if lt IE 8]><link rel="stylesheet" href="ie.css" type="text/css" media="screen, projection"><![endif]-->
</head>
<body>
<div class="container">
    <h1>Registration Complete</h1>
    <hr>
    <div class="span-3">
        <br/>
    </div>
    <div class="span-18">
        <div class="success">
            User successfully registered. <a href="signup.php">Login</a>.
        </div>
    </div>
    <div class="span-3 last">
        <br/>
    </div>
</div>
</body>
</html>