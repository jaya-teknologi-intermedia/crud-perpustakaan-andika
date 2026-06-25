<?php
session_start();
include 'koneksi.php';

if(!isset($_SESSION['id_anggota'])){
    header("Location: login.php");
    exit;
}

include 'koneksi.php';

$query = mysqli_query($conn, "SELECT * FROM anggota");

$totalAnggota = mysqli_num_rows(
    mysqli_query($conn, "SELECT * FROM anggota")
);
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Data Anggota</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f5f7fb;
}

.hero{
    background: linear-gradient(135deg,#198754,#20c997);
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
    <a href="index.php" class="btn btn-outline-secondary mb-4">
        ← Dashboard
    </a>

    <div class="hero text-center">

        <h1 class="fw-bold">
            👥 Data Anggota
        </h1>

        <p class="mb-0">
            Kelola Data Anggota Perpustakaan
        </p>

    </div>

    <div class="row mb-4">

        <div class="col-md-12">

            <div class="card stat-card">

                <div class="card-body text-center">

                    <h5>Total Anggota</h5>

                    <h2 class="fw-bold text-success">
                        <?= $totalAnggota ?>
                    </h2>

                </div>

            </div>

        </div>

    </div>

    <div class="row mb-4">

        <div class="col-md-8 mb-2">

            <input
                type="text"
                id="searchInput"
                class="form-control"
                placeholder="🔍 Cari nama anggota..."
            >

        </div>

        <div class="col-md-4 text-md-end">

            <a href="tambah_anggota.php"
               class="btn btn-success">

                + Tambah Anggota

            </a>

        </div>

    </div>

    <div class="card table-card">

        <div class="card-body">

            <h4 class="mb-4">
                Data Anggota Perpustakaan
            </h4>

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-success">

                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th>Tanggal Daftar</th>
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

                        <td><?= $data['nama']; ?></td>

                        <td><?= $data['alamat']; ?></td>

                        <td><?= $data['no_hp']; ?></td>

                        <td><?= $data['tanggal_daftar']; ?></td>

                        <td>

                            <a href="edit_anggota.php?id=<?= $data['id_anggota']; ?>"
                               class="btn btn-warning btn-sm">
                               Edit
                            </a>

                            <a href="hapus_anggota.php?id=<?= $data['id_anggota']; ?>"
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