<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Toko Kurnia</title>
</head>
<body>
    <div class="header">
        <h1>Toko Kurnia</h1>
    </div>

    <?php
        session_start();

        //mencari jenis browser
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $browser_type = '';

        // Mencari Jenis Browser yang digunakan
        if (strpos($user_agent, 'MSIE') !== false || strpos($user_agent, 'Trident') !== false) {
            $browser_type = 'Internet Explorer';
        } elseif (strpos($user_agent, 'Firefox') !== false) {
            $browser_type = 'Mozilla Firefox';
        } elseif (strpos($user_agent, 'Chrome') !== false) {
            $browser_type = 'Google Chrome';
        } elseif (strpos($user_agent, 'Safari') !== false) {
            $browser_type = 'Safari';
        } elseif (strpos($user_agent, 'Opera') !== false || strpos($user_agent, 'OPR') !== false) {
            $browser_type = 'Opera';
        } elseif (strpos($user_agent, 'Edge') !== false) {
            $browser_type = 'Microsoft Edge';
        } else {
            $browser_type = 'Unknown Browser';
        }

        //menyimpan browser type ke local storage
        echo "<script>localStorage.setItem('browser_type', '" . $browser_type . "');</script>";

        //ambil ip address
        $ipaddr = getenv('REMOTE_ADDR');
    ?>

    <div class="content">
        <h1>Informasi Pengguna</h1>
        
        <div id="browserInfo"></div>

        <h1>Tambah Data Produk</h1>
        <form id="formInput" action="proses_inputdata.php" method="post" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="nama_produk">Nama Produk:</label>
                <input type="text" id="nama_produk" name="nama_produk">
            </div>

            <div class="form-group">
                <label for="harga_produk">Harga Produk:</label>
                <input type="number" id="harga_produk" name="harga_produk">
            </div>

            <div class="form-group">
                <label for="kategori_produk">Kategori:</label>
                <select class="form-control" id="kategori_produk" name="kategori_produk">
                    <option value="Makanan">Makanan</option>
                    <option value="Minuman">Minuman</option>
                </select>
            </div>

            <div class="form-group">
                <p>Status:</p>
                <input type="checkbox" id="stats" name="stats" value="Tersedia">
                <label for="stats">Tersedia</label><br>
            </div>

            <input type="submit" class="button" value="Submit">
            <input type="button" class="button" value="Reset" onclick="resetForm()">
        </form>
    </div>
    
    <div class="content">
        <h1>Informasi Produk</h1>

        <table class="tables">
            <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Harga Produk</th>
                <th>Kategori Produk</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>

            <tbody>
                <?php
                include 'koneksi.php';

                // Query untuk mengambil keseluruhan database
                $query = "SELECT * FROM produk";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['nama_produk'] . "</td>";
                    echo "<td>" . $row['harga_produk'] . "</td>";
                    echo "<td>" . $row['kategori_produk'] . "</td>";

                    // logic untuk menmeriksa apakah stats Tersedia atau array kosong, jika array kosong, maka akan menampilkan "Tidak Tersedia"
                    if ($row['stats'] != "Tersedia"){
                        echo "<td>" . 'Tidak Tersedia' . "</td>";
                    }else {
                        echo "<td>" . $row['stats'] . "</td>";
                    }
                    
                    //button hapus produk untuk menghapus produk berdasarkan id
                    echo "<td>
                            <a href='hapus_produk.php?id=" . $row['id'] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus produk ini?\")'>Hapus</a>
                        </td>";
                    echo "</tr>";
                    echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Tidak ada produk.</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <script>
        // Fungsi resetForm untuk mereset formulir input pengguna ketika button reset di klik
        function resetForm() {
            var form = document.getElementById('formInput');
            form.reset();
        }

        // Ambil nilai dari localStorage dan tampilkan text di element dengan ID 'browserInfo'
        var browserType = localStorage.getItem('browser_type');
        document.getElementById('browserInfo').textContent = 'Browser Type: ' + browserType;

        //validateForm untuk validasi apakah semua input field sudah terisi atau belum. Jika belum, akan muncul alert
        function validateForm() {
            var namaProduk = document.getElementById('nama_produk').value;
            var hargaProduk = document.getElementById('harga_produk').value;
            var kategoriProduk = document.getElementById('kategori_produk').value;

            // Validasi form
            if (namaProduk === '' || hargaProduk === '' || kategoriProduk === '') {
                alert('Mohon lengkapi semua kolom!');
                return false;
            }

            return true;
        }
    </script>
    
</body>
</html>
