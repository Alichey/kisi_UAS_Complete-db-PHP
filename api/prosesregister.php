<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");

include('koneksi.php');

// Membaca data JSON yang dikirim oleh Axios dari React
$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['nama']) && isset($data['username']) && isset($data['password'])) {
    $nama = $data['nama'];
    $username = $data['username'];
    $password = $data['password']; // Disarankan menggunakan password_hash jika untuk produksi

    // 1. Cek apakah username sudah terdaftar sebelumnya agar tidak duplikat
    $cekQuery = "SELECT id FROM pengguna WHERE username = ? AND del = 0";
    $stmtCek = mysqli_prepare($conn, $cekQuery);
    mysqli_stmt_bind_param($stmtCek, "s", $username);
    mysqli_stmt_execute($stmtCek);
    mysqli_stmt_store_result($stmtCek);

    if (mysqli_stmt_num_rows($stmtCek) > 0) {
        echo json_encode(['STATUS' => 'GAGAL', 'PESAN' => 'Username sudah digunakan!', 'DATA' => []]);
        mysqli_stmt_close($stmtCek);
        exit;
    }
    mysqli_stmt_close($stmtCek);

    // 2. Jika username aman, masukkan data pengguna baru ke database
    // Kolom 'del' diberi nilai default 0 (aktif/tidak dihapus)
    $query = "INSERT INTO pengguna (nama, username, password, del) VALUES (?, ?, ?, 0)";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sss", $nama, $username, $password);
        
        if (mysqli_stmt_execute($stmt)) {
            echo json_encode(['STATUS' => 'BERHASIL', 'PESAN' => 'Pendaftaran berhasil', 'DATA' => []]);
        } else {
            echo json_encode(['STATUS' => 'GAGAL', 'PESAN' => 'Gagal menyimpan data ke database', 'DATA' => []]);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo json_encode(['STATUS' => 'GAGAL', 'PESAN' => 'Masalah query prepare database', 'DATA' => []]);
    }
} else {
    echo json_encode(['STATUS' => 'GAGAL', 'PESAN' => 'Data input tidak lengkap', 'DATA' => []]);
}
?>