<?php
include 'koneksi.php';

$anggota = mysqli_query($conn,"SELECT * FROM anggota");
$buku = mysqli_query($conn,"SELECT * FROM buku");

if(isset($_POST['simpan'])){

    $id_anggota = $_POST['id_anggota'];
    $id_buku = $_POST['id_buku'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $tanggal_kembali = $_POST['tanggal_kembali'];
    $status = $_POST['status'];

    mysqli_query($conn,"
    INSERT INTO peminjaman
    (id_anggota,id_buku,tanggal_pinjam,tanggal_kembali,status)
    VALUES
    ('$id_anggota','$id_buku','$tanggal_pinjam','$tanggal_kembali','$status')
    ");

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

    <a href="peminjaman.php" class="btn btn-secondary mb-3">
        ← Kembali
    </a>

    <div class="card shadow">

        <div class="card-body">

            <h3 class="mb-4">
                Tambah Peminjaman
            </h3>

            <form method="POST">

                <div class="mb-3">
                    <label>Anggota</label>
                    <select name="id_anggota" class="form-select" required>

                        <option value="">
                            Pilih Anggota
                        </option>

                        <?php while($a = mysqli_fetch_assoc($anggota)): ?>

                        <option value="<?= $a['id_anggota']; ?>">
                            <?= $a['nama']; ?>
                        </option>

                        <?php endwhile; ?>

                    </select>
                </div>

                <div class="mb-3">
                    <label>Buku</label>
                    <select name="id_buku" class="form-select" required>

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
                    <input type="date"
                           name="tanggal_pinjam"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label>Tanggal Kembali</label>
                    <input type="date"
                           name="tanggal_kembali"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label>Status</label>

                    <select name="status"
                            class="form-select">

                        <option value="Dipinjam">
                            Dipinjam
                        </option>

                        <option value="Dikembalikan">
                            Dikembalikan
                        </option>

                    </select>

                </div>

                <button type="submit"
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