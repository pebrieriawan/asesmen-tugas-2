<?php
$HOST = "localhost";
$PORT = 3306;
$DB = "db_gaji_karyawan";
$USER = "root";
$PASSWORD = "";

try {
    $koneksi = new mysqli($HOST, $USER, $PASSWORD, $DB, $PORT);
    if ($koneksi->connect_error) {
        throw new Exception("Koneksi ke database gagal: " . $koneksi->connect_error);
    }

} catch (Exception $e) {
    die("Terjadi kesalahan: " . $e->getMessage());
}
