<?php
    require ('../config.php');
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users where email = '$email'";
    $query = mysqli_query($con,$sql);

    if(mysqli_num_rows($query) == 0 ){
        echo "<script> 
                alert('EMAIL TIDAK DITEMUKAN!!');
                document.location.href = '../login.php';
            </script>
        ";
    }else {
        $user = mysqli_fetch_assoc($query);
        if(password_verify($password,$user['password'])){
            if($user['is_verified']==1){
                session_start();
                $_SESSION['isLogin'] = true;
                $_SESSION['user'] = $user;
                header("location: ../home.php");
            }else {
                echo "<script> 
                alert('VERIF EMAIL DLU GANN!!');
                document.location.href = '../login.php';
            </script>
        ";
            }
        }else {
            echo "<script> 
            alert('PASSWORD SALAH!!');
            document.location.href = '../login.php';
        </script>
    ";
        }
    }
?>