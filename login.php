<?php
session_start();
include 'koneksi.php';

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn,
        "SELECT * FROM anggota
        WHERE username='$username'"
    );

    if(mysqli_num_rows($query) > 0){

        $data = mysqli_fetch_assoc($query);

        if(password_verify($password, $data['password'])){

            $_SESSION['id_anggota'] = $data['id_anggota'];
            $_SESSION['nama'] = $data['nama'];

            header("Location: index.php");
            exit;

        }else{

            echo "<script>
                    alert('Username atau Password Salah');
                </script>";
        }

    }else{

        echo "<script>
                alert('Username atau Password Salah');
            </script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Perpustakaan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<?php
if(isset($_SESSION['success'])){
?>

<div class="container mt-3">

    <div class="alert alert-success alert-dismissible fade show">

        <?= $_SESSION['success']; ?>

        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert">
        </button>

    </div>

</div>

<?php
unset($_SESSION['success']);
}
?>   

<div class="container">

    <div class="row justify-content-center mt-5">

        <div class="col-md-4">

            <div class="card shadow">

                <div class="card-body">

                    <h3 class="text-center mb-4">
                        Login Perpustakaan
                    </h3>

                    <form method="POST">

                        <input
                            type="text"
                            name="username"
                            class="form-control mb-3"
                            placeholder="Username"
                            required
                        >

                        <input
                            type="password"
                            name="password"
                            class="form-control mb-3"
                            placeholder="Password"
                            required
                        >

                        <button
                            type="submit"
                            name="login"
                            class="btn btn-primary w-100">

                            Login

                        </button>

                    </form>

                    <!-- Tambahan Register -->

                    <div class="text-center mt-3">

                        Belum punya akun?

                        <a href="register.php">
                            Daftar di sini
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>