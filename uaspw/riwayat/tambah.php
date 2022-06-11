    <?php
  include '../koneksi.php';

  header("Content-Type: application/json; charset=UTF-8");

    $id = $_POST['id'];
    $isbn = $_POST['isbn'];
    $username = $_POST['username'];
    $tanggl_pinjam = $_POST['tanggl_pinjam'];
    $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
    $judul = $_POST['judul'];

    $query =  "INSERT INTO `riwayat`(`id`, `isbn`, `username`, `tanggl_pinjam`, `tanggal_pengembalian`, `judul`) VALUES ('$id','$isbn','$username','$tanggl_pinjam','$tanggal_pengembalian','$judul')";
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
