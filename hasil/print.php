<style type="text/css">body {width: 100%;} </style> 
<body OnLoad="window.print()" > 
<?php
include "../konmysqli.php";
echo"<link href='../ypathcss/$css' rel='stylesheet' type='text/css' />";
?>


<h3><center>Laporan data hasil:</h3>
 

<table width="98%" border="0">
  <tr>
    <th width="5%"><center>no</td>
    <th width="10%"><center>id_hasil</td>
    <th width="25%"><center>id_pemohon</td>
    <th width="25%"><center>bobot</td>
    <th width="20%"><center>hasil</td>
    <th width="5%"><center>keterangan</td>
    <th width="10%"><center>status</td>
  </tr>
<?php  
  $sql="select * from `$tbhasil` order by `id_hasil` desc";
  $jum=getJum($conn,$sql);
  $no=0;
		if($jum > 0){
	$arr=getData($conn,$sql);
		foreach($arr as $d) {								
		$no++;
				$id_hasil=$d["id_hasil"];
				$id_pemohon=$d["id_pemohon"];
				$bobot=$d["bobot"];
				$hasil=$d["hasil"];
				$keterangan=$d["keterangan"];
				$status=$d["status"];
						
if($no %2==1){
echo"<tr bgcolor='#999999'>
				<td>$no</td>
				<td>$id_hasil</td>
				<td>$id_pemohon</td>
				<td>$bobot</td>
				<td>$hasil</td>
				<td>$keterangan</td>
				<td>$status</td>
				</tr>";
				}//no==1
else if($no %2==0){
echo"<tr bgcolor='#cccccc'>
				<td>$no</td>
				<td>$id_hasil</td>
				<td>$id_pemohon</td>
				<td>$bobot</td>
				<td>$hasil</td>
				<td>$keterangan</td>
				<td>$status</td>
				</tr>";
				}
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data hasil belum tersedia...</blink></td></tr>";}
		
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

