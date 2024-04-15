<?php
$title = "history";
include_once("template/sett.php");
include_once("template/sidebar.php");
if($_SESSION["lv"] == "user"){
    header('location: 404.html');
}
?>
    <div class="main">
        <table class="table w-75" align="center">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Pesan</th>
                    <th>Penginput</th>
                </tr>
            </thead>
            <tbody>
            <?= history()?>
            </tbody>
        </table>
    </div>