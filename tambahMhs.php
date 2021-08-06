<?php
    include_once("navbar.php");
    include_once("footer.php");
    include_once("connectdb.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit</title>
    <script>
      function konfirmasi(){
        if(confirm("Tambahkan Data ?"))
          document.GetElementById("addData").submit();
      }
    </script>
    </head>
  <body>
    <div class="container-sm mx-auto position-absolute top-50 start-50 translate-middle" style="width:400px">
    <form action="#" method="post" id="addData">
      <div class="form-group">
        <label >NIM</label>
        <input required name="nim" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <label >Student Name</label>
        <input required name="namaMhs" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <label >Gender</label><br>
        <div class="text-center">
        <input required type="radio" name="jenisKelamin" value="Male">
        <label for="Male">Male</label>
        <input type="radio" name="jenisKelamin" value="Female">
        <label for="Female">Female</label>
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
      <button name="submit" id="clicker" type="submit" class="btn btn-primary" >Add Item</button>
    </form>
    <button hidden onclick="konfirmasi()" class="btn btn-primary">Add Item </button>
    </div>
  </body>
</html>
<?php
  include_once 'connectdb.php';
  if (isset($_POST['submit'])) {
    $nim = $_POST['nim'];
    $namaMhs = $_POST['namaMhs'];
    $jenisKelamin = $_POST['jenisKelamin'];
    $prodi = $_POST['prodi'];

    $query = "INSERT INTO mhs (nim, nama_lengkap, jenis_kelamin, program_studi) VALUES ".
             "('$nim', '$namaMhs', '$jenisKelamin', '$prodi')";
    $sql = mysqli_query($connect, $query);
    if ($sql) {
      header("location:dataMhs.php");
    } else {
      echo $query;
      echo "Gagal menambahkan data";
    }
  } else {

  }
?>
