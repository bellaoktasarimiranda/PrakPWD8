<?php 
include "koneksi.php";
?>
<h3>Form Pencarian Dengan PHP MAHASISWA</h3>
<form action="" method="get">
<!--membuat form dengan methode get -->
<label>Cari :</label>
<input type="text" name="cari">
<input type="submit" value="Cari">
</form>
<?php 
if(isset($_GET['cari'])){
$cari = $_GET['cari'];
// $cari menampung nilai inputan
echo "<b>Hasil pencarian : ".$cari."</b>";
}
?>
<table border="1">
<tr>
<th>No</th>
<th>Nama</th>
</tr>
<?php 
if(isset($_GET['cari'])){
$cari = $_GET['cari'];
// $cari menampung nilai inputan
$sql="select * from mahasiswa where nama like'%".$cari."%'";
//menampilkan semua data pada tabel mahasiswa dengan nim yang sama dengan nilai inputan
$tampil = mysqli_query($con,$sql);
}else{
$sql="select * from mahasiswa";
//menampilkan semua data pada tabel mahasiswa
$tampil = mysqli_query($con,$sql);
}
$no = 1;
while($r = mysqli_fetch_array($tampil)){
?>
<tr>
<td><?php echo $no++; ?></td>
<td><?php echo $r['nama']; ?></td>
</tr>
<!-- menampilkan nama pada tabel mahasiswa sesuai dengan nim inputan --> 
<?php } ?>
</table>