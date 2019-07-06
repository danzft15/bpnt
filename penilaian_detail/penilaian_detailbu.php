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
win=window.open('penilaian_detail/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status_detail=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>






<?php
	$id_penilaian=$_GET["kd"];
	$sql="select * from `$tbpenilaian` where `id_penilaian`='$id_penilaian'";
	$d=getField($conn,$sql);
				$id_penilaian=$d["id_penilaian"];
				$tgl_penilaian=WKT($d["tgl_penilaian"]);
				$nama_penilaian=$d["nama_penilaian"];
				$deskripsi=$d["deskripsi"];
				$status=$d["status"];
				$keterangan=$d["keterangan"];
			
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
<td height="35"><label for="tgl_penilaian">Tanggal Penilaian</label>
<td>:
<td colspan="2"><?php echo $tgl_penilaian;?></td>
</tr>

<tr>
<td height="32"><label for="nama_penilaian">Nama Penilaian</label>
<td>:
<td colspan="2"><?php echo $nama_penilaian;?></td>
</tr>

<tr>
<td height="30"><label for="deskripsi">Deskripsi</label>
<td>:<td colspan="2"><?php echo $deskripsi;?>
</td>
</tr>

<tr>
<td height="32"><label for="status">status</label>
<td>:<td colspan="2"><?php echo $status;?></td></tr>

<tr>
<td height="31"><label for="keterangan">Keterangan</label>
<td>:<td colspan="2"><?php echo $keterangan;?>
</td>
</tr>
</table>
</form>


<hr />
<?php
if($_GET["pro"]=="ubah"){
	$id=$_GET["id"];
	$sql="select * from `$tbpenilaiandetail` where `id`='$id'";
	$d=getField($conn,$sql);
				$id=$d["id"];
				$id=$d["id_penilaian"];
				$id_pemohon=$d["id_pemohon"];
				$c1=$d["c1"];
				$c2=$d["c2"];
				$c3=$d["c3"];
				$c4=$d["c4"];
				$c5=$d["c5"];
				$statusdetail=$d["status_detail"];
				$keterangan=$d["keterangan"];
				$pro="ubah";		
}
?>


<form action="" method="post" enctype="multipart/form-data">
<table width="470">



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
<td height="41"><label for="c1">Pekerjaan</label>
<td>:<td colspan="2"><select class="form-control"  name="c1" id="c1">
  <option>Pilih</option>
  <option value="Buruh" <?php if($c1=="Buruh"){echo"selected";}?>>Buruh</option>
  <option value="Wirausaha" <?php if($c1=="Wirausaha"){echo"selected";}?>>Wirausaha</option>
  <option value="Wiraswasta" <?php if($c1=="Wiraswasta"){echo"selected";}?>>Wiraswasta</option>
  <option value="Pemulung" <?php if($c1=="Pemulung"){echo"selected";}?>>Pemulung</option>
  <option value="Tukang Batu" <?php if($c1=="Tukang Batu"){echo"selected";}?>>Tukang Batu</option>
  <option value="Pegawai Tetap" <?php if($c1=="Pegawai Tetap"){echo"selected";}?>>Pegawai Tetap</option>
  <option value="Tukang Ojek Pangkalan" <?php if($c1=="Tukang Ojek Pangkalan"){echo"selected";}?>>Tukang Ojek Pangkalan</option>
  <option value="Supir" <?php if($c1=="Supir"){echo"selected";}?>>Supir</option>
  <option value="Tidak Bekerja" <?php if($c1=="Tidak Bekerja"){echo"selected";}?>>Tidak Bekerja</option>
</select></td>
</tr>

<tr>
<td height="41"><label for="c2">Gaji</label>
<td>:<td colspan="2"><input class="form-control" name="c2" type="text" id="c2" value="<?php echo $c2;?>" size="30" />
</td>
</tr>

<tr>
<td height="43"><label for="jumlah_tanggungan">Jumlah Tanggungan</label>
<td>:<td colspan="2"><input class="form-control" name="c3" type="text" id="c3" value="<?php echo $c3;?>" size="30" />
</td>
</tr>


<tr>
<td><label for="c4">Status Rumah</label>
<td>:<td colspan="2">
<input type="radio" name="c4" id="c4"  checked="checked" value="Rumah Sendiri" <?php if($c4=="Rumah Sendiri"){echo"checked";}?>/>Rumah Sendiri 
<input type="radio" name="c4" id="c4" value="Mengontrak" <?php if($c4=="Mengontrak"){echo"checked";}?>/>Mengontrak
</td></tr>

<tr>
<td height="37"><label for="jumlah_harta">Jumlah Harta</label>
<td>:<td colspan="2"><input class="form-control" name="c5" type="text" id="jumlah_harta" value="<?php echo $c5;?>" size="30" />
</td>
</tr>

<tr>
<td><label for="status_detail">Status Detail</label>
<td>:<td colspan="2">
<input type="radio" name="status_detail" id="status_detail"  checked="checked" value="Layak" <?php if($status_detail=="Layak"){echo"checked";}?>/>Layak 
<input type="radio" name="status_detail" id="status_detail" value="Tidak Layak" <?php if($status_detail=="Tidak Layak"){echo"checked";}?>/>Tidak Layak
</td></tr>


<tr>
<td height="53">
<td>
<td colspan="2">	<input class="btn btn-primary active" name="Simpan" type="submit" id="Simpan" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="id_penilaian" type="hidden" id="id_penilaian" value="<?php echo $id_penilaian;?>" />
        <input name="id0" type="hidden" id="id0" value="<?php echo $id0;?>" />
        <a href="?mnu=penilaian"><input class="btn btn-primary active" name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>
</div>
<h3> Data Penilaian Detail</h3>
  <div>

Data Penilaian Detail: 
| <a href="penilaian_detail/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a> 
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>

<table class="table table-bordered table-striped table-condensed cf">
  <thead>
  <tr>
    <th width="3%"><center>No</th>
    <th width="10%"><center> Pemohon</th>
    <th width="20%"><center>Pekerjaan</th>
    <th width="10%"><center>Gaji</th>
    <th width="10%"><center> Tanggungan</th>
    <th width="15%"><center>Status Rumah</th>
    <th width="15%"><center>Jumlah Harta</th>
    <th width="10%"><center>Status Detail</th>
    <th width="10%"><center>Menu</th>
  </tr>
  </thead>
  <tbody>
<?php  	
  $sql="select * from `$tbpenilaiandetail` where id_penilaian='$id_penilaian' order by `id` desc";
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
				$id=$d["id"];
				$id_penilaian=$d["id_penilaian"];
				$id_pemohon=getPemohon($conn,$d["id_pemohon"]);
				$c1=$d["c1"];
				$c2=$d["c2"];
				$c3=$d["c3"];
				$c4=$d["c4"];
				$c5=$d["c5"];
				$statusdetail=$d["status_detail"];
				$keterangan=$d["keterangan"];
					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td>$id_pemohon</td>
				<td align='center'>$c1</td>
				<td align='right'>".RP($c2)."</td>
				<td align='center'>$c3</td>
				<td align='center'>$c4</td>
				<td  align='right'>".RP($c5)."</td>
				<td align='center'>$statusdetail</td>
				<td align='center'>
<a href='?mnu=penilaian_detail&kd=$id_penilaian&pro=ubah&id=$id'><img src='ypathicon/ed.png' alt='ubah'></a>
<a href='?mnu=penilaian_detail&kd=$id_penilaian&pro=hapus&id=$id'><img src='ypathicon/hapus2.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $nama pada data penilaian_detail ?..\")'></a></td>
				</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='10'><blink>Maaf, Data penilaian_detail belum tersedia...</blink></td></tr>";}
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
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=penilaian_detail&kd=$id_penilaian'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=penilaian_detail&kd=$id_penilaian'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=penilaian_detail&kd=$id_penilaian'>Next »</a></span>";
	}
	else{ echo "<span class=disabled>Next »</span>";}
	echo "</div>";
	}//if jmldata

$jmldata = $jum;
	echo "<p align=center>Total Data <b>$jmldata</b> Item</p>";
?>
</div>
</div>

<?php
if(isset($_POST["Simpan"])){
	$pro=strip_tags($_POST["pro"]);
	$id=strip_tags($_POST["id"]);
	$id_penilaian=strip_tags($_POST["id_penilaian"]);
	$id_pemohon=strip_tags($_POST["id_pemohon"]);
	$c1=strip_tags($_POST["c1"]);
	$c2=strip_tags($_POST["c2"]);
	$c3=strip_tags($_POST["c3"]);
	$c4=strip_tags($_POST["c4"]);
	$c5=strip_tags($_POST["c5"]);
	$statusdetail=strip_tags($_POST["status_detail"]);
	$keterangan=strip_tags($_POST["keterangan"]);
	
if($pro=="simpan"){
$sql=" INSERT INTO `$tbpenilaiandetail`(
`id`,
`id_penilaian`,
`id_pemohon`,
`c1`,
`c2`,
`c3`,
`c4`,
`c5`, 
`status_detail`,
`keterangan` 
) VALUES (
'',
'$id_penilaian',
'$id_pemohon', 
'$c1', 
'$c2',
'$c3',
'$c4',
'$c5',
'$statusdetail',
'$keterangan'
)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('Data $id berhasil disimpan !');document.location.href='?mnu=penilaian_detail&kd=$id_penilaian';</script>";}
		else{echo"<script>alert('Data $id gagal disimpan...');document.location.href='?mnu=penilaian_detail&kd=$id_penilaian';</script>";}
	}
	else{
$sql="update `$tbpenilaiandetail` set 
`id_penilaian`='$id_penilaian',
`id_pemohon`='$id_pemohon',
`c1`='$c1' ,
`c2`='$c2' ,
`c3`='$c3' ,
`c4`='$c4' ,
`c5`='$c5' ,
`status_detail`='$statusdetail' ,
`keterangan`='$keterangan' 
where `id`='$id'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('Data $id berhasil diubah !');document.location.href='?mnu=penilaian_detail&kd=$id_penilaian';</script>";}
	else{echo"<script>alert('Data $id gagal diubah...');document.location.href='?mnu=penilaian_detail&kd=$id_penilaian';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$id=$_GET["id"];
$id_penilaian=$_GET["kd"];

$sql="delete from `$tbpenilaiandetail` where `id`='$id'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('Data penilaian_detail $id berhasil dihapus !');document.location.href='?mnu=penilaian_detail&kd=$id_penilaian';</script>";}
else{echo"<script>alert('Data penilaian_detail $id gagal dihapus...');document.location.href='?mnu=penilaian_detail&kd=$id_penilaian';</script>";}
}
?>

