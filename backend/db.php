<?php
$host = 'localhost';
$dbname = 'php-fullstack-test';
$user = 'root';
$password = 'toor';

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $th) {

    die("Connection failed: ". $th->getMessage());
}
?>