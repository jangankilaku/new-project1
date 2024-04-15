<?php 
$title = 'transaksi';
if(isset($_GET['id'])){$id = $_GET['id'];}
include('template/sett.php');
include('template/sidebar.php'); 
if(isset($_POST['transaksi'])){
    unset($_POST['popup']);
}
if(isset($_POST["tambah"])){
    tam_tr();
    header('location: transaksi.php');
}unset($_POST['tambah']);
if(isset($_POST['delete'])){
    del_tr();
    header('location: transaksi.php');
}
if(isset($_POST['edit'])){
    edit_tr();
    header('location: transaksi.php');
}
include_once("models/transaksi.model.php");