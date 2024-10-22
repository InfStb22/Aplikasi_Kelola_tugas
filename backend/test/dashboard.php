<?php
$key = "pytzch";
require '../db/connect.php'; 
require '../controllers/SessionController.php'; 
require '../controllers/UsersController.php'; 

use Backend\Controllers\SessionController;
use Backend\Controllers\UsersController;

SessionController::checkAccess("users");

// $usersController = new UsersController($conn);
// $user = $usersController->getUserData();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Dashboard</h1>
    <h2 id="jam"></h2>
    <h2 id="hari"></h2>
    <h2 id="tanggal"></h2>
    <a href="dashboard.php">dashboard</a>
    <a href="jadwal.php">Jadwal</a>
    <a href="tugas.php">Tugas</a>
    <a href="settings.php">Settings</a>

    <script>
        function startTime() {
    const today = new Date();
    let h = today.getHours();
    let m = today.getMinutes();
    let s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('jam').innerHTML = h + ":" + m + ":" + s;

    // Menambahkan hari
    const hari = getHari(today);
    document.getElementById('hari').innerHTML = hari;

    document.getElementById('tanggal').innerHTML = formatDate(today);
    setTimeout(startTime, 1000);
}

function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}

function formatDate(date) {
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    return date.toLocaleDateString('id-ID', options);
}

function getHari(date) {
    const options = { weekday: 'long' };
    return date.toLocaleDateString('id-ID', options);
}


        
        startTime();
    </script>
</body>
</html>
