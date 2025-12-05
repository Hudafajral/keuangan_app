<?php
$host = "localhost";
$user = "root"; 
$pass = "";    
$dbname = "keuangan";

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}
?>
