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

    <!-- Style -->
    <link rel="stylesheet" href="style_index.css">

    <!-- Icon -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body class="bg-warning bg-gradient">

    

    <div class="container-fluid as-full align-middle">
        <div class="row as-full d-flex justify-content-center">
            <div class="col-5 align-self-center" >

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

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="index.php" class="text-decoration-none">
                                <img src="assets/pasoka_new.png" width="80px" alt="Pasoka Sumber Karya">
                            </a>
                            Data Customer PT.PASOKA SUMBER KARYA
                        </h5>
                        <form action="" method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
                                    <i class="iconinput fa fa-user"></i>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control isian-pass" id="password" name="password" placeholder="Password">
                                    <i class="iconinput fa fa-keyboard"></i>
                                    <input type="checkbox" id="pass" class="form-checkbox mt-2">
                                        <label for="pass">
                                            <small> Show Password</small>
                                        </label>
                            </div>
                            <button type="submit" id="btn_login" name="btn_login" class="col-md-12 btn btn-primary mt-4 fw-bold">Login</button>
                        </form>
                    </div>
                </div>
            
                <div class="card mt-1">
                    <div class="card-body text-center">
                        <small>
                            Distributed by 
                            <a href="https://linkfly.to/dhnykrnwn" class="text-primary text-decoration-none" target="_blank">
                                <strong>Dhany Kurniawan</strong>
                            </a>
                        </small>
                    </div>
                </div>
            
            </div>
        </div>
    </div>

    <script type="text/javascript">
	$(document).ready(function(){		
		$('.form-checkbox').click(function(){
			if($(this).is(':checked')){
				$('.isian-pass').attr('type','text');
			}else{
				$('.isian-pass').attr('type','password');
			}
		});
	});
    </script>

</body>
</html>