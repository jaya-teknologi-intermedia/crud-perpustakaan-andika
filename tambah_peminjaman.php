<?php
session_start();

if(!isset($_SESSION['id_anggota'])){
    header("Location: login.php");
    exit;
}

include 'koneksi.php';

$buku = mysqli_query($conn,"SELECT * FROM buku");

if(isset($_POST['simpan'])){

    $id_anggota = $_SESSION['id_anggota'];
    $id_buku = $_POST['id_buku'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $tanggal_kembali = $_POST['tanggal_kembali'];
    $status = $_POST['status'];

    mysqli_query($conn,"
    INSERT INTO peminjaman
    (
        id_anggota,
        id_buku,
        tanggal_pinjam,
        tanggal_kembali,
        status
    )
    VALUES
    (
        '$id_anggota',
        '$id_buku',
        '$tanggal_pinjam',
        '$tanggal_kembali',
        '$status'
    )
    ");

session_start();

$_SESSION['success'] =
"Data peminjaman berhasil ditambahkan.";

header("Location:peminjaman.php");
exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Tambah Peminjaman</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h5>
            Login Sebagai :
            <?= $_SESSION['nama']; ?>
        </h5>

        <a href="logout.php" class="btn btn-danger">
            Logout
        </a>

    </div>

    <a href="peminjaman.php" class="btn btn-secondary mb-3">
        ← Kembali
    </a>

    <div class="card shadow">

        <div class="card-body">

            <h3 class="mb-4">
                Tambah Peminjaman
            </h3>

            <div class="alert alert-info">
                Peminjaman akan dicatat atas nama:
                <strong><?= $_SESSION['nama']; ?></strong>
            </div>

            <form method="POST">

                <div class="mb-3">
                    <label>Buku</label>

                    <select
                        name="id_buku"
                        class="form-select"
                        required>

                        <option value="">
                            Pilih Buku
                        </option>

                        <?php while($b = mysqli_fetch_assoc($buku)): ?>

                        <option value="<?= $b['id_buku']; ?>">
                            <?= $b['judul']; ?>
                        </option>

                        <?php endwhile; ?>

                    </select>
                </div>

                <div class="mb-3">
                    <label>Tanggal Pinjam</label>

                    <input
                        type="date"
                        name="tanggal_pinjam"
                        class="form-control"
                        required>
                </div>

                <div class="mb-3">
                    <label>Tanggal Kembali</label>

                    <input
                        type="date"
                        name="tanggal_kembali"
                        class="form-control"
                        required>
                </div>

                <div class="mb-3">

                    <label>Status</label>

                    <select
                        name="status"
                        class="form-select">

                        <option value="Dipinjam">
                            Dipinjam
                        </option>

                        <option value="Dikembalikan">
                            Dikembalikan
                        </option>

                    </select>

                </div>

                <button
                    type="submit"
                    name="simpan"
                    class="btn btn-warning">

                    Simpan

                </button>

            </form>

        </div>

    </div>

</div>

</body>
</html>