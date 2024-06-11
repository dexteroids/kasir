<?php

require 'ceklogin.php';


if(isset($_GET['idp'])){
    $idp = $_GET['idp'];

    $ambilnamapelanggan = mysqli_query($c,"select * from pesanan p, pelanggan p1 where p.idpelanggan=p1.idpelanggan and p.idorder='$idp'");
    $np = mysqli_fetch_array($ambilnamapelanggan);
    $namapel = $np['namapelanggan'];
} else {
    header('location:index.php');
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
    <title>Kasir</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #343a40;
            overflow: hidden;
        }
        .navbar a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        .sidebar {
            height: 100%;
            width: 200px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            padding-top: 20px;
        }
        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            color: #f2f2f2;
            display: block;
        }
        .sidebar a:hover {
            background-color: #575757;
        }
        .content {
            margin-top: 50px;
            /* margin-left: 210px; */
            padding: 20px;
        }
        .card {
            background-color: #ffffff;
            color: black;
            padding: 20px;
            margin-bottom: 20px;
        }
        .btn {
            padding: 10px 20px;
            color: white;
            background-color: #007bff;
            border: none;
            cursor: pointer;
            margin-right: 5px;
            margin-bottom: 5px;
        }
        .btn-warning {
            background-color: #ffc107;
        }
        .btn-danger {
            background-color: #dc3545;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
        }
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
    </style>
</head>
<body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand ps-3" href="index.php">Aplikasi Kasir</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Order
                            </a><a class="nav-link" href="stock.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Stock Barang
                            </a>
                            <a class="nav-link" href="masuk.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Barang Masuk
                            </a>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Kelola Pelanggan
                            </a>
                            <a class="nav-link" href="logout.php">
                                Logout
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Kelompok Project Pemroweb:</div>
                        Kelas G
                    </div>
                </nav>
            </div>
    <div class="content">
    <div class="container-fluid px-4">
                        <h1 class="mt-4">Data Pesanan: <?=$idp;?></h1>
                        <h4 class="mt-4">Nama Pelanggan: <?=$namapel;?></h4>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Selamat Datang</li>
                        </ol>
                           
                        <!-- Button to open the Modal-->
                        <button type="button" class="btn btn-info mb-4 text-white mb-4" onclick="openModal('myModal')">
                            Tambah Barang
                        </button>

                        </div>

                        <div class="card">
                        <h2>Data Pesanan</h2>
                        <table id="datatablesSimple">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Harga Satuan</th>
                            <th>Jumlah</th>
                            <th>Sub-total</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                                $get = mysqli_query($c, "select * from detailpesanan p, produk pr where p.idproduk=pr.idproduk and idpesanan='$idp' ");
                                $i = 1;

                                while($p = mysqli_fetch_array($get)){
                                    $iddp = $p['iddetailpesanan'];
                                    $idpr = $p['idproduk'];
                                    $qty = $p['qty'];
                                    $harga = $p['harga'];     
                                    $namaproduk = $p['namaproduk']; 
                                    $desc = $p['deskripsi'];    
                                    $subtotal = $qty*$harga;
                            ?>
                        <tr>
                            <td><?=$i++;?></td>
                            <td><?=$namaproduk;?>(<?=$desc?>)</td>
                            <td>Rp<?=number_format($harga);?></td>
                            <td><?=number_format($qty);?></td>        
                            <td>Rp<?=number_format($subtotal);?></td>
                            <td>
                                <button class="btn btn-warning" onclick="openModal('edit<?=$idpr;?>')">Edit</button>
                                <button class="btn btn-danger" onclick="openModal('delete<?=$idpr;?>')">Delete</button>
                            </td>
                        </tr>

                    <!-- Modal Edit -->
                    <div id="edit<?=$idpr;?>" class="modal">
                        <div class="modal-content">
                            <span class="close" onclick="closeModal('edit<?=$idpr;?>')">&times;</span>
                            <h2>Ubah data detail pesanan</h2>
                            <form method="post">
                                <input type="text" name="namaproduk" class="form-control" placeholder="Nama Produk" value="<?=$namaproduk;?>: <?=$desc;?>" disabled>
                                <input type="number" name="qty" class="form-control mt-2" placeholder="Harga Produk" value="<?=$qty;?>">
                                <input type="hidden" name="iddp" value="<?=$iddp;?>">
                                <input type="hidden" name="idp" value="<?=$idp;?>">
                                <input type="hidden" name="idpr" value="<?=$idpr;?>">
                                <button type="submit" class="btn btn-success" name="editdetailpesanan">Submit</button>
                                <button type="button" class="btn btn-danger" onclick="closeModal('edit<?=$idpr;?>')">Close</button>
                            </form>
                        </div>
                    </div>

                    <!-- Modal Delete -->
                    <div id="delete<?=$idpr;?>" class="modal">
                        <div class="modal-content">
                            <span class="close" onclick="closeModal('delete<?=$idpr;?>')">&times;</span>
                            <h2>Hapus barang</h2>
                            <form method="post">
                                <p>Apakah Anda Yakin Ingin Menghapus Barang Ini?</p>
                                <input type="hidden" name="idp" value="<?=$iddp;?>">
                                <input type="hidden" name="idpr" value="<?=$idpr;?>">
                                <input type="hidden" name="idorder" value="<?=$idp;?>">
                                <button type="submit" class="btn btn-success" name="hapusprodukpesanan">Ya</button>
                                <button type="button" class="btn btn-danger" onclick="closeModal('delete<?=$idpr;?>')">Close</button>
                            </form>
                        </div>
                    </div>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Tambah -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal("myModal")">&times;</span>
            <h2>Tambah Barang</h2>
            <form method="post">

            <div class="modal-body">
                Pilih Barang
                <select name="idproduk" class="form-control">

                <?php
                $getproduk = mysqli_query($c,"select * from produk where idproduk not in (select idproduk from detailpesanan where idpesanan='$idp')");

                while($pl = mysqli_fetch_array($getproduk)){
                    $namaproduk = $pl['namaproduk'];    
                    $stock = $pl['stock'];
                    $deskripsi = $pl['deskripsi'];                    
                    $idproduk = $pl['idproduk'];                    
                ?>

                <option value="<?= $idproduk;?>"><?= $namaproduk;?> - <?= $deskripsi;?>(Stock: <?=$stock;?>)</option>
        
                <?php
                    }   
                ?>

                </select>

                <input type="number" name="qty" class="form-control mt-4" placeholder="jumlah" min="1" required>
                <input type="hidden" name="idp" value="<?=$idp;?>">
            </div>
                <button type="submit" class="btn btn-success" name="addproduk">Submit</button>
                <button type="button" class="btn btn-danger" onclick="closeModal('myModal')">Close</button>
            </form>
        </div>
    </div>

    <script src="js/scripts.js">


        function openModal(id) {
            document.getElementById(id).style.display = "block";
        }

        function closeModal(id) {
            document.getElementById(id).style.display = "none";
        }
    </script>
</body>
</html>
