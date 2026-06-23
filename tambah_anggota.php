<?php
include 'koneksi.php';

if(isset($_POST['simpan'])){

    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $tanggal_daftar = $_POST['tanggal_daftar'];

    mysqli_query($conn,
        "INSERT INTO anggota
        (nama,alamat,no_hp,tanggal_daftar)
        VALUES
        ('$nama','$alamat','$no_hp','$tanggal_daftar')"
    );

    header("Location: anggota.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Tambah Anggota</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-5">

    <a href="anggota.php" class="btn btn-secondary mb-3">
        ← Kembali
    </a>

    <div class="card shadow">

        <div class="card-body">

            <h3 class="mb-4">
                Tambah Anggota
            </h3>

            <form method="POST">

                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text"
                           name="nama"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label>Alamat</label>
                    <input type="text"
                           name="alamat"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label>No HP</label>
                    <input type="text"
                           name="no_hp"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label>Tanggal Daftar</label>
                    <input type="date"
                           name="tanggal_daftar"
                           class="form-control">
                </div>

                <button type="submit"
                        name="simpan"
                        class="btn btn-success">

                    Simpan

                </button>

            </form>

        </div>

    </div>

</div>

</body>
</html>