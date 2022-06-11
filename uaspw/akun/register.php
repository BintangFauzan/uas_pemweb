<?php 
include '../koneksi.php';

  header("Content-Type: application/json; charset=UTF-8");

    $username = $_POST['username'];
    $password = $_POST['password'];
    $ttl = $_POST['ttl'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $no_hp = $_POST['no_hp'];

    $query =  "INSERT INTO `user`(`username`, `password`, `ttl`, `alamat`, `jenis_kelamin`, `no_hp`) VALUES ('$username','$password','$ttl','$alamat',           '$jenis_kelamin','$no_hp')";
    $execute = $dbConn->query($query);
    $response = [];

    if ($execute) {
        $response['status'] = 'succcess';
        $response['message'] = 'data berhasil ditambahkan';
    } else {
        $response['status'] = 'failed';
        $response['message'] = 'data gagal ditambahkan';
    }
    $json = json_encode($response, JSON_PRETTY_PRINT);
    echo $json;



?>