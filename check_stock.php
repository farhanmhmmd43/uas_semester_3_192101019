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
<center>
        <h3>Check Stock LKS</h3>
    <table border="1">
            <tr>
                <th style="text-allign:center;">No</th>
                <th style="text-allign:center;">Kelas</th>
                <th style="text-allign:center;">Jumlah</th>
                <th style="text-allign:center;">Harga</th>
                <th style="text-allign:center;">Nilai Persediaan</th>
                
            </tr>
            <?php 
            $con = mysqli_connect("localhost","root","","kuliah_uas_semester_3");
            $sql = "select * from stock";
            $jumlah_seluruh = 0;
            $total_persediaan = 0;
            $no = 0;
            $data = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($data)) {
                $no++;
            ?>
            <tr>
                <td><center><?php print($no) ?></td>
                <td><center><?php print($row['kelas']) ?></center></td>
                <td><center><?php print($row['jumlah']) ?></center></td>
                <td><center><?php print($row['harga']) ?></center></td>
                <td><center><?php print($persediaan = $row['jumlah'] * $row['harga']) ?></center></td>
                
            </tr>
            
            <?php 
            $total_persediaan += $persediaan;
            $jumlah_seluruh += $row['jumlah'];}  ?>
    </table>
    <h4>Jumlah LKS Seluruh = <?php echo($jumlah_seluruh) ?></h4>
    <h4>Total Nilai Persediaan = <?php echo($total_persediaan) ?></h4>
</center>
</form>

<hr>




    
</body>
</html>