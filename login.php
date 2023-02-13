<?php

session_start();
$konek = mysqli_connect("localhost","root","","mirorim");

//cek login terdaftar apa tidak

if(isset($_POST['login'])){

    $username = $_POST['username'];

    $password = $_POST['password'];



    //cocokin dengan database

    $cekdatabase= mysqli_query($konek,"SELECT * FROM login WHERE username='$username'and password='$password'");

    //hitung jumlah data

    $hitung = mysqli_num_rows($cekdatabase);



    if($hitung>0){

        $ambildatarole = mysqli_fetch_array($cekdatabase);

        $role = $ambildatarole['role'];



        if($role=='admin'){

            $_SESSION['log'] = 'Logged';

            $_SESSION['role'] = 'admin';

            header('location:admin');

    } elseif($role=='toko'){

            $_SESSION['log'] = 'Logged';

            $_SESSION['role'] = 'toko';

            header('location:toko');

    } elseif($role=='pre') {

        $_SESSION['log'] = 'Logged';

        $_SESSION['role'] = 'pre';

        header('location:pre');

    } elseif($role=='gudang') {

        $_SESSION['log'] = 'Logged';

        $_SESSION['role'] = 'gudang';

        header('location:gudang');

   } elseif($role=='gudang2'){

        $_SESSION['log'] = 'Logged';
        $_SESSION['role'] = 'gudang2';
        header('location:gudang/gudang2');
   }


} else {

        header('location:login.php');

    

    }



};



    if(isset($_SESSION['admin'])){

        header('location:admin');

    } elseif(isset($_SESSION['toko'])){

        header('location:toko');

    } elseif(isset($_SESSION['pre'])){

        header('location:pre');

    } elseif(isset($_SESSION['gudang'])){

        header('location:gudang');

    } elseif(isset($_SESSION['gudang2'])){

        header('location:gudang/gudang2');

    }

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Page Title - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Hello Admin Mirorim</h3></div>
                                    <div class="card-body">
                                        <form method="post" action="">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Username</label>
                                                <input class="form-control py-4" id="inputEmailAddress" type="username" name="username" placeholder="Enter Your Username" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" id="inputPassword" type="password" name="password" placeholder="Enter Password" />
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-center mt-4 mb-0">
                                                <button class="btn btn-primary" type="submit" name="login" >Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="register.html">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
