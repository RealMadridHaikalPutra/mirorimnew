
<?php
session_start();
require '../../assets/php/function.php';
require '../../cek.php';
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
        <link href="../../css/styles.css" rel="stylesheet" />
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
            <a class="navbar-brand" href="index.php">Warehouse Mirorim</a>
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
                        <a class="dropdown-item" href="../../logout.php">Logout</a>
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
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">All Stock</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="stoknonsku.php">Stok Non SKU</a></li>
                            <li class="breadcrumb-item active">All Stock</li>
                        </ol>
                        <div class="card mb-4">
                        <div class="card-header">
                                <a type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#smallModalUp">Receiving</a>
                            </div>

                            <div class="modal fade" id="smallModalUp" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Approve Mutasi</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="post" action="">
                                        <table class="table table-bordered" id="dataModal" width="100%" cellspacing="0">
                                        
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Image</th>
                                                    <th>Name Item</th>
                                                    <th>SKU</th>
                                                    <th>Quantity</th>
                                                    <th>Check</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                 

                                                </tr>
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
                                                <th>SKU Warehouse</th>
                                                <th>Warehouse</th>
                                                <th>Quantity</th>
                                            </tr>
                                        </thead>
                                        <?php
                                            $ambildata = mysqli_query($konek,"SELECT * FROM stok2");
                                            while($data=mysqli_fetch_array($ambildata)){
                                                $idb = $data['idbarang'];
                                            }
                                            
                                        ?>
                                        
                                        <tbody>
                                            <?php
                                             $ambildata = mysqli_query($konek,"SELECT * FROM stok2");
                                             $i = 1;
                                             while($data=mysqli_fetch_array($ambildata)){
                                                $idb = $data['idbarang'];
                                                $nama = $data['nama'];
                                                $skutoko = $data['sku'];
                                                $skugudang = $data['skug'];
                                                $gudang = $data['gudang'];
                                                $quantity = $data['quantity'];

                                                //cek data gambar ada apa kagak
                                                $gambar = $data['image'];
                                                if($gambar==null){
                                                    // jika tidak ada gambar
                                                    $img = '<img src="../../assets/img/noimageavailable.png" class="zoomable">';
                                                } else {
                                                    //jika ada gambar
                                                    $img ='<img src="../../images/'.$gambar.'" class="zoomable">';
                                                }

                                            ?>
                                            <tr data-bs-toggle="modal" data-bs-target="#largeModal<?=$idb;?>">
                                                <th><?=$i++?></th>
                                                <td><?=$img;?></td>
                                                <td><?=$nama?></td>
                                                <td class="text-uppercase"><?=$skutoko?></td>
                                                <td class="text-uppercase"><?=$skugudang?></td>
                                                <td><?=$gudang?></td>
                                                <td><?=$quantity?></td>
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
                                                        <label>Item Name</label>
                                                        <div class="form-floating">
                                                        <input type="text" name="nama" class="form-control"  value="<?=$nama;?>">
                                                        <label for="floatingName"></label>
                                                        </div>
                                                    </div>
                                                        <input type="hidden" value="<?=$idb;?>" name="idb">
                                                    <br>
                                                    <div class="col-sm-12">
                                                    <label>SKU Store</label>
                                                    <div class="form-floating">
                                                    <input type="text" class="form-control text-uppercase" id="floatingName" name="skutoko" value="<?=$skutoko;?>" placeholder="SKU Warehouse">
                                                    <div class="col-sm-12">
                                                    <label for="floatingName"></label>
                                                        </div>
                                                    </div>
                                                        <label>SKU Warehouse</label>
                                                        <div class="form-floating">
                                                        <input type="text" class="form-control text-uppercase" id="floatingName" value="<?=$skugudang;?>" name="skugudang" placeholder="SKU Warehouse">
                                                        <label for="floatingName" class="text-uppercase"></label>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="col-sm-12">
                                                        <label>Warehouse</label>
                                                        <div class="form-floating">
                                                        <input type="number" class="form-control text-uppercase" id="floatingName" value="<?=$gudang;?>" name="gudang" placeholder="Warehouse">
                                                        <label for="floatingName"></label>
                                                        </div>
                                                    </div>
                                                        <input type="hidden" class="form-control text-uppercase" value="<?=$quantity;?>" id="floatingName" name="quantity" placeholder="Quantity">
                                                    <br>
                                                    <div class="text-center">
                                                        <button type="submit" name="editnosku2" class="btn btn-primary">Submit</button>
                                                        <button type="reset" class="btn btn-secondary">Reset</button>
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
        <script src="../../js/scripts.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <script src="../../assets/demo/datatables-demo.js"></script>
    </body>
</html>