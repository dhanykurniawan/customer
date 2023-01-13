<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php?pesan=belum_login");
}

require "koneksi.php";

$id_cust = $_GET['id_cust'];

$data = mysqli_query($koneksi, "DELETE FROM customer WHERE id_cust='$id_cust' ");

echo '<script type="text/javascript">'; 
echo 'alert("CUSTOMER BERHASIL DIHAPUS");'; 
echo 'window.location.href = "home.php"';
echo '</script>';

?>