<?php
$conn = new mysqli('localhost', 'root', '', 'tagihan');

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$id_pelanggan = ""; // Inisialisasi nilai awal untuk id_pelanggan

if (isset($_GET["id"])) {
    $id_pelanggan = $_GET["id"];
    $sql = "SELECT * FROM data_pelanggan WHERE id_pelanggan='$id_pelanggan'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $id_pelanggan = $data["id_pelanggan"];
        $nama_pelanggan = $data["nama_pelanggan"];
        $alamat = $data["alamat"];
        $no_tlpn = $data["no_tlpn"];
    } else {
        echo "Data tidak ditemukan.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_pelanggan = $_POST["id_pelanggan"];
    $nama_pelanggan = $_POST["nama_pelanggan"];
    $alamat = $_POST["alamat"];
    $no_tlpn = $_POST["no_tlpn"];

    $sql_update = "UPDATE data_pelanggan SET id_pelanggan='$id_pelanggan', nama_pelanggan='$nama_pelanggan', alamat='$alamat', no_tlpn='$no_tlpn' WHERE id_pelanggan='$id_pelanggan'";
    
    if ($conn->query($sql_update) === true) {
        header("Location: tables.php"); // Ganti transaksi.php dengan halaman yang sesuai
        exit;
    } else {
        echo "Error: " . $sql_update . "<br>" . $conn->error;
    }
}


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h1 class="text-center font-weight-light my-4">tambah data</h1></div>
                                    <div class="card-body">
                                    <div class="row">
                            <div class="col-md-4">
                                <form action="" method="POST">

                                    <label for="email-horizontal">ID PELANGGAN</label>
                                </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="email-horizontal" class="form-control" name="id_pelanggan" placeholder="id_pelanggan" value="<?= $data['id_pelanggan']?>">
                            </div>
                            <div class="col-md-4">
                              <label for="contact-info-horizontal">NAMA PELANGGAN</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="contact-info-horizontal" class="form-control" name="nama_pelanggan" placeholder="nama_pelanggan" value="<?= $data['nama_pelanggan']?>">
                            </div>
                            <div class="col-md-4">
                              <label for="contact-info-horizontal">ALAMAT</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="contact-info-horizontal" class="form-control" name="alamat" placeholder="alamat" value="<?= $data['alamat']?>">
                            </div>
                            <div class="col-md-4">
                              <label for="contact-info-horizontal">NO TELEPON</label>
                            </div>
                            <div class="col-md-8 form-group">
                              <input type="text" id="contact-info-horizontal" class="form-control" name="no_tlpn" placeholder="no_tlpn" value="<?= $data['no_tlpn']?>">
                            </div>
                            <div class="col-sm-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">
                                    Submit
                                </button>
                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                    Reset
                                </button>
                                <button type="button" class="btn btn-danger me-1 mb-1" onclick="location.href='tagihan.php'">
                                    Kembali
                                </button>
                            </div>
                        </form>
                            
                        </div>
                        
                    </div>
                </div>
                        </div>
                    </div>
                </main>
            </div>
            
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>

