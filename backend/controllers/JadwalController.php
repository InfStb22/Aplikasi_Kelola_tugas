<?php

namespace Backend\Controllers;

require_once __DIR__ . '/../models/Jadwal.php'; 
use Backend\Models\Jadwal;

if (empty($key) || $key !== "pytzch") { header('Location: /login.php'); exit; }

class JadwalController
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getTableJadwal()
    {
        $jadwalModel = new Jadwal($this->conn);
        $result = $jadwalModel->getTableJadwal(); 

        // Group data by 'hari_mata_kuliah'
        $groupedByHari = [];
        foreach ($result['getTableJadwaldata'] as $jadwal) {
            $groupedByHari[$jadwal['hari_mata_kuliah']][] = $jadwal;
        }

        // Return grouped data to view
        return ['getTableJadwalCount' => $result['getTableJadwalCount'], 'getTableJadwalGroupedByHari' => $groupedByHari];
    }

    
}
