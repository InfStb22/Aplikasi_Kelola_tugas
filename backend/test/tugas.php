<?php
    $key = "pytzch";
    require '../db/connect.php'; 
    require '../controllers/SessionController.php'; 
    require '../controllers/TugasController.php'; 
    
    use Backend\Controllers\SessionController;
    use Backend\Controllers\TugasController;
    
    
    SessionController::checkAccess("users");
    
    $tugasController = new TugasController($conn);
    $tugasControllerResult = $tugasController->getTabletugas();
    
    $tugasControllerResultData = $tugasControllerResult['getTableTugasdata']; 
    $tugasControllerResultCount = $tugasControllerResult['getTableTugasCount']; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tugas</title>
</head>
<body>
    <h1>tugas</h1>
    <a href="dashboard.php">dashboard</a>
    <a href="jadwal.php">Jadwal</a>
    <a href="tugas.php">Tugas</a>
    <a href="settings.php">Settings</a>
    <?php if ($tugasControllerResultCount > 0): ?>
        <?php foreach ($tugasControllerResultData as $index => $value): ?>
            <ul>
                <li><strong>Tugas <?= intval($index + 1) ?></strong></li>
                <li><strong>Nama Mata Kuliah:</strong> <?= htmlspecialchars($value['nama_mata_kuliah'], ENT_QUOTES, 'UTF-8') ?></li>
                <li><strong>Dosen:</strong> <?= $tugasController->getDosen(htmlspecialchars($value['nama_mata_kuliah'], ENT_QUOTES, 'UTF-8')) ?></li>
                <li><strong>Isi Tugas:</strong> <?= htmlspecialchars($value['isi_tugas'], ENT_QUOTES, 'UTF-8') ?></li>
                <li><strong>Dateline Tugas:</strong> <?= htmlspecialchars($value['dateline_tugas'], ENT_QUOTES, 'UTF-8') ?></li>
                <li><strong>Hari:</strong> <?= htmlspecialchars($value['hari'], ENT_QUOTES, 'UTF-8') ?></li>
                <li><strong>Bulan:</strong> <?= htmlspecialchars($value['bulan'], ENT_QUOTES, 'UTF-8') ?></li>
                <li><strong>Status:</strong> <?= htmlspecialchars($value['status'], ENT_QUOTES, 'UTF-8') ?></li>
                <li><strong>Pesan Status:</strong> <?= htmlspecialchars($value['status_message'], ENT_QUOTES, 'UTF-8') ?></li>
            </ul>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Tidak ada Tugas</p>
    <?php endif; ?>
    
</body>
</html>
