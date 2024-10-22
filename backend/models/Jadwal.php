<?php

namespace Backend\Models;

if (empty($key) || $key !== "pytzch") { header('Location: /login'); exit; }

class Jadwal
{
    private $conn;
    private $table = 'jadwal';

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getTableJadwal()
    {
        $query = "SELECT * FROM " . $this->table . " ORDER BY hari_mata_kuliah ASC, waktu_mata_kuliah ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        $hariMap = [
            1 => 'Senin',
            2 => 'Selasa',
            3 => 'Rabu',
            4 => 'Kamis',
            5 => 'Jumat',
            6 => 'Sabtu',
            7 => 'Minggu'
        ];

        $getTableJadwalCount = 0;
        $getTableJadwalData = [];
        if ($result->num_rows > 0) {
            $getTableJadwalCount = 1;
            while ($row = $result->fetch_assoc()) {
                $row['hari_mata_kuliah'] = $hariMap[$row['hari_mata_kuliah']] ?? 'Unknown';
                $getTableJadwalData[] = $row;
            }
        } else {
            $getTableJadwalCount = 0;
        }

        return ['getTableJadwalCount' => $getTableJadwalCount, 'getTableJadwaldata' => $getTableJadwalData];
    }

}
