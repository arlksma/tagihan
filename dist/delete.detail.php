<?php

$conn = new mysqli('localhost', 'root', '', 'tagihan');

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_GET["id"])) {
    $id_paket = $_GET["id"];
    
    // Delete data from the database
    $sql = "DELETE FROM paket_layanan WHERE id_paket='$id_paket'";
    
    if ($conn->query($sql) === true) {
        header("Location: layout-static.php"); // Redirect to the page after deletion
        exit;
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}