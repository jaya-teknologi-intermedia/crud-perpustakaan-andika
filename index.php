<?php
session_start();

if(!isset($_SESSION['id_anggota'])){
    header("Location: login.php");
    exit;
}

include 'koneksi.php';

$totalBuku = mysqli_num_rows(
    mysqli_query($conn, "SELECT * FROM buku")
);

$totalAnggota = mysqli_num_rows(
    mysqli_query($conn, "SELECT * FROM anggota")
);

$totalPinjam = mysqli_num_rows(
    mysqli_query($conn, "SELECT * FROM peminjaman")
);
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Sistem Perpustakaan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f4f6f9;
}

.hero{
    background:linear-gradient(135deg,#0d6efd,#3b82f6);
    color:white;
    padding:50px;
    border-radius:20px;
    margin-bottom:30px;
}

.card-menu{
    border:none;
    border-radius:20px;
    box-shadow:0 4px 15px rgba(0,0,0,.08);
    transition:.3s;
}

.card-menu:hover{
    transform:translateY(-5px);
}

</style>

</head>
<body>

<div class="container py-5">
<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h5 class="mb-0">
            Selamat Datang,
            <?= $_SESSION['nama']; ?>
        </h5>
    </div>

    <div>
        <a href="logout.php" class="btn btn-danger">
            Logout
        </a>
    </div>

</div>
    <div class="hero text-center">

        <h1 class="fw-bold">
            📚 Sistem Perpustakaan
        </h1>

        <p>
            Dashboard Manajemen Perpustakaan
        </p>

    </div>

    <div class="row mb-4">

        <div class="col-md-4 mb-3">
            <div class="card card-menu">
                <div class="card-body text-center">
                    <h5>Total Buku</h5>
                    <h2><?= $totalBuku ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card card-menu">
                <div class="card-body text-center">
                    <h5>Total Anggota</h5>
                    <h2><?= $totalAnggota ?></h2>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card card-menu">
                <div class="card-body text-center">
                    <h5>Total Peminjaman</h5>
                    <h2><?= $totalPinjam ?></h2>
                </div>
            </div>
        </div>

    </div>

<div class="row">

    <div class="col-md-3 mb-3">

        <div class="card card-menu">

            <div class="card-body text-center">

                <h4>📖 Data Buku</h4>

                <a href="buku.php"
                   class="btn btn-primary mt-3">
                    Buka Data Buku
                </a>

            </div>

        </div>

    </div>

    <div class="col-md-3 mb-3">

        <div class="card card-menu">

            <div class="card-body text-center">

                <h4>👤 Data Anggota</h4>

                <a href="anggota.php"
                   class="btn btn-success mt-3">
                    Buka Data Anggota
                </a>

            </div>

        </div>

    </div>

    <div class="col-md-3 mb-3">

        <div class="card card-menu">

            <div class="card-body text-center">

                <h4>📋 Peminjaman</h4>

                <a href="peminjaman.php"
                   class="btn btn-warning mt-3">
                    Lihat Peminjaman
                </a>

            </div>

        </div>

    </div>

    <div class="col-md-3 mb-3">

        <div class="card card-menu">

            <div class="card-body text-center">

                <h4>📚 Riwayat Saya</h4>

                <a href="riwayat.php"
                   class="btn btn-info mt-3">
                    Lihat Riwayat
                </a>

            </div>

        </div>

    </div>

</div>