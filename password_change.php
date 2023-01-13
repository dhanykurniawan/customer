<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php?pesan=belum_login");
}

require 'koneksi.php';

$username = $_POST['username'];
$oldpassword = MD5($_POST['oldpassword']);
$newpassword = MD5($_POST['newpassword']);
$confirmnewpassword = MD5($_POST['confirmnewpassword']);

$ubah = mysqli_query($koneksi, "SELECT * FROM user WHERE user.username='$username' ");
$u = mysqli_fetch_array($ubah);

if ($u["username"] === $username) {
    if ($u["password"] === $oldpassword) {
        if ($newpassword === $confirmnewpassword) {
            mysqli_query($koneksi, "update user set password='$newpassword' where username='$username'");
            echo '<script type="text/javascript">';
            echo 'alert("PASSWORD BERHASIL DI UPDATE");';
            echo 'window.location.href = "home.php";';
            echo '</script>';
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("PASSWORD BARU TIDAK SAMA");';
            echo 'window.location.href = "password.php";';
            echo '</script>';
        }
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("PASSWORD LAMA SALAH");';
        echo 'window.location.href = "password.php";';
        echo '</script>';
    }    
} else {
    echo '<script type="text/javascript">';
    echo 'alert("USERNAME TIDAK DITEMUKAN!");';
    echo 'window.location.href = "password.php";';
    echo '</script>';
}