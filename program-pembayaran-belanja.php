<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Ini adalah judul halaman -->
        <title>Program Pembayaran Belanja</title>
</head>
<body>
    <!-- ini adalah program menghitung pembayaran belanja -->
    <form method="post" action="">
    <h2>Program Pembayaran Menghitung Pembayaran Belanja</h2>
    <form method="post" action="">
        <label>Jumlah Barang :</label>
        <input type="number" name="jumlah_barang" required><br><br>
        
        <label>Harga per Barang :</label>
        <input type="number" name="harga_per_barang" required><br><br>
        <input type="submit" value="Hitung">
    </form>

<?php
// ambil input dari form
if (isset($_POST['hitung'])) {}
   // Ini adalah input jumlah barang
   $jumlah_barang = $_POST["jumlah_barang"];
   $harga_per_barang = $_POST["harga_per_barang"];
    // Proses perhitungan harga
   $total_belanja = $jumlah_barang * $harga_per_barang;
   $diskon = 0.05 * $total_belanja;
   $bayar = $total_belanja - $diskon;
    
   // Menampilkan hasil perhitungan
   echo "<h3>Hasil Perhitungan:</h3>";
   echo "Total belanja: Rp " . number_format($total_belanja, 0, ',', '.') . "<br>";
   echo "total belanja sebelum diskon: Rp " . number_format($total_belanja, 0, ',', '.') . "<br>";
   echo "jumlah barang: " . $jumlah_barang . "<br>";
   echo "harga per barang: Rp " . number_format($harga_per_barang, 0, ',', '.') . "<br>";
   echo "Diskon 5%: Rp " . number_format($diskon, 0, ',', '.') . "<br>";
   echo "Total bayar: Rp " . number_format($bayar, 0, ',', '.') . "<br>";

?>
</body>
</html>