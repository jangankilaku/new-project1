<?php
include_once("koneksi.php");
if(!$_SESSION["berhasil_login"]){
    header('location: index.php');
}
if($_SESSION["lv"] == "user"){
    ?><style>
        #admin{
            display: none;
        }
    </style><?php
}
$uinput = $_SESSION['berhasil_login'];
$date = date("d-D-M-Y");
function logout(){
    session_destroy();
    header("location: index.php");
    exit;
}
if(isset($_POST["logout"])){
    logout();
}
function tampil_barang(){
    global $con;
    $query = $con->query("SELECT * FROM barang");
    $no = 0;
    if($query->num_rows > 0) {
        while ($row = $query->fetch_array()) {
            $no++;
        ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $row['nama'] ?></td>
            <td><?= date("d-F-Y", strtotime($row['tanggal'])) ?></td>
            <td>Rp.<?= $row['harga'] ?></td>
            <td><?= $row['stok'] ?></td>
            <td><?= $row['u_input'] ?></td>
            <td><form action="barang.php?id=<?= $row['id']?>" method="post"><button name="editb" class="btn btn-warning"><i class="bi bi-pencil-fill"></i></button></form></td>
            <td><form action="barang.php?id=<?= $row['id'] ?>" method="post"><button class="btn btn-danger" name="pdelete"><i class="bi bi-trash-fill"></i></button></form></td>
        </tr>
        <?php 
        } 
    }else{
        ?><tr><td colspan="7">Tidak ada data barang.</td></tr><?php
    } 
}
function t_barang(){
    global $con,$uinput,$date;
    $nama = $_POST["nama"];
    $tanggal = $_POST["tanggal"];
    $harga = $_POST["harga"];
    $stok = $_POST["stok"];
    $pesan = $uinput." Menambahkan data barang ". $date." ".$nama."";
    $q = $con->query("INSERT into history value ('','$pesan','$uinput')");
    $query = $con->query("INSERT into barang value ('','$nama','$tanggal','$harga','$stok','$uinput')");
    if(!$query){
        ?><tr><td colspan="7">barang tidak dapat di tambahkan</td></tr><?php $con->error;
    }
}
function edit_b(){
    global $con,$id,$uinput,$date;
    $nama = $_POST["nama"];
    $tanggal = $_POST["tanggal"];
    $harga = $_POST["harga"];
    $stok = $_POST["stok"];
    $sql = $con->query("UPDATE `barang` SET `nama`='$nama',`tanggal`='$tanggal',`harga`='$harga',`stok`='$stok' WHERE id=$id");
    $pesan = $uinput . " Mengedit data barang ". $date." ".$nama."" ;
    $q = $con->query("INSERT into history value ('','$pesan','$uinput')");
    if(!$sql){
        ?><tr><td colspan="7">barang gagal di edit</td></tr><?php $con->error;
    }
}
function del_barang(){
    global $con,$id,$uinput,$nama,$date;
    $pesan = $uinput . " Menghapus data barang ". $date." ".$nama."";
    $q = $con->query("INSERT into history value ('','$pesan','$uinput')");
    $query = $con->query("DELETE from barang where id='$id'");
}

function tampil_trans(){
    global $con;
    $no = 0;
    $tampil = $con->query("SELECT * from transaksi");
    if ($tampil->num_rows > 0) {
        while ($row = $tampil->fetch_array()) {
            $no++;
            ?>
            <tr>
            <td><?=$no?></td>
            <td><?=$row['nama']?> </td>
            <td><?=date("d-F-Y",strtotime($row['tanggal']))?></td>
            <td><?=$row['jjual']?> </td>
            <td><?=$row['uinput']?></td>
            <td><form action="transaksi.php?id=<?= $row['idt']?>" method="post"><button name="editt" class="btn btn-warning"><i class="bi bi-pencil-fill"></i></button></form></td>
            <td><form action="transaksi.php?id=<?= $row['idt'] ?>" method="post"><button class="btn btn-danger" name="delet"><i class="bi bi-trash-fill"></i></button></form></td>
            </tr><?php
        }
    } else {
        ?><tr><td colspan="7">Tidak ada data transaksi.</td></tr><?php
    }
}
function edit_tr(){
    global $con,$id,$uinput,$date;
    $nama = $_POST["nama"];
    $tanggal = $_POST["tanggal"];
    $jjual = $_POST["jjual"];
    $pesan = $uinput . " Mengedit data transaksi ". $date." ".$nama."";
    $q = $con->query("INSERT into history value ('','$pesan','$uinput')");
    $sql = $con->query("UPDATE `transaksi` SET `nama`='$nama',`tanggal`='$tanggal',`jjual`='$jjual' WHERE idt=$id");
    if(!$sql){
        ?><tr><td colspan="7">barang gagal di edit</td></tr><?php $con->error;
    }
}
function tam_tr(){
    global $con,$id,$uinput,$date;
    $idb= $_POST['idb'];
    $nama = $_POST["nama"];
    $tanggal = $_POST["tanggal"];
    $jjual = $_POST["jjual"];
    $pesan = $uinput . " Menambah data transaksi ". $date." ".$nama."";
    $q = $con->query("INSERT into history value ('','$pesan','$uinput')");
    $sql = $con->query("INSERT into transaksi value ('','$idb','$nama','$tanggal','$jjual','$uinput')");
    if(!$sql){
        ?><tr><td colspan="7">barang gagal di tambah<?= $con->error ?></td></tr><?php
    }
}
function del_tr(){
    global $con,$id,$nama,$uinput,$date;
    $pesan = $uinput . " Menghapus data transaksi ". $date." ".$nama."";
    $q = $con->query("INSERT into history value ('','$pesan','$uinput')");
    $query = $con->query("DELETE from transaksi where idt='$id'");
}
function eprof(){
    global $con, $idp,$date;
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $lv = $_POST['lv'];
    $enpass = password_hash($pass, PASSWORD_BCRYPT);
    $query =$con->prepare("UPDATE `usser` SET `nama`=?, `email`=?, `user`=?, `pass`=?, `lv`=? WHERE id=?");
    $query->bind_param("sssssi", $nama, $email, $user, $enpass, $lv, $_GET['id']);
    $query->execute();
}

function delprof(){
    global $con, $idp;
    $qwr = $con->query("DELETE from usser where id=".$_GET['id']."");
}
function addprof(){
    global $con;
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $lv =$_POST['lv'];
    $enpass = password_hash($pass,PASSWORD_BCRYPT);
    $qwr = $con->query("INSERT into usser values('','$nama','$email','$user','$enpass','$lv')");
}
function history(){
    global $con;
    $query = $con->query("SELECT * from history");
    if ($query->num_rows > 0) {
        $no =0;
        while ($row = $query->fetch_array()) {
            $no++;
            ?>
            <tr>
            <td><?=$no?></td>
            <td><?=$row['pesan']?> </td>
            <td><?=$row['user_i']?> </td>
            </tr><?php
        }
    }
}