<style type="text/css">body {width: 100%;} </style> 
<body OnLoad="window.print()" > 
<?php
include "../konmysqli.php";
echo"<link href='../ypathcss/$css' rel='stylesheet' type='text/css' />";
?>


<h3><center>Laporan data penilaian:</h3>
 

<table width="98%" border="0">
  <tr>
    <th width="5%"><center>no</td>
    <th width="10%"><center>id_penilaian</td>
    <th width="25%"><center>tgl_penilaian</td>
    <th width="25%"><center>nama_penilaian</td>
    <th width="20%"><center>deskripsi</td>
    <th width="10%"><center>status</td>
    <th width="5%"><center>keterangan</td>
  </tr>
<?php  
  $sql="select * from `$tbpenilaian` order by `id_penilaian` desc";
  $jum=getJum($conn,$sql);
  $no=0;
		if($jum > 0){
	$arr=getData($conn,$sql);
		foreach($arr as $d) {								
		$no++;
				$id_penilaian=$d["id_penilaian"];
				$tgl_penilaian=$d["tgl_penilaian"];
				$nama_penilaian=$d["nama_penilaian"];
				$deskripsi=$d["deskripsi"];
				$keterangan=$d["status"];
				$status=$d["keterangan"];
						
if($no %2==1){
echo"<tr bgcolor='#999999'>
				<td>$no</td>
				<td>$id_penilaian</td>
				<td>$tgl_penilaian</td>
				<td>$nama_penilaian</td>
				<td>$deskripsi</td>
				<td>$status</td>
				<td>$keterangan</td>
				</tr>";
				}//no==1
else if($no %2==0){
echo"<tr bgcolor='#cccccc'>
				<td>$no</td>
				<td>$id_penilaian</td>
				<td>$tgl_penilaian</td>
				<td>$nama_penilaian</td>
				<td>$deskripsi</td>
				<td>$status</td>
				<td>$keterangan</td>
				</tr>";
				}
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data penilaian belum tersedia...</blink></td></tr>";}
		
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

