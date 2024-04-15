<form action="" method="post">
</form>
<?php
if(isset($_POST['popup'])){
  ?>
  <div class="bg-light-subtle shadow-lg border rounded p-5 w-25 h-75 position-absolute top-50 start-50 translate-middle">
    <h6 class="text-secondary">Tambah Data Barang</h6>
<form action="" method="post">
    <div class="mb-3">
    <label class="form-label" for="name">Nama</label>
    <input class="form-control" type="text" name="nama" id="name">
    </div>
    <div class="mb-3">
    <label class="form-label" for="harga">Harga</label>
    <input type="text" class="form-control" name="harga" id="harga">
    </div>
    <div class="mb-3">
    <label class="form-label" for="stok">Stok</label><br>
    <input type="text" class="form-control" name="stok" id="stok">
    </div>
    <div class="mb-3">
    <label class="form-label" for="tanggal">tanggal</label><br>
    <input type="date" class="form-control" name="tanggal" id="tanggal">
    </div>
    <div class="mb-3">
    <button class="btn btn-primary ms-4" name="tambah">Submit</button>
  <button class="btn btn-warning ms-4" name="barang">Close</button>
    </div>
</form>
  </div>
  <?php
}elseif(isset($_POST['editb'])){
    $sql = $con->query("SELECT * from barang where id='$id'");
    $row=$sql->fetch_array();
    ?>
    <div class="bg-light-subtle shadow-lg border rounded p-4 w-25 h-75 position-absolute top-50 start-50 translate-middle">
    <h6 class="text-black text-capitalize" >Form edit transaksi</h6>
    <p class="text-secondary text-capitalize">Klik simpan suntuk menyimpan data!!!</p>
    <form action="" method="post">
    <div class="mb-3">
    <label class="form-label" for="name">Nama</label>
    <input class="form-control" type="text" name="nama" id="name" value="<?= $row['nama']?>">
    </div>
    <div class="mb-3">
    <label class="form-label" for="harga">Harga</label>
    <input type="text" class="form-control" name="harga" id="harga" placeholder="Rp." value="<?= $row['harga']?>">
    </div>
    <div class="mb-3">
    <label class="form-label" for="stok">Stok</label><br>
    <input type="text" name="stok" class="form-control" id="stok" value="<?= $row['stok']?>">
    </div>
    <div class="mb-3">
    <label for="tanggal" class="form-label">Tanggal</label><br>
    <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?= $row['tanggal']?>">
    </div>
    <div class="mb-3">
    <button class="btn btn-primary ms-5" name="edit">Simpan</button>
    <button class="btn btn-warning ms-4" name="barang">Close</button>
    </div>
</form>
</div>
    <?php
}elseif(isset($_POST['pdelete'])){
    $sql = $con->query("SELECT * from barang where id='$id'");
    $row=$sql->fetch_array();
?>
<div class="bg-light-subtle shadow-lg border rounded p-5 w-25 h-50 position-absolute top-50 start-50 translate-middle text-center ">
        <form action="" method="post">
            <h5 class="text-capitalize">yakin ingin menghapus barang ini ? </h5>
            <input type="hidden" name="nama" value="<?=$nama?>">
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
        <table class="table w-75 me-5"  >
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Tanggal</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Penginput</th>
                    <th colspan="2" ></th>
                </tr>
            </thead>
            <tbody>
            <?= tampil_barang()?>
            </tbody>
        </table>
    </div>