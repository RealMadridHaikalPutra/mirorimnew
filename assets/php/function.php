<?php

$konek = mysqli_connect("localhost","root","","mirorim");

//Add New Box
if(isset($_POST['addbox'])){
    $box = $_POST['box'];
    $resi = $_POST['resi'];

    $addtobox = mysqli_query($konek, "insert into box(nodus, resi) Values('$box','$resi')");
    if($addtobox){
        header('location:index.php');
    } else {
        echo '
            <script>
                alert("Gagal Memuat Box");
                window.location.href="index.php";
            </script>'; 
    }
}

//add new item to box
if(isset($_POST['additembox'])){
    $box = $_POST['box'];
    $nama = $_POST['nama'];
    $sku = $_POST['sku'];
    $quantity = $_POST['quantity'];

    $additemtobox = mysqli_query($konek, "INSERT INTO itembox(nodus, nama, sku, quantity) VALUES('$box','$nama','$sku','$quantity')");
    if($additemtobox){
        header('location:index.php');
    } else {
        echo '
            <script>
                alert("Gagal Memuat Item Box");
                window.location.href="index.php";
            </script>';
    }
        
}

//Approve Button
if(isset($_POST['aprbutton'])){
    $status = $_POST['approve'];
    $idbox = $_POST['idb'];
    $nama = $_POST['nama'];
    $sku = $_POST['sku'];
    $quantity = $_POST['quantity'];

    $updateapprove = mysqli_query($konek, "UPDATE itembox SET status='$status' WHERE idbarang='$idbox'");
    if($updateapprove){
        $insertstok = mysqli_query($konek, "INSERT INTO stok(nama, sku, quantity) VALUES('$nama','$sku','$quantity')");
        header('location:approved.php');
    } else {
        echo '
            <script>
                alert("Gagal Approved Item");
                window.location.href="approved.php";
            </script>';
    }
}

//approve yes or no box
if(isset($_POST['inputbox'])){
    $box = $_POST['box'];
    $yes = $_POST['yes'];

    $updatestatus = mysqli_query($konek, "UPDATE box SET status='$yes' WHERE nodus='$box'");
    if($updatestatus){
        
    } else {
        echo '
            <script>
                alert("Gagal Approved Item");
                window.location.href="approved.php";
            </script>';
    }
}

//input qty gudang
if(isset($_POST['inputqty'])){
    $idbox = $_POST['idbox'];
    $quantity = $_POST['quantity'];

    $updateqty = mysqli_query($konek, "UPDATE itembox SET qtygudang='$quantity' WHERE idbarang='$idbox'");
    if($updateqty){
        header('location:index.php');
    } else {
        echo '
            <script>
                alert("Gagal Memasukan Quantity");
                window.location.href="approved.php";
            </script>';
    }
    
}

?>