<?php
$title = "profile";
include("template/sidebar.php");
include("template/sett.php");
$idp = $_SESSION['id'];
if(isset($_POST['true'])){
    delprof();
   logout();
}
if(isset($_POST['eprof'])){
    eprof();
    header('location: profile.php');
}
    $query = $con->query("SELECT * from usser where id='$idp'");
    $row = $query->fetch_array();
?>
    <div class="border border-5 w-50 float-start position-absolute top-50 start-50 translate-middle">
    <div class="text-center">
    <img src="https://static-00.iconduck.com/assets.00/profile-circle-icon-2048x2048-cqe5466q.png" height="100px" width="100px" alt="Profile Picture" class="mb-3 mt-2 ">
    </div>
        <div class="ms-5 w-50 float-start">
        <h5 class="text-secondary">Nama :</h5>
        <p class="text-black w-50 text-center bg-secondary rounded text-capitalize"><?=$row['nama']?></p>
        <h5 class="text-secondary">Level Akun :</h5>
        <p class="bg-success text-black w-50 text-center rounded text-capitalize"><?= $row['lv']?></p>
        <h5 class="text-secondary">Email :</h5>
        <p class="text-black w-75 p-2 text-center rounded bg-warning"><?= $row['email']?></p>
        <h5 class="text-secondary">Username :</h5>
        <p class="text-black w-50 text-center"><?= str_replace("%$$row[user]%", "*****", "*****")?></p>
        <h5 class="text-secondary">Password :</h5>
        <p class="text-black w-50 text-center" ><?= mb_strimwidth(str_replace("%$row[pass]%", "*****", "*****"),0,12,"")?></p>
        </div>
        <div class="float-start mt-5">
           <form action="" method="post">
           <button class="btn btn-primary mb-2"  name="ubah_data">Edit Akun</button><br>
           <button class="btn btn-warning mt-2 mb-2"  name="logout">Log Out</button><br>
           <button class="btn btn-danger mt-2"  name="delprof">Delete Akun</button>
           </form><br>
           <a href="adprof.php" id="admin" class="btn btn-secondary mb-3">Tambah akun</a><br>
           <a href="history.php" id="admin" class="btn btn-secondary">History</a>
        </div>
    </div>
    <?php if(isset($_POST['delprof'])){
        ?>
        <div class="bg-light-subtle shadow-lg border rounded p-5 w-25 h-50 position-absolute top-50 start-50 translate-middle text-center ">
        <form action="profile.php?id=<?=$idp?>" method="post">
            <h5 class="text-capitalize">yakin ingin menghapus akun ini ? </h5>
            <p class="text-capitalize text-secondary mb-5 " >klik yes jika ingin menghapus !!!</p>
                <button name="true" class="btn btn-danger w-25 shadow-sm m-3 text-capitalize">yes</button>
                <button name="false" class="btn btn-success w-25 shadow-sm m-3 text-capitalize">no</button>
        </form>
        </div>
        <?php 
        }
         if(isset($_POST['ubah_data'])){
            $idp = $_SESSION['id'];
            $query = $con->query("SELECT * from usser where id='$idp'");
            $row = $query->fetch_array();
            ?>
            <div class="bg-light-subtle shadow-lg border rounded p-5 w-25 h-75 position-absolute top-50 start-50 translate-middle text-center ">
            <form action="profile.php?id=<?=$row['id']?>" method="post">
                <h6>Edit Akun</h6>
                <input type="hidden" name="lv" value='<?=$row['lv']?>'>
                <label for="nama">Nama :</label>
                <input type="text" name="nama" id="nama" class="form-control mb-2" value="<?=$row['nama']?>">
                <label for="email">Email :</label>
                <input type="email" name="email" id="email" class="form-control mb-2" value="<?=$row['email']?>">
                <label for="user">Username :</label>
                <input type="text" name="user" id="user" class="form-control mb-2" value="<?=$row['user']?>">
                <label for="Password">Password :</label>
                <input type="password" name="pass" id="pass" class="form-control mb-2" value="<?=mb_strimwidth(str_replace("%$row[pass]%", "*****", "*****"),0,12,"***")?>">
                <button name="eprof" class="btn btn-primary">Submit</button>
                <button name="exit" class="btn btn-warning ms-5">Exit</button>
            </form>
            </div>
            <?php 
            }
            ?>