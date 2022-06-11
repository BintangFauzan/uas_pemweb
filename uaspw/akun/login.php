<?php 
include '../koneksi.php';

 header("Content-Type: application/json; charset=UTF-8");

    $username = $_POST['username'];
    $password = $_POST['password'];


    $query =  "SELECT * FROM user  WHERE `username` = '$username' AND `password` = '$password'";
    $execute = $dbConn->query($query);
    $response = [];

    if ($execute) {
        $response['status'] = 'succcess';
        $response['message'] = 'login berhasil';
    } else {
        $response['status'] = 'failed';
        $response['message'] = 'login gagal';
    }
    $json = json_encode($response, JSON_PRETTY_PRINT);
    echo $json;


?>