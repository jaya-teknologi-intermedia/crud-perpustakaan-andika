<?php
session_start();

if(!isset($_SESSION['id_anggota'])){
    header("Location: login.php");
    exit;
}

include 'koneksi.php';

$id_anggota = $_SESSION['id_anggota'];

$query = mysqli_query($conn,"
SELECT
    p.id_peminjaman,
    b.judul,
    p.tanggal_pinjam,
    p.tanggal_kembali,
    p.status
FROM peminjaman p
JOIN buku b
ON p.id_buku = b.id_buku
WHERE p.id_anggota = '$id_anggota'
ORDER BY p.id_peminjaman DESC
");
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Riwayat Peminjaman Saya</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f5f7fb;
}

.hero{
    background:linear-gradient(135deg,#198754,#20c997);
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

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h5>
            Selamat Datang,
            <?= $_SESSION['nama']; ?>
        </h5>

        <div>
            <a href="index.php" class="btn btn-secondary">
                Dashboard
            </a>

            <a href="logout.php" class="btn btn-danger">
                Logout
            </a>
        </div>

    </div>

    <div class="hero text-center">

        <h1 class="fw-bold">
            📚 Riwayat Peminjaman Saya
        </h1>

        <p>
            Menampilkan data peminjaman milik akun yang sedang login
        </p>

    </div>

    <div class="card card-custom">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover">

                    <thead class="table-success">

                    <tr>
                        <th>No</th>
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

</body>
</html>