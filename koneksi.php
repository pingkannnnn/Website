<?PHP
// Mengatur data koneksi
$host = "localhost"; // Alamat server MySQL (biasanya localhost)
$user = "root"; // Username MySQL (default: root)
$pass = ""; // Password MySQL (default: kosong)
$dbname = "belajar_php_kelasc"; // Nama database

//Membuat koneksi
$conn = mysqli_connect($host, $user, $pass, $dbname);

// Cek apakah Koneksi berhasil
if (!$conn) {
    die("koneksi Error: " . mysqli_connect_error());
}
echo "Koneksi Seccess!";
?>