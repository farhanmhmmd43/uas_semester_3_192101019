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
        <a href="" style="margin-right:30%;">Input Stock</a>
        <a href="" style="margin-right:28%;">Distribusi</a>
        <a href="">Check Stock</a> <br>    
    </div> <hr>
    <h4>FORM INPUT STOCK LKS</h4>
      <?php 
        $con = mysqli_connect("localhost","root","","kuliah_uas_semester_3");
        $id = $_REQUEST['id'];
        $sql = "select * from stock where id=$id";
        $data = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($data)) {
      ?>
      <label for="kelas">Kelas</label>
      <select id="kelas" name="kelas" required>
        <option value="<?php print($row['kelas']) ?>"><?php print($row['kelas']) ?></option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
      </select>

      <label for="jumlah">Jumlah</label>
      <input id="jumlah" type="number" name="jumlah" required placeholder="Masukan jumlah" value="<?php print($row['jumlah']) ?>">


      <label for="harga">Harga</label>
      <input id="harga" type="number" name="harga" required placeholder="Masukan harga" value="<?php print($row['harga']) ?>">
        <?php } ?>
      
      <button class="button" type="submit" name="submit">Simpan</button>
</form>


<?php 
    $con = mysqli_connect("localhost","root","","kuliah_uas_semester_3");

    if(isset($_POST['submit'])){
        $data = $_POST;
        
        $sql = "INSERT INTO stock VALUES (null, '$data[kelas]', '$data[jumlah]', '$data[harga]')";
        if (mysqli_query($con, $sql)){
            echo "<script>alert('Data berhasil disimpan');window.location.href='stock.php'</script>";
        }else{
            echo "<script>alert('Gagal menyimpan data');window.location.href='stock.php'</script>";
        }
    
        
    }
        
?>
    
</body>
</html>