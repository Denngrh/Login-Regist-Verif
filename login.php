<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content=""/>
        <title>Login - Data</title>
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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form action="proses/loginProses.php" method="post">
                                        <?php if (isset($_GET['info'])) { ?>
                                            <div class="alert alert-success text-center" role="alert">
                                                <?= $_GET['info'] ?>
                                            </div>
                                            <?php } ?>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="email" type="email" name="email"placeholder="name@example.com"/>
                                                <label for="username">Email</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="password" type="password" name="password"placeholder="Password" 
                                                value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>"/>
                                                <label for="password">Password</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input"  name="ingataku" id="ingataku" type="checkbox" value="" />
                                                <label class="form-check-label" for="ingataku">Remember Me</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="forgot.php">Forgot Password?</a>
                                                <input type="submit" value="Login" name="login"  class="btn btn-primary">
                                            </div>      
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.php">Need an account? Sign up!</a></div>
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
    </body>
</html>
