<?php

include 'koneksi.php';

$id = $_GET['id'];

mysqli_query($conn,
    "DELETE FROM buku
     WHERE id_buku='$id'"
);

session_start();

$_SESSION['success'] =
"Data buku berhasil dihapus.";

header("Location: buku.php");
exit;