<?php
include "service/database.php";
$login_msg = "";

//menerima data dari form html dengan method _POST
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    // echo $username," ",$password;

    //ini query sql untuk melakukan pengecekan data
    $sql = "SELECT * FROM users WHERE username='$username' 
    AND password='$password'
    ";

    $result = $db->query($sql);

    if ($result -> num_rows > 0) {
        $data = $result -> fetch_assoc();

        //membuat session agar kita tahu user login
        session_start();
        $_SESSION["username"] = $data["username"];
        $_SESSION["isLogin"] = true;
        
        //ngarahin user ke dashboard.php jika user memasukkan data yg benar
        header("location: dashboard.php");

        //ini cuma contoh ouput dasar
        // echo "data username adalah: " ,$data["username"];
    }else{
        $login_msg = "akun tidak ditemukan";
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

    <h3>Login</h3>
<i><?= $login_msg ?></i>
    <form action="login.php" method="POST">
        <input type="text" placeholder="username" name="username" />
        <input type="text" placeholder=password name="password"/>
        <button type="submit" name="login"> Login </button>
    </form>
    <?php include "layout/footer.html" ?>
    
</body>
</html>