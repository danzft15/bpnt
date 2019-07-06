<?php
$pro="simpan";
$tgl_penilaian=WKT(date("Y-m-d"));
?>
<link type="text/css" href="<?php echo "$PATH/base/";?>ui.all.css" rel="stylesheet" />   
<script type="text/javascript" src="<?php echo "$PATH/";?>jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/i18n/ui.datepicker-id.js"></script>
    
  <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tgl_penilaian").datepicker({
					dateFormat  : "dd MM yy",        
          changeMonth : true,
          changeYear  : true					
        });
      });
    </script>    
<link rel="stylesheet" href="js/jquery-ui.css">
<link rel="stylesheet" href="resources/demos/style.css">
<script src="js/jquery-1.12.4.js"></script>
<script src="js/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#accordion" ).accordion({
      collapsible: true
    });
  } );
  </script>
<script type="text/javascript"> 
function PRINT(){ 
win=window.open('penilaian/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

<?php
  $sql="select `id_penilaian` from `$tbpenilaian` order by `id_penilaian` desc";
  $q=mysqli_query($conn, $sql);
  $jum=mysqli_num_rows($q);
  $th=date("y");
  $bl=date("m")+0;if($bl<10){$bl="0".$bl;}

  $kd="PNL".$th.$bl;//PNL1610001
  if($jum > 0){
   $d=mysqli_fetch_array($q);
   $idmax=$d["id_penilaian"];
   
   $bul=substr($idmax,5,2);
   $tah=substr($idmax,3,2);
    if($bul==$bl && $tah==$th){
     $urut=substr($idmax,7,3)+1;
     if($urut<10){$idmax="$kd"."00".$urut;}
     else if($urut<100){$idmax="$kd"."0".$urut;}
     else{$idmax="$kd".$urut;}
    }//==
    else{
     $idmax="$kd"."001";
     }   
   }//jum>0
  else{$idmax="$kd"."001";}
  $id_penilaian=$idmax;
?>

<?php
if($_GET["pro"]=="ubah"){
	$id_penilaian=$_GET["id"];
	$sql="select * from `$tbpenilaian` where `id_penilaian`='$id_penilaian'";
	$d=getField($conn,$sql);
				$id_penilaian=$d["id_penilaian"];
				$tgl_penilaian=WKT($d["tgl_penilaian"]);
				$nama_penilaian=$d["nama_penilaian"];
				$deskripsi=$d["deskripsi"];
				$status=$d["status"];
				$keterangan=$d["keterangan"];
				$pro="ubah";		
}
?>
<div id="accordion">
  <h3>Input Data Penilaian</h3>
  <div>

<form action="" method="post" enctype="multipart/form-data">
<table width="519">


<tr>
<th width="117"><label for="id_penilaian">ID PENILAIAN</label>
<th width="12">:
<th width="240" colspan="2"><b><?php echo $id_penilaian;?></b>
</tr>

<tr>
<td height="43"><label for="tgl_penilaian">Tanggal Penilaian</label>
<td>:
<td colspan="3"><input class="form-control" name="tgl_penilaian" type="text" id="tgl_penilaian" value="<?php echo $tgl_penilaian;?>" size="50" /></td>
</tr>

<tr>
<td height="45"><label for="nama_penilaian">Nama Penilaian</label>
<td>:
<td colspan="3"><input class="form-control" name="nama_penilaian" type="text" id="nama_penilaian" value="<?php echo $nama_penilaian;?>" size="30" /></td>
</tr>

<tr>
<td height="39"><label for="deskripsi">Deskripsi</label>
<td>:<td colspan="2"><textarea name="deskripsi" cols="55" rows="3" class="form-control" id="deskripsi"><?php echo $deskripsi;?></textarea>
</td>
</tr>

<tr>
<td><label for="status">Status</label>
<td>:<td colspan="2">
<input type="radio" name="status" id="status"  checked="checked" value="Proses" <?php if($status=="Proses"){echo"checked";}?>/>Proses 
<input type="radio" name="status" id="status" value="Selesai" <?php if($status=="Selesai"){echo"checked";}?>/>Selesai
<input type="radio" name="status" id="status" value="Batal" <?php if($status=="Batal"){echo"checked";}?>/>Batal

</td></tr>

<tr>
<td height="39"><label for="keterangan">Catatan Tambahan</label>
<td>:<td colspan="2"><input class="form-control" name="keterangan" type="text" id="keterangan" value="<?php echo $keterangan;?>" size="30" />
</td>
</tr>

<tr>
<td height="58">
<td>
<td colspan="2">	<input class="btn btn-primary active" name="Simpan" type="submit" id="Simpan" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="id_penilaian" type="hidden" id="id_penilaian" value="<?php echo $id_penilaian;?>" />
        <a href="?mnu=penilaian"><input class="btn btn-primary active" name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>
</div>
 <?php  
  $sqlq="select distinct(tgl_penilaian) from `$tbpenilaian` order by `tgl_penilaian` desc";
  $jumq=getJum($conn,$sqlq);
		if($jumq <1){
			echo"<h1>Maaf data belum tersedia...</h1>";
			}								
	$arrq=getData($conn,$sqlq);
		foreach($arrq as $dq) {							
				$tgl_penilaian=$dq["tgl_penilaian"];

?> 
<h3> Data Penilaian <?php echo WKT($tgl_penilaian);?></h3>

  <div>
Data penilaian: 
| <a href="penilaian/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a> 
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>

<table class="table table-bordered table-striped table-condensed cf">
  <thead>
  <tr>
    <th width="4%"><center>No</th>
    <th width="70%"><center>Nama Penilaian</th>
    <th width="10%"><center>Status</th>
    <th width="10%"><center>Menu</th>
  </tr>
  </thead>
  <tbody>
<?php  
  $sql="select * from `$tbpenilaian` where tgl_penilaian='$tgl_penilaian' order by `id_penilaian` desc";
  $jum=getJum($conn,$sql);
		if($jum > 0){
	//--------------------------------------------------------------------------------------------
	$batas   = 10;
	$page = $_GET['page'];
	if(empty($page)){$posawal  = 0;$page = 1;}
	else{$posawal = ($page-1) * $batas;}
	
	$sql2 = $sql." LIMIT $posawal,$batas";
	$no = $posawal+1;
	//--------------------------------------------------------------------------------------------									
	$arr=getData($conn,$sql2);
		foreach($arr as $d) {							
				$id_penilaian=$d["id_penilaian"];
				$tgl_penilaian=WKT($d["tgl_penilaian"]);
				$nama_penilaian=strtoupper($d["nama_penilaian"]);
				$deskripsi=$d["deskripsi"];
				$status=$d["status"];
				$keterangan=$d["keterangan"];
					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td><b>$nama_penilaian</b> ($id_penilaian) |$tgl_penilaian
				<br><i>Deskripsi: $deskripsi ,Cat: $keterangan</i>
				<td align='left'>$status</td>
				<td align='center'>
<a href='?mnu=penilaian_detail&kd=$id_penilaian'><img src='ypathicon/detail.png' alt='detail'></a>
<a href='?mnu=penilaian&pro=ubah&id=$id_penilaian'><img src='ypathicon/ed.png' alt='ubah'></a>
<a href='?mnu=penilaian&pro=hapus&id=$id_penilaian'><img src='ypathicon/delete.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $nama_penilaian pada data penilaian ?..\")'></a></td>
				</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data penilaian belum tersedia...</blink></td></tr>";}
?>
</tbody>
</table>

<?php
//Langkah 3: Hitung total data dan page 
$jmldata = $jum;
if($jmldata>0){
	if($batas<1){$batas=1;}
	$jmlhal  = ceil($jmldata/$batas);
	echo "<div class=paging>";
	if($page > 1){
		$prev=$page-1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=penilaian'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=penilaian'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=penilaian'>Next »</a></span>";
	}
	else{ echo "<span class=disabled>Next »</span>";}
	echo "</div>";
	}//if jmldata

$jmldata = $jum;
	echo "<p align=center>Total Data <b>$jmldata</b> Item</p>";
?>
</div>
<?php }?>
</div>
<?php
if(isset($_POST["Simpan"])){
	$pro=strip_tags($_POST["pro"]);
	$id_penilaian=strip_tags($_POST["id_penilaian"]);
	$tgl_penilaian=BAL(strip_tags($_POST["tgl_penilaian"]));
	$nama_penilaian=strip_tags($_POST["nama_penilaian"]);
	$deskripsi=strip_tags($_POST["deskripsi"]);
	$status=strip_tags($_POST["status"]);
	$keterangan=strip_tags($_POST["keterangan"]);
	
if($pro=="simpan"){
$sql=" INSERT INTO `$tbpenilaian` (
`id_penilaian` ,
`tgl_penilaian` ,
`nama_penilaian` ,
`deskripsi` ,
`status` ,
`keterangan` 
) VALUES (
'$id_penilaian',
'$tgl_penilaian', 
'$nama_penilaian', 
'$deskripsi',
'$status',
'$keterangan'
)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('Data $id_penilaian berhasil disimpan !');document.location.href='?mnu=penilaian';</script>";}
		else{echo"<script>alert('Data $id_penilaian gagal disimpan...');document.location.href='?mnu=penilaian';</script>";}
	}
	else{
$sql="update `$tbpenilaian` set 
`tgl_penilaian`='$tgl_penilaian',
`nama_penilaian`='$nama_penilaian',
`deskripsi`='$deskripsi' ,
`status`='$status',
`keterangan`='$keterangan' 
where `id_penilaian`='$id_penilaian'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('Data $id_penilaian berhasil diubah !');document.location.href='?mnu=penilaian';</script>";}
	else{echo"<script>alert('Data $id_penilaian gagal diubah...');document.location.href='?mnu=penilaian';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$id_penilaian=$_GET["id"];
$sql2="delete from `$tbpenilaiandetail` where `id_penilaian`='$id_penilaian'";
$hapus2=process($conn,$sql2);
$sql="delete from `$tbpenilaian` where `id_penilaian`='$id_penilaian'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('Data penilaian $id_penilaian berhasil dihapus !');document.location.href='?mnu=penilaian';</script>";}
else{echo"<script>alert('Data penilaian $id_penilaian gagal dihapus...');document.location.href='?mnu=penilaian';</script>";}
}
?>

