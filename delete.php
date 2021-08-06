<?php
include_once "connectdb.php";
//Hapus data mahasiswa
if(isset($_POST['nim'])){
    $qry = "DELETE FROM mhs WHERE nim = $_POST[nim];";
    $sql = mysqli_query($connect, $qry);
    if ($sql)
        header("location:dataMhs.php");
    else
        echo "Gagal menghapus data";
}
//Hapus data dosen
if(isset($_POST['nppy'])){
    $qry = "DELETE FROM dosen WHERE nppy = $_POST[nppy];";
    $sql = mysqli_query($connect, $qry);
    if ($sql)
        header("location:dataDosen.php");
    else
        echo "Gagal menghapus data";
}
    
?>
