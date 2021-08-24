<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <div id="content">
    <?php
        include_once("navbar.php");
        include_once("footer.php");
        include_once("connectdb.php");
    ?>
  
      <div class="container">
          <div class="text-center">
                <hr>
                <b>STUDENT(S) DATA</b>
                <hr>
                <a href="tambahMhs.php"><button class="btn btn-primary">Add Data</button></a>
                <a href=""><button id="cmd" class="btn btn-primary" onclick=window.print()>Print Data</button></a>
          </div>
      </div>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">NIM</th>
      <th scope="col">Full Name</th>
      <th scope="col">Gender</th>
      <th scope="col">Study Program</th>
      <th scope="col" colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>
      <?php
        $sql = "SELECT * FROM mhs";
        $result = $connect->query($sql);
        $counter = 0;
        if($result->num_rows>0){
         while ($row = $result->fetch_assoc()){
           $counter++;
           echo "<tr>" .
                "<th scope='row'> $counter </th>" .
                "<td> {$row['nim']} </td>" .
                "<td> {$row['nama_lengkap']} </td>" .
                "<td> {$row['jenis_kelamin']} </td>" .
                "<td> {$row['program_studi']} </td>" .

                "<form action='editMhs.php' method='post'>" .
                "<input name='nim' value={$row['nim']} hidden>".
                "<td><button type='submit' class='btn btn-sm btn-info'>Edit</button></td>" .
                "</form>" .

                "<form action='delete.php' method='post'>" .
                "<input name='nim' value={$row['nim']} hidden>".
                "<td><button class='btn btn-sm btn-danger'>Hapus</button></td>" .
                "</form></tr>" ;
         }
        } else{
            echo "<tr><td class='text-center' colspan='6'>Data Kosong</td></tr>";
        }
        mysqli_close($connect);
        ?>
        <td></td>
  </tbody>
</table>
</div>
<div id="editor"></div>
  </body>
</html>
