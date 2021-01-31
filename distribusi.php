<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semester 3</title>
   <style>
        * {
        box-sizing: border-box;
        }

        form {
        padding: 1em;
        border: 1px solid black;
        margin-top: 2rem;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
        padding: 1em;
        }
        form input {
        margin-bottom: 1rem;
        border: 1px solid black;
        }

        form select {
        margin-bottom: 1rem;
        border: 1px solid black;
        }

        form button, .button {
        padding: 0.7em;
        border: 0;
        margin: 2px;
        }


        label {
        text-align: left;
        display: block;
        padding: 0.5em 1.5em 0.5em 0;
        }

        
        input {
        width: 100%;
        padding: 0.7em;
        margin-bottom: 0.5rem;
        }
        
        select {
        width: 100%;
        padding: 0.5em 1.5em 0.5em 0;
        margin-bottom: 0.5rem;
        }

        @media (min-width: 400px) {
            form {
                overflow: hidden;
            }

            label {
                float: left;
                width: 220px;
            }

            input {
                float: left;
                width: calc(100% - 220px);
            }

            button, .button {
                float: right;
                width: calc(100% - 220px);
            }

            select {
                float: left;
                width: calc(100% - 220px);
            }
            
        }
   </style>
</head>
<body>

<form method="post" id="form">
<h3>DATA LOGISTIK LEMBAR KERJA SISWA</h3>
    <span>Programmer : Farhan Muhammad</span> <hr>
    <div class="Menu" style="widht = 100%">
        <a href="stock.php" style="margin-right:30%;">Input Stock</a>
        <a href="distribusi.php" style="margin-right:28%;">Distribusi</a>
        <a href="check_stock.php">Check Stock</a> <br>    
    </div> <hr>
    <h4>DISTRIBUSI LKS</h4>
      
      <label for="nama">Nama Sekolah</label>
      <input id="nama" type="text" name="nama" required placeholder="Masukan Nama Sekolah">

      <label for="kelas">Kelas</label>
      <select id="kelas" name="kelas" required>
        <option value=""></option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
      </select>

      <label for="jumlah">Jumlah</label>
      <input id="jumlah" type="number" name="jumlah" required placeholder="Masukan jumlah">
      
      
      <button class="button" type="submit" name="submit">Simpan</button>
</form>

<hr>
<center>
        <h3>Data Distribusi</h3>
    <table border="1">
            <tr>
                <th style="text-allign:center;">No</th>
                <th style="text-allign:center;">Nama Sekolah</th>
                <th style="text-allign:center;">Kelas</th>
                <th style="text-allign:center;">Jumlah</th>
                <th style="text-allign:center;">Bayar</th>
                <th style="text-allign:center;">Action</th>
            </tr>
            <?php 
            $con = mysqli_connect("localhost","root","","kuliah_uas_semester_3");
            $sql = "select * from distribusi";
            $no = 0;
            $data = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($data)) {
                $no++;
                $kelas = $row['kelas'];
                $data_stock = "select harga from stock where kelas = $kelas";
                
                $result = mysqli_query($con, $data_stock);
                $harga = mysqli_fetch_array($result);
            ?>
            <tr>
                <td><center><?php print($no) ?></td>
                <td><center><?php print($row['nama_sekolah']) ?></center></td>
                <td><center><?php print($kelas) ?></center></td>
                <td><center><?php print($row['jumlah']) ?></center></td>
                <td><center><?php  
                print($row['jumlah'] * $harga[0]) ?></center></td>
                <td><center><a href="edit_distribusi.php?id=<?php echo $row['id'] ?>">edit</a> &nbsp;&nbsp; 
                <a href="distribusi.php?delete=<?php echo $row['id'] ?>">delete</a></center></td>
            </tr>
            
            <?php }  ?>
    </table>
    
</center>


<?php 
    $con = mysqli_connect("localhost","root","","kuliah_uas_semester_3");

    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $sql = "DELETE FROM distribusi WHERE id=$id";
        if (mysqli_query($con, $sql)){
            echo "<script>alert('Hapus data berhasil');window.location.href='distribusi.php'</script>";
        }else{
            echo "<script>alert('Gagal menghapus data');window.location.href='distribusi.php'</script>";
        }
    }

    if(isset($_POST['submit'])){
        $data = $_POST;
        $sql = "INSERT INTO distribusi VALUES (null, '$data[nama]', '$data[kelas]', '$data[jumlah]')";
        
        if (mysqli_query($con, $sql)){
            echo "<script>alert('Data berhasil disimpan');window.location.href='distribusi.php'</script>";
        }else{
            echo "<script>alert('Gagal menyimpan data');window.location.href='distribusi.php'</script>";
        }
    
        
    }
        
?>
    
</body>
</html>