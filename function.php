<?php
require "koneksi.php";

// function tambah
function tambah_cust($data) {
    GLOBAL $koneksi;

    $nama_usaha = htmlspecialchars($data['nama_usaha']);
    $jenis_usaha = htmlspecialchars($data['jenis_usaha']);
    $lama_usaha = htmlspecialchars($data['lama_usaha']);
    $tempat_usaha = htmlspecialchars($data['tempat_usaha']);
    $npwp = htmlspecialchars($data['npwp']);
    $telp = htmlspecialchars($data['telp']);
    $omzet = htmlspecialchars($data['omzet']);
    $kompetitor = htmlspecialchars($data['kompetitor']);
    $alm_usaha = htmlspecialchars($data['alm_usaha']);
    $cabang = htmlspecialchars($data['cabang']);
    $kec = htmlspecialchars($data['kec']);
    $kel = htmlspecialchars($data['kel']);
    $rt = htmlspecialchars($data['rt']);
    $rw = htmlspecialchars($data['rw']);
    $pemilik = htmlspecialchars($data['pemilik']);
    $nik = htmlspecialchars($data['nik']);
    $hp_pemilik = htmlspecialchars($data['hp_pemilik']);
    $pic = htmlspecialchars($data['pic']);
    $hp_pic = htmlspecialchars($data['hp_pic']);
    
    
    $sql = "INSERT INTO customer (nama_usaha, jenis_usaha, lama_usaha, tempat_usaha, npwp, telp, omzet, kompetitor, alm_usaha, cabang, kec, kel, rt, rw, pemilik, nik, hp_pemilik, pic, hp_pic)
    VALUES ('$nama_usaha', '$jenis_usaha', '$lama_usaha', '$tempat_usaha', '$npwp', '$telp', '$omzet', '$kompetitor', '$alm_usaha', '$cabang', '$kec', '$kel', '$rt', '$rw', '$pemilik', '$nik', '$hp_pemilik', '$pic', '$hp_pic')";

    if (mysqli_query($koneksi, $sql)) {
        echo '<script type="text/javascript">'; 
        echo 'alert("CUSTOMER BERHASIL DITAMBAHKAN");'; 
        echo 'window.location.href = "home.php"';
        echo '</script>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }

    }








// function edit
function edit_cust($data) {
    $id_cust = $_GET['id_cust'];
    GLOBAL $koneksi;

    $nama_usaha = htmlspecialchars($data['nama_usaha']);
    $jenis_usaha = htmlspecialchars($data['jenis_usaha']);
    $lama_usaha = htmlspecialchars($data['lama_usaha']);
    $tempat_usaha = htmlspecialchars($data['tempat_usaha']);
    $npwp = htmlspecialchars($data['npwp']);
    $telp = htmlspecialchars($data['telp']);
    $omzet = htmlspecialchars($data['omzet']);
    $kompetitor = htmlspecialchars($data['kompetitor']);
    $alm_usaha = htmlspecialchars($data['alm_usaha']);
    $cabang = htmlspecialchars($data['cabang']);
    $kec = htmlspecialchars($data['kec']);
    $kel = htmlspecialchars($data['kel']);
    $rt = htmlspecialchars($data['rt']);
    $rw = htmlspecialchars($data['rw']);
    $pemilik = htmlspecialchars($data['pemilik']);
    $nik = htmlspecialchars($data['nik']);
    $hp_pemilik = htmlspecialchars($data['hp_pemilik']);
    $pic = htmlspecialchars($data['pic']);
    $hp_pic = htmlspecialchars($data['hp_pic']);
    
    $sql = "UPDATE customer SET nama_usaha = '$nama_usaha',
                                jenis_usaha = '$jenis_usaha',
                                lama_usaha = '$lama_usaha',
                                tempat_usaha = '$tempat_usaha',
                                npwp = '$npwp',
                                telp = '$telp',
                                omzet = '$omzet',
                                kompetitor = '$kompetitor',
                                alm_usaha = '$alm_usaha',
                                cabang = '$cabang',
                                kec = '$kec',
                                kel = '$kel',
                                rt = '$rt',
                                rw = '$rw',
                                pemilik = '$pemilik',
                                nik = '$nik',
                                hp_pemilik = '$hp_pemilik',
                                pic = '$pic',
                                hp_pic = '$hp_pic'
                                WHERE id_cust ='$id_cust'";

    if (mysqli_query($koneksi, $sql)) {
        echo '<script type="text/javascript">'; 
        echo 'alert("DATA CUSTOMER BERHASIL DIUPDATE");'; 
        echo 'window.location.href = "home.php"';
        echo '</script>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }

    }