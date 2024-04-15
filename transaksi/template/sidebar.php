<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi | <?= $title?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
        <div class="sidebar bg-secondary position-fixed float-start vh-100 ">
            <h3 class="p-3">Dashboard</h3>
            <ul class="list-unstyled p-3 border-end-5">
                <li class="mb-5"><a class="btn btn-secondary p-3 text-decoration-none text-black" href="dasbord.php">Dashboard</a></li>
                <li class="mb-5"><a class="btn btn-secondary p-3 text-decoration-none text-black" href="barang.php">Barang</a></li>
                <li class="mb-5"><a class="btn btn-secondary p-3 text-decoration-none text-black" href="transaksi.php">Transaksi</a></li>
                <li class="mb-5"><a class="btn btn-secondary p-3 text-decoration-none text-black" href="profile.php">Profile</a></li>
                <li class="mb-5">
                    <form action="" method="post">
                        <button class="btn btn-secondary text-black mt-3" name="logout">Log out</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>