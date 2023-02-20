<?php 
include 'config.php';
 if(isset($_POST['reset'])) {
    $code = $_GET['code'];

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
    $new_pass = test_input($_POST['password']);
    $new_password = password_hash($new_pass, PASSWORD_DEFAULT);

    $changeQuery = $con->query("UPDATE users SET password = '$new_password' WHERE reset_code = '$code'");

    if($changeQuery) {
        $delquery = $con->query("UPDATE users SET reset_code = '0' WHERE reset_code = '$code'");
        header("Location: login.php?info=Ganti Password Berhasil, Silahkan Login Dengan Password Baru Anda");
    }
}
$con->close();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content=""/>
        <title>Forgot - Data</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Ganti Password</h3>
                                    <p class="mb-4">Silahkan Ganti Password Dengan Password Yang Mudah Di Ingat</p>
                                </div>
                                    <div class="card-body">
                                    <form class="user" action="" method="POST">
                                    <?php if (isset($_GET['info'])) { ?>
                                            <div class="alert alert-success text-center" role="alert">
                                                <?= $_GET['info'] ?>
                                            </div>
                                            <?php } ?>
                                            <span id="wrong_pass_alert"></span>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" type="password" name="password" placeholder="name@example.com"/>
                                                <label for="username">Password</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control"  id="inputPasswordConfirm" type="password" name="password" placeholder="name@example.com" onkeyup="validate_password()"/>
                                                <label for="username">Confirm Password</label>
                                            </div>
											<div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="login.php">Back To Login?</a>
                                                <input type="submit" value="Reset" name="reset"  class="btn btn-primary" id="create" onclick="wrong_pass_alert()">
                                            </div>      
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script>
        function validate_password() {
 
            var pass = document.getElementById('inputPassword').value;
            var confirm_pass = document.getElementById('inputPasswordConfirm').value;
            if (pass != confirm_pass) {
                document.getElementById('wrong_pass_alert').style.color = 'red';
                document.getElementById('wrong_pass_alert').innerHTML
                  = '☒ Samakan Password Anda!!';
                document.getElementById('create').disabled = true;
                document.getElementById('create').style.opacity = (0.4);
            } else {
                document.getElementById('wrong_pass_alert').style.color = 'blue';
                document.getElementById('wrong_pass_alert').innerHTML =
                    '🗹 Password Sama';
                document.getElementById('create').disabled = false;
                document.getElementById('create').style.opacity = (1);
            }
        }
    </script>
    </body>
</html>
