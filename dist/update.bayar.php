<?php
$conn = new mysqli('localhost', 'root', '', 'tagihan');

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$id_pembayaran = ""; // Inisialisasi nilai awal untuk tanggal_pembayaran

if (isset($_GET["id"])) {
    $id_pembayaran = $_GET["id"];
    $sql = "SELECT * FROM pembayaran WHERE id_pembayaran='$id_pembayaran'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $id_pembayaran = $data["id_pembayaran"];
        $tanggal_pembayaran = $data["tanggal_pembayaran"];
        $keterangan = $data["keterangan"];
        $nominal = $data["nominal"];

    } else {
        echo "Data tidak ditemukan.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_pembayaran = $_POST["id_pembayaran"];
    $tanggal_pembayaran = $_POST["tanggal_pembayaran"];
    $keterangan = $_POST["keterangan"];
    $nominal = $_POST["nominal"];

    $sql_update = "UPDATE pembayaran SET id_pembayaran='$id_pembayaran', tanggal_pembayaran='$tanggal_pembayaran', keterangan='$keterangan', nominal='$nominal' WHERE id_pembayaran='$id_pembayaran'";
    
    if ($conn->query($sql_update) === true) {
        header("Location: bayar.php"); // Ganti transaksi.php dengan halaman yang sesuai
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
                                    <div class="card-header"><h1 class="text-center font-weight-light my-4">update data</h1></div>
                                    <div class="card-body">
                                    <div class="row">
                            <div class="col-md-4">
                                <form action="" method="POST">

                                    <label for="email-horizontal">ID TRANSAKSI</label>
                                </div>
                                <div class="col-md-8 form-group">
                                <input type="text" id="email-horizontal" class="form-control" name="id_pembayaran" placeholder="id_pembayaran" value="<?= $data['id_pembayaran']?>">
                            </div>
                            <div class="col-md-4">
                                <form action="" method="POST">

                                    <label for="email-horizontal">ID PELANGGAN</label>
                                </div>
                                <div class="col-md-8 form-group">
                                <input type="text" id="email-horizontal" class="form-control" name="tanggal_pembayaran" placeholder="tanggal_pembayaran" value="<?= $data['tanggal_pembayaran']?>">
                            </div>
                            <div class="col-md-4">
                                <form action="" method="POST">

                                    <label for="email-horizontal">ID PAKET</label>
                                </div>
                                <div class="col-md-8 form-group">
                                <input type="text" id="email-horizontal" class="form-control" name="keterangan" placeholder="keterangan" value="<?= $data['keterangan']?>">
                            </div>
                            <div class="col-md-4">
                              <label for="contact-info-horizontal">TANGGAL BERLANGGANAN</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="date" id="contact-info-horizontal" class="form-control" name="nominal" placeholder="nominal" value="<?= $data['nominal']?>">
                            <div class="col-sm-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">
                                    Submit
                                </button>
                                <button type="button" class="btn btn-danger me-1 mb-1" onclick="location.href='bayar.php'">
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