<?php
    include_once("navbar.php");
    include_once("footer.php");
    include_once("connectdb.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    </head>
  <body>
    <div class="container-sm mx-auto position-absolute top-50 start-50 translate-middle" style="width:400px">
    <form action="#" method="post">
      <div class="form-group">
        <label >NPPY</label>
        <input required name="nppy" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <label >Lecturer Name</label>
        <input required name="nama_lengkap" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <label >Phone No</label><br>
        <input class="form-control" name="no_hp" type="number">
        <br>
      </div>
      <div class="form-group">
        <label >Address</label><br>
        <input class="form-control" name="alamat" type="text">
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
      <button name="submit" type="submit" class="btn btn-primary">Add Item</button>
    </form>
    </div>
  </body>
</html>
<?php
  include_once 'connectdb.php';
  if (isset($_POST['submit'])) {
    $nppy = $_POST['nppy'];
    $namaLengkap = $_POST['nama_lengkap'];
    $alamat = $_POST['alamat'];
    $mata_kuliah = $_POST['mata_kuliah'];

    $query = "INSERT INTO dosen (nppy, nama_lengkap, no_hp, alamat, mata_kuliah) VALUES ".
             "('$nppy', '$namaLengkap', $_POST[no_hp], '$alamat', '$mata_kuliah')";
    $sql = mysqli_query($connect, $query);
    if ($sql) {
      header("location:dataDosen.php");
    } else {
      echo $query;
      echo "Gagal menambahkan data";
    }
  } else {

  }
?>
