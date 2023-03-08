<?php

require '../assets/php/function.php';

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Mirorim</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <style>
            .zoomable {
        width: 100px;
        }

        .zoomable:hover {
        transform: scale(2.8);
        transition: 0.3s ease;
        }
    </style>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Preparation Mirorim</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Admin</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-warehouse"></i></div>
                                Stok Preparation
                            </a>
                            <a class="nav-link" href="index.php?url=komponen">
                                <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                                Component List
                            </a>

                            
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
            <?php
                $file = @$_GET['url'];
                if (empty($file)) {
                    echo "
                                        <div class='container-fluid'>
                                            <h1 class='mt-4'>List Component</h1>
                                            <ol class='breadcrumb mb-4'>
                                                <li class='breadcrumb-item'><a href='approved.php'>Index</a></li>
                                                <li class='breadcrumb-item active'>List Component</li>
                                            </ol>
                                            <div class='card mb-4'>
                                                <div class='card-body'>
                                                    <div class='table-responsive'>
                                                        <table class='table table-hover table-bordered' id='dataTable' width='100%' cellspacing='0'>
                                                            <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Image</th>
                                                                    <th>Name Item</th>
                                                                    <th>SKU</th>
                                                                    <th>Quantity</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            ";
                                                            $ambildata = mysqli_query($konek, "SELECT * FROM preparation");
                                                            $i = 1;
                                                            while($data=mysqli_fetch_array($ambildata)){
                                                                $nama = $data['nama'];
                                                                $sku = $data['sku'];
                                                                $quantity = $data['quantity'];
                                                                $idt = $data['id_item'];
                                                                $k = $i++;
            
                                                                $gambar = $data['image'];
                                                                if($gambar==null){
                                                                    // jika tidak ada gambar
                                                                    $img = "<img src='../assets/img/noimageavailable.png' class='zoomable'>";
                                                                } else {
                                                                    //jika ada gambar
                                                                    $img ="<img src='../images/".$gambar."' class='zoomable'>";
                                                                }
                                                            

                                                            if($quantity<10){
                                                                echo "<tr style='color: red; font-weight: bold;'>
                                                                <td>$k</td>
                                                                <td>$img</td>
                                                                <td>$nama</td>
                                                                <td>$sku</td>
                                                                <td>$quantity</td>
                                                            </tr>";
        
                                                            } else {
                                                                echo "<tr style='font-weight: bold;'>
                                                                <td>$k</td>
                                                                <td>$img</td>
                                                                <td>$nama</td>
                                                                <td>$sku</td>
                                                                <td>$quantity</td>
                                                            </tr>";
                                                            }
                                                        }
                                                                
                                                            echo "
                                                            </tbody>
                                                        </table>
                                                            
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                             ";
                    
                    

                } else {
                    include $file . '.php';
                }

                ?>
                
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <script src="../assets/demo/datatables-demo.js"></script>
    </body>
</html>
