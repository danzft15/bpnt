<style type="text/css">body {width: 100%;} </style> 
<body OnLoad="window.print()" OnFocus="window.close()"> 
<?php
include "../konmysqli.php";
echo"<link href='../ypathcss/$css' rel='stylesheet' type='text/css' />";
?>


<h3><center>Laporan data pemohon:</h3>
 

<table width="98%" border="0">
  <tr>
    <th width="5%"><center>no</td>
    <th width="10%"><center>id_pemohon</td>
    <th width="25%"><center>nama_pemohon</td>
    <th width="25%"><center>jenis_kelamin</td>
    <th width="10%"><center>tlp</td>
    <th width="5%"><center>email</td>
    <th width="5%"><center>alamat</td>
    <th width="5%"><center>no_kk</td>
  </tr>
<?php  
  $sql="select * from `$tbpemohon` order by `id_pemohon` desc";
  $jum=getJum($conn,$sql);
  $no=0;
		if($jum > 0){
	$arr=getData($conn,$sql);
		foreach($arr as $d) {								
		$no++;
				$id_pemohon=$d["id_pemohon"];
				$nama_pemohon=$d["nama_pemohon"];
				$jenis_kelamin=$d["jenis_kelamin"];
				$tlp=$d["tlp"];
				$email=$d["email"];
				$alamat=$d["alamat"];
				$no_kk=$d["no_kk"];
						
if($no %2==1){
echo"<tr bgcolor='#999999'>
				<td>$no</td>
				<td>$id_pemohon</td>
				<td>$nama_pemohon</td>
				<td>$jenis_kelamin</td>
				<td>$tlp</td>
				<td>$email</td>
				<td>$alamat</td>
				<td>$no_kk</td>
				</tr>";
				}//no==1
else if($no %2==0){
echo"<tr bgcolor='#cccccc'>
				<td>$no</td>
				<td>$id_pemohon</td>
				<td>$nama_pemohon</td>
				<td>$jenis_kelamin</td>
				<td>$tlp</td>
				<td>$email</td>
				<td>$alamat</td>
				<td>$no_kk</td>
				</tr>";
				}
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data pemohon belum tersedia...</blink></td></tr>";}
		
/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

function getJum($conn,$sql){
  $rs=$conn->query($sql);
  $jum= $rs->num_rows;
	$rs->free();
	return $jum;
}

function getData($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$arr = $rs->fetch_all(MYSQLI_ASSOC);
	
	$rs->free();
	return $arr;
}
		
?>

</table>

