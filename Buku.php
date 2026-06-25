<?php
session_start();

if(!isset($_SESSION['id_anggota'])){
    header("Location: login.php");
    exit;
}

include 'koneksi.php';

$query = mysqli_query($conn, "SELECT * FROM buku");

$totalBuku = mysqli_num_rows(
    mysqli_query($conn, "SELECT * FROM buku")
);

$totalStok = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT SUM(stok) as total FROM buku")
);
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>CRUD Perpustakaan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f5f7fb;
}

.hero{
    background: linear-gradient(135deg,#0d6efd,#3b82f6);
    color:white;
    padding:40px;
    border-radius:20px;
    margin-bottom:30px;
}

.stat-card{
    border:none;
    border-radius:20px;
    box-shadow:0 4px 15px rgba(0,0,0,.08);
    transition:.3s;
}

.stat-card:hover{
    transform:translateY(-5px);
}

.table-card{
    border:none;
    border-radius:20px;
    box-shadow:0 4px 15px rgba(0,0,0,.08);
}

.btn{
    border-radius:10px;
}

.form-control{
    border-radius:10px;
}

</style>

</head>
<body>

<div class="container py-5">
    <?php
if(isset($_SESSION['success'])){
?>

<div class="alert alert-success alert-dismissible fade show">

    <?= $_SESSION['success']; ?>

    <button
        type="button"
        class="btn-close"
        data-bs-dismiss="alert">
    </button>

</div>

<?php
unset($_SESSION['success']);
}
?>
    <div class="d-flex justify-content-between align-items-center mb-4">

    <h5>
        Selamat Datang,
        <?= $_SESSION['nama']; ?>
    </h5>

    <div>
        <a href="logout.php" class="btn btn-danger">
            Logout
        </a>
    </div>

</div>
    <div class="container py-5">

    <a href="index.php" class="btn btn-outline-secondary mb-4">
        ← Dashboard
    </a>

    <!-- Hero -->

    <div class="hero text-center">

        <h1 class="fw-bold">
            📚 CRUD Perpustakaan
        </h1>

        <p class="mb-0">
            Sistem Manajemen Data Buku Perpustakaan
        </p>

    </div>

    <!-- Statistik -->

    <div class="row mb-4">

        <div class="col-md-6 mb-3">

            <div class="card stat-card">

                <div class="card-body text-center">

                    <h5>Total Buku</h5>

                    <h2 class="fw-bold text-primary">
                        <?= $totalBuku ?>
                    </h2>

                </div>

            </div>

        </div>

        <div class="col-md-6 mb-3">

            <div class="card stat-card">

                <div class="card-body text-center">

                    <h5>Total Stok</h5>

                    <h2 class="fw-bold text-success">
                        <?= $totalStok['total'] ?>
                    </h2>

                </div>

            </div>

        </div>

    </div>

    <!-- Search + Button -->

    <div class="row mb-4">

        <div class="col-md-8 mb-2">

            <input
                type="text"
                id="searchInput"
                class="form-control"
                placeholder="🔍 Cari buku..."
            >

        </div>

        <div class="col-md-4 text-md-end">

            <a href="tambah.php" class="btn btn-primary">

                + Tambah Buku

            </a>

        </div>

    </div>

    <!-- Table -->

    <div class="card table-card">

        <div class="card-body">

            <h4 class="mb-4">
                Data Buku Perpustakaan
            </h4>

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-dark">

                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>

                    </thead>

                    <tbody>

                    <?php
                    $no = 1;

                    while($data = mysqli_fetch_assoc($query)):
                    ?>

                    <tr>

                        <td><?= $no++; ?></td>

                        <td><?= $data['judul']; ?></td>

                        <td><?= $data['penulis']; ?></td>

                        <td><?= $data['penerbit']; ?></td>

                        <td><?= $data['tahun_terbit']; ?></td>

                        <td><?= $data['stok']; ?></td>

                        <td>

                            <a href="edit.php?id=<?= $data['id_buku']; ?>"
                               class="btn btn-warning btn-sm">
                               Edit
                            </a>

                            <a href="hapus.php?id=<?= $data['id_buku']; ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Yakin ingin menghapus data ini?')">
                               Hapus
                            </a>

                        </td>

                    </tr>

                    <?php endwhile; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<script>

document.getElementById("searchInput")
.addEventListener("keyup", function(){

    let filter = this.value.toLowerCase();

    let rows = document.querySelectorAll("tbody tr");

    rows.forEach(function(row){

        let text = row.innerText.toLowerCase();

        row.style.display =
            text.includes(filter)
            ? ""
            : "none";

    });

});

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>