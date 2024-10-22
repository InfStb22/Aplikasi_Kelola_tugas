<?php
$key = "pytzch";
require __DIR__ . '/backend/db/connect.php'; 
require __DIR__ . '/backend/controllers/SessionController.php'; 
require __DIR__ . '/backend/controllers/UsersController.php'; 

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
    <title>DASHBAORD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="font.css">
    <style>
        html{
			overflow-x: hidden !important;
		}
        body{
            overflow-x: hidden !important;
        }
        a.btn{
            background-color: #3795BD;
        }
        a.btn:hover{
            background-color: #4592AF;
        }
    </style>
</head >
<body  style="background: #3A1078;">
    <div class="row text-white text-center px-5 d-flex flex-column justify-content-end" style="min-height: 30vh;">
        <h1 class="text-center text-white poppins-bold" style="font-size: 8em; margin-bottom: -20px;" id="jam"></h1>
        <h2 class="text-center text-white poppins-bold pt-1 mt-1" style="font-size: 1em;"><span id="hari"></span>, <span id="tanggal"></span></h2>
    </div>
    <div class="pt-5 d-flex flex-column justify-content-start" style="min-height: 55vh;">
        <div class="row">
            <div class="col-8 offset-2">
                <a href="jadwal"
                class="btn btn-lg text-white mt-4 rounded-5 w-100 poppins-bold"
                >Jadwal</a>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">
                <a href="tugas"
                    class="btn btn-lg text-white mt-4 rounded-5 w-100 poppins-bold"
                    >Tugas</a>
                </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">
                <a href="settings"
                class="btn btn-lg text-white mt-4 rounded-5 w-100 poppins-bold"
                >Pengaturan</a>
            </div>
        </div>
    </div>

    <footer class="row text-white text-center px-5 d-flex flex-column justify-content-center" style="min-height: 15vh;">
        <h3 class="poppins-medium">@informatics Enginerring 22</h3>
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function startTime() {
            const today = new Date();
            let h = today.getHours();
            let m = today.getMinutes();
            let s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('jam').innerHTML = h + ":" + m;

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