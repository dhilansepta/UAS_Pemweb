# UAS_Pemweb
## Bagian 1: Client-side Programming (Bobot: 30%)
1.1 (15%) Buatlah sebuah halaman web sederhana yang memanfaatkan JavaScript untuk melakukan manipulasi DOM.
Panduan:
- Buat form input dengan minimal 4 elemen input (teks, checkbox, radio, dll.) = 4 element input yang berada pada web ini bertype text, number, select, dan juga checkbox
- Menampilkan data dari server kedalam sebuah halaman menggunakan tag `table` = sudah di lakukan pada index.php line 84-131

1.2 (15%) Buatlah beberapa event untuk menghandle interaksi pada halaman web
Panduan:
- Tambahkan minimal 3 event yang berbeda untuk menghandle form pada 1.1 = 3 event untuk menghandle form diantaranya ada onclick pada button reset form untuk mereset formulir, onsubmit pada form untuk memanggil fungsi validateForm yang digunakan untuk memvalidasi apakah formulir sudah terisi semua atau belum.
- Implementasikan JavaScript untuk validasi setiap input sebelum diproses oleh PHP

## Bagian 2: Server-side Programming (Bobot: 30%)
2.1 (20%) Implementasikan script PHP untuk mengelola data dari formulir pada Bagian 1 menggunakan variabel global seperti `$_POST` atau `$_GET`. Tampilkan hasil pengolahan data ke layar.
Panduan:
- Gunakan metode POST atau GET pada formulir. = metode POST digunakan untuk melakukan input formulir pada database dalam file proses_inputdata.php dan metode GET digunakan untuk mengambil id pada data dalam tabel lalu melakukan delete data berdasarkan id di dalam file hapus_produk.php
- Parsing data dari variabel global dan lakukan validasi disisi server
- Simpan ke basisdata termasuk jenis browser dan alamat IP pengguna = dalam aplikasi web ini, jenis browser tidak saya simpan ke database melainkan hanya disimpan dalam localstorage browser.

2.2 (10%) Buatlah sebuah objek PHP berbasis OOP yang memiliki minimal dua metode dan gunakan objek tersebut dalam skenario tertentu pada halaman web Anda.
Panduan:
- Objek yang dibuat harus terkait dengan konteks pengembangan web saat ini

## Bagian 3: Database Management (Bobot: 20%)
3.1 (5%) Buatlah sebuah tabel pada database MySQL
Panduan:
- Lampirkan langkah-langkah dalam membuat basisdata dengan syntax basisdata
### Langkah-langkah membuat basis data
- jalankan query untuk pembuatan database bernama uas_pemweb : CREATE DATABASE uas_pemweb;
- Selanjutnya query untuk membuat table bernama produk dalam database uas_pemweb : 
CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga_produk` int(255) NOT NULL,
  `kategori_produk` enum('Makanan','Minuman') NOT NULL,
  `stats` varchar(255) NOT NULL
  );
- Jika tabel sudah dibuat, selanjutnya adalah menambahkan primary key pada kolom ID : ALTER TABLE `produk` ADD PRIMARY KEY (`id`);
  
3.2 (5%) Buatlah konfigurasi koneksi ke database MySQL pada file PHP. Pastikan koneksi berhasil dan dapat diakses.
Panduan:
- Gunakan konstanta atau variabel untuk menyimpan informasi koneksi (host, username, password, nama database). = Untuk Poin 3.2 sudah dilakukan pada koneksi.php pada koneksi.php saya konfigurasi agar bisa berjalan pada local

3.3 (10%) Lakukan manipulasi data pada tabel database dengan menggunakan query SQL. Misalnya, tambah data, ambil data, atau update data.
Panduan:
- Gunakan query SQL yang sesuai dengan skenario yang diberikan. = Manipulasi data pada database terdapat pada index.php dimana user dapat menghapus data pada tabel, dan juga user dapat melakukan input (tambah data) ke dalam tabel.

## Bagian 4: State Management (Bobot: 20%)
4.1 (10%) Buatlah skrip PHP yang menggunakan session untuk menyimpan dan mengelola state pengguna. Implementasikan logika yang memanfaatkan session.
Panduan:
- Gunakan `session_start()` untuk memulai session.
- Simpan informasi pengguna ke dalam session.

4.2 (10%) Implementasikan pengelolaan state menggunakan cookie dan browser storage pada sisi client menggunakan JavaScript.
Panduan:
- Buat fungsi-fungsi untuk menetapkan, mendapatkan, dan menghapus cookie.
- Gunakan browser storage untuk menyimpan informasi secara lokal. = saya menggunakan browser storage untuk menyimpan browser type.

## Bagian Bonus: Hosting Aplikasi Web (Bobot: 20%)
Bagian bonus ini akan memberikan bobot tambahan 20% jika Anda berhasil meng-host aplikasi web yang Anda buat. Jawablah pertanyaan-pertanyaan berikut:
- (5%) Apa langkah-langkah yang Anda lakukan untuk meng-host aplikasi web Anda?
### Langkah-langkah 
- Buat Akun di InfinityFree
- Daftar Domain atau Gunakan Subdomain InfinityFree
- Login Ke Control Panel
- Upload dan Tambahkan file website ke control panel
- Kembali ke infinityFree lalu buat database pada menu MySQLDatabase
- Tekan Create Database dan masukkan nama database lalu lanjutkan dengan menekan tombol Create Database lagi
- Masuk ke PHPMyAdmin
- import atau buat database sesuai kebutuhan website
- Setelah setup database berhasil, selanjutnya adalah merubah variabel koneksi dari file koneksi.php melalui control panel dan diubah mengikuti host, username, password, dan nama database yang diberikan infinityfree
- Setelah berhasil merubah host,username,password dan database seharusnya website sudah terhubung dengan database yang kita buat sebelumnya
- Selanjutnya adalah uji coba  situs web
  
- (5%) Pilih penyedia hosting web yang menurut Anda paling cocok untuk aplikasi web Anda. Berikan alasan Anda. = Saya memilih infinityfree dikarenakan gratis dan mudah. saya sempat mencoba 000webhost tapi stuck pada pembuatan situs

- (5%) Bagaimana Anda memastikan keamanan aplikasi web yang Anda host?
- (5%) Jelaskan konfigurasi server yang Anda terapkan untuk mendukung aplikasi web Anda.
