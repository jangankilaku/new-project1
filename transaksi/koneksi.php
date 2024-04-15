<?php
session_start();
$con = new mysqli("localhost","root","","barang");
if (!$con) {
    die("gagal terkoneksi dengan database silahkan hubungi administrato". mysqli_connect_error());
}
