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
	$id_pemohon=$_SESSION["cid"];
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
				
?>
<div id="accordion">
  <h3>Data Diri</h3>
  <div>

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
<td colspan="2"><?php echo $nama_pemohon;?></td>
</tr>
<tr>
<td><label for="jenis_kelamin">Jenis Kelamin</label>
<td>:<td colspan="2"><?php echo $jenis_kelamin;?>
</td></tr>

<tr>
<td height="38"><label for="tlp">Telepon</label>
<td>:<td colspan="2"><?php echo $tlp;?>
</td>
</tr>

<tr>
<td height="41"><label for="email">Email</label>
<td>:
<td><?php echo $email;?>
</tr>

<tr>
<td height="41" valign="top"><label for="alamat">Alamat</label>
<td valign="top">:
<td><?php echo $alamat;?>
</tr>

<tr>
<td height="43"><label for="no_kk">No KK</label>
<td>:
<td><?php echo $no_kk;?>
</tr>

<tr>
<td height="43"><label for="pekerjaan">Pekerjaan</label>
<td>:
<td><?php echo $pekerjaan;?>
</tr>

<tr>
<td height="43"><label for="gaji">Gaji</label>
<td>:
<td><?php echo $gaji;?>
</tr>

<tr>
<td height="43"><label for="tanggungan">Tanggungan</label>
<td>:
<td><?php echo $tanggungan;?>
</tr>
<tr>
<td><label for="rumah">Rumah</label>
<td>:<td colspan="2">
<?php echo $rumah;?>
</td></tr>


<tr>
<td><label for="harta">Harta</label>
<td>:<td colspan="2"><?php echo $harta;?>
</td></tr>


<tr>
<td height="41"><label for="username">Username</label>
<td>:
<td><?php echo $username;?>
</tr>


<tr>
<td height="48">
<td>
<td colspan="2">	
<a href="?mnu=updateprofil"><input class="btn btn-primary active" name="Batal" type="button" id="Batal" value="Update Data" /></a>
      
</td></tr>


</table>
</form>
</div>

</div>