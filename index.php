<?php
require "koneksi.php";

error_reporting(0);
 
session_start();
 
// cek-login
if (isset($_SESSION['username'])) {
    header("Location: home.php");
}
 
if (isset($_POST['btn_login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
 
    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password' ";
    $result = mysqli_query($koneksi, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: home.php");
    } else {
        echo "<script>alert('Login gagal! Kombinasi username dan password yang anda masukkan salah!')</script>";
    }
}
// akhir cek-login

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Customer</title>

    <!-- Pasoka icon -->
    <link rel="icon" href="assets/pasoka.ico" type="image/x-icon" />

    <!-- Menyisipkan Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Menyisipkan JQuery dan Javascript Bootstrap -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Icon -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <style>
        /* Importing fonts from Google */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

        /* Reseting */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #ececf2;
        }

        .wrapper {
            max-width: 350px;
            /* min-height: 500px; */
            margin: 80px auto;
            padding: 40px 30px 30px 30px;
            background-color: #ecf0f3;
            border-radius: 15px;
            box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff;
        }

        .logo {
            width: 100%;
            /* margin: auto; */
        }

        .logo img {
            /* width: 100%; */
            width: 70%;
            /* height: 80px; */
            object-fit: cover;
            /* border-radius: 5px; */
            /* box-shadow: 0px 0px 3px #5f5f5f,
                0px 0px 0px 5px #ecf0f3,
                8px 8px 15px #a7aaa7,
                -8px -8px 15px #fff; */
        }

        .wrapper .name {
            font-weight: 500;
            font-size: 1.2rem;
            letter-spacing: 1.3px;
            /* padding-left: 10px; */
            color: #555;
        }

        .wrapper .form-field input {
            width: 100%;
            display: block;
            border: none;
            outline: none;
            background: none;
            font-size: 1.2rem;
            color: #666;
            padding: 10px 15px 10px 10px;
            /* border: 1px solid red; */
        }

        .wrapper .form-field {
            padding-left: 10px;
            margin-bottom: 20px;
            border-radius: 20px;
            box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff;
        }

        .wrapper .form-field .fas {
            color: #555;
        }

        .wrapper .btn {
            box-shadow: none;
            width: 100%;
            height: 40px;
            background-color: #03A9F4;
            color: #fff;
            border-radius: 25px;
            box-shadow: 3px 3px 3px #b1b1b1,
                -3px -3px 3px #fff;
            letter-spacing: 1.3px;
        }

        .wrapper .btn:hover {
            background-color: #039BE5;
        }

        .wrapper a {
            text-decoration: none;
            font-size: 0.8rem;
            color: #03A9F4;
        }

        .wrapper a:hover {
            color: #039BE5;
        }

        @media(max-width: 380px) {
            .wrapper {
                margin: 30px 20px;
                padding: 40px 15px 15px 15px;
            }
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="logo">
            <a href="index.php" class="justify-content-center d-flex">
                <img src="assets/pasoka_new.png" alt="">
            </a>
        </div>
        <div class="text-center mt-4 name">
            Data Customer
        </div>

        <center>
            <?php
            if (isset($_GET['pesan'])) {
                if ($_GET['pesan'] == "gagal") {
                    echo "<div class='alert alert-danger'>Login gagal! Kombinasi username dan password yang anda masukkan salah!</div>";
                } else if ($_GET['pesan'] == "logout") {
                    echo "<div class='alert alert-success'>Anda berhasil LOGOUT</div>";
                } else if ($_GET['pesan'] == "belum_login") {
                    echo "<div class='alert alert-danger'>Anda harus LOGIN terlebih dahulu!</div>";
                }
            }
            ?>
        </center>

        <form class="p-1 mt-3" action="" method="POST">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="username" id="username" placeholder="Username">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="password" placeholder="Password" class="isian-pass">
                <span toggle="#password" class="fa fa-fw fa-eye-slash field-icon toggle-password me-2"></span>
            </div>

            <button type="submit" id="btn_login" name="btn_login" class="btn mt-3">Login</button>
        </form>
        <div class="text-center">
            <span style="font-size: 13px;">By </span>
            <a href="https://linkfly.to/dhnykrnwn" target="_blank">Dhany Kurniawan</a>
        </div>
    </div>

    <script>
        $(".toggle-password").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
        });
    </script>

</body>
</html>