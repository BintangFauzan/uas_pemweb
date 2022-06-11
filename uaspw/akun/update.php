<?php 
include '../koneksi.php';

header("Content-Type: application/json; charset=UTF-8");

$password = $_POST['password'];
$username = $_POST['username'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];

$query =  "UPDATE `user` SET `username`='$username',`alamat`='$alamat',`no_hp`='$no_hp' WHERE `password`='$password'";
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
