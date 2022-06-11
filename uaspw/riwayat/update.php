<?php 
include '../koneksi.php';

header("Content-Type: application/json; charset=UTF-8");

$id = $_POST['id'];
$isbn = $_POST['isbn'];
$username = $_POST['username'];
$tanggl_pinjam = $_POST['tanggl_pinjam'];
$tanggal_pengembalian = $_POST['tanggal_pengembalian'];
$judul = $_POST['judul'];

$query =  "UPDATE `riwayat` SET `isbn`='$isbn',`username`='$username', `tanggl_pinjam`='$tanggl_pinjam',`tanggal_pengembalian`='$tanggal_pengembalian',`judul`='$judul' WHERE `id`='$id'";
$execute = $dbConn->query($query);
$response = [];


if ($execute) {
    $response['status'] = 'succcess';
    $response['message'] = 'data berhasil diupdate';
} else {
    $response['status'] = 'failed';
    $response['message'] = 'data gagal diupdate';
}
$json = json_encode($response, JSON_PRETTY_PRINT);
echo $json;



?>
