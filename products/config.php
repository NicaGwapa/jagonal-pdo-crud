<?php

$host = 'localhost';
$dbname = 'products';
$username = 'root';
$password = '';
/*
<?php
$host = 'localhost';
$dbname = 'u593341949_db_jagonal';
$username = 'u593341949_dev_jagonal';
$password = '20212063Jagonal';
*/
try {
 $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
 die("Database connection failed: " . $e->getMessage());
}