<?php
ob_start();
$key = "pytzch";
require __DIR__ . '/backend/db/connect.php'; 
require __DIR__ . '/backend/controllers/AuthController.php';
require __DIR__ . '/backend/controllers/SessionController.php'; 

use Backend\Controllers\AuthController;
use Backend\Controllers\SessionController;


SessionController::checkAccess("non-login");

$authController = new AuthController($conn);
$authController->login();

$successMessage = isset($_SESSION['success_message']) ? $_SESSION['success_message'] : null;
unset($_SESSION['success_message']); 
$errorMessage = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : null;
unset($_SESSION['error_message']); 
ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="font.css">
    <link rel="manifest" href="manifest.json">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
		html{
			overflow-x: hidden !important;
		}
        body{
            overflow-x: hidden !important;
        }
    </style>
</head>
<body style="background:  #3A1078;">
    <div class="row text-white text-center px-5 d-flex flex-column justify-content-end" style="min-height: 25vh;">
        <h1 class="text-center text-white poppins-bold">MASUK</h1>
    </div>
    <div class="row text-white text-center px-5 pt-5 d-flex flex-column justify-content-start" style="min-height: 60vh;">
        <form method="post">
            <p class="text-white poppins-bold fs-3 text-start mb-2">Masukan Username</p>
            <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-4 poppins-bold" id="floatingInput" placeholder="name@example.com" name="nim">
                <label for="floatingInput" class="poppins-bold">USERNAME</label>
            </div>
            <p class="text-white poppins-bold fs-3 text-start mb-2 pt-3">Masukan Password</p>
            <div class="form-floating">
                <input type="password" class="form-control rounded-4 poppins-bold" id="floatingPassword" placeholder="Password" name="password">
                <label for="floatingPassword" class="poppins-bold">PASSWORD</label>
            </div>
            <div class="row">
                <div class="col-8 offset-2">
                    <button type="submit" name="login" class="btn btn-lg bg-blue-1 text-white poppins-bold mt-4 rounded-5 w-100" style="background-color: #3795BD;">Login</button>
                </div>
            </div>
        </form>
    </div>
    <footer class="row text-white text-center px-5 d-flex flex-column justify-content-center" style="min-height: 15vh;">
        <h3 class="poppins-medium">@informatics Enginerring 22</h3>
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript">
        <?php if ($errorMessage): ?>
            let errorMessage = <?= $errorMessage ?>;
            
            Swal.fire({
                title: errorMessage.title,
                text: errorMessage.text,
                icon: errorMessage.icon
            }).then((result) => {
                if (errorMessage.redirect && result.isConfirmed) {
                    window.location.href = errorMessage.redirect;
                }
            });
        <?php endif; ?>
        <?php if ($successMessage): ?>
            let successMessage = <?= $successMessage ?>;
            
            Swal.fire({
                title: successMessage.title,
                text: successMessage.text,
                icon: successMessage.icon
            }).then((result) => {
                if (successMessage.redirect && result.isConfirmed) {
                    window.location.href = successMessage.redirect;
                }
            });
        <?php endif; ?>
    </script>

    <script>
        if ('launchQueue' in window) {
            const shortcutButton = document.getElementById('addShortcut');

            shortcutButton.addEventListener('click', async () => {
                const shortcut = {
                    name: 'My Shortcut',
                    url: '/shortcut-url', // Ubah dengan URL yang diinginkan
                    icons: [{
                        src: 'shortcut-icon.png', // Ganti dengan ikon pintasan Anda
                        sizes: '192x192',
                        type: 'image/png'
                    }]
                };

                try {
                    await window.launchQueue.setLaunchItems({ shortcuts: [shortcut] });
                    alert('Pintasan berhasil ditambahkan!');
                } catch (error) {
                    console.error('Gagal menambahkan pintasan:', error);
                }
            });
        }

    </script>

</body>
</html>
