<?php
// Konfigurasi database
$host = "localhost";
$user = "root"; // ganti sesuai username MySQL
$pass = "";     // ganti sesuai password MySQL
$db   = "caffe_kempo"; // nama database

// Koneksi ke MySQL
$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$nama        = $_POST['nama'];
$telepon     = $_POST['telepon'];
$alamat      = $_POST['alamat'];
$total_harga = $_POST['total_harga'];

// Simpan ke tabel pesanan
$sql = "INSERT INTO pesanan (nama, telepon, alamat, total_harga, tanggal)
        VALUES ('$nama', '$telepon', '$alamat', '$total_harga', NOW())";

if ($conn->query($sql) === TRUE) {
    echo "<h2>Pesanan berhasil disimpan!</h2>";
    echo "<p>Terima kasih, $nama. Pesanan Anda akan segera diproses.</p>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
