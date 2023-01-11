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
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">Admin Mirorim</a>
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
                            <div class="sb-sidenav-menu-heading">Admin</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                                Box List
                            </a>
                            <a class="nav-link" href="approved.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-marker"></i></div>
                                Approved
                            </a>
                            
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Box List</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="approved.php">Approved</a></li>
                            <li class="breadcrumb-item active">Box List</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <a type="button" href="addbox.php" class="btn btn-primary">Add Box</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Box Number</th>
                                                <th>Resi</th>
                                                <th>Status</th>
                                                <th>List Item</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $ambilbox = mysqli_query($konek, "SELECT * FROM box");
                                                $i = 1;
                                                while($data=mysqli_fetch_array($ambilbox)) {
                                                    $idbox = $data['iddus'];
                                                    $box = $data['nodus'];
                                                    $resi = $data['resi'];
                                                    $status = $data['status'];
                                            ?>
                                            <tr>
                                                <td><?=$i++;?></td>
                                                <td class="text-uppercase"><?=$box;?></td>
                                                <td><?=$resi;?></td>
                                                <td><?=$status;?></td>
                                                <td><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal<?=$idbox;?>">Item</button></td>
                                            </tr>
                                            <!--Modal-->
                                            <div class="modal fade" id="largeModal<?=$idbox;?>" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title">List Item : <?=$box;?></h5>
                                                    <button class="btn btn-primary ml-4" data-bs-toggle="modal" data-bs-target="#smallModal<?=$idbox;?>">Add New Item</button>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <!--Card-->
                                                    <div class="row row-cols-1 row-cols-md-2 g-4">
                                                        <?php
                                                            $datadalamdus = mysqli_query($konek, "SELECT * FROM itembox WHERE nodus='$box'");
                                                            $s = 1;
                                                            while($data=mysqli_fetch_array($datadalamdus)){
                                                                $boxdus = $data['nodus'];
                                                                $nama = $data['nama'];
                                                                $sku = $data['sku'];
                                                                $quantity = $data['quantity'];
                                                                $status = $data['status'];
                                                            
                                                        ?>
                                                        <div class="col">
                                                            <div class="card border-dark m-auto" style="max-width: 18rem;">
                                                                <div class="card-header">Items <?=$s++;?></div>
                                                                <div class="card-body">
                                                                    <h5 class="card-title">Nama Barang : <?=$nama;?></h5>
                                                                    <h5 class="card-title text-uppercase">SKU : <?=$sku;?></h5>
                                                                    <h5 class="card-title">Quantity : <?=$quantity;?></h5>
                                                                    <h5 class="card-title">Status : <?=$status;?></h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php

                                                            }

                                                        ?>
                                                    </div>
                                                    <!--End Card--->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="smallModal<?=$idbox;?>" tabindex="-1">
                                                <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title"><?=$box;?></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form method="post" class="row g-3" enctype="multipart/form-data">   
                                                        <div class="modal-body">
                                                        <input type="hidden" class="form-control text-uppercase" id="floatingName" name="box" value="<?=$box;?>" placeholder="SKU Warehouse">
                                                                <div class="col-sm-12">
                                                                    <label>Item Name</label>
                                                                    <div class="form-floating">
                                                                    <input type="text" name="nama" class="form-control" id="floatingName" placeholder="Item Name">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <label>SKU</label>
                                                                    <div class="form-floating">
                                                                    <input type="text" name="sku" class="form-control text-uppercase" id="floatingName" placeholder="SKU Store">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <label>Quantity</label>
                                                                    <div class="form-floating">
                                                                    <input type="nuber" name="quantity" class="form-control" id="floatingName" placeholder="Quantity">
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="text-center">
                                                                    <button type="submit" name="additembox" class="btn btn-primary">Submit</button>
                                                                </div> 
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            };
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