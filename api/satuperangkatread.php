<?php
include('koneksi.php');

// Mengambil parameter ID dari URL (?id=...)
$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id) {
    // Query hanya mengambil 1 data perangkat yang ID-nya sesuai dan belum dihapus
    $query = "SELECT * FROM perangkat WHERE id = ? AND del = 0 LIMIT 1";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'i', $id);

        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) > 0) {
                $datas = array();
                while ($row = mysqli_fetch_assoc($result)) {
                    $datas[] = $row;
                }
                echo json_encode(['STATUS' => 'BERHASIL', 'PESAN' => 'DATA PERANGKAT DITEMUKAN', 'DATA' => $datas]);
            } else {
                echo json_encode(['STATUS' => 'GAGAL', 'PESAN' => 'DATA TIDAK DITEMUKAN', 'DATA' => []]);
            }
        } else {
            echo json_encode(['STATUS' => 'GAGAL', 'PESAN' => 'GAGAL MENGEKSEKUSI QUERY', 'DATA' => []]);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo json_encode(['STATUS' => 'GAGAL', 'PESAN' => 'GAGAL PREPARE QUERY', 'DATA' => []]);
    }
} else {
    echo json_encode(['STATUS' => 'GAGAL', 'PESAN' => 'ID PERANGKAT KOSONG', 'DATA' => []]);
}
?>