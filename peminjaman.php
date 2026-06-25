<?php
session_start();

if(!isset($_SESSION['id_anggota'])){
    header("Location: login.php");
    exit;
}

include 'koneksi.php';

$query = mysqli_query($conn,"
SELECT
p.id_peminjaman,
a.nama,
b.judul,
p.tanggal_pinjam,
p.tanggal_kembali,
p.status
FROM peminjaman p
JOIN anggota a ON p.id_anggota = a.id_anggota
JOIN buku b ON p.id_buku = b.id_buku
");

$totalPinjam = mysqli_num_rows(
    mysqli_query($conn,"SELECT * FROM peminjaman")
);
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Data Peminjaman</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f5f7fb;
}

.hero{
    background:linear-gradient(135deg,#fd7e14,#ffc107);
    color:white;
    padding:40px;
    border-radius:20px;
    margin-bottom:30px;
}

.card-custom{
    border:none;
    border-radius:20px;
    box-shadow:0 4px 15px rgba(0,0,0,.08);
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
            📋 Data Peminjaman
        </h1>

        <p>
            Data anggota yang meminjam buku
        </p>

    </div>

    <div class="card card-custom mb-4">

        <div class="card-body text-center">

            <h5>Total Peminjaman</h5>

            <h2 class="fw-bold text-warning">
                <?= $totalPinjam ?>
            </h2>

        </div>

    </div>

    <div class="card card-custom">

        <div class="card-body">

            <h4 class="mb-4">
                Daftar Peminjaman Buku
            </h4>
            <a href="tambah_peminjaman.php"
            class="btn btn-warning mb-3">
                + Tambah Peminjaman
            </a>

            <div class="table-responsive">

                <table class="table table-hover">

                    <thead class="table-warning">

                    <tr>
                        <th>No</th>
                        <th>Nama Anggota</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
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

                        <td><?= $data['judul']; ?></td>

                        <td><?= $data['tanggal_pinjam']; ?></td>

                        <td><?= $data['tanggal_kembali']; ?></td>

                        <td>

                        <?php if($data['status']=="Dipinjam"): ?>

                            <span class="badge bg-danger">
                                Dipinjam
                            </span>

                        <?php else: ?>

                            <span class="badge bg-success">
                                Dikembalikan
                            </span>

                        <?php endif; ?>

                        </td>

                    </tr>

                    <?php endwhile; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>