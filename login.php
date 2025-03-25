<?php
session_start(); // Mulai sesi untuk menyimpan data pengguna

// Konfigurasi koneksi database
$servername = "localhost";
$username   = "root";    
$password   = "";        
$dbname     = "brainz_db";

// Buat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form login
$email    = $_POST['email'];
$password = $_POST['password'];

// Cek apakah email terdaftar di database
$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    // Verifikasi password dengan hash yang tersimpan
    if (password_verify($password, $user['password'])) {
        // Simpan data pengguna ke sesi
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['full_name'] = $user['full_name'];
        $_SESSION['email'] = $user['email'];

        echo "<script>
                alert('Login berhasil! Selamat datang, {$user['full_name']}');
                window.location.href='dashboard.php';
              </script>";
    } else {
        echo "<script>
                alert('Password salah! Coba lagi.');
                window.location.href='login.php';
              </script>";
    }
} else {
    echo "<script>
            alert('Email tidak ditemukan! Silakan daftar terlebih dahulu.');
            window.location.href='signup.php';
          </script>";
}

$conn->close();
?>
