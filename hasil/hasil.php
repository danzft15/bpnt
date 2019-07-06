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
  
<div id="accordion">
 
 <?php  
  $sqlq="select distinct(id_penilaian) from `$tbhasil` order by `id_penilaian` desc";
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
  

<?php
	$sql="select * from `$tbpenilaian` where `id_penilaian`='$id_penilaian'";
	$d=getField($conn,$sql);
				$id_penilaian=$d["id_penilaian"];
				$tgl_penilaian=WKT($d["tgl_penilaian"]);
				$nama_penilaian=$d["nama_penilaian"];
				$deskripsi=$d["deskripsi"];
				$status=$d["status"];
				$keterangan=$d["keterangan"];
			
?>

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
<td height="32"><label for="status">Status</label>
<td>:<td colspan="2"><?php echo $status;?></td></tr>


</table>

Data Hasil: 
| <a href="hasil/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a> 
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |

  <table class="table table-bordered table-striped table-condensed cf">
  <thead>
  <tr>
    <th width="3%"><center>NO</th>
	<th width="80%"><center>Proses Penilaian</th>
    <th width="15%"><center>Hasil</th>
  </tr>
  </thead>
<?php  
  $sql="select * from `$tbhasil` where id_penilaian='$id_penilaian' order by `id_hasil` desc";
  $jum=getJum($conn,$sql);
  if($jum>0){
  $no=1;
		$arr=getData($conn,$sql);
		foreach($arr as $d) {							
				$id_hasil=$d["id_hasil"];
				$idp=$d["id_pemohon"];
				$pemohon=strtoupper(getPemohon($conn,$d["id_pemohon"]));
				$bobot=$d["bobot"];
				$hasil=$d["hasil"];
				$keterangan=$d["keterangan"];
				$status=$d["status"];
					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td>$pemohon ($idp) |status: $status
				<br>$keterangan #Bobot: $bobot</td>
				<td>$hasil</td>
				</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='9'><blink>Maaf, Data Penilaian $id_penilaian  belum tersedia...</blink></td></tr>";}
?>
</table>

</div>
<?php
}
?>
</div>