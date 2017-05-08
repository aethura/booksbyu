<?php
/**
 * Carrie Mao
 * Michael Blackley
 * Group9_HW04
 * Homework 4
 */
$dbname = 'booksbyu';
$userName = 'root';
$password = 'clayton09';
$serverName = 'localhost';

try {
    $conn = new PDO("mysql:host=$serverName;dbname=$dbname",$userName,$password);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('database_error.php');
    exit();
}
?>
