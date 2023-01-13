<?php
require "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Data Customer</title>

    <!-- Pasoka icon -->
    <link rel="icon" href="assets/pasoka.ico" type="image/x-icon" />

    <!-- Menyisipkan Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Menyisipkan JQuery dan Javascript Bootstrap -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Icon -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
</head>
<body style="min-height: 100%; background-color: #ececff;">
    <?php
    // Get search keyword
    $keyword = mysqli_real_escape_string($koneksi, $_POST['keyword']);

    ?>
    <!-- Execute query -->
    <!-- $data = "SELECT * FROM pengalaman WHERE proyek LIKE '%$keyword%' OR pelanggan LIKE '%$keyword%' "; -->
    <!-- $result = mysqli_query($koneksi, $data); -->

        <!-- while ($row = mysqli_fetch_array($result)) { -->
            <!-- $proyek = $row['proyek']; -->
        <!-- } -->
    <!-- Display search results -->
      <!-- while ($row = mysqli_fetch_array($result)) { -->
        <!-- echo $row['proyek'] . "<br>"; -->
      <!-- } -->

    <div class="container mt-4">

        <h3>Search result "<?= $keyword; ?>"</h3>

        <a href="home.php" class="btn btn-primary mb-2">
            <i class="fas fa-home"></i>
            Back to Home
        </a>
    
        <!--  -->
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
            <tbody>
                <?php
                $no = 1;
                $index_kel = array();
                
                $data = "SELECT * FROM customer WHERE nama_usaha LIKE '%$keyword%' ";
                $result = mysqli_query($koneksi, $data);
                    while ($d = mysqli_fetch_assoc($result)) {
                        $id_cust = $d['id_cust'];
                        $nama_usaha = $d['nama_usaha'];
                        $cabang = $d['cabang'];
                        $kec = $d['kec'];
                        $kel = $d['kel'];
                        $pemilik = $d['pemilik'];
                        $hp_pemilik = $d['hp_pemilik'];
                        $nomor = $no++;
                ?>
                <tr class="text-center bg-light shadow">
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
                        <a href="detail.php?id_cust=<?= $id_cust; ?>&nourut=<?= $no_urut ?>" class="btn btn-sm btn-success d-inline-block mr-1">
                            <i class="fa fa-eye"></i>
                            See more
                        </a>
                        <span> | </span>
                        <a href="hapus_cust.php?id_cust=<?= $id_cust; ?>" class="btn btn-sm btn-danger d-inline-block" onclick="return confirm('APAKAH ANDA YAKIN INGIN MENGHAPUS <?= $nama_usaha; ?> DARI SISTEM?')">
                            <i class="fa fa-trash"></i>
                            Delete
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <!--  -->

        <div class="text-md-start justify-content-between py-3 px-4 px-xl-5 bg-primary mt-5 mb-2">
            <!-- Copyright -->
            <div class="text-white mb-3 mb-md-0 text-center">Copyright &copy; 2023. All rights reserved.
                <br>Distributed by <a href="https://linkfly.to/dhnykrnwn" class="text-white text-decoration-none fw-bold" target="_blank">Dhany Kurniawan</a>
            </div>
            <!-- Copyright -->
        </div>


    </div>
</body>
</html>