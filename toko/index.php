
<?php
session_start();
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
            <a class="navbar-brand" href="index.php">Toko Mirorim</a>
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
            <ul class="navbar-nav ml-md-0">
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
                        <div class="sb-sidenav-menu-heading">Admin Warehouse</div>
                            <a class="nav-link active" href="#">
                                <div class="sb-nav-link-icon"><i class="fas fa-warehouse"></i></div>
                                    Toko
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">History Refiil</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="stoknonsku.php">Stok Non SKU</a></li>
                            <li class="breadcrumb-item active">All Stock</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <a type="button" data-bs-toggle="modal" data-bs-target="#smallModalrefill" class="btn btn-outline-primary">Check List</a>
                            </div>
                            <div class="modal fade" id="smallModalrefill" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Approve Refill</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="post" action="">
                                        <table class="table table-bordered" id="dataModal" width="100%" cellspacing="0">
                                        
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Name Item</th>
                                                    <th>SKU</th>
                                                    <th>Picker</th>
                                                    <th>Quantity</th>
                                                    <th>Input Checker</th>
                                                    <th>Checklist</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $ambilperhitungan = mysqli_query($konek, "SELECT * FROM exititem WHERE tempstat='0' AND status='Refill'");
                                                $jum = 1;
                                                while($tampil=mysqli_fetch_array($ambilperhitungan)){
                                                    $idb = ($tampil)['idbarang'];
                                                    $nama = ($tampil)['nama'];
                                                    $sku = ($tampil)['sku'];
                                                    $picker = ($tampil)['picker'];
                                                    $quantity = ($tampil)['quantityrep'];
                                            ?>
                                                <tr>
                                                    <td><?=$jum++;?></td>
                                                    <td><?=$nama;?></td>
                                                    <td class="text-uppercase"><?=$sku;?></td>
                                                    <td class="text-uppercase"><?=$picker;?></td>
                                                    <td><?=$quantity;?></td>
                                                    <td><select type="text" class="form-control" id="floatingName" name="checker[]" placeholder="Box Number" required="">
                                                                <option value="Irma">Irma</option>
                                                                <option value="Robby">Robby</option>
                                                                <option value="Intan">Intan</option>
                                                                <option value="Rido">Rido</option>
                                                                <option value="Dani">Dani</option>
                                                            </select></td>
                                                    <td><input type="checkbox" class="form-check-label" value="<?=$sku;?>" name="cekrefill[]">
                                                    <input type="hidden" name="status[]" value="1">
                                                    <input type="hidden" name="approve[]" value="Approved">
                                                    <input type="hidden" name="qtyrefill[]" value="<?=$quantity;?>">
                                                    </td>

                                                </tr>
                                            <?php
                                                }
                                            ?>
                                            </tbody>
                                        </table>
                                            <div class="text-right m-2">
                                                <button type="submit" name="checkrefill" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Image</th>
                                                <th>Name Item</th>
                                                <th>SKU Store</th>
                                                <th>Picker</th>
                                                <th>Quantity</th>
                                                <th>Checker</th>
                                                <th>Time</th>
                                                <th>Status</th>
                                                <th>Approval</th>
                                            </tr>
                                        </thead>
                                        <?php
                                            $ambildata = mysqli_query($konek,"SELECT * FROM stok WHERE sku<>0");
                                            while($data=mysqli_fetch_array($ambildata)){
                                                $idb = $data['idbarang'];
                                            }
                                            
                                        ?>
                                        
                                        <tbody>
                                            <?php
                                             $ambildata = mysqli_query($konek,"SELECT * FROM exititem WHERE status='Refill'");
                                             $i = 1;
                                             while($data=mysqli_fetch_array($ambildata)){
                                                $idb = $data['idbarang'];
                                                $nama = $data['nama'];
                                                $skutoko = $data['sku'];
                                                $picker = $data['picker'];
                                                $quantity = $data['quantityrep'];
                                                $status = $data['status'];
                                                $time = $data['timeout'];
                                                $approve = $data['stat'];

                                                //cek data gambar ada apa kagak
                                                $gambar = $data['image'];
                                                if($gambar==null){
                                                    // jika tidak ada gambar
                                                    $img = '<img src="../assets/img/noimageavailable.png" class="zoomable">';
                                                } else {
                                                    //jika ada gambar
                                                    $img ='<img src="../images/'.$gambar.'" class="zoomable">';
                                                }
                                                $ceker = $data['ceker'];
                                            ?>
                                            <tr data-bs-toggle="modal" data-bs-target="#largeModal<?=$idb;?>">
                                                <th><?=$i++;?></th>
                                                <td><?=$img;?></td>
                                                <td><?=$nama;?></td>
                                                <td class="text-uppercase"><?=$skutoko;?></td>
                                                <td class="text-uppercase"><?=$picker;?></td>
                                                <td><?=$quantity;?></td>
                                                <td><?=$ceker;?></td>
                                                <td><?=$time;?></td>
                                                <td><?=$status;?></td>
                                                
                                            <?php
                                                 if($approve=='Approved'){
                                                    echo "<td style='color: green;'>$approve</td>";
                                                } else {
                                                    echo "<td style='color: red;'>$approve</td>";
                                                }
                                            ?>
                                              
                                            </tr>
                                            <div class="modal fade" id="largeModal<?=$idb;?>" tabindex="-1">
                                            <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Item</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            
                                                <!-- Floating Labels Form -->
                                            <form method="post" class="row g-3" enctype="multipart/form-data">   
                                            <div class="modal-body">
                                                    <div class="col-sm-12">
                                                        <label>Input Image</label>
                                                        <div class="form-floating">
                                                        <input type="file" name="file" class="form-control">
                                                        </div>
                                                    </div>
                                                    <br>
                                                        <input type="hidden" value="<?=$idb;?>" name="idb">
                                                    <div class="text-center">
                                                        <button type="submit" name="editimg" class="btn btn-primary">Submit</button>
                                                    </div> 
                                            </div>
                                            </form>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
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