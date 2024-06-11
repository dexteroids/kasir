<?php
    require 'ceklogin.php';
    //hitung jumlah pesanan
    $h1 = mysqli_query($c,"select*from produk");
    $h2 = mysqli_num_rows($h1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="css/styles.css" rel="stylesheet" />
    <title>Kasir</title>

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
            margin-left: 210px;
            padding: 20px;
        }
        .card {
            background-color: #007bff;
            color: white;
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
<body>
    <div class="navbar">
        <a href="index.php">Aplikasi Kasir</a>
    </div>
    <div class="sidebar">
        <a href="index.php">Order</a>
        <a href="stock.php">Stock Barang</a>
        <a href="masuk.php">Barang Masuk</a>
        <a href="index.php">Kelola Pelanggan</a>
        <a href="logout.php">Logout</a>
    </div>
    <div class="content">
        <h1>Stock Barang</h1>
        <p>Selamat Datang</p>
        <div class="card">Jumlah Barang: <?=$h2;?> </div>
        
        <button class="btn" onclick="openModal('myModal')">Tambah Barang Baru</button>

        <div class="card">
            <h2>Data Barang</h2>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Deskripsi</th>
                        <th>Stock</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $get = mysqli_query($c, "select*from produk");
                        $i = 1;
                        while($p = mysqli_fetch_array($get)){
                            $namaproduk = $p['namaproduk'];
                            $deskripsi = $p['deskripsi'];
                            $harga = $p['harga'];
                            $stock = $p['stock'];
                            $idproduk = $p['idproduk'];
                    ?>
                    <tr>
                        <td><?=$i++;?></td>
                        <td><?=$namaproduk;?></td>
                        <td><?=$deskripsi;?></td>
                        <td><?=$stock;?></td>
                        <td>Rp<?=number_format($harga);?></td>
                        <td>
                            <button class="btn btn-warning" onclick="openModal('edit<?=$idproduk;?>')">Edit</button>
                            <button class="btn btn-danger" onclick="openModal('delete<?=$idproduk;?>')">Delete</button>
                        </td>
                    </tr>

                    <!-- Modal Edit -->
                    <div id="edit<?=$idproduk;?>" class="modal">
                        <div class="modal-content">
                            <span class="close" onclick="closeModal('edit<?=$idproduk;?>')">&times;</span>
                            <h2>Ubah <?=$namaproduk;?></h2>
                            <form method="post">
                                <input type="text" name="namaproduk" class="form-control" placeholder="Nama Produk" value="<?=$namaproduk;?>">
                                <input type="text" name="deskripsi" class="form-control mt-2" placeholder="Deskripsi" value="<?=$deskripsi;?>">
                                <input type="num" name="harga" class="form-control mt-2" placeholder="Harga Produk"value="<?=$harga;?>">
                                <input type="hidden" name="idp" value="<?=$idproduk;?>">
                                <button type="submit" class="btn btn-success" name="editbarang">Submit</button>
                                <button type="button" class="btn btn-danger" onclick="closeModal('edit<?=$idproduk;?>')">Close</button>
                            </form>
                        </div>
                    </div>

                    <!-- Modal Delete -->
                    <div id="delete<?=$idproduk;?>" class="modal">
                        <div class="modal-content">
                            <span class="close" onclick="closeModal('delete<?=$idproduk;?>')">&times;</span>
                            <h2>Hapus <?=$namaproduk;?></h2>
                            <form method="post">
                                <p>Apakah Anda Yakin Ingin Menghapus Barang Ini?</p>
                                <input type="hidden" name="idp" value="<?=$idproduk;?>">
                                <button type="submit" class="btn btn-success" name="hapusbarang">Submit</button>
                                <button type="button" class="btn btn-danger" onclick="closeModal('delete<?=$idproduk;?>')">Close</button>
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
            <span class="close" onclick="closeModal('myModal')">&times;</span>
            <h2>Tambah Barang Baru</h2>
            <form method="post">
                <input type="text" name="namaproduk" class="form-control" placeholder="Nama Produk">
                <input type="text" name="deskripsi" class="form-control mt-2" placeholder="Deskripsi">
                <input type="num" name="stock" class="form-control mt-2" placeholder="Stock Awal">
                <input type="num" name="harga" class="form-control mt-2" placeholder="Harga Produk">
                <button type="submit" class="btn btn-success" name="tambahbarang">Submit</button>
                <button type="button" class="btn btn-danger" onclick="closeModal('myModal')">Close</button>
            </form>
        </div>
    </div>

    <script>
        function openModal(id) {
            document.getElementById(id).style.display = "block";
        }

        function closeModal(id) {
            document.getElementById(id).style.display = "none";
        }
    </script>
</body>
</html>
