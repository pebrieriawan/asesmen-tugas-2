<?php
require_once 'dbconfig.php';
require_once 'karyawan.php';

function fetchDataFromDatabase() {
    global $koneksi;

    $query = "SELECT * FROM karyawan";
    $result = $koneksi->query($query);

    $karyawanData = array();
    while ($row = $result->fetch_assoc()) {
        $karyawan = new Karyawan($row['nik'], $row['nama'], $row['upah_per_jam'], $row['jam_kerja'], $row['jam_lembur']);
        $karyawanData[] = $karyawan;
    }

    return $karyawanData;
}

function updateJamLembur() {
    global $koneksi, $karyawanData;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        foreach ($karyawanData as $karyawan) {
            $newJamLembur = $_POST["jamLembur_" . $karyawan->nik];

            $updateQuery = "UPDATE karyawan SET jam_lembur = '$newJamLembur' WHERE nik = '{$karyawan->nik}'";
            $koneksi->query($updateQuery);

            $karyawan->jam_lembur = $newJamLembur;
        }
    }
}

function hitungRekapMingguan() {
    global $karyawanData;

    $rekapMingguan = array();

    foreach ($karyawanData as $karyawan) {
        $rekapMingguan[$karyawan->nik] = array();

        for ($mingguKe = 1; $mingguKe <= 7; $mingguKe++) {
            $totalGajiMingguan = $karyawan->hitungGaji();
            $rekapMingguan[$karyawan->nik][$mingguKe] = $totalGajiMingguan;
        }
    }

    return $rekapMingguan;
}
?>