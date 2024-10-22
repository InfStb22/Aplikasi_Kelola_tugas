<?php
ob_start(); 
$key = "pytzch";
require __DIR__ . '/backend/db/connect.php'; 
require __DIR__ . '/backend/controllers/UsersController.php';
require __DIR__ . '/backend/controllers/SessionController.php'; 

use Backend\Controllers\UsersController;
use Backend\Controllers\SessionController;

SessionController::checkAccess("users");

$usersController = new UsersController($conn);
$usersController->gantiUserPassword();
$swalMessage = isset($_SESSION['swal_message']) ? $_SESSION['swal_message'] : null;
unset($_SESSION['swal_message']); 
ob_end_flush(); 
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ganti Password</title>
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
		<h1 class="py-2 rounded-4 w-75 mx-auto poppins-bold" style="background-color: #3795BD;">Ganti Password</h1>
	</div>

	<div class="row text-center d-flex flex-column justify-content-start" style="min-height: 70vh;">
		<div class="container mt-5 w-75 pt-5 text-center">
            <form method="POST">
                <p class="text-white fs-5 text-start mb-2 pt-3 poppins-bold">Masukan Password Lama</p>
                    <input type="password" 
							class="form-control rounded-3 py-2 poppins-bold" id="floatingPassword" 
							name="password_old" required>
                <p class="text-white fs-5 text-start mb-2 pt-3 poppins-bold">Masukan Password Baru</p>
                    <input type="password" 
							class="form-control rounded-3 py-2 poppins-bold" id="floatingPassword" 
							name="password_new" required>
                <p class="text-white fs-5 text-start mb-2 pt-3 poppins-bold">Konfirmasi Password Baru</p>
                    <input type="password" 
							class="form-control rounded-3 py-2 poppins-bold" 
							id="floatingPassword" 
							name="password_new_confirm" required>
                <div class="row">
                    <div class="col-8 offset-2">
                        <button type="submit" name="ganti_password" 
								class="btn btn-lg bg-blue-1 text-white mt-4 rounded-5 w-100 poppins-bold" 
								style="background-color: #3795BD;">Ganti Password</button>
                    </div>
                </div>
            </form>
        </div>
	</div>

	<footer class="row text-white text-center px-5 d-flex flex-column justify-content-center" style="min-height: 10vh;">
        <h3 class="poppins-medium">@informatics Enginerring 22</h3>
    </footer>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" type="text/javascript"
		charset="utf-8"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<script type="text/javascript">
    // Cek apakah ada pesan SweetAlert di session
    <?php if ($swalMessage): ?>
        let swalMessage = <?= $swalMessage ?>;
        
        // Tampilkan SweetAlert
        Swal.fire({
            title: swalMessage.title,
            text: swalMessage.text,
            icon: swalMessage.icon
        }).then((result) => {
            // Jika ada redirect, lakukan redirect setelah Swal selesai ditampilkan
            if (swalMessage.redirect && result.isConfirmed) {
                window.location.href = swalMessage.redirect;
            }
        });
    <?php endif; ?>
</script>

</body>

</html>