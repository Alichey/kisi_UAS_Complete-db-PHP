<?php
include('koneksi.php');

//saat menggunakan POST
$data = json_decode(file_get_contents('php://input'), true);

$query="UPDATE karyawan SET namaKaryawan =? , jabatanKaryawan =? , posisiKaryawan =? , mtm = NOW(), usr=0 WHERE idKaryawan =? ";

$stmt = mysqli_prepare($conn, $query);

if ($stmt) {
    $namaKaryawan=$data['nama_karyawan'];
    $jabatanKaryawan=$data['jabatan_karyawan'];
    $posisiKaryawan=$data['posisi_karyawan'];
    $idKaryawan=$data['id_karyawan'];

    mysqli_stmt_bind_param($stmt,'sssi',$namaKaryawan, $jabatanKaryawan, $posisiKaryawan, $idKaryawan);

    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(['STATUS'=>'BERHASIL', 'PESAN'=>'DATA PENGGUNA BERHASIL DIUPDATE', 'DATA'=>[]]);
    } else {
        echo json_encode(['STATUS'=>'GAGAL', 'PESAN'=>'DATA PENGGUNA GAGAL DIUPDATE', 'DATA'=>[]]);
    }

} else {
    echo json_encode(['STATUS'=>'GAGAL', 'PESAN'=>'MASALAH KONEKSI','DATA'=>[]]);
}

?>