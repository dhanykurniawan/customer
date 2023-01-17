<?php
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php?pesan=belum_login");
}

require "koneksi.php";
require "function.php";


if (!empty($_POST["submit"])) {
    if(edit_cust($_POST)) {
        echo "success";
    }    
}

$id_cust = $_GET['id_cust'];

$data = mysqli_query($koneksi, "SELECT * FROM customer WHERE id_cust='$id_cust'");
while ($d = mysqli_fetch_array($data)) {
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
    $kabs = $d['kab'];
    $kecm = $d['kec'];
    $rt = $d['rt'];
    $rw = $d['rw'];
    $pemilik = $d['pemilik'];
    $nik = $d['nik'];
    $hp_pemilik = $d['hp_pemilik'];
    $pic = $d['pic'];
    $hp_pic = $d['hp_pic'];
}


$posisi = 0;
$cbg = 0;
$kab = 0;
$kec = 0;
if (isset($_GET['cbg'])) {
    $cbg = $_GET['cbg'];
    $posisi = "cbg";
}
if (isset($_GET['kab'])) {
    echo $kab;
    $kab = $_GET['kab'];
    $posisi = "kab";
}
if (isset($_GET['kec'])) {
    echo $kec;
    $kec = $_GET['kec'];
    $posisi = "kec";
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

    <!-- Icon -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>
    
    <h2 class="text-center mt-4">Form Edit Data Customer</h2>

    <div class="container col-md-9 mt-4">

        <a href="home.php" class="btn btn-primary">
            <i class="fa fa-home"></i>
            Back to Home
        </a>

        
            <form action="" method="post">
                
                <!-- Alamat Usaha -->
                <div class="card mt-3">
                    <div class="card-header bg-primary text-white fw-bold">
                        Lokasi Usaha
                    </div>
                    
                    <div class="card-body">
                        <div class="form-group mt-3">
                            <label>Cabang</label>
                            <input type="hidden" name="id_cust" id="id_cust">
                            <select onchange="getValueCabang()" name="cabang" id="cabang" class="form-control form-control-sm">
                                <option value="">--- PILIH CABANG ---</option>
                                <?php
                                $data = mysqli_query($koneksi, "SELECT * FROM cabang");
                                while ($d = mysqli_fetch_array($data)) {
                                    $id_cabang = $d['id_cabang'];
                                    $nama_cabang = $d['nama_cabang'];
                                ?>
                                <option value="<?= $id_cabang; ?>" <?php 
                                    if((!isset($_GET['cbg'])) && $cabang==$id_cabang){
                                        echo "selected";
                                    } elseif ((isset($_GET['cbg'])) && $cbg == $id_cabang) {echo "selected";};
                                 ?>><?= $nama_cabang; ?></option>
                                <?php } ?>
                            </select>
                            
                            <script>
                                function getValueCabang() {
                                    
                                    a = document.getElementById("cabang").value;
                                    
                                    if (a=="") {
                                        return 0;
                                    }
                                    
                                    window.location.href = "?id_cust=" + <?=$id_cust?> + "&cbg=" + a;
                                }
                            </script>
                        </div>

                        <div class="form-group mt-3">
                            <label>Kabupaten / Kota</label>
                            <select onchange="getValueKab()" name="kab" id="kab" class="form-control form-control-sm">
                                <option value="">--- PILIH KABUPATEN / KOTA ---</option>
                                <?php
                                if(isset($_GET['cbg'])){
                                    $indexcabang = $_GET['cbg'];
                                } else {
                                    $indexcabang = $cabang;
                                }

                                if(isset($_GET['kab'])){
                                    $indexkab = $_GET['kab'];
                                } else {
                                    $indexkab = $kabs;
                                }

                                $data = mysqli_query($koneksi, "SELECT * FROM kab WHERE id_cabang=$indexcabang");
                                while ($d = mysqli_fetch_array($data)) {
                                    $id_kab = $d['id_kab'];
                                    $nama_kab = $d['nama_kab'];
                                    $id_cabang = $d['id_cabang'];
                                ?>
                                <option value="<?= $id_kab; ?>" <?php if ($indexkab == $id_kab) {echo "selected";} ?>><?= $nama_kab; ?></option>
                                
                                <?php } ?>
                            </select>

                            <script>
                                function getValueKab(){
                                    b = document.getElementById("kab").value;
                                    if (b=="") {
                                        return 0;
                                    }
                                    window.location.href = "?id_cust=" + <?=$id_cust?> + "&cbg=" + <?=$indexcabang?> + "&kab=" + b;
                                }
                            </script>
                        </div>



                        <div class="form-group mt-3">
                            <label>Kecamatan</label>
                            <select name="kec" id="kec" class="form-control form-control-sm">
                                <option value="">--- PILIH KECAMATAN ---</option>
                                <?php

                                if(isset($_GET['cbg'])){
                                    $kecm="";
                                }

                                if(isset($_GET['kab'])){
                                    $indexkab = $_GET['kab'];
                                } else {
                                    $indexkab = $kabs;
                                }
                                

                                $data = mysqli_query($koneksi, "SELECT * FROM kec WHERE id_kab=$indexkab");
                                while ($d = mysqli_fetch_array($data)) {
                                    $id_kec = $d['id_kec'];
                                    $nama_kec = $d['nama_kec'];
                                    $id_kab = $d['id_kab'];
                                ?>
                                <option value="<?= $id_kec; ?>" <?php if ($kecm == $id_kec) {echo "selected";} ?>><?= $nama_kec; ?></option>
                                <?php } ?>
                            </select>
                            
                        </div>
                        
                        <div class="form-group mt-3">
                            <label>RT</label>
                            <input type="number" name="rt" class="form-control form-control-sm" value="<?= $rt; ?>" required>
                        </div>

                        <div class="form-group mt-3">
                            <label>RW</label>
                            <input type="number" name="rw" class="form-control form-control-sm" value="<?= $rw; ?>" required>
                        </div>

                        <div class="form-group mt-3">
                            <label>Alamat Lengkap Usaha</label>
                            <textarea name="alm_usaha" id="alm_usaha" cols="30" rows="2" class="form-control form-control-sm" required><?= $alm_usaha; ?></textarea>
                        </div>
                    </div>
                </div>

                <!-- Info Usaha -->
                <div class="card mt-3">
                    <div class="card-header bg-primary text-white fw-bold">
                        Info Usaha
                    </div>
                    
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Usaha</label>
                            <input type="text" name="nama_usaha" class="form-control form-control-sm" value="<?= $nama_usaha; ?>" required>
                        </div>

                        <div class="form-group mt-3">
                            <label>Jenis Usaha</label>
                            <input type="text" name="jenis_usaha" class="form-control form-control-sm" value="<?= $jenis_usaha; ?>" required>
                        </div>

                        <div class="form-group mt-3">
                            <label>Lama Usaha</label>
                            <input type="text" name="lama_usaha" class="form-control form-control-sm" value="<?= $lama_usaha; ?>" required>
                        </div>

                        <div class="form-group mt-3">
                            <label>Kepemilikan Tempat Usaha</label>
                            <input type="text" name="tempat_usaha" class="form-control form-control-sm" value="<?= $tempat_usaha; ?>" required>
                        </div>

                        <div class="form-group mt-3">
                            <label>NPWP</label>
                            <input type="text" name="npwp" class="form-control form-control-sm" value="<?= $npwp; ?>" required>
                        </div>

                        <div class="form-group mt-3">
                            <label>No Telp</label>
                            <input type="tel" name="telp" class="form-control form-control-sm" value="<?= $telp; ?>" required>
                        </div>


                        <div class="form-group mt-3">
                            <label>Omzet Rata-rata Perbulan</label>
                            <input type="text" name="omzet" class="form-control form-control-sm" value="<?= $omzet; ?>" required>
                        </div>

                        <div class="form-group mt-3">
                            <label>Kompetitor</label>
                            <input type="text" name="kompetitor" class="form-control form-control-sm" value="<?= $kompetitor; ?>" required>
                        </div>
                    </div>
                </div>
             
                <!-- Info Pemilik Usaha -->
                <div class="card mt-3">
                    <div class="card-header bg-primary text-white fw-bold">
                        Info Pemilik Usaha
                    </div>
                    
                    <div class="card-body">
                        <div class="form-group mt-3">
                            <label>Nama Pemilik</label>
                            <input type="text" name="pemilik" class="form-control form-control-sm" value="<?= $pemilik; ?>" required>
                        </div>

                        <div class="form-group mt-3">
                            <label>NIK Pemilik</label>
                            <input type="text" name="nik" class="form-control form-control-sm" value="<?= $nik; ?>" required>
                        </div>

                        <div class="form-group mt-3">
                            <label>No. HP Pemilik</label>
                            <input type="tel" name="hp_pemilik" class="form-control form-control-sm" value="<?= $hp_pemilik; ?>" required>
                        </div>
                    </div>
                </div>

                <!-- Info PIC -->
                <div class="card mt-3">
                    <div class="card-header bg-primary text-white fw-bold">
                        Info PIC
                    </div>
                    
                    <div class="card-body">
                        <div class="form-group mt-3">
                            <label>Nama PIC</label>
                            <input type="text" name="pic" class="form-control form-control-sm" value="<?= $pic; ?>" required>
                        </div>

                        <div class="form-group mt-3">
                            <label>No. HP PIC</label>
                            <input type="tel" name="hp_pic" class="form-control form-control-sm" value="<?= $hp_pic; ?>" required>
                        </div>
                    </div>
                </div>

                <!-- Button Simpan -->
                <!-- <div class="card mt-3"> -->
                    <button type="submit" class="container col-md-12 btn btn-primary mt-4" name="submit" value="simpan">
                        <i class="fa fa-save"></i>
                        Simpan Perubahan
                    </button>
                <!-- </div> -->
                


                
            </form>
        

            <div class="text-md-start justify-content-between pt-2 pb-2 mt-4 mb-2 bg-primary">
            <!-- Copyright -->
                <div class="text-white mb-3 mb-md-0 text-center">Copyright &copy; 2023. All rights reserved.
                    <br>Distributed by <a href="https://linkfly.to/dhnykrnwn" class="text-white text-decoration-none fw-bold" target="_blank">Dhany Kurniawan</a>
                </div>
            <!-- Copyright -->
            </div>

    </div>
</body>
    <?php if ($posisi==""){

    } elseif ($posisi=="cbg") { ?>

        <script>
            document.getElementById("kab").focus();
        </script>

    <?php } elseif ($posisi=="kab") { ?>
        <script>
            document.getElementById("kec").focus();
        </script>
    <?php } ?>

</html>