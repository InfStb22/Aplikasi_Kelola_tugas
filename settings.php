<?php
$key = "pytzch";
require __DIR__ . '/backend/db/connect.php'; 
require __DIR__ . '/backend/controllers/SessionController.php'; 

use Backend\Controllers\AuthController;
use Backend\Controllers\SessionController;

SessionController::checkAccess("users");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setting</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="font.css">
	<style>
		html{
			overflow-x: hidden !important;
		}
		body {
			background-color: #33313B;
			overflow-x: hidden !important;
		}

		.header-icons {
			position: absolute;
			top: 20px;
			width: 100%;
			display: flex;
			justify-content: space-between;
			padding: 0 20px;
		}

		.header-icons i {
			font-size: 24px;
		}

		.nav-item {
			justify-content: space-around;
		}
		@media (max-width: 768px) {
			.navbar-nav{
				display: flex;
				flex-direction: row;
				justify-content: center;
			}
			.nav-link {
				width: 80px;
			}
		}
	</style>
</head>

<body style="background-color:  #3A1078;">

	<?php include 'components/navbar.php'; ?>

	<div class="row text-white text-center px-5 d-flex flex-column justify-content-end" style="min-height: 20vh;">
		<h1 class="py-2 rounded-4 w-75 mx-auto poppins-bold" style="background-color: #3795BD;">Settings</h1>
	</div>

	<div class=" row text-center d-flex flex-column justify-content-center" style="min-height: 70vh;">
		<a href="ganti-password" class="btn btn-lg w-50 rounded-5 my-3 py-2 text-white poppins-bold m-auto" style="background-color: #3795BD;"
			id="change-password-button">Ganti Password</a>
		<a href="logout" class="btn btn-lg w-50 rounded-5 my-3 py-2 text-white poppins-bold m-auto" style="background-color: #3795BD;"
			id="logout-button">Log Out</a>
	</div>

	<footer class="row text-white text-center px-5 d-flex flex-column justify-content-center" style="min-height: 10vh;">
        <h3 class="poppins-medium">@informatics Enginerring 22</h3>
    </footer>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" type="text/javascript"
		charset="utf-8"></script>
</body>

</html>