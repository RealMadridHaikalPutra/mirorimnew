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
            <a class="navbar-brand" href="index.php">Purchasing Mirorim</a>
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
                                Packing List
                            </a>
                            <a class="nav-link collapse" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-pen-alt"></i></div>
                                    Approve
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapsed" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="approved.php">Approve Item</a>
                                    <a class="nav-link" href="approvebox.php">Approve Box</a>
                                </nav>
                            </div>
                            
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Approved</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Box List</a></li>
                            <li class="breadcrumb-item active">Approved</li>
                        </ol>
                        <div class="card mb-4">
                        <div class="card-header">
                            <div class="text-right">
                                    <button type="button"  data-bs-toggle="modal" data-bs-target="#smallModalAdd" class="btn btn-primary">Compare Quantity</button>
                            </div>
                            <div class="modal fade" id="smallModalAdd" tabindex="-1">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Compare?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <table class="table table-bordered" id="dataModal" width="100%" cellspacing="0">
                                        
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Name</th>
                                                    <th>SKU</th>
                                                    <th>Quantity</th>
                                                    <th>Counting</th>
                                                    <th>Ceklist</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $ambilperhitungan = mysqli_query($konek, "SELECT * FROM itembox WHERE qtygudang<>0 AND status='No Approve'");
                                                $jum = 1;
                                                while($tampil=mysqli_fetch_array($ambilperhitungan)){
                                                  $qty = ($tampil)['quantity'];
                                                  $perhitungan = ($tampil)['qtygudang'];
                                                  $nama = ($tampil)['nama'];
                                                  $sku = ($tampil)['sku'];
                                            ?>
                                                <tr>
                                                    <td><?=$jum++;?></td>
                                                    <td><?=$nama;?></td>
                                                    <td><?=$sku;?></td>
                                                    <td><?=$qty;?></td>
                                                    <td><?=$perhitungan;?>
                                            
                                                </td>
                                                    <?php
                                                    
                                                        if($qty==$perhitungan){
                                                            echo "<td><i class='far fa-check-circle text-right' style='color: green;'></i></td>";
                                                        } else {
                                                            echo "<td><i class='fas fa-minus-circle text-right' style='color: red;'></i></td>";
                                                        }
                                                    ?>
                                                </tr>
                                            <?php
                                                }
                                            ?>
                                            </tbody>
                                        </table>
                                        <form method="post" action="">
                                        <?php
                                                $ambil = mysqli_query($konek, "SELECT * FROM itembox WHERE status='No Approve'");
                                                $jum = 1;
                                                while($tampil=mysqli_fetch_array($ambil)){
                                                  $qty = ($tampil)['quantity'];
                                                  $perhitungan = ($tampil)['qtygudang'];
                                                  $nama = ($tampil)['nama'];
                                                  $sku = ($tampil)['sku'];
                                                  $img = ($tampil)['image'];
                                            ?>
                                                    <input type="hidden" name="file[]" value="<?=$img;?>">
                                                    <input type="hidden" name="namaitem[]" value="<?=$nama;?>">
                                                    <input type="hidden" name="skuitem[]" value="<?=$sku;?>">
                                                    <input type="hidden" name="quantityitem[]" value="<?=$perhitungan;?>">
                                                    <input type="hidden" name="status[]" value="Approve">
                                            <?php
                                                }
                                        
                                            ?>
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
                                                <button type="submit" name="submitinsert" class="btn btn-primary">Approve</button>
                                            </div>
                                        </form>
                                    </div>
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
                                                <th>Invoice</th>
                                                <th>Item Name</th>
                                                <th>SKU</th>
                                                <th>Quantity</th>
                                                <th>Counting</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $ambilbox = mysqli_query($konek, "SELECT * FROM itembox");
                                                $i = 1;
                                                while($data=mysqli_fetch_array($ambilbox)) {
                                                    $idbox = $data['idbarang'];
                                                    $invoice = $data['invoice'];
                                                    $nama = $data['nama'];
                                                    $sku = $data['sku'];
                                                    $quantity = $data['quantity'];
                                                    $status = $data['status'];
                                                    $count = $data['qtygudang'];
                                                    $k = $i++;

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
                                            <?php
                                                if($count=='0'){
                                                    echo "
                                                        <td style='color: red;'>$k</td>
                                                        <td>$img</td>
                                                        <td style='color: red;'>$invoice</td>
                                                        <td style='color: red;'>$nama</td>
                                                        <td class='text-uppercase' style='color: red;'>$sku</td>
                                                        <td style='color: red;'>$quantity</td>
                                                        <td style='color: red;'>$count</td>
                                                    ";
                                                } else {
                                                    echo "
                                                    <td>$k</td>
                                                    <td>$img</td>
                                                    <td>$invoice</td>
                                                    <td>$nama</td>
                                                    <td class='text-uppercase'>$sku</td>
                                                    <td>$quantity</td>
                                                    <td>$count</td>
                                                ";
                                                }

                                                if($status=='Approve'){
                                                    echo "<td style='color: green;'>$status</td>";
                                                } else {
                                                    echo "<td style='color: red;'>$status</td>";
                                                }
                                            ?>
                                                
                                                    
                                                                <input type="hidden" name="approve" value="Approve">
                                                                <input type="hidden" name="idb" value="<?=$idbox;?>">
                                                                <input type="hidden" name="nama" value="<?=$nama;?>">
                                                                <input type="hidden" name="sku" value="<?=$sku;?>">
                                                                <input type="hidden" name="qtygudang" value="<?=$qtygudang;?>">
                                                    
                                            </tr>

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
