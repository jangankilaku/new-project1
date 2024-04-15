<?php
$title = 'Tambah Akun';
include_once('template/sett.php');
include_once('template/sidebar.php');
if($_SESSION["lv"] == "user"){
    header('location: 404.html');
}
if(isset($_POST['tambah'])){
    addprof();
    header('location: adprof.php');
}
if(isset($_POST['delete'])){
    delprof();
    header('location: adprof.php');
}
if(isset($_POST['edit'])){
    eprof();
    header('location: adprof.php');
}
$query = $con->query("SELECT * from usser");
?>
<form action="" method="post" class="">
    <button name="tprof" class="btn btn-primary float-end end-0 rounded p-3 shadow-lg  me-5 mb-5 position-fixed mt-1"><i class="bi bi-person-fill-add"></i></button>
</form>
<?php
while($row = $query->fetch_array()){
?>
<div class="mt-5 float-end">
<div class="border text-center rounded p-4 shadow-lg me-4 mt-5">
    <div>
        <form action="adprof.php?id=<?=$row['id']?>" method="post">
            <button class="float-end btn text-warning" name="editprof"><i class="bi bi-pencil-square"></i></button>
            <button class="float-start btn text-danger" name="deleteprof"><i class="bi bi-trash-fill"></i></button>
        </form>
    </div><br>
    <img src="https://static-00.iconduck.com/assets.00/profile-circle-icon-2048x2048-cqe5466q.png" height="100px" width="100px" alt="Profile Picture" class="mb-3 mt-2 ">
    <h6 class="text-black"><?=$row['nama']?></h6>
    <p class="bg-secondary text-light text-center text-capitalize rounded"><?=$row['lv']?></p>
</div>
</div>
<?php }
if(isset($_POST['tprof'])){
?>
<div class="bg-light-subtle shadow-lg border rounded p-5 w-25 h-100 position-absolute top-50 start-50 translate-middle text-center ">
    <form action="" method="post">
        <h5 class="text-capitalize">tambah akun </h5>
        <p class="text-capitalize text-secondary mb-2 " >klik simpan jika ingin menyimpan akun anda!!!</p>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="mb-3">
            <label for="user" class="form-label">Username</label>
            <input type="text" name="user" id="user" class="form-control">
        </div>
        <div class="mb-3">
            <label for="pass" class="form-label">Password</label>
            <input type="password" name="pass" id="pass" class="form-control">
        </div>
        <div class="mb-3">
            <label for="lv" class="form-label">Level akun</label>
            <select name="lv" class="form-control" id="lv">
                <option value="admin">admin</option>
                <option value="user">user</option>
            </select>
        </div>
        <button name="tambah" class="btn btn-success shadow-sm text-capitalize">simpan</button>
        <button name="false" class="btn btn-warning shadow-sm text-capitalize">close</button>
    </form>
</div>
<?php
}elseif(isset($_POST['editprof'])){
    $idp = $_GET['id'];
    $query = $con->query("SELECT * from usser where id='$idp'");
    $row = $query->fetch_array();
?>
<div class="bg-light-subtle shadow-lg border rounded p-5 w-25 h-100 position-absolute top-50 start-50 translate-middle text-center ">
    <form action="" method="post">
        <h5 class="text-capitalize">edit akun </h5>
        <p class="text-capitalize text-secondary mb-2 " >klik simpan jika ingin menyimpan akun anda!!!</p>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value='<?=$row['nama']?>'>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value='<?=$row['email']?>'>
        </div>
        <div class="mb-3">
            <label for="user" class="form-label">Username</label>
            <input type="text" name="user" id="user" class="form-control" value='<?=$row['user']?>'>
        </div>
        <div class="mb-3">
            <label for="pass" class="form-label">Password</label>
            <input type="password" name="pass" id="pass" class="form-control" value="<?=mb_strimwidth(str_replace("%$row[pass]%", "*****", "*****"),0,12,"***")?>">
        </div>
        <div class="mb-3">
            <label for="lv" class="form-label">Level akun</label>
            <select name="lv" class="form-control" id="lv">
            <option selected value="<?=$row['lv']?>"><?=$row['lv']?></option>
                <option value="admin">admin</option>
                <option value="user">user</option>
            </select>
        </div>
        <button name="edit" class="btn btn-success shadow-sm text-capitalize">simpan</button>
        <button name="false" class="btn btn-warning shadow-sm text-capitalize">close</button>
    </form>
</div>
<?php
}elseif(isset($_POST['deleteprof'])){
?>
<div class="bg-light-subtle shadow-lg border rounded p-5 w-25 h-50 position-absolute top-50 start-50 translate-middle text-center ">
    <form action="" method="post">
        <h5 class="text-capitalize">yakin ingin menghapus akun ini ? </h5>
        <p class="text-capitalize text-secondary mb-5 " >klik yes jika ingin menghapus !!!</p>
        <button name="delete" class="btn btn-danger w-25 shadow-sm m-3 text-capitalize">yes</button>
        <button name="false" class="btn btn-success w-25 shadow-sm m-3 text-capitalize">no</button>
    </form>
</div>
<?php
}
?>