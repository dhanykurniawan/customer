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
<body style="background-color: #ececf2;">
    
    <h2 class="text-center mt-4">Form Tambah Customer Baru</h2>

    <div class="container col-md-9 mt-4">

        <a href="home.php" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
            </svg>
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
                                        return 0;
                                    }
                                    window.location.href = "?cbg=" + a;
                                }
                            </script>
                        </div>

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
                                        return 0;
                                    }
                                    window.location.href = "?cbg=" + <?=$cbg?> + "&kab=" + b;
                                }
                            </script>
                        </div>

                        <div class="form-group mt-3">
                            <label>Kecamatan</label>
                            <select name="kec" id="kec" class="form-control form-control-sm" required>
                                <option value="">--- PILIH KECAMATAN ---</option>
                                <?php
                                $data = mysqli_query($koneksi, "SELECT * FROM kec WHERE id_kab=$kab");
                                while ($d = mysqli_fetch_array($data)) {
                                    $id_kec = $d['id_kec'];
                                    $nama_kec = $d['nama_kec'];
                                    $id_kab = $d['id_kab'];
                                ?>
                                <option value="<?= $id_kec; ?>"><?= $nama_kec; ?></option>
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
    <?php } ?>
    

</html>