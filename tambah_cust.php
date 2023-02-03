<?php
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php?pesan=belum_login");
}

require "koneksi.php";
require "function.php";


if (!empty($_POST["submit"])) {
    if(tambah_cust($_POST)) {
        echo "success";
    }    
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
if (isset($_GET['kel'])) {
    echo $kel;
    $kel = $_GET['kel'];
    $posisi = "kel";
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

    <!-- Icon -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body style="background-color: #ececf2;">
    
    <h2 class="text-center mt-4">Form Tambah Customer Baru</h2>

    <div class="container col-md-9 mt-4">

        <a href="home.php" class="btn btn-sm btn-primary">
            <i class="fa fa-home"></i>
            Back to Home
        </a>

        
            <form action="" method="post">
                
                <!-- Alamat Usaha -->
                <div class="card mt-2">
                    <div class="card-header bg-primary text-white fw-bold">
                        Lokasi Usaha
                    </div>
                    
                    <div class="card-body">
                        <!-- Cabang -->
                        <div class="form-group mt-3">
                            <label>Cabang</label>
                            <select onchange="getValueCabang()" name="cabang" id="cabang" class="form-control form-control-sm" required>
                                <option value="">--- PILIH CABANG ---</option>
                                <?php
                                $data = mysqli_query($koneksi, "SELECT * FROM cabang");
                                while ($d = mysqli_fetch_array($data)) {
                                    $id_cabang = $d['id_cabang'];
                                    $nama_cabang = $d['nama_cabang'];
                                ?>
                                <option value="<?= $id_cabang; ?>" <?php if ($cbg == $id_cabang) {echo "selected";} ?>><?= $nama_cabang; ?></option>
                                <?php } ?>
                            </select>
                            
                            <script>
                                function getValueCabang() {
                                    a = document.getElementById("cabang").value;
                                    if (a=="") {
                                        return "";
                                    }
                                    window.location.href = "?cbg=" + a;
                                }
                            </script>
                        </div>

                        <!-- Kabupaten/Kota -->
                        <div class="form-group mt-3">
                            <label>Kabupaten / Kota</label>
                            <select onchange="getValueKab()" name="kab" id="kab" class="form-control form-control-sm" required>
                                <option value="">--- PILIH KABUPATEN / KOTA ---</option>
                                <?php
                                $data = mysqli_query($koneksi, "SELECT * FROM kab WHERE id_cabang=$cbg");
                                while ($d = mysqli_fetch_array($data)) {
                                    $id_kab = $d['id_kab'];
                                    $nama_kab = $d['nama_kab'];
                                    $id_cabang = $d['id_cabang'];
                                ?>
                                <option value="<?= $id_kab; ?>" <?php if ($kab == $id_kab) {echo "selected";} ?>><?= $nama_kab; ?></option>
                                <?php } ?>
                            </select>

                            <script>
                                function getValueKab(){
                                    b = document.getElementById("kab").value;
                                    if (b=="") {
                                        return "";
                                    }
                                    window.location.href = "?cbg=" + <?=$cbg?> + "&kab=" + b;
                                }
                            </script>
                        </div>

                        <!-- Kecamatan -->
                        <div class="form-group mt-3">
                            <label>Kecamatan</label>
                            <select onchange="getValueKec()" name="kec" id="kec" class="form-control form-control-sm" required>
                                <option value="">--- PILIH KECAMATAN ---</option>
                                <?php
                                $data = mysqli_query($koneksi, "SELECT * FROM kec WHERE id_kab=$kab");
                                while ($d = mysqli_fetch_array($data)) {
                                    $id_kec = $d['id_kec'];
                                    $nama_kec = $d['nama_kec'];
                                    $id_kab = $d['id_kab'];
                                ?>
                                <option value="<?= $id_kec; ?>" <?php if ($kec == $id_kec) {echo "selected";} ?>><?= $nama_kec; ?></option>
                                <?php } ?>
                            </select>

                            <script>
                                function getValueKec(){
                                    c = document.getElementById("kec").value;
                                    if (c=="") {
                                        return "";
                                    }
                                    window.location.href = "?cbg=" + <?=$cbg?> + "&kab=" + <?=$kab?> + "&kec=" + c ;
                                }
                            </script>
                        </div>

                        <!-- Kelurahan -->
                        <div class="form-group mt-3">
                            <label>Kelurahan</label>
                            <select name="kel" id="kel" class="form-control form-control-sm" required>
                                <option value="">--- PILIH KELURAHAN ---</option>
                                <?php
                                $data = mysqli_query($koneksi, "SELECT id_kel, UPPER(nama_kel) AS nama_kel, id_kec FROM kel WHERE id_kec=$kec");
                                while ($d = mysqli_fetch_array($data)) {
                                    $id_kel = $d['id_kel'];
                                    $nama_kel = $d['nama_kel'];
                                    $id_kec = $d['id_kec'];
                                ?>
                                <option value="<?= $id_kel; ?>"><?= $nama_kel; ?></option>
                                <?php } ?>
                            </select>
                            
                        </div>
                        
                        <div class="form-group mt-3">
                            <label>RT</label>
                            <input type="number" name="rt" class="form-control form-control-sm" required>
                        </div>

                        <div class="form-group mt-3">
                            <label>RW</label>
                            <input type="number" name="rw" class="form-control form-control-sm" required>
                        </div>

                        <div class="form-group mt-3">
                            <label>Alamat Lengkap Usaha</label>
                            <textarea name="alm_usaha" id="alm_usaha" cols="30" rows="2" class="form-control form-control-sm" required></textarea>
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
                            <input type="text" name="nama_usaha" class="form-control form-control-sm" required>
                        </div>

                        <div class="form-group mt-3">
                            <label>Jenis Usaha</label>
                            <input type="text" name="jenis_usaha" class="form-control form-control-sm" required>
                        </div>

                        <div class="form-group mt-3">
                            <label>Lama Usaha</label>
                            <input type="text" name="lama_usaha" class="form-control form-control-sm" required>
                        </div>

                        <div class="form-group mt-3">
                            <label>Kepemilikan Tempat Usaha</label>
                            <input type="text" name="tempat_usaha" class="form-control form-control-sm" required>
                        </div>

                        <div class="form-group mt-3">
                            <label>NPWP</label>
                            <input type="text" name="npwp" class="form-control form-control-sm" required>
                        </div>

                        <div class="form-group mt-3">
                            <label>No Telp</label>
                            <input type="tel" name="telp" class="form-control form-control-sm" required>
                        </div>


                        <div class="form-group mt-3">
                            <label>Omzet Rata-rata Perbulan</label>
                            <input type="text" name="omzet" class="form-control form-control-sm" required>
                        </div>

                        <div class="form-group mt-3">
                            <label>Kompetitor</label>
                            <input type="text" name="kompetitor" class="form-control form-control-sm" required>
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
                            <input type="text" name="pemilik" class="form-control form-control-sm" required>
                        </div>

                        <div class="form-group mt-3">
                            <label>NIK Pemilik</label>
                            <input type="text" name="nik" class="form-control form-control-sm" required>
                        </div>

                        <div class="form-group mt-3">
                            <label>No. HP Pemilik</label>
                            <input type="tel" name="hp_pemilik" class="form-control form-control-sm" required>
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
                            <input type="text" name="pic" class="form-control form-control-sm" required>
                        </div>

                        <div class="form-group mt-3">
                            <label>No. HP PIC</label>
                            <input type="tel" name="hp_pic" class="form-control form-control-sm" required>
                        </div>
                    </div>
                </div>

                <!-- Button Simpan -->
                <!-- <div class="card mt-3"> -->
                    <button type="submit" class="container col-md-12 btn btn-primary mt-4" name="submit" value="simpan">
                        <i class="fa fa-save"></i>
                        Simpan Data
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
    <?php } elseif ($posisi=="kec") { ?>
        <script>
            document.getElementById("kel").focus();
        </script>
    <?php } ?>
    

</html>