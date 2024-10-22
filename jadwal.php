<?php
$key = "pytzch";
require __DIR__. '/backend/db/connect.php'; 
require __DIR__. '/backend/controllers/SessionController.php'; 
require __DIR__. '/backend/controllers/JadwalController.php'; 

use Backend\Controllers\SessionController;
use Backend\Controllers\JadwalController;

SessionController::checkAccess("users");

$jadwalController = new JadwalController($conn);
$jadwalControllerResult = $jadwalController->getTableJadwal();

$groupedJadwalData = $jadwalControllerResult['getTableJadwalGroupedByHari']; 
$jadwalControllerResultCount = $jadwalControllerResult['getTableJadwalCount']; 
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="font.css">
	<style>
		html{
			overflow-x: hidden !important;
		}
		body {
			width: 100% !important;
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

	<div class="row text-white px-5 text-center d-flex flex-column justify-content-end" style="min-height: 20vh;">
		<h1 class="py-2 rounded-4 w-75 mx-auto poppins-bold" style="background-color: #3795BD;">jadwal</h1>
	</div>

	<div class="row pt-3 px-5 text-center" style="min-height: 70vh;">
        <?php if ($jadwalControllerResultCount > 0): ?>
            <?php foreach ($groupedJadwalData as $hari => $jadwals): ?>
            <div class="col-xl-6">
                <div class="row pt-3">
                    <h2 class="text-white w-auto rounded-4 poppins-bold" style="background-color: #3795BD;"><?= htmlspecialchars($hari, ENT_QUOTES, 'UTF-8') ?></h2>
                </div>
                <div class="row">
                    <div class="card text-start py-2 rounded-4 poppins-bold">
                        <?php foreach ($jadwals as $index => $value): ?>
                            <div class="row">
                                <div class="col-3">Matkul</div>
                                <div class="col-1">:</div>
                                <div class="col-8"> <?= htmlspecialchars($value['nama_mata_kuliah'], ENT_QUOTES, 'UTF-8') ?></div>
                            </div>
                            <div class="row">
                                <div class="col-3">Dosen</div>
                                <div class="col-1">:</div>
                                <div class="col-8"><?= htmlspecialchars($value['dosen_mata_kuliah'], ENT_QUOTES, 'UTF-8') ?></div>
                            </div>
                            <div class="row">
                                <div class="col-3">Waktu</div>
                                <div class="col-1">:</div>
                                <div class="col-8"><?= htmlspecialchars($value['waktu_mata_kuliah'], ENT_QUOTES, 'UTF-8') ?></div>
                            </div>
                            <?php if ($index < count($jadwals) - 1): ?>
                                <hr class="my-2">
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>Tidak ada jadwal tersedia.</p>
        <?php endif; ?>
    </div>

	<footer class="row text-white text-center px-5 d-flex flex-column justify-content-center" style="min-height: 10vh;">
        <h3 class="poppins-medium">@informatics Enginerring 22</h3>
    </footer>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" type="text/javascript"
		charset="utf-8"></script>
</body>

</html>