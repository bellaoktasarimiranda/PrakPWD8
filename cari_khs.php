<?php 
include 'koneksi.php';
?>
<h3>Form Pencarian DATA KHS Dengan PHP </h3>
<form action="" method="get"> <!--membuat form dengan methode get -->
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
<th>NIM</th>
<th>Kode MK</th>
<th>Nilai</th>
</tr>
<?php 
if(isset($_GET['cari'])){
$cari = $_GET['cari'];
// $cari menampung nilai inputan
$sql="select * from khs where NIM like'%".$cari."%'"; 
//menampilkan semua data pada tabel khs dengan nim yang sama dengan nilai inputan
$tampil = mysqli_query($con,$sql);
}else{
$sql="select * from khs";
//menampilkan semua data pada tabel khs
$tampil = mysqli_query($con,$sql);
}
$no = 1;
while($r = mysqli_fetch_array($tampil)){
?>
<tr>
<td><?php echo $no++; ?></td>
<td><?php echo $r['NIM']; ?></td> 
<!-- menampilkan nim pada tabel khs sesuai dengan nim inputan --> 
<td><?php echo $r['kodeMK']; ?></td> 
<!-- menampilkan kodeMk pada tabel khs yang sesuai dengan nim inputan-->
<td><?php echo $r['nilai']; ?></td> 
<!-- menampilkan nilai pada tabel khs yang sesuai dengan nim imputan-->
</tr>
<?php } ?>
</table>