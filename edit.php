<?php

include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM buku WHERE id_buku='$id'");
$buku = mysqli_fetch_assoc($data);

if(isset($_POST['update'])){

    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $stok = $_POST['stok'];

    mysqli_query($conn,"UPDATE buku SET
        judul='$judul',
        penulis='$penulis',
        penerbit='$penerbit',
        tahun_terbit='$tahun_terbit',
        stok='$stok'
        WHERE id_buku='$id'
    ");

    header("Location:index.php");
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Buku</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <div class="card">

        <div class="card-header">
            <h3>Edit Buku</h3>
        </div>

        <div class="card-body">

            <form method="POST">

                <div class="mb-3">
                    <label>Judul Buku</label>
                    <input type="text"
                           name="judul"
                           class="form-control"
                           value="<?= $buku['judul']; ?>">
                </div>

                <div class="mb-3">
                    <label>Penulis</label>
                    <input type="text"
                           name="penulis"
                           class="form-control"
                           value="<?= $buku['penulis']; ?>">
                </div>

                <div class="mb-3">
                    <label>Penerbit</label>
                    <input type="text"
                           name="penerbit"
                           class="form-control"
                           value="<?= $buku['penerbit']; ?>">
                </div>

                <div class="mb-3">
                    <label>Tahun Terbit</label>
                    <input type="number"
                           name="tahun_terbit"
                           class="form-control"
                           value="<?= $buku['tahun_terbit']; ?>">
                </div>

                <div class="mb-3">
                    <label>Stok</label>
                    <input type="number"
                           name="stok"
                           class="form-control"
                           value="<?= $buku['stok']; ?>">
                </div>

                <button type="submit"
                        name="update"
                        class="btn btn-warning">
                    Update
                </button>

                <a href="index.php"
                   class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>

    </div>

</div>

</body>
</html>