<?php
    require('../config.php');

    if(isset($_GET['code'])){
        $code = $_GET['code'];
        $sql = "SELECT * FROM users where verif_code = '$code'";
        $query = mysqli_query($con,$sql);
        if(mysqli_num_rows($query) > 0){
            $user = mysqli_fetch_assoc($query);
            $id = $user['id'];
            $sql =  "UPDATE users set is_verified=1 where id=$id";
            $query = mysqli_query($con,$sql);
            if($query){
                echo "<script> 
                alert('VERIFIKASI BERHASIL!!');
                document.location.href = '../login.php';
            </script>
        ";
            }else{
                echo "VERIFIKASI GAGAL ERROR : ".$query;
            }
        }else {
            echo "CODE TIDAK DITEMUKAN ATAU TIDAK VALID";
        }
    }else {
        echo "code ga nih";
    }

?>