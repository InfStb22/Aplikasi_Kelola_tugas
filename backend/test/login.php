<?php
$key = "pytzch";
require '../db/connect.php'; 
require '../controllers/AuthController.php';
require '../controllers/SessionController.php'; 

use Backend\Controllers\AuthController;
use Backend\Controllers\SessionController;


SessionController::checkAccess("non-login");

$authController = new AuthController($conn);
$authController->login();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>TEST LOGIN</h1>
    <form method="post">
        <p>NIM</p>
        <input type="text" name="nim">
        <p>Password</p>
        <input type="password" name="password" id="">
        <button type="submit" name="login">Login</button>
    </form>
</body>
</html>
