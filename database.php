<?php
/**
 * Carrie Mao
 * Michael Blackley
 * Group9_HW04
 * Homework 4
 */
$dbname = 'booksbyudb';
$userName = 'masterUsername';
$password = 'itcs4155';
$serverName = 'booksbyu.chkn9wqfjo8t.us-west-2.rds.amazonaws.com:3306';

try {
    $conn = new PDO("mysql:host=$serverName;dbname=$dbname",$userName,$password);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('database_error.php');
    exit();
}
?>
