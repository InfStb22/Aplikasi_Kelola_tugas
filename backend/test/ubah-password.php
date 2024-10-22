<?php
$key = "pytzch"; 
require '../db/connect.php'; 
require '../controllers/UsersController.php';
require '../controllers/SessionController.php'; 

use Backend\Controllers\UsersController;
use Backend\Controllers\SessionController;


SessionController::checkAccess("users");

$usersController = new UsersController($conn);
$usersController->gantiUserPassword();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ganti Password</title>
</head>
<body>
    <h1>GANTI PASSWORD</h1>
    <a href="dashboard.php">dashboard</a>
    <a href="jadwal.php">Jadwal</a>
    <a href="tugas.php">Tugas</a>
    <a href="settings.php">Settings</a>
    <form method="post">
        <p>PASSWORD LAMA</p>
        <input type="password" name="password_old" required>
        <p>PASSWORD BARU</p>
        <input type="password" name="password_new" required>
        <p>KORFIRMASI PASSWORD BARU</p>
        <input type="password" name="password_new_confirm" required>
        <button type="submit" name="ganti_password">Ubah Password</button>
    </form>
</body>
</html>
