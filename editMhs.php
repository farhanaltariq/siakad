<?php
    include_once("navbar.php");
    include_once("footer.php");
    include_once("connectdb.php");
    $sql = "SELECT * FROM mhs WHERE nim = $_POST[nim];";
    $data = mysqli_query($connect, $sql);;
    if($data->num_rows>0)
        $row = mysqli_fetch_assoc($data);
    function checked() : void{
        echo "checked";
    }

    include_once 'connectdb.php';
  if (isset($_POST['submit'])) {
    $nim = $_POST['nim'];
    $namaMhs = $_POST['namaMhs'];
    $jenisKelamin = $_POST['jenisKelamin'];
    $prodi = $_POST['prodi'];

    $query = "UPDATE mhs SET nim = $nim, nama_lengkap = '$namaMhs', jenis_kelamin = '$jenisKelamin', program_studi = '$prodi' WHERE nim = $nim;";
    $sql = mysqli_query($connect, $query);
    if ($sql) {
      header("location:dataMhs.php");
    } else {
      echo $query;
      echo "<hr>Gagal merubah data";
    }
  } else {

  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    </head>
  <body>
    <div class="container-sm mx-auto position-absolute top-50 start-50 translate-middle" style="width:400px">
    <form action="#" method="post">
      <div class="form-group">
        <label >NIM</label>
        <input name="nim" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $row['nim'];?>">
      </div>
      <div class="form-group">
        <label >Student Name</label>
        <input required name="namaMhs" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$row['nama_lengkap'];?>">
      </div>
      <div class="form-group">
        <label >Gender</label><br>
        <div class="text-center">
        <input <?= ($row['jenis_kelamin']=='Male') ?  checked() :  '';?> required type="radio" name="jenisKelamin" value="Male">
        <label for="Laki-Laki">Male</label>
        <input <?= ($row['jenis_kelamin']=='Female') ?  checked() :  '';?> required type="radio" name="jenisKelamin" value="Female">
        <label for="Perempuan">Female</label>
        </div>
        <br>
      </div>
      <div class="form-group">
      <label>Study Program</label>
        <select required name="prodi" class="form-select" aria-label="Default select example">
          <option disabled selected>Study Program</option>
          <option value="Information System">Information System</option>
          <option value="Informatics Engineering">Informatics Engineering</option>
          <option value="Informatics Management">Informatics Management</option>
          <option value="Accounting Computerization">Accounting Computerization</option>
        </select>
      </div>
      <br>
      <button name="submit" type="submit" class="btn btn-primary">Update</button>
    </form>
    <a style="float:right" href="dataMhs.php"><button type="submit" class="btn btn-success">Back</button></a>
    </div>
  </body>
</html>
