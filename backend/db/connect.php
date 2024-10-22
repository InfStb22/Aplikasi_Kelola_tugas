<?php

if (empty($key) || $key !== "pytzch") { header('Location: /login'); exit; }

$host = getenv('DB_HOST') ?: 'localhost';  
$user = getenv('DB_USER') ?: 'root';       
$password = getenv('DB_PASS') ?: '';       
$dbname = getenv('DB_NAME') ?: 'aplikasi_jadwal_mata_kuliah';  


$conn = new mysqli($host, $user, $password, $dbname);


if ($conn->connect_error) {
    error_log("Koneksi gagal: " . $conn->connect_error);  
    die("Koneksi gagal, silakan coba lagi nanti.");
}


$conn->set_charset("utf8");
