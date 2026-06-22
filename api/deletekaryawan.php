<?php
include('koneksi.php');

//saat menggunakan POST
$data = json_decode(file_get_contents('php://input'), true);

$query="UPDATE karyawan SET del=1, usr=0 WHERE idKaryawan =? ";

$stmt = mysqli_prepare($conn, $query);

if ($stmt) {
    $idKaryawan=$data['id_karyawan'];

    mysqli_stmt_bind_param($stmt,'i',$idKaryawan);

    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(['STATUS'=>'BERHASIL', 'PESAN'=>'DATA PENGGUNA BERHASIL DIHAPUS','DATA'=>[]]);
    } else {
        echo json_encode(['STATUS'=>'GAGAL', 'PESAN'=>'DATA PENGGUNA GAGAL DIHAPUS','DATA'=>[]]);
    }

} else {
    echo json_encode(['STATUS'=>'GAGAL','PESAN'=>'MASALAH KONEKSI','DATA'=>[]]);
}
?>