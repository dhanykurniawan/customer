<?php

$host = "localhost";
$user = "root";
$pass = "";
$db   = "customer";

// koneksi ke database
$koneksi = mysqli_connect($host, $user, $pass, $db);

// cek koneksi
if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
  }

?>