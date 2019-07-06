

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
	$id_penilaian=$_GET["id"];
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
				$idp=$d["id_pemohon"];
				$nm_pemohon=getPemohon($conn,$idp);
				$c1=$d["c1"];
				$c2=$d["c2"];
				$c3=$d["c3"];
				$c4=$d["c4"];
				$c5=$d["c5"];
				$statusdetail=$d["status_detail"];
				$keterangan=$d["keterangan"];
				
				$i=$no-1;
					$arnik[$i]=$idp;
					$arnama[$i]=$nm_pemohon;
					$arsv1[$i]=$c1;
					$arsv2[$i]=$c2;
					$arsv3[$i]=$c3;
					$arsv4[$i]=$c4;
					$arsv5[$i]=$c5;
					
					$arv1[$i]=getV1($c1);
					$arv2[$i]=getV2($c2);
					$arv3[$i]=getV3($c3);
					$arv4[$i]=getV4($c4);
					$arv5[$i]=getV5($c5);
					
					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td>$nm_pemohon</td>
				<td align='left'>$c1</td>
				<td align='left'>".RP($c2)."</td>
				<td align='left'>$c3</td>
				<td align='left'>$c4</td>
				<td  align='left'>$c5</td>
				<td align='center'>
<a href='?mnu=fcmeans&kd=$id_penilaian&pro=hapus&id=$id'><img src='ypathicon/h.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $id_pemohon pada data penilaian_detail ?..\")'></a></td>
				</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='10'><blink>Maaf, Data penilaian_detail belum tersedia...</blink></td></tr>";}
?>
</tbody>
</table>
		
</div>

<?php
$jd=$i+1;
$gab="<h3> Normalisasi Data Pegawai Pilihan Penilaian</h3>
  <div>
Normalisasi Data Pegawai Pilihan Penilaian: 

<table class='table table-bordered table-striped table-condensed cf'>
  <thead>
  <tr>
    <th width='3%'><center>No</th>
    <th width='25%'><center>Pemohon</th>
    <th width='15%'><center>Pekerjaan</th>
    <th width='10%'><center>Gaji</th>
    <th width='5%'><center>Tanggungan</th>
    <th width='15%'><center>Rumah</th>
    <th width='25%'><center>Harta</th>
    <th width='10%'><center>Menu</th>
  </tr>
  </thead>
  <tbody>";

for($i=0;$i<$jd;$i++){
	$no=$i+1;
	$gab.="<tr><td>$no<td>$arnama[$i]<td>$arsv1[$i]<td>$arsv3[$i]<td>$arsv4[$i]<td>$arsv5[$i]<td>$arsv5[$i]</tr>";
}
$gab.="</table>";

$gab.="</div>";
echo $gab;

?>















</div>

		
<?php
$jumw=$i;
$iterasi=10;

	$tot11=0;
	$tot12=0;
	$tot13=0;
	$tot21=0;
	$tot22=0;
	$tot23=0;
	$tot31=0;
	$tot32=0;
	$tot33=0;
	$tot41=0;
	$tot42=0;
	$tot43=0;
	$tot51=0;
	$tot52=0;
	$tot53=0;
	
	$t11=0;
	$t12=0;
	$t13=0;
	$t21=0;
	$t22=0;
	$t23=0;
	$t31=0;
	$t32=0;
	$t33=0;
	$t41=0;
	$t42=0;
	$t43=0;
	$t51=0;
	$t52=0;
	$t53=0;
	
	$gindex1="";
	$gindex2="";
	$gindex3="";
	$gindex4="";
	$gindex5="";
	
	$jumw=5;
	
for($i=0;$i<$iterasi;$i++){
	$ke=$i+1;
	$gab="<h2><a href='#'>Proses FCMEANS Iterasi ke $ke</a></h2><div>";
	$gab.="<strong>Pembentukan Centroid iterasi ke $ke</strong><br>";
	$nr="";
	$r1=0;
	$r2=1;
	$r3=2;
	$r4=3;
	$r5=4;
	
	if($i==0){
		$r1=rand(0,$jumw-1);
		$r2=rand(0,$jumw-1);
		while($r2==$r1){
			$r2=rand(0,$jumw-1);
		}

		while($r3==$r1||$r3==$r2){
			$r3=rand(0,$jumw-1);
		}

		while($r4==$r1||$r4==$r2||$r4==$r3){
			$r4=rand(0,$jumw-1);
		}

		while($r5==$r1||$r5==$r2||$r5==$r3||$r5==$r4){
			$r5=rand(0,$jumw-1);
		}
		
		
		$C11=$arv1[$r1];
		$C12=$arv2[$r1];
		$C13=$arv3[$r1];
		$C14=$arv4[$r1];
		$C15=$arv5[$r1];

		$C21=$arv1[$r2];
		$C22=$arv2[$r2];
		$C23=$arv3[$r2];
		$C24=$arv4[$r2];
		$C25=$arv5[$r2];
		
		$C31=$arv1[$r3];
		$C32=$arv2[$r3];
		$C33=$arv3[$r3];
		$C34=$arv4[$r3];
		$C35=$arv5[$r3];
		
		$C41=$arv1[$r4];
		$C42=$arv2[$r4];
		$C43=$arv3[$r4];
		$C44=$arv4[$r4];
		$C45=$arv5[$r4];
		
		$nr.="	  v11 =$C11 |v12 =$C12 |v13 =$C13 | v13 =$C14 | v15 =$C15 | (index ke $r1)";
		$nr.="<br>v21 =$C21 |v22 =$C22 |v23 =$C23 | v24 =$C24 | v25 =$C25 | (index ke $r2)";
		$nr.="<br>v31 =$C31 |v32 =$C32 |v33 =$C33 | v34 =$C34 | v35 =$C35 | (index ke $r3)";
		$nr.="<br>v41 =$C41 |v42 =$C42 |v43 =$C43 | v44 =$C44 | v45 =$C45 | (index ke $r4)";
		
		}
	else{
		$C11=$tot11/$t11;
		$C12=$tot12/$t12;
		$C13=$tot13/$t13;
		$C14=$tot14/$t14;
		$C15=$tot15/$t15;
		
		$C21=$tot21/$t21;
		$C22=$tot22/$t22;
		$C23=$tot23/$t23;
		$C24=$tot24/$t24;
		$C25=$tot25/$t25;
		
		$C31=$tot31/$t31;
		$C32=$tot32/$t32;
		$C33=$tot33/$t33;
		$C34=$tot34/$t34;
		$C35=$tot35/$t35;
		
		$C41=$tot41/$t41;
		$C42=$tot42/$t42;
		$C43=$tot43/$t43;
		$C44=$tot44/$t44;
		$C45=$tot45/$t45;
		//=============
		
		$C11S="$tot11/$t11";
		$C12S="$tot12/$t12";
		$C13S="$tot13/$t13";
		$C14S="$tot14/$t14";
		$C15S="$tot15/$t15";
		
		$C21S="$tot21/$t21";
		$C22S="$tot22/$t22";
		$C23S="$tot23/$t23";
		$C24S="$tot24/$t24";
		$C25S="$tot25/$t25";
		
		$C31S="$tot31/$t31";
		$C32S="$tot32/$t32";
		$C33S="$tot33/$t33";
		$C34S="$tot34/$t34";
		$C35S="$tot35/$t35";
		
		$C41S="$tot41/$t41";
		$C42S="$tot42/$t42";
		$C43S="$tot43/$t43";
		$C44S="$tot44/$t44";
		$C45S="$tot45/$t45";

	
//==========================	
		$nr.="v11=$C11S =$C11 |v12=$C12S =$C12 |v13=$C13S =$C13 |v14=$C14S =$C14 |v15=$C15S =$C15 | (index ke $gindex1)";
		$nr.="<br>v21=$C21S =$C21 |v22=$C22S =$C22 |v23=$C23S =$C23   |v24=$C24S =$C24   |v25=$C25S =$C25  | (index ke $gindex2)";
		$nr.="<br>v31=$C31S =$C31 |v32=$C32S =$C32 |v33=$C33S =$C33  | v34=$C34S =$C34  | v35=$C35S =$C35  | (index ke $gindex3)";
		$nr.="<br>v41=$C41S =$C41 |v42=$C42S =$C42 |v43=$C43S =$C43  | v44=$C44S =$C44  | v45=$C45S =$C45  | (index ke $gindex4)";
	}
	$gab.="$nr<br>";
	$gab.="<h1 class='container'>Iterasi ke $ke</h1>
    <table class='table table-bordered table-striped  table-hover container'>";  	
	$gab.="<tr><th>No<th>Nik<th>Nama<th>V1<th>V2<th>V3<th>V4<th>V5<th>C1<th>C2<th>C3<th>C4<th>MIN<th>C</tr>";
	
	$tot11=0;
	$tot12=0;
	$tot13=0;
	$tot21=0;
	$tot22=0;
	$tot23=0;
	$tot31=0;
	$tot32=0;
	$tot33=0;
	$tot41=0;
	$tot42=0;
	$tot43=0;
	$tot51=0;
	$tot52=0;
	$tot53=0;
	
	$t11=0;
	$t12=0;
	$t13=0;
	$t21=0;
	$t22=0;
	$t23=0;
	$t31=0;
	$t32=0;
	$t33=0;
	$t41=0;
	$t42=0;
	$t43=0;
	$t51=0;
	$t52=0;
	$t53=0;
	
	$gindex1="";
	$gindex2="";
	$gindex3="";
	$gindex4="";
	$gindex5="";
	
	$gabs="<table>";
	$gabs.="<tr><th>No<th>Pegawai<th>C1<th>C2<th>C3<th>C4<th>C5<th></tr>";
	for($j=0;$j<$jd;$j++){
			$no=$j+1;
			$nik=$arnik[$j];
			$nama=$arnama[$j];
			$v1=$arv1[$j];
			$v2=$arv2[$j];
			$v3=$arv3[$j];
			$v4=$arv4[$j];
			$v5=$arv5[$j];
			
			
			$jarak1=sqrt(pow(($v1-$C11),2)+pow(($v2-$C12),2)+pow(($v3-$C13),2)+pow(($v4-$C14),2)+pow(($v5-$C15),2));
			$jarak2=sqrt(pow(($v1-$C21),2)+pow(($v2-$C22),2)+pow(($v3-$C23),2)+pow(($v4-$C24),2)+pow(($v5-$C25),2));
			$jarak3=sqrt(pow(($v1-$C31),2)+pow(($v2-$C32),2)+pow(($v3-$C33),2)+pow(($v4-$C34),2)+pow(($v5-$C35),2));
			$jarak4=sqrt(pow(($v1-$C41),2)+pow(($v2-$C42),2)+pow(($v3-$C43),2)+pow(($v4-$C44),2)+pow(($v5-$C45),2));
			
			$jarak1=round($jarak1,2);
			$jarak2=round($jarak2,2);
			$jarak3=round($jarak3,2);
			$jarak4=round($jarak4,2);
			
			$c="?";
			$min="?";
			if($jarak1<=$jarak2 && $jarak1<=$jarak3 && $jarak1<=$jarak4 ){
				$min=$jarak1;
				$c=1;
				$gindex1.="$j,";
				$t11++;
				$t12++;
				$t13++;
				$t14++;
				$t15++;
				
				$tot11+=$v1;
				$tot12+=$v2;
				$tot13+=$v3;
				$tot14+=$v4;
				$tot15+=$v5;
			
			}		
			else if($jarak2<=$jarak1 && $jarak2<=$jarak3 && $jarak2<=$jarak4 ){
				$min=$jarak2;
				$c=2;
				$gindex2.="$j,";

				$t21++;
				$t22++;
				$t23++;
				$t24++;
				$t25++;
				
				$tot21+=$v1;
				$tot22+=$v2;
				$tot23+=$v3;
				$tot24+=$v4;
				$tot25+=$v5;
				
		}	
			else if($jarak3<=$jarak2 && $jarak3<=$jarak1 && $jarak3<=$jarak4 ){
				$min=$jarak3;
				$c=3;
				$gindex3.="$j,";
				
				$t31++;
				$t32++;
				$t33++;
				$t34++;
				$t35++;
				$tot31+=$v1;
				$tot32+=$v2;
				$tot33+=$v3;
				$tot34+=$v4;
				$tot35+=$v5;
			}	
			else if($jarak4<=$jarak2 && $jarak4<=$jarak3 && $jarak4<=$jarak1 ){
				$min=$jarak4;
				$c=4;
				$gindex4.="$j,";
				
				$t41++;
				$t42++;
				$t43++;
				$t44++;
				$t45++;
				$tot41+=$v1;
				$tot42+=$v2;
				$tot43+=$v3;
				$tot44+=$v4;
				$tot45+=$v5;
			}	

			$gab.="<tr><td>$no<td>$nik<td>$nama<td>$v1<td>$v2<td>$v3<td>$v4<td>$v5<td>$jarak1<td>$jarak2<td>$jarak3<td>$jarak4<td>$min<td>$c</tr>";
			$gabs.="<tr><td>$no<td>$nik<td>$jarak1<td>$jarak2<td>$jarak3<td>$jarak4</tr>";
			
			$arHnik[$j]=$nik;
			$arHrekap[$j]="$jarak1#$jarak2#$jarak3#$jarak4";
			$arHmin[$j]=$min;
			$arHcluster[$j]=$c;
	}//j
	$gabs.="</table>";
	$arG[$i]=$gabs;
	
	$gab.="</table>";
	$gab.="</div>";
	
	echo $gabs;
	echo $gab;
	
	if($i>0 && $arG[$i]==$arG[$i-1]){
			echo"<h2><a href='#'>Berhenti di iterasi ke-$ke</a></h2><div>";
			echo"<h1>Berhenti di iterasi ke-$ke</h1>";
			echo"Posisi Jenuh :";
			echo $arG[$i];
			echo"</div>";
			break;
		}

}//for i	

for($j=0;$j<$jd;$j++){
			$nik=$arHnik[$j];
			$rekap=$arHrekap[$j];
			$min=$arHmin[$j];
			$cluster=$arHcluster[$j];
			$sql="update data_kemiskinan set rekapitulasi='$rekap',minimum='$min',cluster='$cluster' where nik='$nik'";
	processc($conn,$sql);	
}		
//

	$sql="select cluster from `data_kemiskinan` where `cluster`='1'";
	$jum1=getJumc($conn,$sql);

		$sql="select cluster from `data_kemiskinan` where `cluster`='2'";
	$jum2=getJumc($conn,$sql);
	
		$sql="select cluster from `data_kemiskinan` where `cluster`='3'";
	$jum3=getJumc($conn,$sql);
	
		$sql="select cluster from `data_kemiskinan` where `cluster`='4'";
	$jum4=getJumc($conn,$sql);
	
?>

<h2><a href="#">Tabel Hasil Klasifikasi</a></h2>		
<div>	
        <table class='table table-bordered table-striped  table-hover container'>  
            <tr>
                <th>Jumlah Keluarga</th>
                <td><?php echo $jumw;?></td>
            </tr>
            <tr>
                <th>Jumlah Iterasi</th>
                 <td><?php echo $ke;?></td>
            </tr>
            <tr>
                <th>Jumlah Keluarga Sangat Miskin</th>
                 <td><?php echo $jum1;?></td>
            </tr>
            <tr>
                <th>Jumlah Jumlah Keluarga Miskin</th>
                 <td><?php echo $jum2;?></td>
            </tr>
            <tr>
                <th>Jumlah Jumlah Keluarga Rentan Miskin</th>
                <td><?php echo $jum3;?></td>
            </tr>
            <tr>
                <th>Jumlah Keluarga Tidak Miskin</th>
                <td><?php echo $jum4;?></td>
            </tr>
            </table>

</div>			
			
	</div><!--  isi accord -->		
 </div><!--  row -->
    </div>
</div>

<button onclick="topFunction()" id="myBtn" title="Go to top">Back to Top</button>

<script>
window.onscroll = function() {scrollFunction()};
function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("myBtn").style.display = "block";
  } else {
    document.getElementById("myBtn").style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>

