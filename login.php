<?php
/**
 * Created by PhpStorm.
 * User: brute
 * Date: 3/29/2017
 * Time: 2:17 PM
 */
session_start();
require('database.php');

$email = $_POST['email'];
$password = $_POST['password'];

echo $email;
echo $password;

$queryUser = 'SELECT * FROM user
                      WHERE email = :email AND password = :password';
$statement = $conn->prepare($queryUser);
$statement->bindValue(':email', $email);
$statement->bindValue(':password', $password);
$statement->execute();
$users = $statement->fetch();

$databaseEmail = $users['email'];
$databasePassword = $users['password'];

if($email = $databaseEmail && $password = $databasePassword)
{
    $_SESSION['logged_in'] = true;
    $_SESSION['email'] = $users['email'];
    $_SESSION['first'] = $users['firstName'];
    $_SESSION['last'] = $users['lastName'];
    header('location:mainPage.php');
}
else{
    echo "Not in database";
    header('location:index.html');
}

?>