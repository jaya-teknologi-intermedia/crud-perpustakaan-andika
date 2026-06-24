<?php
session_start();
include 'koneksi.php';

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn,
        "SELECT * FROM anggota
         WHERE username='$username'
         AND password='$password'"
    );

    if(mysqli_num_rows($query) > 0){

        $data = mysqli_fetch_assoc($query);

        $_SESSION['id_anggota'] = $data['id_anggota'];
        $_SESSION['nama'] = $data['nama'];

        header("Location: index.php");
        exit;

    } else {

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

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>