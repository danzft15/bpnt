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
win=window.open('pemohon/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

<?php
  $sql="select `id_pemohon` from `$tbpemohon` order by `id_pemohon` desc";
  $q=mysqli_query($conn, $sql);
  $jum=mysqli_num_rows($q);
  $th=date("y");
  $bl=date("m")+0;if($bl<10){$bl="0".$bl;}

  $kd="PEM".$th.$bl;//KEG1610001
  if($jum > 0){
   $d=mysqli_fetch_array($q);
   $idmax=$d["id_pemohon"];
   
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
  $id_pemohon=$idmax;
?>

<?php
if($_GET["pro"]=="ubah"){
	$id_pemohon=$_GET["id"];
	$sql="select * from `$tbpemohon` where `id_pemohon`='$id_pemohon'";
	$d=getField($conn,$sql);
				$id_pemohon=$d["id_pemohon"];
				$nama_pemohon=$d["nama_pemohon"];
				$jenis_kelamin=$d["jenis_kelamin"];
				$tlp=$d["tlp"];
				$email=$d["email"];
				$alamat=$d["alamat"];
				$no_kk=$d["no_kk"];
				$pekerjaan=$d["c1"];
				$gaji=$d["c2"];
				$tanggungan=$d["c3"];
				$rumah=$d["c4"];
				$harta=$d["c5"];
				$username=$d["username"];
				$password=$d["password"];
				$pro="ubah";		
}
?>
<div id="accordion">
  <h3>Input Data Pemohon</h3>
  <div>


  <!-- <form name="import_export_form" method="post" action="" enctype="multipart/form-data">
    <label>Select Excel File : </label><input type="file" name="excelfile"/><br>
    <input type="submit" name="form_submit"/>
    </form>
	
	<hr> -->
<form action="" method="post" enctype="multipart/form-data">
<table width="464">


<tr>
<td width="149">ID Pemohon
<th width="10">:
<td width="430" colspan="2"><b><?php echo $id_pemohon;?></b>
</tr>

<tr>
<td height="47"><label for="nama_pemohon">Nama Pemohon</label>
<td>:
<td colspan="2"><input class="form-control" name="nama_pemohon" type="text" id="nama_pemohon" value="<?php echo $nama_pemohon;?>" size="30" /></td>
</tr>
<tr>
<td><label for="jenis_kelamin">Jenis Kelamin</label>
<td>:<td colspan="2">
<input type="radio" name="jenis_kelamin" id="jenis_kelamin"  checked="checked" value="Laki-Laki" <?php if($jenis_kelamin=="Laki-Laki"){echo"checked";}?>/>	Laki-Laki 
<input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Perempuan" <?php if($jenis_kelamin=="Perempuan"){echo"checked";}?>/>	Perempuan
</td></tr>

<tr>
<td height="38"><label for="tlp">Telepon</label>
<td>:<td colspan="2"><input class="form-control" name="tlp" type="text" id="tlp" value="<?php echo $tlp;?>" size="30" />
</td>
</tr>

<tr>
<td height="41"><label for="email">Email</label>
<td>:
<td><input class="form-control" name="email" type="text" id="email" value="<?php echo $email;?>" size="30" />
</tr>

<tr>
<td height="41" valign="top"><label for="alamat">Alamat</label>
<td valign="top">:
<td><textarea name="alamat" cols="30" rows="3" class="form-control" id="alamat"><?php echo $alamat;?></textarea>
</tr>

<tr>
<td height="43"><label for="no_kk">No KK</label>
<td>:
<td><input class="form-control" name="no_kk" type="text" id="no_kk" value="<?php echo $no_kk;?>" size="30" />
</tr>

<tr>
<td height="43"><label for="pekerjaan">Pekerjaan</label>
<td>:
<td><select class='form-control'  name='c1' id='c1'>
  <option>Pilih</option>
  <option value='Buruh' <?php if($pekerjaan=="Buruh"){echo"selected";}?>>Buruh</option>
  <option value='Wirausaha'<?php if($pekerjaan=="Wirausaha"){echo"selected";}?>>Wirausaha</option>
  <option value='Wiraswasta'<?php if($pekerjaan=="Wiraswasta"){echo"selected";}?>>Wiraswasta</option>
  <option value='Pemulung'<?php if($pekerjaan=="Pemulung"){echo"selected";}?>>Pemulung</option>
  <option value='Tukang Batu'<?php if($pekerjaan=="Tukang Batu"){echo"selected";}?> >Tukang Batu</option>
  <option value='Pegawai Tetap'<?php if($pekerjaan=="Pegawai Tetap"){echo"selected";}?> >Pegawai Tetap</option>
  <option value='Tukang Ojek Pangkalan'<?php if($pekerjaan=="Tukang Ojek Pangkalan"){echo"selected";}?> >Tukang Ojek Pangkalan</option>
  <option value='Supir'<?php if($pekerjaan=="Supir"){echo"selected";}?> >Supir</option>
  <option value='Tidak Bekerja'<?php if($pekerjaan=="Tidak Bekerja"){echo"selected";}?>>Tidak Bekerja</option>
</select>
</tr>

<tr>
<td height="43"><label for="gaji">Gaji</label>
<td>:
<td><input class="form-control" name="c2" type="text" id="c2" value="<?php echo $gaji;?>" size="30" />
</tr>

<tr>
<td height="43"><label for="tanggungan">Tanggungan</label>
<td>:
<td><input class="form-control" name="c3" type="text" id="c3" value="<?php echo $tanggungan;?>" size="30" />
</tr>
<tr>
<td><label for="rumah">Rumah</label>
<td>:<td colspan="2">
<input type="radio" name="c4" id="c4"  checked="checked" value="Mengontrak" <?php if($rumah=="Mengontrak"){echo"checked";}?>/>	Mengontrak
<input type="radio" name="c4" id="c4" value="Rumah Sendiri" <?php if($rumah=="Rumah Sendiri"){echo"checked";}?>/>	Rumah Sendiri
</td></tr>


<tr>
<td><label for="harta">Harta</label>
<td>:<td colspan="2">
<input type="radio" name="c5" id="c5"  checked="checked" value="Ada" <?php if($harta=="Ada"){echo"checked";}?>/>	Ada
<input type="radio" name="c5" id="c5" value="Tidak Ada" <?php if($harta=="Tidak Ada"){echo"checked";}?>/>	Tidak Ada
</td></tr>


<tr>
<td height="41"><label for="username">Username</label>
<td>:
<td><input class="form-control" name="username" type="text" id="username" value="<?php echo $username;?>" size="30" />
</tr>

<tr>
<td height="41"><label for="password">Password</label>
<td>:
<td><input class="form-control" name="password" type="password" id="password" value="<?php echo $password;?>" size="30" />
</tr>

<tr>
<td height="48">
<td>
<td colspan="2">	<input class="btn btn-primary active" name="Simpan" type="submit" id="Simpan" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="id_pemohon" type="hidden" id="id_pemohon" value="<?php echo $id_pemohon;?>" />
        <a href="?mnu=pemohon"><input class="btn btn-primary active" name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>


</table>
</form>
</div>
<h3> Data Pemohon</h3>
  <div>

Data pemohon: 
| <a href="pemohon/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a> 
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>

<table class="table table-bordered table-striped table-condensed cf">
<thead>
  <tr>
    <th width="3%"><center>No</th>
    <th width="30%"><center>Nama Pemohon</th>
    <th width="30%"><center>Alamat</th>
    <th width="15%"><center>No KK</th>
    <th width="10%"><center>Menu</th>
  </tr>
  </thead>
  <tbody>
<?php  
  $sql="select * from `$tbpemohon` order by `id_pemohon` desc";
  $jum=getJum($conn,$sql);
		if($jum > 0){
	//--------------------------------------------------------------------------------------------
	$batas   = 30;
	$page = $_GET['page'];
	if(empty($page)){$posawal  = 0;$page = 1;}
	else{$posawal = ($page-1) * $batas;}
	
	$sql2 = $sql." LIMIT $posawal,$batas";
	$no = $posawal+1;
	//--------------------------------------------------------------------------------------------									
	$arr=getData($conn,$sql2);
		foreach($arr as $d) {							
				$id_pemohon=$d["id_pemohon"];
				$nama_pemohon=$d["nama_pemohon"];
				$jenis_kelamin=$d["jenis_kelamin"];
				$tlp=$d["tlp"];
				$email=$d["email"];
				$alamat=$d["alamat"];
				$no_kk=$d["no_kk"];
				$c1=$d["c1"];
				$c2=$d["c2"];
				$c3=$d["c3"];
				$c4=$d["c4"];
				$c5=$d["c5"];
				$username=$d["username"];
				$password=$d["password"];
				
				
echo"<tr>
				<td>$no</td>
				<td>$nama_pemohon ($id_pemohon)<br>
				Jenis Kelamin : $jenis_kelamin<br>
				Params : $c1#$c2#$c3#$c4#$c5
				</td>
				<td>$alamat , tlp .$tlp  - $email</td>
				<td>$no_kk</td>
				
				<td align='center'>
<a href='?mnu=pemohon&pro=ubah&id=$id_pemohon'><img src='ypathicon/ed.png' alt='ubah'></a>
<a href='?mnu=pemohon&pro=hapus&id=$id_pemohon'><img src='ypathicon/delete.png' alt='hap
thicojenis_kelamin='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $nama_pemohon pada data pemohon ?..\")'></a></t
thicoalamat='hap
thicono_kk='hapd>
				</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='9'><blink>Maaf, Data pemohon belum tersedia...</blink></td></tr>";}
?>
</tbody>
</table>

<?php
//Langkah 3: Hitung total data dan page 
$jmldata = $jum;
if($jmldata>0){
	if($batas<1){$batas=30;}
	$jmlhal  = ceil($jmldata/$batas);
	echo "<div class=paging>";
	if($page > 1){
		$prev=$page-1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=pemohon'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=pemohon'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=pemohon'>Next »</a></span>";
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
	$id_pemohon=strip_tags($_POST["id_pemohon"]);
	$nama_pemohon=strip_tags($_POST["nama_pemohon"]);
	$jenis_kelamin=strip_tags($_POST["jenis_kelamin"]);
	$tlp=strip_tags($_POST["tlp"]);
	$email=strip_tags($_POST["email"]);
	$alamat=strip_tags($_POST["alamat"]);
	$no_kk=strip_tags($_POST["no_kk"]);
	$pekerjaan=strip_tags($_POST["c1"]);
	$gaji=strip_tags($_POST["c2"]);
	$tanggungan=strip_tags($_POST["c3"]);
	$rumah=strip_tags($_POST["c4"]);
	$harta=strip_tags($_POST["c5"]);
	$username=strip_tags($_POST["username"]);
	$password=strip_tags($_POST["password"]);

if($pro=="simpan"){
$sql=" INSERT INTO `$tbpemohon` (
`id_pemohon` ,
`nama_pemohon` ,
`jenis_kelamin` ,
`tlp` ,
`email` ,
`alamat`,
`no_kk`,
`c1`,
`c2`,
`c3`,
`c4`,
`c5`,
`username`,
`password`
) VALUES (
'$id_pemohon',
'$nama_pemohon', 
'$jenis_kelamin', 
'$tlp',
'$email',
'$alamat',
'$no_kk',
'$pekerjaan',
'$gaji',
'$tanggungan',
'$rumah',
'$harta',
'$username',
'$password'
)";
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('Data $id_pemohon berhasil disimpan !');document.location.href='?mnu=pemohon';</script>";}
		else{echo"<script>alert('Data $id_pemohon gagal disimpan...');document.location.href='?mnu=pemohon';</script>";}
	}
	else{
$sql="update `$tbpemohon` set 
`nama_pemohon`='$nama_pemohon',
`jenis_kelamin`='$jenis_kelamin',
`tlp`='$tlp',
`email`='$email',
`alamat`='$alamat',
`no_kk`='$no_kk',
`c1`='$pekerjaan',
`c2`='$gaji',
`c3`='$tanggungan',
`c4`='$rumah',
`c5`='$harta',
`username`='$username',
`password`='$password'
where `id_pemohon`='$id_pemohon'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('Data $id_pemohon berhasil diubah !');document.location.href='?mnu=pemohon';</script>";}
	else{echo"<script>alert('Data $id_pemohon gagal diubah...');document.location.href='?mnu=pemohon';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$id_pemohon=$_GET["id"];
$sql="delete from `$tbpemohon` where `id_pemohon`='$id_pemohon'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('Data pemohon $id_pemohon berhasil dihapus !');document.location.href='?mnu=pemohon';</script>";}
else{echo"<script>alert('Data pemohon $id_pemohon gagal dihapus...');document.location.href='?mnu=pemohon';</script>";}
}
?>



<!-- <?php
 if(isset($_POST['form_submit'])){
		require_once 'Excel/reader.php';
		$data = new Spreadsheet_Excel_Reader();
		$data->setOutputEncoding('CP1251');
		$filename = $_FILES['excelfile']['tmp_name'];
		$data->read($filename);//'Book1.xls');
			 
			 $ada=0;
		for ($x = 2; $x <= count($data->sheets[0]["cells"]); $x++) {
			$ada++;
			
	
 $sql="select `id_pemohon` from `$tbpemohon` order by `id_pemohon` desc";
  $q=mysqli_query($conn, $sql);
  $jum=mysqli_num_rows($q);
  $th=date("y");
  $bl=date("m")+0;if($bl<10){$bl="0".$bl;}

  $kd="PEM".$th.$bl;//KEG1610001
  if($jum > 0){
   $d=mysqli_fetch_array($q);
   $idmax=$d["id_pemohon"];
   
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
  $id_pemohon=$idmax;
  
  
			$nama_pemohon = $data->sheets[0]["cells"][$x][1];
			$jenis_kelamin = $data->sheets[0]["cells"][$x][2];
			$tlp = $data->sheets[0]["cells"][$x][3];
			
			$email = $data->sheets[0]["cells"][$x][4];
			$alamat = $data->sheets[0]["cells"][$x][5];
			$no_kk = $data->sheets[0]["cells"][$x][6];
			$c1 = $data->sheets[0]["cells"][$x][7];
			
			$c2= $data->sheets[0]["cells"][$x][8];
			$c3= $data->sheets[0]["cells"][$x][9];
			$c4= $data->sheets[0]["cells"][$x][10];
			
			$c5= $data->sheets[0]["cells"][$x][11];
			
			
			$username= "";
			$password= "";
			
		echo $sql="INSERT INTO `tb_pemohon`(
`id_pemohon`, 
`nama_pemohon`,
`jenis_kelamin`, 
`tlp`, 
`email`, 
`alamat`,
`no_kk`, 
`c1`,
`c2,
`c3`,
`c4`,
`c5`,
`username`,
`password`
) VALUES (
'$id_pemohon', 
'$nama_pemohon',
'$jenis_kelamin', 
'$tlp',
'$email',
'$alamat',
'$no_kk',
'$pekerjaan',
'$gaji',
'$tanggungan',
'$rumah',
'$harta',
'$username',
'$password'
)";
	
$simpan=process($conn,$sql);
		
		}
 echo"<script>alert('Import data sebanyak $ada berhasil...');document.location.href='?mnu=pemohon';</script>";
 
 }
?> -->