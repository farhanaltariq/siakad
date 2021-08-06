<?php
    include_once("navbar.php");
    include_once("footer.php");
    include_once("connectdb.php");
    $sql = "SELECT * FROM dosen WHERE nppy = $_POST[nppy];";
    $data = mysqli_query($connect, $sql);;
    if($data->num_rows>0)
        $row = mysqli_fetch_assoc($data);
    $selected = "selected";

    include_once 'connectdb.php';
  if (isset($_POST['submit'])) {
    $nppy = $_POST['nppy'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $mata_kuliah = $_POST['mata_kuliah'];

    $query = "UPDATE dosen SET nama_lengkap = '$nama_lengkap', no_hp = '$no_hp', alamat = '$alamat', mata_kuliah = '$mata_kuliah' WHERE nppy = $nppy;";
    $sql = mysqli_query($connect, $query);
    if ($sql)
      header("location:dataDosen.php");
    else {
      echo $query;
      echo "<hr>Gagal menambahkan data";
    }
  } else {

  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    </head>
  <body>
    <div class="container-sm mx-auto position-absolute top-50 start-50 translate-middle" style="width:400px">
    <form action="#" method="post">
      <div class="form-group">
        <label >NPPY</label>
        <input name="nppy" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $row['nppy'];?>">
      </div>
      <div class="form-group">
        <label >Full Name</label>
        <input required name="nama_lengkap" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$row['nama_lengkap'];?>">
      </div>
      <div class="form-group">
        <label >Phone No</label><br>
        <input required name="no_hp" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$row['no_hp'];?>">
        <br>
      </div>
      <div class="form-group">
        <label >Address</label><br>
        <input required name="alamat" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$row['alamat'];?>">
        <br>
      </div>
      <div class="form-group">
        <label>Subject</label>
        <select required name="mata_kuliah" class="form-select" aria-label="Default select example">
          <option selected disabled>Study Program</option>
          <option value="Information System">Information System</option>
          <option value="Informatics Engineering">Informatics Engineering</option>
          <option value="Informatics Management">Informatics Management</option>
          <option value="Accounting Computerization">Accounting Computerization</option>
        </select>
      </div>
      <br>
      <button name="submit" type="submit" class="btn btn-primary">Ubah</button>
    </form>
    <a style="float:right" href="dataDosen.php"><button type="submit" class="btn btn-success">Kembali</button></a>
    </div>
  </body>
</html>