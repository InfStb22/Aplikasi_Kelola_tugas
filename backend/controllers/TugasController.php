<?php

namespace Backend\Controllers;

require_once __DIR__ . '/../models/Tugas.php'; 
use Backend\Models\Tugas;

if (empty($key) || $key !== "pytzch") { header('Location: /login'); exit; }

class TugasController
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getTableTugas()
    {
        setlocale(LC_TIME, 'id_ID.utf8');
        $tugasModel = new Tugas($this->conn);
        return $tugasModel->getTableTugas(); 
    }

    public function getDosen($nama_mata_kuliah) {
        $tugasModel = new Tugas($this->conn); // Inisialisasi tugasModel di sini
        return $tugasModel->getDosenByMataKuliah($nama_mata_kuliah); // Menggunakan objek $tugasModel
    }
}
