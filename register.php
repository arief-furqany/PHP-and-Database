<?php

include "service/database.php";

$register_msg = "";

    if(isset($_POST["register"])){
        $username = $_POST["username"];
        $password = $_POST["password"];

    $sql = "INSERT INTO users (username, password) VALUES 
    ('$username','$password')";

    if ($db->query($sql)) {
        $register_msg = "pendaftaran akun berhasil, silakan login";
    }else{
        $register_msg = "pendaftaran akun gagal, silakan ulangi";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include "layout/header.html" ?>

    <h3>Daftar Akun</h3>

    <i><?= $register_msg ?></i>

    <form action="register.php" method="POST">
        <input type="text" placeholder="username" name="username" />
        <input type="text" placeholder=password name="password"/>
        <button type="submit" name="register"> daftar sekarang </button>
    </form>
    <?php include "layout/footer.html" ?>

</body>
</html>