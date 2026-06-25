<?php
include 'koneksi.php';

if(isset($_POST['daftar'])){

    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $username = $_POST['username'];

    $password = password_hash(
        $_POST['password'],
        PASSWORD_DEFAULT
    );

    mysqli_query($conn,"
    INSERT INTO anggota
    (
        nama,
        alamat,
        no_hp,
        tanggal_daftar,
        username,
        password
    )
    VALUES
    (
        '$nama',
        '$alamat',
        '$no_hp',
        CURDATE(),
        '$username',
        '$password'
    )
    ");

session_start();

$_SESSION['success'] =
"Registrasi berhasil, silakan login.";

header("Location: login.php");
exit;
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Registrasi</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f5f7fb;
}

.card{
    border:none;
    border-radius:20px;
    box-shadow:0 4px 15px rgba(0,0,0,.08);
}

</style>

</head>
<body>

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card">

                <div class="card-body">

                    <h2 class="text-center mb-4">
                        Registrasi Anggota
                    </h2>

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
                                   class="form-control"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label>No HP</label>
                            <input type="text"
                                   name="no_hp"
                                   class="form-control"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label>Username</label>
                            <input type="text"
                                   name="username"
                                   class="form-control"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password"
                                   name="password"
                                   class="form-control"
                                   required>
                        </div>

                        <button
                            type="submit"
                            name="daftar"
                            class="btn btn-primary w-100">

                            Daftar

                        </button>

                    </form>

                    <div class="text-center mt-3">

                        <a href="login.php">
                            Sudah punya akun? Login
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>