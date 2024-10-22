<?php
    $key = "pytzch";
    require __DIR__ . '/backend/db/connect.php'; 
    require __DIR__ . '/backend/controllers/SessionController.php'; 
    require __DIR__ . '/backend/controllers/TugasController.php'; 
    
    use Backend\Controllers\SessionController;
    use Backend\Controllers\TugasController;
    
    
    SessionController::checkAccess("users");
    
    $tugasController = new TugasController($conn);
    $tugasControllerResult = $tugasController->getTabletugas();
    
    $tugasControllerResultData = $tugasControllerResult['getTableTugasdata']; 
    $tugasControllerResultCount = $tugasControllerResult['getTableTugasCount']; 

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas</title>
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
        .expired{
            transition: .5s;
        }
        .unexpired .floating-img{
            display: none;
        }
        .expired .floating-img{
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('do_not-removebg-preview.png');
            background-repeat-x: repeat;
            background-repeat-y: no-repeat;
            background-position: center center;
            opacity: 1;
            transition: .5s;
        }
        .expired:hover .floating-img{
            opacity: 0;
            z-index: -1;
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
		<h1 class="py-2 rounded-4 w-75 mx-auto poppins-bold" style="background-color: #3795BD;">Tugas Harian</h1>
	</div>
      
    <div class="row text-center pt-3" style="min-height: 70vh;">
    <?php if ($tugasControllerResultCount > 0): ?>
        <?php foreach ($tugasControllerResultData as $index => $value): ?>
            <div class="col-xl-6 col-md-6 col-sm-12">
                <div class="row pt-4 px-5">
                    <h2 class="text-white w-auto px-3 py-1 rounded-4 poppins-bold title-tugas">
                        Tugas <?= intval($index + 1); ?>
                    </h2>
                </div>
                <div class="row pt-1 poppins-bold <?= intval($value['status']) == 1 ? 'unexpired' : 'expired' ?> px-5">
                    <div class="card text-start py-2 px-3 rounded-4">
                        <div class="row">
                            <div class="col-3">Matkul</div>
                            <div class="col-1">:</div>
                            <div class="col-8"><?= htmlspecialchars($value['nama_mata_kuliah'], ENT_QUOTES, 'UTF-8') ?></div>
                        </div>
                        <div class="row">
                            <div class="col-3">Dosen</div>
                            <div class="col-1">:</div>
                            <div class="col-8"><?= $tugasController->getDosen(htmlspecialchars($value['nama_mata_kuliah'], ENT_QUOTES, 'UTF-8')) ?></div>
                        </div>
                        <div class="row">
                            <div class="col-3">Deadline</div>
                            <div class="col-1">:</div>
                            <div class="col-8"><?= htmlspecialchars($value['hari'], ENT_QUOTES, 'UTF-8') ?>, <?= htmlspecialchars($value['dateline_tugas'], ENT_QUOTES, 'UTF-8') ?></div>
                        </div>
                        <div class="row">
                            <div class="col-3">Tugas</div>
                            <div class="col-1">:</div>
                            <div class="col-8"> <?= htmlspecialchars($value['isi_tugas'], ENT_QUOTES, 'UTF-8') ?></div>
                        </div>
                        <div class="floating-img rounded-4"></div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <h1>Tidak ada Tugas</h1>
    <?php endif; ?>
</div>


	
    <footer class="row text-white text-center px-5 d-flex flex-column justify-content-center" style="min-height: 10vh;">
        <h3 class="poppins-medium">@informatics Engineering 22</h3>
    </footer>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" type="text/javascript"
		charset="utf-8"></script>
</body>

</html>