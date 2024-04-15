<?php
include_once("koneksi.php");
if(isset($_POST["login"])){
    $user = $_POST["user"];
    $pass = $_POST["pass"]; 
    $qury = $con->prepare("SELECT * FROM usser WHERE user=?"); 
    $qury->bind_param("s", $user); 
    $qury->execute();
    $result = $qury->get_result();
    if($result->num_rows === 1) { 
        $row = $result->fetch_assoc();
        if(password_verify($pass, $row['pass'])) {
            session_start();
            $_SESSION["berhasil_login"] = $row['nama'];
            $_SESSION["id"] = $row['id'];
            $_SESSION["lv"] = $row['lv'];
            header('Location: dasbord.php');
            exit();
        } else {
            $pesan = "Gagal melakukan login. Periksa username atau password Anda! ".$con->error;
        }
    } else {
        $pesan = "Gagal melakukan login. Periksa username atau password Anda!".$con->error;
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-image: url("https://blog.andreanisme.com/wp-content/uploads/2013/09/workspace-blog.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            width: 300px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.1);
        }
        h3 {
            text-align: center;
            margin-bottom: 20px;
        }
        .alert {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-control {
            margin-bottom: 20px;
        }
        .btn {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Login</h3>
        <?php if (isset($pesan)) : ?>
            <div class="alert bg-warning" style="text-transform: capitalize;"><?php echo $pesan; ?></div>
        <?php endif; ?>
        <form action="" method="post">
            <div class="mb-3">
                <input type="text" class="form-control" name="user" id="user" placeholder="Username">
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="pass" id="pass" placeholder="Password">
            </div>
            <button class="btn btn-primary" name="login">Submit</button>
        </form>
    </div>
</body>
</html>
