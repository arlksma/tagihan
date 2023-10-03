<?php

$conn = new mysqli('localhost', 'root', '', 'tagihan');

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_GET["id"])) {
    $id_pembayaran = $_GET["id"];
    
    // Delete data from the database
    $sql = "DELETE FROM pembayaran WHERE id_pembayaran='$id_pembayaran'";
    
    if ($conn->query($sql) === true) {
        header("Location: bayar.php"); // Redirect to the page after deletion
        exit;
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}