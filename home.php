
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> | Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
    nav{
        padding-left: 100px!important;
        padding-right: 100px!important;
        background: #6665ee;
        font-family: 'Poppins', sans-serif;
    } 
    nav a.navbar-brand{
        color: #fff;
        font-size: 30px!important;
        font-weight: 500;
    }
    button a{
        color: #6665ee;
        font-weight: 500;
    }
    button a:hover{
        text-decoration: none;
    }
    h1{
        position: absolute;
        top: 50%;
        left: 50%;
        width: 100%;
        text-align: center;
        transform: translate(-50%, -50%);
        font-size: 50px;
        font-weight: 600;
    }
    </style>
</head>
<body>
    <nav class="navbar">
    <a class="navbar-brand" href="#">Web Gwueh</a>
    <button type="button" class="btn btn-light"><a href="logout.php">Logout</a></button>
    </nav>
    <?php
    session_start();
    if(isset($_SESSION['isLogin'])){
        echo "halo lagi, ".$_SESSION['user']['nama'];
    }else {
        echo 'LOGIN DULU GAN <a href="login.php">login</a>';        
    }
?>
    
</body>
</html>