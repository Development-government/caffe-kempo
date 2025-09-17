<?php
// Konfigurasi database
$host = "localhost";
$user = "root"; 
$pass = "";     
$db   = "caffe_kempo"; 

// Koneksi ke MySQL
$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil semua data pesanan
$sql = "SELECT * FROM pesanan ORDER BY tanggal DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>History Pesanan</title>
  <style>
    body { font-family: Arial, sans-serif; background: #f9f9f9; padding: 20px; }
    h1 { text-align: center; }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; background: #fff; }
    th, td { border: 1px solid #ccc; padding: 10px; text-align: center; }
    th { background: #333; color: #fff; }
    tr:nth-child(even) { background: #f2f2f2; }
  </style>
</head>
<body>
  <h1>History Pesanan</h1>

  <table>
    <tr>
      <th>ID</th>
      <th>Nama</th>
      <th>Telepon</th>
      <th>Alamat</th>
      <th>Total Harga</th>
      <th>Tanggal</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row['id']."</td>
                    <td>".$row['nama']."</td>
                    <td>".$row['telepon']."</td>
                    <td>".$row['alamat']."</td>
                    <td>IDR ".number_format($row['total_harga'],0,',','.')."</td>
                    <td>".$row['tanggal']."</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='6'>Belum ada pesanan</td></tr>";
    }
    ?>
  </table>
</body>
</html>
<?php
$conn->close();
?>
