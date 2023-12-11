CREATE TABLE karyawan (
    nik INT PRIMARY KEY,
    nama VARCHAR(255),
    upah_per_jam INT,
    jam_kerja INT,
    jam_lembur INT);

INSERT INTO karyawan (nik, nama, upah_per_jam, jam_kerja, jam_lembur) VALUES
(220030001, 'Wayan', 35000, 48, 0),
(220030002, 'Made', 45000, 48, 0),
(220030003, 'Kadek', 25000, 48, 0),
(220030004, 'Nyoman', 55000, 48, 0),
(220030005, 'Ketut', 65000, 48, 0);