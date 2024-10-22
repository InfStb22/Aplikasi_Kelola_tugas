<?php
$key = "pytzch";
require '../db/connect.php'; 
require '../controllers/AuthController.php';
require '../controllers/SessionController.php'; 

use Backend\Controllers\AuthController;
use Backend\Controllers\SessionController;

SessionController::checkAccess("users");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
</head>
<body>
    <h1>SETTINGS</h1>
    <a href="dashboard.php">dashboard</a>
    <a href="jadwal.php">Jadwal</a>
    <a href="tugas.php">Tugas</a>
    <a href="settings.php">Settings</a>
    <br>
    <a href="logout.php">Logout</a>
    <a href="ubah-password.php">Ganti Password</a>
</body>
</html>