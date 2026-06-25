<?php

include 'koneksi.php';

$id = $_GET['id'];

mysqli_query($conn,
    "DELETE FROM anggota
     WHERE id_anggota='$id'"
);

session_start();

$_SESSION['success'] =
"Data anggota berhasil dihapus.";

header("Location: anggota.php");
exit;