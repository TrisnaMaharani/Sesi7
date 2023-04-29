<?php
    $psn ="";
    if (isset($_POST["txNAMA"])){
        $PASS1 =$_POST["txPASS1"];
        $PASS2 =$_POST["txPASS2"];

        if($PASS1==$PASS2){
            $nama =$_POST["txNAMA"];
            $email =$_POST["txEMAIL"];
            $user =$_POST["txUSER"];
            $iduser = md5($email);

            $sql = "INSERT INTO tbuser(nama, email, username, passkey, iduser) VALUE('$nama', '$email', '$user', '$PASS1', '$iduser');";
            include_once("koneksi.php");
            $hsl = mysqli_query($cnn, $sql);
            if($hsl){
                $psn = "User Name berhasil ditambahkan";
            }else{
                $psn = "User Name gagal ditambahkan";
            }
            
        }else{
            $psn = "Password tidak sama dengan konfirmasi password";
        }
    }
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrasi</title>
</head>
<body>

<?php
    echo "<div>$psn</div>";
?>
    
    <form method= "POST" action="registrasi.php">

        <div>
            Nama Lengkap
            <input type="text" name="txNAMA">
        </div>
        
        <div>
            Email
            <input type="email" name="txEMAIL">
        </div>

        <div>
            Usermane
            <input type="text" name="txUSER">
        </div>

        <div>
            Password
            <input type="password" name="txPASS1">
        </div>

        <div>
            Password<sup>konfirmasi</sup>
            <input type="password" name="txPASS2">
        </div>

        <div>
            <button type="submit"> Registrasi</button>
        </div>
    </from>

</body>
</html>