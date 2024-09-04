<!DOCTYPE html>
<html>
    <head>
        <title>Stok Barang</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-
        Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
        <div class="container mt-4">
        <h2 class="text-center">Data Stok Barang</h2>
        <hr/>
        <form method="post">
            <div class="form-group form-inline">
                <input type="text" class="form-control mr-2" name="input_cari" placeholder="ketik nama barang..." />
                <button class="btn btn-success" type="submit" name="cari_barang">Cari</button>
            </div>
        </form>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Stok</th>
                    <th>Harga Satuan</th>
                    <th>Kadaluwarsa</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'koneksi.php';
                if(isset($_POST['cari_barang'])){
                    $input=$_POST['input_cari'];
                    if($input!=""){
                    $query=mysqli_query($config,"SELECT * FROM stok where nama_barang like '%$input%'");
                    }else{
                    $query=mysqli_query($config,"SELECT * FROM stok");
                }
                }else{
                    $query=mysqli_query($config,"SELECT * FROM stok");
                }
                $cekdata=mysqli_num_rows($query);
                if($cekdata<1){
                    echo "<tr>";
                    echo "<td colspan='12'><center class='bg-danger text-white'>Data tidak ditemukan</center></td>";
                    echo "</tr>";
                    echo "<meta http-equiv='refresh' content='2;url=stok.php'>";
                }else{
                    $nomor=1;
                    while($data=mysqli_fetch_array($query)){
                ?>
                <tr>
                    <td><?php echo $nomor ;?></td>
                    <td><?php echo $data['nama_barang'];?></td>
                    <td><?php echo $data['jumlah_stok'];?></td>
                    <td><?php echo $data['harga_satuan'];?></td>
                    <td><?php echo $data['kadaluarsa'];?></td>
                    <td><a href="hapus.php?id=<?php echo $data['kode_barang'];?>" class="btn btn-danger"
                    onclick="return confirm('Yakin data <?php echo $data ['nama_barang'];?> dihapus ?')"> 
                    Hapus</a>
                    <a href="edit.php?id=<?php echo $data['kode_barang'];?>" class="btn btn-success"> Edit</a>
                    </td>
                </tr>

                <?php
                    $nomor++;
                    }
                }
                ?>
            </tbody>
        </table>
        <a href="tambah.php" class="btn btn-primary">Tambah Data</a>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-
    wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>