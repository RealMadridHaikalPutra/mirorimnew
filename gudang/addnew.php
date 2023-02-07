<?php
session_start();
require '../assets/php/function.php';
require '../cek.php';
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
            <a class="navbar-brand" href="index.html">Warehouse Mirorim</a>
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
                        <a class="dropdown-item" href="login.html">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                        <div class="sb-sidenav-menu-heading">Admin Warehouse</div>
                            <a class="nav-link collapse" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-warehouse"></i></div>
                                    All Product
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapsed" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="index.php">Warehouse</a>
                                    <a class="nav-link" href="gudang5.php">Warehouse 5</a>
                                    <a class="nav-link" href="stoknonsku.php">Stok Non SKU</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-sign-in-alt"></i></div>
                                Out & Update
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="updatebarang.php">Update Item</a>
                                    <a class="nav-link" href="exititem.php">Exit Item</a>
                                    <a class="nav-link" href="updatebarang5.php">Update Item G5</a>
                                    <a class="nav-link" href="exititem5.php">Exit Item G5</a>
                                </nav>
                            </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
            <section class="section">
                <div class="row">
        
                    <div class="card">
                        <div class="card-body">
                        <h5 class="card-title">Input Box</h5>
            
                        <!-- Floating Labels Form -->
                        <form class="row g-3" method="post" enctype="multipart/form-data">
                            <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="nobox" id="floatingName" placeholder="NoBox">
                                <label for="floatingName">Nobox</label>
                            </div>
                            </div>
                            <div class="text-right">
                            <button type="submit" name="inputnobox" class="btn btn-primary">Submit</button>
                            </div>
                        </form><!-- End floating Labels Form -->
                        </div>
                    </div>
                    </div>
                </section>
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Items Box</h1>
                            <?php
                                if(isset($_POST['inputnobox'])){
                                    $invoice = $_POST['nobox'];
                                                
                                    $ambildata = mysqli_query($konek, "SELECT * FROM itembox WHERE box='$invoice'");
                            ?>
                            <div class="card-header">
                                <i class="fas fa-box"></i>
                                Box Items : <?=$invoice;?>
                            </div>
                            <?php
                                }
                            ?>
                            <div class="card mb-4">
                        <div class="card-header">
                            <div class="text-right">
                                    <button type="button"  data-bs-toggle="modal" data-bs-target="#smallModalQty" class="btn btn-primary">Insert All</button>
                            </div>
                            <div class="modal fade" id="smallModalQty" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Insert All</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="post" action="">
                                        <?php
                                            $select = mysqli_query($konek, "SELECT COUNT(nama) FROM itembox WHERE status='No Approve'");
                                            while($ambil=mysqli_fetch_array($select)){
                                                $jumlah = $ambil['COUNT(nama)'];

                                        ?>
                                        <input type="hidden" name="count" value="<?=$jumlah;?>">
                                        <?php
                                            }
                                        ?>
                                            <div class="text-right m-2">
                                                <button type="submit" name="submitquantity" class="btn btn-primary">Submit</button>
                                            </div>
                                        <table class="table table-bordered" id="dataModal" width="100%" cellspacing="0">
                                        
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Invoice</th>
                                                    <th>Nobox</th>
                                                    <th>Nama</th>
                                                    <th>SKU</th>
                                                    <th>Counting</th>
                                                    <th>Note</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                if(isset($_POST['inputnobox'])){
                                                $invoice = $_POST['nobox'];

                                                $ambilperhitungan = mysqli_query($konek, "SELECT * FROM itembox WHERE box='$invoice' AND status='No Approve'");
                                                $jum = 1;
                                                while($tampil=mysqli_fetch_array($ambilperhitungan)){
                                                  $nama = ($tampil)['nama'];
                                                  $box = ($tampil)['box'];
                                                  $sku = ($tampil)['sku'];
                                                  $invoice = ($tampil)['invoice'];
                                                  $note = ($tampil)['note'];
                                                  $idb = ($tampil)['idbarang'];
                                            ?>
                                                <tr>
                                                    <td><?=$jum++;?></td>
                                                    <td><?=$invoice;?></td>
                                                    <td><?=$box;?></td>
                                                    <td><?=$nama;?></td>
                                                    <td><?=$sku;?></td>
                                                    <td><input type="number" class="form-control" name="countinggudang[]" required="">
                                                    <input type="hidden" name="idbarang[]" value="<?=$idb;?>"></td>

                                                </tr>
                                            <?php
                                                }}
                                            ?>
                                            </tbody>
                                        </table>
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                <form method="post">
                                    <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Image</th>
                                                <th>Status</th>
                                                <th>invoice</th>
                                                <th>Nobox</th>
                                                <th>Item Name</th>
                                                <th>SKU</th>
                                                <th>Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody >
                                            <?php
                                            if(isset($_POST['inputnobox'])){
                                                $invoice = $_POST['nobox'];
                                                
                                                $ambildata = mysqli_query($konek, "SELECT * FROM itembox WHERE box='$invoice'");
                                                $i = 1;
                                                while($data=mysqli_fetch_array($ambildata)){
                                                    $idbox = $data['idbarang'];
                                                    $invoice = $data['invoice'];
                                                    $box = $data['box'];
                                                    $nama = $data['nama'];
                                                    $sku = $data['sku'];
                                                    $status = $data['status'];
                                                    $count = $data['qtygudang'];

                                                     //cek data gambar ada apa kagak
                                                     $gambar = $data['image'];
                                                     if($gambar==null){
                                                         // jika tidak ada gambar
                                                         $img = '<img src="../assets/img/noimageavailable.png" class="zoomable">';
                                                     } else {
                                                         //jika ada gambar
                                                         $img ='<img src="../images/'.$gambar.'" class="zoomable">';
                                                     }
                                                
                                            ?>
                                            <tr>
                                                <td><?=$i++;?></td>
                                                <td><?=$img;?></td>
                                                <td><?=$status;?></td>
                                                <th><?=$invoice;?></th>
                                                <th><?=$box;?></th>
                                                <td><?=$nama;?></td>
                                                <td><?=$sku;?></td>
                                                <td><?=$count;?></td>
                                            </form>
                                            </tr>
                                            <?php
                                                }}
                                            ?>
                                        </tbody>
                                        
                                    </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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
