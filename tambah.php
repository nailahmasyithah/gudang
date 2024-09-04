<!DOCTYPE html>
<html>
    <head>
        <title>Tambah Data</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-
        Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
        <div class="container mt-4">
        <h2 class="text-center">Tambah Data Stok</h2>
    <hr/>
    <form method="post">
        <div class="form-group">
        <label>Nama Barang</label>
        <input type="text" class="form-control" name="nb">
        </div>
        <div class="form-group">
        <label>Jumlah stok</label>
        <input type="number" class="form-control" name="js">
        </div>
        <div class="form-group">
        <label>Harga Satuan</label>
        <input type="number" class="form-control" name="hs">
        </div>
        <div class="form-group">
        <label>Tanggal Kadaluwarsa</label>
        <input type="date" class="form-control" name="tk">
        </div>
        <button class="btn btn-success" name="insert">simpan</button>
        <a href="stok.php" class="btn btn-warning">Batal</a>
    </form>
    <?php
    include 'koneksi.php';
    if (isset($_POST['insert'])){
        $nmbarang=$_POST['nb'];
        $jmlstok=$_POST['js'];
        $hrgsatuan=$_POST['hs'];
        $tglexp=$_POST['tk'];

        $query=mysqli_query($config, "INSERT INTO stok(nama_barang,jumlah_stok,
        harga_satuan,kadaluarsa) VALUES ('$nmbarang' ,
        '$jmlstok', '$hrgsatuan', '$tglexp')");
        echo "<div class='alert alert-info mt-4'>Data Berhasil disimpan</div>";
        echo "<meta http-equiv='refresh' content='1;url=stok.php'>";
        }
    ?>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-
    wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>