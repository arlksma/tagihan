<?php

$conn = new mysqli('localhost', 'root', '', 'tagihan');

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_GET["id"])) {
    $id_pelanggan = $_GET["id"];
    
    // Delete data from the database
    $sql = "DELETE FROM data_pelanggan WHERE id_pelanggan='$id_pelanggan'";
    
    if ($conn->query($sql) === true) {
        header("Location: tables.php"); // Redirect to the page after deletion
        exit;
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}