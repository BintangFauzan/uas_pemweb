<?php 
include '../koneksi.php';



$response = [
  'status' => false,
  'error' => '',
  'data' => []
];

//validasi http method
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
	header('Content-Type: application/json');
	http_response_code(400);
	$response['error'] = 'POST method require';
	echo json_encode($response);
	exit();
}

 $username = $_POST['username'] ?? '';
 $password = $_POST['password'] ?? '';

//validasi jika kosong
 $validasi = true;
 if(empty($username)){
 	$response['error'] = "username harus diisi";
 	$validasi = false;
 }
  if(empty($password)){
 	$response['error'] = "password harus diisi";
 	$validasi = false;
 }
if(!$validasi){
	header('Content-Type: application/json');
    echo json_encode($response);
    http_response_code(400);
    exit(0);
}

// try{
// 	$querycek = "SELECT * FROM user WHERE password = :password AND username = :username";
// 	$statement = $dbConn->prepare($querycek);
// 	$statement->bindValue(':password', $password);
// 	$statement->bindValue(':username', $username);
// 	$statement->execute();
//     $row = $statement->rowCount();
//     //jika data tidak ditemukan row count == 0
//      if($row === 0){
//         header('Content-Type: application/json');
//         $response['error'] = 'Data tidak ditemukan password '.$password;
//         $response['error'] = 'Data tidak ditemukan username '.$username;
//         echo json_encode($response);
//         http_response_code(400);
//         exit(0);
//     }
// }catch (Exception $exception){
//     header('Content-Type: application/json');
//     $response['error'] = $exception->getMessage();
//     echo json_encode($response);
//     http_response_code(400);
//     exit(0);
// }

try{
	$kolom = [];
	 $query =  "SELECT * FROM user  WHERE `username` = '$username' AND `password` = '$password'";
	$statement = $dbConn->prepare($query);
	$isOk = $statement->execute();
}catch (Exception $exception){
    header('Content-Type: application/json');
    $response['error'] = $exception->getMessage();
    echo json_encode($response);
    http_response_code(400);
    exit(0);
}
if(!$isOk){
    $response['error'] = $statement->errorInfo();
    http_response_code(400);
}

/**
 * Show output to client
 */
$response['status'] = $isOk;
header('Content-Type: application/json');
echo json_encode($response);
?>