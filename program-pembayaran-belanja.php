<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <!-- Ini adalah judul aplikasi pembayaran belanja -->
    <title>Pembayaran Belanja</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .item-row {
            margin-bottom: 8px;
        }
        label {
            margin-right: 5px;
        }
        .add-link {
            color: blue;
            cursor: pointer;
            text-decoration: underline;
            margin-bottom: 10px;
            display: inline-block;
        }
        .result {
            margin-top: 15px;
            font-family: monospace;
            white-space: pre-line;
        }
    </style>
    <script>
        function tambahBarang() {
            const container = document.getElementById('container-barang');
            const index = container.children.length + 1;

            const div = document.createElement('div');
            div.className = 'item-row';

            div.innerHTML = `
                Jumlah: <input type="number" name="jumlah[]" value="1" min="1" required> 
                Harga: <input type="number" name="harga[]" value="1000" min="1" required>
            `;

            container.appendChild(div);
        }
    </script>
</head>
<body>
    <h2 style="text-align:center;">Pembayaran Belanja</h2>

    <form method="post" action="">
        <div id="container-barang">
            <div class="item-row">
                Jumlah: <input type="number" name="jumlah[]" value="10" min="1" required>
                Harga: <input type="number" name="harga[]" value="2000" min="1" required>
            </div>
            <div class="item-row">
                Jumlah: <input type="number" name="jumlah[]" value="3" min="1" required>
                Harga: <input type="number" name="harga[]" value="10000" min="1" required>
            </div>
        </div>
        <a class="add-link" onclick="tambahBarang()">+ Tambah Barang</a>
        <br>
        <button type="submit" name="hitung">Hitung</button>
    </form>

    <div class="result">
        <?php
// Proses perhitungan pembayaran belanja
        if (isset($_POST['hitung'])) {
            $jumlah = $_POST['jumlah'];
            $harga = $_POST['harga'];

            $totalBelanja = 0;
            $detail = "";

            foreach ($jumlah as $key => $jml) {
                $hrg = $harga[$key];
                $subtotal = $jml * $hrg;
                $totalBelanja += $subtotal;
                $detail .= "Barang " . ($key + 1) . ": " . $jml . " x Rp " . number_format($hrg,0,',','.') . " = Rp " . number_format($subtotal,0,',','.') . "\n";
            }

            $diskon = 0.05 * $totalBelanja;
            $bayar = $totalBelanja - $diskon;

            echo nl2br($detail);
            echo "<hr>";
            echo "Total Belanja: Rp " . number_format($totalBelanja,0,',','.') . "<br>";
            echo "Diskon 5%: Rp " . number_format($diskon,0,',','.') . "<br>";
            echo "Bayar: Rp " . number_format($bayar,0,',','.') . "<br>";
        }
        ?>
    </div>
</body>
</html>

