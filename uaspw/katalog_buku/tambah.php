    <?php
  include '../koneksi.php';

  header("Content-Type: application/json; charset=UTF-8");

    $isbn = $_POST['isbn'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $kategori = $_POST['kategori'];

    $query =  "INSERT INTO `katalog_buku`(`isbn`, `judul`, `pengarang`, `penerbit`, `tahun_terbit`, `kategori`) VALUES ('$isbn','$judul','$pengarang','$penerbit','$tahun_terbit','$kategori')";
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
