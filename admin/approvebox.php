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
            <a class="navbar-brand" href="index.html">Purchasing Mirorim</a>
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
                        <h1 class="mt-4">Approved </h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Box List</a></li>
                            <li class="breadcrumb-item active">Approved</li>
                        </ol>
                        <div class="card mb-4">
                        <div class="card-header">
                            <div class="text-right">
                                    <button type="button"  data-bs-toggle="modal" data-bs-target="#smallModalAdd" class="btn btn-primary">Compare Kubikasi</button>
                            </div>
                            <div class="modal fade" id="smallModalAdd" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Compare Kubikasi</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <table class="table" id="dataModal" width="100%" cellspacing="0">
                                        
                                            <thead class="table-bordered">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Resi</th>
                                                    <th>Invoice</th>
                                                    <th>Kubikasi</th>
                                                    <th>Kubik Count</th>
                                                    <th>Selisih</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-borderless">
                                            <?php
                                                $ambilperhitungan = mysqli_query($konek, "SELECT * FROM box WHERE status='Tidak Diterima' AND tempstat='2'");
                                                $jum = 1;
                                                while($tampil=mysqli_fetch_array($ambilperhitungan)){
                                                    $resi = $tampil['resi'];
                                                    $invoice = $tampil['invoice'];
                                                    $kubikasi = $tampil['kubikasi'];
                                                    $qtybox = $tampil['qtybox'];
                                                    $box = $tampil['box'];
                                                    $kubikcount = $tampil['ctkubik'];
                                            ?>
                                                <tr>
                                                    <td><?=$jum++;?></td>
                                                    <td><?=$resi;?></td>
                                                    <td><?=$invoice;?></td>
                                                    <td><?=$kubikasi;?> m³</td>
                                            <?php
                                                }
                                            ?>
                                                    
                                            <?php

                                                    $ambil = mysqli_query($konek, "SELECT SUM(kubikasi) AS kubik, SUM(ctkubik) AS ctkubik FROM box WHERE status='Tidak Diterima' AND tempstat='2'");
                                                    $data = mysqli_fetch_array($ambil);
                                                    $number = ($data['kubik']);
                                                    $count = ($data['ctkubik']);
                                                    

                                                    $selisih =($count-$number);
                                                    $persen = 100;
                                                   
                                            ?>
                                                 <td style='font-weight: bold;'><?=$count;?>m³</td>
                                                 <td><?=$selisih;?>m³</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <form method="post">
                                                <?php
                                                    $ambilresi = mysqli_query($konek, "SELECT COUNT(resi) AS resi FROM box WHERE status='Tidak Diterima' AND tempstat='2'");
                                                    while($data = mysqli_fetch_array($ambilresi)){
                                                    $resi = $data['resi'];
                                                ?>
                                                    <input type="hidden" name="resiberak" value="<?=$resi;?>">
                                                <?php
                                                    }
                                                ?>
                                                <?php
                                                    $ambildataidb = mysqli_query($konek, "SELECT * FROM box WHERE status='Tidak Diterima' AND tempstat='2'");
                                                    while($data=mysqli_fetch_array($ambildataidb)){
                                                        $idb = $data['iddus'];
                                                    
                                                ?>
                                                
                                                <input type="hidden" name="iddus[]" value="<?=$idb;?>">
                                                    <input type="hidden" name="tempstatus[]" value="1">
                                                    <input type="hidden" name="stat[]" value="Diterima">
                                                <?php
                                                    }
                                                ?>
                                                    
                                            <div class="text-right m-2">
                                                <button type="submit" name="submitinserttai" class="btn btn-primary">Approve</button>
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
                                                <th>Resi</th>
                                                <th>Invoice</th>
                                                <th>Nobox</th>
                                                <th>Qty Box</th>
                                                <th>Box Count</th>
                                                <th>Kubikasi</th>
                                                <th>Status</th>
                                                <th>Note</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $ambilbox = mysqli_query($konek, "SELECT * FROM box");
                                                $i = 1;
                                                while($data=mysqli_fetch_array($ambilbox)) {
                                                    $idbox = $data['iddus'];
                                                    $invoice = $data['invoice'];
                                                    $resi = $data['resi'];
                                                    $box = $data['box'];
                                                    $qtybox = $data['qtybox'];
                                                    $boxcount = $data['boxcount'];
                                                    $kubikasi = $data['kubikasi'];
                                                    $status = $data['status'];
                                                    $notecok = $data['note'];
                                                                                    
                                            ?>
                                            <tr>
                                            <td><?=$i++;?></td>
                                            <td><?=$resi;?></td>
                                            <td><?=$invoice;?></td>
                                            <td><?=$box;?></td>
                                            <td>1 - <?=$qtybox;?></td>
                                            <td><?=$boxcount;?></td>
                                            <td><?=$kubikasi;?> m³</td>
                                            <td><?=$status;?></td>
                                            <td><?=$notecok;?></td>

                                                
                                                    
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
