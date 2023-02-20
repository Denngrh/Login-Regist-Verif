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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Forgot Password</h3></div>
                                    <div class="card-body">
                                    <form class="user" action="proses/forgot_proses.php" method="POST">
                                    <?php if (isset($_GET['info'])) { ?>
                                            <div class="alert alert-success text-center" role="alert">
                                                <?= $_GET['info'] ?>
                                            </div>
                                            <?php } ?>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="mail" type="email" name="mail" placeholder="name@example.com"/>
                                                <label for="username">Email</label>

												<div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="login.php">Back To Login?</a>
                                                <input type="submit" value="Reset Password" name="reset"  class="btn btn-primary">
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
    </body>
</html>
