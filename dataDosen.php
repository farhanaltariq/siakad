<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script>
        var doc = new jsPDF();
        var specialElementHandlers = {
            '#editor': function (element, renderer) {
                return true;
            }
        };

        $('#cmd').click(function () {
            doc.fromHTML($('#content').html(), 15, 15, {
                'width': 170,
                    'elementHandlers': specialElementHandlers
            });
            doc.save('sample-file.pdf');
        });
    </script>
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
                <b>LECTURER(S) DATA</b>
                <hr>
                <a href="tambahDosen.php"><button class="btn btn-primary">Add Data</button></a>
                <a href=""><button id="cmd" class="btn btn-primary">Print Data</button></a>
          </div>
      </div>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Full Name</th>
      <th scope="col">NPPY</th>
      <th scope="col">Phone No</th>
      <th scope="col">Address</th>
      <th scope="col">Subject</th>
      <th scope="col" colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>
      <?php
        $sql = "SELECT * FROM dosen";
        $result = $connect->query($sql);
        $counter = 0;
        if($result->num_rows>0){
         while ($row = $result->fetch_assoc()){
           $counter++;
           echo "<tr>" .
                "<th scope='row'> $counter </th>" .
                "<td> {$row['nppy']} </td>" .
                "<td> {$row['nama_lengkap']} </td>" .
                "<td> {$row['no_hp']} </td>" .
                "<td> {$row['alamat']} </td>" .
                "<td> {$row['mata_kuliah']} </td>" .

                "<form action='editDosen.php' method='post'>" .
                "<input name='nppy' value={$row['nppy']} hidden>".
                "<td><button type='submit' class='btn btn-sm btn-info'>Edit</button></td>" .
                "</form>" .

                "<form action='delete.php' method='post'>" .
                "<input name='nppy' value={$row['nppy']} hidden>".
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
