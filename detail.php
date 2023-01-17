<?php
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php?pesan=belum_login");
}

require "koneksi.php";

$id_cust = $_GET['id_cust'];
$no_urut = $_GET['nourut'];

$data = mysqli_query($koneksi, "SELECT * FROM customer WHERE id_cust='$id_cust'");
while ($d = mysqli_fetch_array($data)) {
    $id_cust = $d['id_cust'];
    $nama_usaha = $d['nama_usaha'];
    $jenis_usaha = $d['jenis_usaha'];
    $lama_usaha = $d['lama_usaha'];
    $tempat_usaha = $d['tempat_usaha'];
    $npwp = $d['npwp'];
    $telp = $d['telp'];
    $omzet = $d['omzet'];
    $kompetitor = $d['kompetitor'];
    $alm_usaha = $d['alm_usaha'];
    $cabang = $d['cabang'];
    $kab = $d['kab'];
    $kec = $d['kec'];
    $rt = $d['rt'];
    $rw = $d['rw'];
    $pemilik = $d['pemilik'];
    $nik = $d['nik'];
    $hp_pemilik = $d['hp_pemilik'];
    $pic = $d['pic'];
    $hp_pic = $d['hp_pic'];
}

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
    <link rel="stylesheet" href="style.css">

    <!-- Icon -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <!-- Icon -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body style="background-color: #ececf2;">

    <div class="container col-md-10">
        <h2 class="text-center mt-4"><?= $nama_usaha; ?></h2>

        <div class="d-flex justify-content-between mt-4">
            <a href="home.php" class="btn btn-primary">
                <i class="fa fa-home"></i>
                Back to Home
            </a>
            <a href="edit_cust.php?id_cust=<?= $id_cust; ?>" class="btn btn-sm btn-warning d-inline-block mr-1"><i class="fa fa-edit"></i> Edit</a>
        </div>

        <div class="col-md-12">
            <table class="table table-responsive mt-2 bg-light">
                <tr>
                    <td class="bg-primary text-light" colspan="2"><h3>INFO USAHA</h3></td>
                </tr>
                <tr>
                    <td class="ps-4 col-md-4"><b>Kode Customer</b></td>
                    <td>
                        <strong>
                            : <?=  str_pad($cabang,2,0,STR_PAD_LEFT);
                            echo "-";
                            echo str_pad($kab,3,0,STR_PAD_LEFT);
                            echo "-";
                            echo str_pad($kec,3,0,STR_PAD_LEFT);
                            echo "-";
                            echo str_pad($no_urut,2,0,STR_PAD_LEFT); ?>
                        </strong>
                    </td>
                </tr>
                <tr>
                    <td class="ps-4 col-md-4">Nama Usaha</td>
                    <td>: <?= $nama_usaha; ?></td>
                </tr>
                <tr>
                    <td class="ps-4 col-md-4">Jenis Usaha</td>
                    <td>: <?= $jenis_usaha; ?></td>
                </tr>
                <tr>
                    <td class="ps-4 col-md-4">Lama Usaha</td>
                    <td>: <?= $lama_usaha; ?></td>
                </tr>
                <tr>
                    <td class="ps-4 col-md-4">Kepemilikan Tempat Usaha</td>
                    <td>: <?= $tempat_usaha; ?></td>
                </tr>
                <tr>
                    <td class="ps-4 col-md-4">NPWP</td>
                    <td>: <?= $npwp; ?></td>
                </tr>
                <tr>
                    <td class="ps-4 col-md-4">No. Telp</td>
                    <td>: <?= $telp; ?></td>
                </tr>
                <tr>
                    <td class="ps-4 col-md-4">Omzet Rata-rata per Bulan</td>
                    <td>: <?= number_format($omzet, 2, ",", "."); ?></td>
                </tr>
                <tr>
                    <td class="ps-4 col-md-4">Kompetitor</td>
                    <td>: <?= $kompetitor; ?></td>
                </tr>
            </table>


            <?php
                $data = mysqli_query($koneksi, "SELECT * FROM cabang WHERE id_cabang='$cabang'");
                while ($d = mysqli_fetch_array($data)) {
                    $cabang = $d['nama_cabang'];
                }
                $data = mysqli_query($koneksi, "SELECT * FROM kab WHERE id_kab='$kab'");
                while ($d = mysqli_fetch_array($data)) {
                    $kab = $d['nama_kab'];
                }
                $data = mysqli_query($koneksi, "SELECT * FROM kec WHERE id_kec='$kec'");
                while ($d = mysqli_fetch_array($data)) {
                    $kec = $d['nama_kec'];
                }
            ?>
            <table class="table table-responsive mt-4 bg-light">
                <tr>
                    <td class="bg-primary text-light" colspan="2"><h3>LOKASI USAHA</h3></td>
                </tr>
                <tr>
                    <td class="ps-4 col-md-4">Alamat Usaha</td>
                    <td>: <?= $alm_usaha; ?></td>
                </tr>
                <tr>
                    <td class="ps-4 col-md-4">Cabang</td>
                    <td>: <?= $cabang; ?></td>
                </tr>
                <tr>
                    <td class="ps-4 col-md-4">Kabupaten / Kota</td>
                    <td>: <?= $kab; ?></td>
                </tr>
                <tr>
                    <td class="ps-4 col-md-4">Kecamatan</td>
                    <td>: <?= $kec; ?></td>
                </tr>
                <tr>
                    <td class="ps-4 col-md-4">RT</td>
                    <td>: <?= $rt; ?></td>
                </tr>
                <tr>
                    <td class="ps-4 col-md-4">RW</td>
                    <td>: <?= $rw; ?></td>
                </tr>
            </table>



            <table class="table table-responsive mt-4 bg-light">
                <tr>
                    <td class="bg-primary text-light" colspan="2"><h3>INFO PEMILIK USAHA & PIC</h3></td>
                </tr>
                <tr>
                    <td class="ps-4 col-md-4">Nama Pemilik Usaha</td>
                    <td>: <?= $pemilik; ?></td>
                </tr>
                <tr>
                    <td class="ps-4 col-md-4">NIK</td>
                    <td>: <?= $nik; ?></td>
                </tr>
                <tr>
                    <td class="ps-4 col-md-4">No. HP Pemilik</td>
                    <td>: <?= $hp_pemilik; ?></td>
                </tr>
                <tr>
                    <td class="ps-4 col-md-4">PIC</td>
                    <td>: <?= $pic; ?></td>
                </tr>
                <tr>
                    <td class="ps-4 col-md-4">No. HP PIC</td>
                    <td>: <?= $hp_pic; ?></td>
                </tr>
            </table>
        </div>

            <center>
            <div class="col-md-12 text-md-start justify-content-between pt-2 pb-2 mt-4 mb-2 bg-primary">
            <!-- Copyright -->
                <div class="text-white mb-3 mb-md-0 text-center">Copyright &copy; 2023. All rights reserved.
                    <br>Distributed by <a href="https://linkfly.to/dhnykrnwn" class="text-white text-decoration-none fw-bold" target="_blank">Dhany Kurniawan</a>
                </div>
            <!-- Copyright -->
            </div>
            </center>

        </div>
    </div>
</body>
</html>