<?php 
include '../koneksi.php';

header("Content-Type: application/json; charset=UTF-8");

$isbn = $_POST['isbn'];
$judul = $_POST['judul'];
$pengarang = $_POST['pengarang'];
$penerbit = $_POST['penerbit'];
$tahun_terbit = $_POST['tahun_terbit'];
$kategori = $_POST['kategori'];

$query =  "UPDATE `katalog_buku` SET `JUDUL`='$judul',`PENGARANG`='$pengarang', `penerbit`='$penerbit',`tahun_terbit`='$tahun_terbit',`kategori`='$kategori' WHERE `ISBN`='$isbn'";
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
