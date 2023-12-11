<?php
require_once 'functions.php';

$karyawanData = fetchDataFromDatabase();
updateJamLembur();
$rekapMingguan = hitungRekapMingguan();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Menghitung Upah Karyawan</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Sistem Informasi Sederhana Untuk Menghitung Upah Karyawan</h1>

    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <table>
            <tr>
                <th>Nomor Induk Karyawan</th>
                <th>Nama Karyawan</th>
                <th>Upah Per Jam</th>
                <th>Jam Kerja</th>
                <th>Upah Lembur</th>
                <th>Jam Lembur</th>
            </tr>
            <?php foreach ($karyawanData as $karyawan): ?>
                <tr>
                    <td><?php echo $karyawan->nik; ?></td>
                    <td><?php echo $karyawan->nama; ?></td>
                    <td><?php echo "Rp. " . number_format($karyawan->upah_per_jam, 0, ',', '.'); ?></td>
                    <td><?php echo $karyawan->jam_kerja; ?></td>
                    <td><?php echo "Rp. " . number_format($karyawan->hitungUpahLembur(), 0, ',', '.'); ?></td>
                    <td><input type="number" name="jamLembur_<?php echo $karyawan->nik; ?>" value="<?php echo $karyawan->jam_lembur; ?>"></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <table>
            <tr>
                <?php for ($mingguKe = 1; $mingguKe <= 7; $mingguKe++): ?>
                    <th>Minggu Ke-<?php echo $mingguKe; ?></th>
                <?php endfor; ?>
            </tr>
            <?php foreach ($karyawanData as $karyawan): ?>
                <tr>
                    <?php for ($mingguKe = 1; $mingguKe <= 7; $mingguKe++): ?>
                        <td><?php echo "Rp. " . number_format($rekapMingguan[$karyawan->nik][$mingguKe], 0, ',', '.'); ?></td>
                    <?php endfor; ?>
                </tr>
            <?php endforeach; ?>
        </table>

        <button type="submit">Lihat Gaji</button>
    </form>
</body>
</html>

<?php
$koneksi->close();
?>
