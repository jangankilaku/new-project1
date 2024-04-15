<?php 
$title = 'barang';
if(isset($_GET['id'])){$id = $_GET['id'];}
include('template/sett.php');
include('template/sidebar.php'); 
if(isset($_POST['barang'])){
    unset($_POST['popup']);
}
if(isset($_POST["tambah"])){
    t_barang();
    header('location: barang.php');
}unset($_POST['tambah']);
if(isset($_POST['delete'])){
    del_barang();
    header('location: barang.php');
}
if(isset($_POST['edit'])){
    edit_b();
    header('location: barang.php');
}
include_once('models/barang.model.php');