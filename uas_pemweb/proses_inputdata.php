<?php
include 'koneksi.php';

$nama_produk = htmlspecialchars($_POST['nama_produk']);
$harga_produk = htmlspecialchars($_POST['harga_produk']);
$kategori_produk = htmlspecialchars($_POST['kategori_produk']);
$status = htmlspecialchars($_POST['stats']);

$query = "INSERT INTO produk (nama_produk, harga_produk, kategori_produk, stats) VALUES ('$nama_produk', '$harga_produk', '$kategori_produk', '$status')";

if ($conn->query($query) === TRUE) {
    header('Location: index.php');
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}

$conn->close();
?>