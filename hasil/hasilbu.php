<?php
$pro="simpan";
$tanggal=WKT(date("Y-m-d"));
?>
<link type="text/css" href="<?php echo "$PATH/base/";?>ui.all.css" rel="stylesheet" />   
<script type="text/javascript" src="<?php echo "$PATH/";?>jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/i18n/ui.datepicker-id.js"></script>
    
  <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggal").datepicker({
					dateFormat  : "dd MM yy",        
          changeMonth : true,
          changeYear  : true					
        });
      });
    </script>    

<script type="text/javascript"> 
function PRINT(){ 
win=window.open('hasil/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
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
  
<?php
  $sql="select `id_hasil` from `$tbhasil` order by `id_hasil` desc";
  $q=mysqli_query($conn, $sql);
  $jum=mysqli_num_rows($q);
  $th=date("y");
  $bl=date("m")+0;if($bl<10){$bl="0".$bl;}

  $kd="HSL".$th.$bl;//KEG1610001
  if($jum > 0){
   $d=mysqli_fetch_array($q);
   $idmax=$d["id_hasil"];
   
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
  $id_hasil=$idmax;
?>

<?php
if($_GET["pro"]=="ubah"){
	$id_hasil=$_GET["id"];
	$sql="select * from `$tbhasil` where `id_hasil`='$id_hasil'";
	$d=getField($conn,$sql);
				$id_hasil=$d["id_hasil"];
				$id_hasil0=$d["id_hasil"];
				$id_penilaian=$d["id_penilaian"];
				$id_pemohon=$d["id_pemohon"];
				$bobot=$d["bobot"];
				$hasil=$d["hasil"];
				$keterangan=$d["keterangan"];
				$status=$d["status"];
				$pro="ubah";		
}
?>

<div id="accordion">
  <h3>Input Data Hasil</h3>
  <div>
  
  <form action="" method="post" enctype="multipart/form-data">
<table width="385">

<tr>
<th width="87"><label for="id_hasil">ID HASIL</label>
<th width="13">:
<th width="269" colspan="2"><b><?php echo $id_hasil;?></b>
</tr>


<tr>
<td height="41"><label for="id_penilaian">Pilih penilaian</label>
<td>:
<td><label for="id_penilaian"></label>
  <select class="form-control" name="id_penilaian" id="id_penilaian">
    <option>Pilih</option>
    
     <?php
	  $s="select * from `tb_penilaian`";
	$q=getData($conn,$s);
		foreach($q as $d){							
				$id_penilaian0=$d["id_penilaian"];
				$nama_penilaian=$d["nama_penilaian"];
	echo"<option value='$id_penilaian0' ";if($id_penilaian0==$id_penilaian){echo"selected";} echo">$id_penilaian0 - $nama_penilaian  </option>";
	}
	?>
  </select></tr>

<tr>
<td height="41"><label for="id_pemohon">Pilih Pemohon</label>
<td>:
<td><label for="id_pemohon"></label>
  <select class="form-control" name="id_pemohon" id="id_pemohon">
    <option>Pilih</option>
    
     <?php
	  $s="select * from `tb_pemohon`";
	$q=getData($conn,$s);
		foreach($q as $d){							
				$id_pemohon0=$d["id_pemohon"];
				$nama_pemohon=$d["nama_pemohon"];
	echo"<option value='$id_pemohon0' ";if($id_pemohon0==$id_pemohon){echo"selected";} echo">$id_pemohon0 - $nama_pemohon  </option>";
	}
	?>
  </select></tr>

<tr>
<td height="48"><label for="bobot">Bobot</label>
<td>:
<td><input class="form-control" name="bobot" type="text" id="bobot" value="<?php echo $bobot;?>" size="30" />
</td>
</tr>

<tr>
<td height="45"><label for="hasil">Hasil</label>
<td>:<td colspan="2"><input class="form-control" name="hasil" type="text" id="keterangan" value="<?php echo $hasil;?>" size="25" />
</td>
</tr>

<tr>
<td height="46"><label for="keterangan">Keterangan</label>
<td>:<td colspan="2"><input class="form-control" name="keterangan" type="text" id="keterangan" value="<?php echo $keterangan;?>" size="15" /></td></tr>

<tr>
<td height="50"><label for="status">Status</label>
<td>:<td colspan="2"><input class="form-control" name="status" type="text" id="status" value="<?php echo $status;?>" size="25" />
</td>
</tr>

<tr>
<td height="51">
<td>
<td colspan="2">	<input class="btn btn-primary active" name="Simpan" type="submit" id="Simpan" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="id_hasil" type="hidden" id="id_hasil" value="<?php echo $id_hasil;?>" />
        <input name="id_hasil0" type="hidden" id="id_hasil0" value="<?php echo $id_hasil0;?>" />
        <a href="?mnu=hasil"><input class="btn btn-primary active" name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>
</div>
 <?php  
  $sqlq="select distinct(id_penilaian) from `$tbhasil` order by `id_hasil` desc";
  $jumq=getJum($conn,$sqlq);
		if($jumq <1){
			echo"<h1>Maaf data belum tersedia...</h1>";
			}								
	$arrq=getData($conn,$sqlq);
		foreach($arrq as $dq) {							
				$id_penilaian=$dq["id_penilaian"];

?> 
<h3> Data Hasil <?php echo getPenilaian($conn,$id_penilaian);?></h3>
  <div>
  
  
Data hasil: 
| <a href="hasil/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a> 
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>

  <table class="table table-bordered table-striped table-condensed cf">
  <thead>
  <tr>
    <th width="3%"><center>no</th>
    <th width="8%"><center>ID Hasil</th>
    <th width="13%"><center> Penilaian</th>
    <th width="13%"><center> Pemohon</th>
    <th width="13%"><center>Bobot</th>
    <th width="10%"><center>Hasil</th>
    <th width="21%"><center>Keterangan</th>
    <th width="8%"><center>Status</th>
    <th width="11%"><center>menu</th>
  </tr>
  </thead>
  <tbody>
<?php  
  $sql="select * from `$tbhasil` where id_penilaian='$id_penilaian' order by `id_hasil` desc";
  $jum=getJum($conn,$sql);
		if($jum > 0){
	//--------------------------------------------------------------------------------------------
	$batas   = 2;
	$page = $_GET['page'];
	if(empty($page)){$posawal  = 0;$page = 1;}
	else{$posawal = ($page-1) * $batas;}
	
	$sql2 = $sql." LIMIT $posawal,$batas";
	$no = $posawal+1;
	//--------------------------------------------------------------------------------------------									
	$arr=getData($conn,$sql2);
		foreach($arr as $d) {							
				$id_hasil=$d["id_hasil"];
				$id_pemohon=getPemohon($conn,$d["id_pemohon"]);
				$bobot=$d["bobot"];
				$hasil=$d["hasil"];
				$keterangan=$d["keterangan"];
				$status=$d["status"];
					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td>$id_hasil</td>
				<td>$id_penilaian</td>
				<td>$id_pemohon</td>
				<td>$bobot</td>
				<td>$hasil</td>
				<td>$keterangan</td>
				<td align='center'>$status</td>
				<td align='center'>
<a href='?mnu=hasil&pro=ubah&id=$id_hasil'><img src='ypathicon/u.png' alt='ubah'></a>
<a href='?mnu=hasil&pro=hapus&id=$id_hasil'><img src='ypathicon/h.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $nama pada data hasil ?..\")'></a></td>
				</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='9'><blink>Maaf, Data hasil belum tersedia...</blink></td></tr>";}
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
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=hasil'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=hasil'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=hasil'>Next »</a></span>";
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
	$id_hasil=strip_tags($_POST["id_hasil"]);
	$id_hasil0=strip_tags($_POST["id_hasil0"]);
	$id_penilaian=strip_tags($_POST["id_penilaian"]);
	$id_pemohon=strip_tags($_POST["id_pemohon"]);
	$bobot=strip_tags($_POST["bobot"]);
	$hasil=strip_tags($_POST["hasil"]);
	$keterangan=strip_tags($_POST["keterangan"]);
	$status=strip_tags($_POST["status"]);
	
if($pro=="simpan"){
$sql=" INSERT INTO `$tbhasil` (
`id_hasil` ,
`id_penilaian`,
`id_pemohon`,
`bobot`,
`hasil`,
`keterangan` ,
`status` 
) VALUES (
'$id_hasil',
'$id_penilaian',
'$id_pemohon', 
'$bobot', 
'$hasil',
'$keterangan',
'$status'
)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('Data $id_hasil berhasil disimpan !');document.location.href='?mnu=hasil';</script>";}
		else{echo"<script>alert('Data $id_hasil gagal disimpan...');document.location.href='?mnu=hasil';</script>";}
	}
	else{
$sql="update `$tbhasil` set 
`id_hasil`='$id_hasil',
`id_penilaian`='$id_penilaian' ,
`id_pemohon`='$id_pemohon',
`bobot`='$bobot',
`hasil`='$hasil',
`keterangan`='$keterangan',
`status`='$status' 
where `id_hasil`='$id_hasil0'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('Data $id_hasil berhasil diubah !');document.location.href='?mnu=hasil';</script>";}
	else{echo"<script>alert('Data $id_hasil gagal diubah...');document.location.href='?mnu=hasil';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$id_hasil=$_GET["id"];
$sql="delete from `$tbhasil` where `id_hasil`='$id_hasil'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('Data hasil $id_hasil berhasil dihapus !');document.location.href='?mnu=hasil';</script>";}
else{echo"<script>alert('Data hasil $id_hasil gagal dihapus...');document.location.href='?mnu=hasil';</script>";}
}
?>

