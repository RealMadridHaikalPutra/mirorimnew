<?php

$konek = mysqli_connect("localhost","root","","mirorim");

//Add New Box
if(isset($_POST['submitbox'])){
    $qtybox = $_POST['qtybox'];

    $invoice = $_POST['addinvoice'];
    $box = $_POST['addbox'];
    $nobox = $_POST['addnobox'];
    $s = 1;

    for ($i=0; $i<$qtybox; $i++){
    $k = $i+$s;
    $gabung = $box+$nobox;
    $insert = mysqli_query($konek, "INSERT INTO box(box, nobox, invoice) VALUES('$box','$k','$invoice')");
    header('location:index.php');
    }  {
        echo'gagal';
    }
}

if(isset($_POST['ceklistbutton'])){
    $nobox = $_POST['nobox'];
    $cek = $_POST['ceklist'];

    $ambil = mysqli_query($konek, "UPDATE box SET status='$cek' WHERE nobox='$nobox'");
    if($ambil){

    } else {
        echo 'Gagal';
    }
}
//add new item to box
if(isset($_POST['additembox'])){
    $invoice = $_POST['invoice'];
    $nama = $_POST['nama'];
    $sku = $_POST['sku'];
    $quantity = $_POST['quantity'];

    //gambar
    $allowed_extension = array('png','jpg','jpeg','svg');
    $namaimage = $_FILES['file']['name']; //ambil gambar
    $dot = explode('.',$namaimage);
    $ekstensi = strtolower(end($dot)); //ambil ekstensi
    $ukuran = $_FILES['file']['size']; //ambil size
    $file_tmp = $_FILES['file']['tmp_name']; //lokasi

    //nama acak
    $image = md5(uniqid($namaimage,true) . time()).'.'.$ekstensi; //compile

        //proses upload
        if(in_array($ekstensi, $allowed_extension) === true){
            //validasi ukuran
            if($ukuran < 5000000){
                move_uploaded_file($file_tmp, '../images/'.$image);
                 
                $addnew = mysqli_query($konek, "INSERT INTO itembox(invoice, image, nama, sku, quantity) VALUES('$invoice','$image','$nama','$sku','$quantity')");
                if($addnew){
                    header('location:index.php');
                } else {
                    echo '
                    <script>
                        alert("Gagal Memuat Item Box");
                        window.location.href="index.php";
                    </script>';
                }
            } else {
                //kalau file lebih dari 5mb
                echo '
                    <script>
                        alert("Kelebihan muatan woiii ga muat database");
                        window.location.href="index.php";
                    </script>'; 
            }
        } else {
            //kalau gambar selain filter
            $addnew = mysqli_query($konek, "INSERT INTO itembox(invoice, nama, sku, quantity) VALUES('$invoice','$nama','$sku','$quantity')");
            if($addnew){
                if($addnew){
                    header('location:index.php');
                } else {
                    echo '
                    <script>
                        alert("Gagal Memuat Item Box");
                        window.location.href="index.php";
                    </script>';
                }
        }
    }
}

//Approve Button
if(isset($_POST['aprbutton'])){
    $status = $_POST['approve'];
    $idbox = $_POST['idb'];
    $nama = $_POST['nama'];
    $sku = $_POST['sku'];
    $qtygudang = $_POST['qtygudang'];

    $updateapprove = mysqli_query($konek, "UPDATE itembox SET status='$status' WHERE idbarang='$idbox'");
    if($updateapprove){
        $ceksku  = mysqli_query($konek, "SELECT * FROM stok WHERE sku='$sku'");
        $ambilsku = mysqli_num_rows($ceksku);
        if($ambilsku==1){
            $tambahquantity = mysqli_query($konek, "SELECT * FROM stok WHERE sku='$sku'");
            $ambilqty = mysqli_fetch_array($tambahquantity);
            $ambil = ($ambilqty)['quantity'];
            
            $tambah = $ambil+$qtygudang;
            $update = mysqli_query($konek, "UPDATE stok SET quantity='$tambah' WHERE sku='$sku'");
            if($update){
                echo '
                <script>
                    alert("Berhasil Update Quantity Dengan SKU yang ada");
                    window.location.href="approved.php";
                </script>';
            } else {
                echo '
                <script>
                    alert("Gagal Update Quantity");
                    window.location.href="approved.php";
                </script>';
            }
        } else {
            $ambildata = mysqli_query($konek, "SELECT * FROM itembox WHERE idbarang='$idbox'");
            $ambil = mysqli_fetch_array($ambildata);
            $ambilimg = ($ambil)['image'];

            $insert = mysqli_query($konek, "INSERT INTO stok(image, nama, sku, quantity) VALUES('$ambilimg','$nama','$sku','$qtygudang')");

        }

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
    $idbox = $_POST['idbarang'];
    $quantitygudang = $_POST['quantitygudang'];

    $ambil = mysqli_query($konek, "SELECT * FROM itembox WHERE idbarang='$idbox'");
    $ambildata = mysqli_fetch_array($ambil);
    $ambilnama= ($ambildata)['nama'];
    $ambilsku = ($ambildata)['sku'];
    $ambilqty = ($ambildata)['quantity'];
    $ambilimg = ($ambildata)['image'];

    if($ambilqty==$quantitygudang){
        $updateqty = mysqli_query($konek, "UPDATE itembox SET qtygudang='$quantitygudang' WHERE idbarang='$idbox'");
        header("location:addnew.php");
    } else {
        $update = mysqli_query($konek, "UPDATE itembox SET qtygudang='$quantitygudang' WHERE idbarang='$idbox'");
        header("location:addnew.php");
    }
    
}

if(isset($_POST['editnosku'])){
    $idb = $_POST['idb'];
    $nama = $_POST['nama'];
    $skugudang = $_POST['skugudang'];
    $gudang = $_POST['gudang'];
    $skutoko = $_POST['skutoko'];
    $quantity = $_POST['quantity'];

    $ambildata = mysqli_query($konek, "SELECT * FROM stok WHERE idbarang='$idb'");
    $ambil = mysqli_fetch_array($ambildata);
    $ambilimg = ($ambil)['image'];

    $updatenosku = mysqli_query($konek, "UPDATE stok SET nama='$nama', sku='$skutoko', skug='$skugudang', gudang='$gudang', quantity='$quantity', image='$ambilimg' WHERE idbarang='$idb'");
    if($updatenosku){
        echo '
        <script>
            alert("Data berhasil di update");
            window.location.href="index.php";
        </script>';
    } else {
        echo '
        <script>
            alert("Data tidak berhasil di update");
            window.location.href="addnew.php";
        </script>';
    }
}

//Insert to temp
// if(isset($_POST['addpuan'])){
//     $puantity = $_POST['puan'];
//     $idb = $_POST['idbarang'];
//     $status = $_POST['statusulang'];

//     $select = mysqli_query($konek, "SELECT * FROM itembox WHERE idbarang='$idb'");
//     $selectfilter = mysqli_fetch_array($select);
//     $selectname = ($selectfilter)['nama'];
//     $selectimg = ($selectfilter)['image'];
//     $selectsku = ($selectfilter)['sku'];
//     $selectinv = ($selectfilter)['invoice'];

//     $selectulang = mysqli_query($konek, "SELECT * FROM temp_item WHERE nama='$selectname'");
//     $cekdata = mysqli_num_rows($selectulang);
//     if($cekdata>0){
//         $ambilstatus = mysqli_query($konek, "SELECT * FROM temp_item WHERE status='ulang'");
//         if($ambilstatus){
//             $update = mysqli_query($konek, "UPDATE temp_item SET quantity='$puantity', status='$status' WHERE nama='$selectname'");
//         } else {
//             echo '
//             <script>
//                 alert("Data ini berhasil");
//                 window.location.href="addnew.php";
//             </script>';
//         }
    
//     } else {
//         $insert = mysqli_query($konek, "INSERT INTO temp_item(nama, image, sku, invoice, quantity, status) VALUES('$selectname','$selectimg','$selectsku','$selectinv','$puantity','$status')");
//     }
// }


//submit insert
if(isset($_POST['submitinsert'])){
    $status = $_POST['status'];
    $nama = $_POST['namaitem'];
    $sku = $_POST['skuitem'];
    $quantity = $_POST['quantityitem'];
    $img = $_POST['file'];

    $jumlah = $_POST['count'];

    for($i=0; $i < $jumlah; $i++){
        $select = mysqli_query($konek, "SELECT * FROM itembox WHERE nama='$nama[$i]'");
        $ambilqty = mysqli_fetch_array($select);
        $ambil = ($ambilqty)['qtygudang'];
        $ambilimg = ($ambilqty)['image'];

        if($ambil=='0'){
            echo'Gagal';
        } else {
            $insert = mysqli_query($konek, "INSERT INTO stok(image, nama, sku, quantity) VALUES('$img[$i]','$nama[$i]','$sku[$i]','$quantity[$i]')") or die (mysqli_erorr());
            if($insert){
                $update = mysqli_query($konek, "UPDATE itembox SET status='$status[$i]' WHERE nama='$nama[$i]'");
                header('location:approved.php');
            } else {
                header('location:approved.php');
            }
        }
    }
}

//insert quantity
if(isset($_POST['submitquantity'])){
    $idb = $_POST['idbarang'];
    $jumlah = $_POST['count'];
    $quantity = $_POST['countinggudang'];

    for($i=0; $i < $jumlah; $i++){
        $update = mysqli_query($konek, "UPDATE itembox SET qtygudang='$quantity[$i]' WHERE idbarang='$idb[$i]' ");
        header('location:addnew.php');
    } {

    }

}

?>