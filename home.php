<?php 
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php?pesan=belum_login");
}

require "koneksi.php";
 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Customer | Home</title>

    <!-- Pasoka icon -->
    <link rel="icon" href="assets/pasoka.ico" type="image/x-icon" />

    <!-- Menyisipkan Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Menyisipkan JQuery dan Javascript Bootstrap -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Style -->
    <!-- <link rel="stylesheet" href="style.css"> -->

    <!-- Icon -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <!-- Icon -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <style>
        .shadow:hover {
            background-color: #ececf2;
        }
    </style>
</head>
<body style="background-color: #ececf2;">
    <div class="container col-md-10 mt-4">
        <h2 class="text-center mb-4">Data Customer PT. PASOKA SUMBER KARYA</h2>

        <div class="col-md-12 mb-2">
            <div class="d-flex justify-content-between mt-4">
                <a href="tambah_cust.php" class="btn btn-sm btn-primary fw-bold">
                    <i class="fa fa-plus"></i>
                    Tambah Data Customer Baru
                </a>
                <div class="d-flex">
                    <a href="password.php" class="btn btn-sm btn-warning me-1 fw-bold">
                        <i class="fa fa-lock"></i>
                        Change Password</a>
                    <a href="logout.php" class="out btn btn-sm btn-danger fw-bold" onclick="return confirm('APAKAH ANDA YAKIN INGIN KELUAR DARI SISTEM?')">
                        <i class="fa fa-sign-out"></i>
                        Logout
                    </a>
                </div>
            </div>
        </div>

        <form action="search.php" method="post" class="input-group mt-2 mb-2">
            <div class="d-inline-flex col-md-12">
                <input type="text" class="form-control form-control-sm border border-primary me-2" id="keyword" name="keyword" aria-describedby="keyword" placeholder="Search by Nama Usaha...">
                <button type="submit" class="btn btn-sm btn-primary fw-bold" style="width: 150px;">
                    <i class="fa fa-search"></i>
                    Cari
                </button>
            </div>
        </form>
            
            

        <table class="table align-self-center">
            <thead>
                <tr class="text-center text-light bg-primary" style="position: sticky; top: 0;">
                    <th>No.</th>
                    <th>Kode Customer</th>
                    <th>Nama Usaha</th>
                    <th>Nama Pemilik Usaha</th>
                    <th>No. HP Pemilik Usaha</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="bg-light">
                <?php
                $no = 1;
                $index_kel = array();

                $data = mysqli_query($koneksi, "SELECT * FROM customer");
                while ($d = mysqli_fetch_array($data)) {
                    $id_cust = $d['id_cust'];
                    $nama_usaha = $d['nama_usaha'];
                    $cabang = $d['cabang'];
                    $kec = $d['kec'];
                    $kel = $d['kel'];
                    $pemilik = $d['pemilik'];
                    $hp_pemilik = $d['hp_pemilik'];
                    $nomor = $no++;
                ?>
                <tr class="text-center shadow">
                    <td>
                        <?= $nomor; ?>
                    </td>
                    <td>
                        <?php
                            array_push($index_kel, $kel);
                            $counts = array_count_values($index_kel);
                            $no_urut = $counts[$kel];
                        ?>
                        <strong>
                            <?= $cabang; echo "-$kec"; echo "-$kel"; echo "-$no_urut"; ?>
                        </strong>
                    </td>
                    <td>
                        <?= $nama_usaha; ?>
                    </td>
                    <td>
                    <?= $pemilik; ?>
                    </td>
                    <td>
                    <?= $hp_pemilik; ?>
                    </td>
                    <td class="ps-0 pe-0">
                        <a href="detail.php?id_cust=<?= $id_cust; ?>&nourut=<?= $no_urut ?>" class="btn btn-sm btn-success fw-bold">
                            <i class="fa fa-eye"></i>
                            See more
                        </a>
                        <span> | </span>
                        <a href="hapus_cust.php?id_cust=<?= $id_cust; ?>" class="btn btn-sm btn-danger fw-bold" onclick="return confirm('APAKAH ANDA YAKIN INGIN MENGHAPUS <?= $nama_usaha; ?> DARI SISTEM?')">
                            <i class="fa fa-trash"></i>
                            Delete
                        </a>
                    </td>
                </tr>
                <?php } ?>
                
            </tbody>
        </table>


        <!-- Copyright -->
            <div class="col-12 bg-primary text-white pt-2 pb-2 mb-3 text-center">Copyright &copy; 2023. All rights reserved.
                <br>Distributed by <a href="https://linkfly.to/dhnykrnwn" class="text-white text-decoration-none fw-bold" target="_blank">Dhany Kurniawan</a>
            </div>
        <!-- Copyright -->
    </div>
</body>
</html>