
<form action="" method="post">
</form>
<?php
if(isset($_POST['popup'])){
  ?>
  <div class="bg-light-subtle shadow-lg border rounded p-5 w-25 h-75 position-absolute top-50 start-50 translate-middle text-center ">
<form action="" method="post">
    <div class="mb-3">
    <label for="tanggal">barang</label>
    <select name="idb" id="idb" class="form-control" required >
        <?php 
        $query = $con->query("SELECT * FROM barang");
        while($row = $query->fetch_array()){
        ?>
        <option value="<?=$row['id']?>" class="form-input"><?=$row['nama']?></option>
        <?php } ?>
    </select>
</div>
    <div class="mb-3">
    <label class="form-label" for="nama">Nama</label>
    <input class="form-control" type="text" name="nama" id="name">
    </div>
    <div class="mb-3">
    <label for="tanggal">Tanggal</label>
    <input type="date" class="form-control" name="tanggal" id="tanggal">
    </div>
    <div class="mb-3">
    <label for="stok">Jumlah Jual</label>
    <input type="text" class="form-control" name="jjual" id="jjual">
    </div>
    <div class="mb-3">
    <button class="btn btn-primary" name="tambah">Submit</button>
    <button class="btn btn-warning ms-2" name="transaksi">Close</button>
    </div>
</form>
        </div>
        <?php
}elseif(isset($_POST['editt'])){
    $sql = $con->query("SELECT * from transaksi where idt='$id'");
    $row=$sql->fetch_array();
    ?>
    <div class="bg-light-subtle shadow-lg border rounded p-5 w-25 h-75 position-absolute top-50 start-50 translate-middle">
        <h6 class="text-black text-capitalize" >Form edit transaksi</h6>
        <p class="text-secondary text-capitalize">Klik simpan suntuk menyimpan data!!!</p>
        <form action="" method="post">
            <div class="mb-3">
                <label class="form-label" for="name">Nama</label>
                <input class="form-control" type="text" name="nama" id="name" value="<?= $row['nama']?>">
</div>
<div class="mb-3">
    <label for="harga">Tanggal</label>
    <input type="date" class="form-control" name="tanggal" id="tanggal" value="<?= $row['tanggal']?>">
</div>
<div class="mb-3">
        <label for="stok">Jumlah Terjual</label>
        <input type="text" class="form-control" name="jjual" id="jjual" value="<?= $row['jjual']?>">
    </div>
    <div class="mb-3">
    <button class="btn btn-primary" name="edit">Simpan</button>
    <button class="btn btn-warning ms-2" name="transaksi">Close</button>
</div>
</form>
</div>
<?php
}elseif(isset($_POST['delet'])){
    ?>
    <div class="bg-light-subtle shadow-lg border rounded p-5 w-25 h-50 position-absolute top-50 start-50 translate-middle text-center ">
        <form action="" method="post">
            <h5 class="text-capitalize">yakin ingin menghapus transaksi ini ? </h5>
            <p class="text-capitalize text-secondary mb-5 " >klik yes jika ingin menghapus !!!</p>
                <button name="delete" class="btn btn-danger w-25 shadow-sm m-3 text-capitalize">yes</button>
                <button name="false" class="btn btn-success w-25 shadow-sm m-3 text-capitalize">no</button>
        </form>
        </div>
    <?php
}
?>
    <form align="right" action="" method="post"><button name="popup" class="btn btn-primary me-5 mt-2 mb-3" ><i class="bi bi-bookmark-plus"></i></button></form>
    <div class="main me-5" align="right">
        <table class="table w-75 me-5 ms-5" >
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Transaksi</th>
                    <th>Tanggal</th>
                    <th>Jumlah Terjual</th>
                    <th>Penginput</th>
                    <th colspan="2" ></th>
                </tr>
            </thead>
            <tbody>
            <?= tampil_trans()?>
            </tbody>
        </table>
    </div>