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
	
	
	$sql="select * from `$tbpenilaiandetail` where id_penilaian='$id_penilaian' ";
	$jum=getJum($conn,$sql);
		if($jum > 1){
			die("<script>document.location.href='index.php?mnu=fcmeans&id=$id_penilaian';</script>");
		}
	
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
  <h3>Info Data Penilaian</h3>
  <div>

<form action="" method="post" enctype="multipart/form-data">
<table width="519">


<tr>
<th width="117"><label for="id_penilaian">ID PENILAIAN</label>
<th width="12">:
<th width="240" colspan="2"><b><?php echo $id_penilaian;?></b>
</tr>


<tr>
<td height="32"><label for="nama_penilaian">Nama Penilaian</label>
<td>:
<td colspan="2"><?php echo $nama_penilaian;?></td>
</tr>

<tr>
<td height="35"><label for="tgl_penilaian">Tanggal Penilaian</label>
<td>:
<td colspan="2"><?php echo $tgl_penilaian;?></td>
</tr>
<tr>
<td height="30"><label for="deskripsi">Deskripsi</label>
<td>:<td colspan="2"><?php echo $deskripsi ." Cat: $keterangan";?>
</td>
</tr>

<tr>
<td height="32"><label for="status">status</label>
<td>:<td colspan="2"><?php echo $status;?></td></tr>


</table>
</form>


<hr />

<form action="" method="post" enctype="multipart/form-data">
<table class="table table-bordered table-striped table-condensed cf">
<thead>
  <tr>
    <th width="3%"><center>No</th>
    <th width="25%"><center>Nama Pemohon</th>
    <th width="15%"><center>Pekerjaan</th>
    <th width="15%"><center>Gaji</th>
    <th width="15%"><center>Tanggungan</th>
    <th width="15%"><center>Rumah</th>
    <th width="15%"><center>Harta</th>
    <th width="15%"><center>Menu</th>
  </tr>
  </thead>
  <tbody>
<?php  
$no=1;
  $sql="select * from `$tbpemohon` order by `nama_pemohon` asc";
	$arr=getData($conn,$sql);
		foreach($arr as $d) {							
				$id_pemohon=$d["id_pemohon"];
				$nama_pemohon=$d["nama_pemohon"];
				$jenis_kelamin=$d["jenis_kelamin"];
				$tlp=$d["tlp"];
				$email=$d["email"];
				$alamat=$d["alamat"];
				$no_kk=$d["no_kk"];
				$upload_kk=$d["upload_kk"];
				$upload_ktp=$d["upload_ktp"];
	
				$pekerjaan=$d["c1"];
				$gaji=$d["c2"];
				$tanggungan=$d["c3"];
				$rumah=$d["c4"];
				$harta=$d["c5"];
	

echo "<input type='hidden' name='idp$no' value='$id_pemohon'>";			
echo"<tr>
				<td>$no</td>
				<td>$nama_pemohon ($id_pemohon) $pekerjaan</td>
			
<td>";
echo"<select class='form-control'  name='c1$no' id='c1$no'>
  <option>Pilih</option>
  <option value='Buruh' "; if($pekerjaan=="Buruh"){echo"selected";} echo">Buruh</option>
  <option value='Wirausaha' "; if($pekerjaan=="Wirausaha"){echo"selected";} echo">Wirausaha</option>
  <option value='Wiraswasta' "; if($pekerjaan=="Wiraswasta"){echo"selected";} echo">Wiraswasta</option>
  <option value='Pemulung' "; if($pekerjaan=="Pemulung"){echo"selected";} echo">Pemulung</option>
  <option value='Tukang Batu' "; if($pekerjaan=="Tukang Batu"){echo"selected";} echo" >Tukang Batu</option>
  <option value='Pegawai Tetap' "; if($pekerjaan=="Pegawai Tetap"){echo"selected";} echo" >Pegawai Tetap</option>
  <option value='Tukang Ojek Pangkalan' "; if($pekerjaan=="Tukang Ojek Pangkalan"){echo"selected";} echo" >Tukang Ojek Pangkalan</option>
  <option value='Supir' "; if($pekerjaan=="Supir"){echo"selected";} echo" >Supir</option>
  <option value='Tidak Bekerja' "; if($pekerjaan=="Tidak Bekerja"){echo"selected";} echo">Tidak Bekerja</option>
</select>";

echo'<td>';
echo"<input class='form-control' name='c2$no' type='text' id='c2$no' value='$gaji' size='30' />";
echo'<td>';
echo"<input class='form-control' name='c3$no' type='text' id='c3$no' value='$tanggungan' size='30' />";
echo'<td>';
echo 
"
<input type='radio' name='c4$no' id='c4$no'  value='Rumah Sendiri' checked ";if($rumah=="Rumah Sendiri"){echo"checked";}  echo"/>Rumah Sendiri 
<br><input type='radio' name='c4$no' id='id$no' value='Mengontrak' ";if($rumah=="Mengontrak"){echo"checked";}  echo"/>Mengontrak";

echo'<td>';

echo "<input  type='radio' name='c5$no' id='c5$no'  value='Ada' checked ";if($harta=="Ada"){echo"checked";}  echo"/>
Ada
<br><input type='radio' name='c5$no' id='c5$no' value='Tidak Ada' ";if($harta=="Tidak Ada"){echo"checked";}  echo"/>Tidak Ada";

echo"<td valign='top' align='center'>
<input checked name='cek$no' type='checkbox' id='cek$no' value='1'/>";
echo'</tr>';
			
			$no++;
			}//while
	?>





<tr>
<td colspan="9">	
		<input class="btn btn-primary active" name="Simpan" type="submit" id="Simpan" value="Pilih" />
        <input name="no" type="hidden" id="no" value="<?php echo $no;?>" />
        <input name="id_penilaian" type="hidden" id="id_penilaian" value="<?php echo $id_penilaian;?>" />
         <a href="?mnu=penilaian_detail&kd=<?php echo $id_penilaian;?>"><input class="btn btn-primary active" name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>

</tbody>
</table>
</table>
</form>



</div>
<h3> Info Data Pegawai Pilihan Penilaian</h3>
  <div>

Info Data Pegawai Pilihan Penilaian: 
| <a href="penilaian_detail/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a> 
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>

<table class="table table-bordered table-striped table-condensed cf">
  <thead>
  <tr>
    <th width="3%"><center>No</th>
    <th width="25%"><center>Pemohon</th>
    <th width="15%"><center>Pekerjaan</th>
    <th width="10%"><center>Gaji</th>
    <th width="5%"><center>Tanggungan</th>
    <th width="15%"><center>Rumah</th>
    <th width="25%"><center>Harta</th>
    <th width="10%"><center>Menu</th>
  </tr>
  </thead>
  <tbody>
<?php  	
  $sql="select * from `$tbpenilaiandetail` where id_penilaian='$id_penilaian' order by `id` desc";
  $jum=getJum($conn,$sql);
		if($jum > 0){
			$no=1;
	$arr=getData($conn,$sql);
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
				<td align='left'>$c1</td>
				<td align='left'>".RP($c2)."</td>
				<td align='left'>$c3</td>
				<td align='left'>$c4</td>
				<td  align='left'>$c5</td>
				<td align='center'>
<a href='?mnu=penilaian_detail&kd=$id_penilaian&pro=hapus&id=$id'><img src='ypathicon/h.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $nama pada data penilaian_detail ?..\")'></a></td>
				</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='10'><blink>Maaf, Data penilaian_detail belum tersedia...</blink></td></tr>";}
?>
</tbody>
</table>
<div align="right">
<a href="?mnu=fcmeans&id=<?php echo $id_penilaian;?>" ><img src="ypathfile/next.jpg" width="100" height="65" title="Menuju Ke Proses Perhitunggan FCMeans "></a>
</div>
</div>
</div>

<?php
if(isset($_POST["Simpan"])){
	$no=strip_tags($_POST["no"]);
	$id_penilaian=strip_tags($_POST["id_penilaian"]);
	$ada=0;
	for($i=1;$i<=$no;$i++){
		if($_POST["cek$i"]==1){
			$ada++;
		$id_pemohon=strip_tags($_POST["idp$i"]);
		$c1=strip_tags($_POST["c1$i"]);
		$c2=strip_tags($_POST["c2$i"]);
		$c3=strip_tags($_POST["c3$i"]);
		$c4=strip_tags($_POST["c4$i"]);
		$c5=strip_tags($_POST["c5$i"]);
		
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
'',
''
)";
	
$simpan=process($conn,$sql);
		}
	}


echo "<script>alert('Data Sebanyak $ada berhasil disimpan !');document.location.href='?mnu=penilaian_detail&kd=$id_penilaian';</script>";

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

