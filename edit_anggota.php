<?php
include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_fetch_assoc(
    mysqli_query($conn,
        "SELECT * FROM anggota
         WHERE id_anggota='$id'")
);

if(isset($_POST['update'])){

    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $tanggal_daftar = $_POST['tanggal_daftar'];

    mysqli_query($conn,
        "UPDATE anggota SET
        nama='$nama',
        alamat='$alamat',
        no_hp='$no_hp',
        tanggal_daftar='$tanggal_daftar'
        WHERE id_anggota='$id'"
    );

session_start();

$_SESSION['success'] =
"Data anggota berhasil diubah.";

header("Location: anggota.php");
exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Edit Anggota</title>

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
                Edit Anggota
            </h3>

            <form method="POST">

                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text"
                           name="nama"
                           value="<?= $data['nama']; ?>"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label>Alamat</label>
                    <input type="text"
                           name="alamat"
                           value="<?= $data['alamat']; ?>"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label>No HP</label>
                    <input type="text"
                           name="no_hp"
                           value="<?= $data['no_hp']; ?>"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label>Tanggal Daftar</label>
                    <input type="date"
                           name="tanggal_daftar"
                           value="<?= $data['tanggal_daftar']; ?>"
                           class="form-control">
                </div>

                <button type="submit"
                        name="update"
                        class="btn btn-warning">

                    Update

                </button>

            </form>

        </div>

    </div>

</div>

</body>
</html>