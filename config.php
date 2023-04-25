<?php
$servername = "localhost"; // Ganti dengan nama server MySQL kamu
$username = "root"; // Ganti dengan username MySQL kamu
$password = "230104Merdeka@"; // Ganti dengan password MySQL kamu
$dbname = "testphp"; // Ganti dengan nama database kamu

// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Memeriksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
echo "Koneksi berhasil!";
?>


<?php
// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Memeriksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}