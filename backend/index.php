<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Science-Certificate Admin</title>
    <link rel="stylesheet" href="/sci-certificate/theme/css/bootstrap-theme.css">
</head>

<body>
    <?php
    
    if (isset($_POST['username'])) {
        print_r($_POST);
        $u = $_POST['username'];
        $p = $_POST['password'];
        if (($u == "jamorn.pe") and ($p == "admincertificate")) {
            $_SESSION['login']= true;
            header("location:/sci-certificate/pages/m_certificate.php");
            exit(0);
        }else{
            header("location:/sci-certificate/backend");
            exit(0);
        }
    }
    ?>
    <div class="container font-kanit">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <div class="card mt-10">
                    <div class="card-body">

                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Username</label>
                                <input type="text" class="form-control" autofocus name="username">

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-4"></div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>