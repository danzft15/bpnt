

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
					$arIP[$i]=$idp;
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
  </tr>
  </thead>
  <tbody>";

for($i=0;$i<$jd;$i++){
	$no=$i+1;
	$gab.="<tr><td>$no<td>$arnama[$i]<td>$arv1[$i]<td>$arv2[$i]<td>$arv3[$i]<td>$arv4[$i]<td>$arv5[$i]</tr>";
}
$gab.="</table>";

$gab.="</div>";
echo $gab;

$JC=3;
$gab1="<h3>1. Bangkitkan matriks partisi inisial (µ: n x c)</h3><div>";
$gab1.="<table border='1'><tr><td><td>c1<td>c2<td>c3<td>SUM</tr>";
for($i=0;$i<$jd;$i++){
	$no=$i+1;
	$AR1[$i]=rand(0,1000)/1000;
	$AR2[$i]=rand(0,1000)/1000;
	$AR3[$i]=rand(0,1000)/1000;
	$AR[$i]=$AR1[$i]+$AR2[$i]+$AR3[$i];
		$gab1.="<tr><td>$no<td>$AR1[$i]<td>$AR2[$i]<td>$AR3[$i]<td>$AR[$i]</tr>";
}
$gab1.="</table></div>";
echo $gab1;



$lop=0;
$E=0.01;
$maxIter=10;
$ARP[0]=0;
$ep=0;

while($lop<$maxIter ){//&& $ep>$E
	$lop++;

$gab2="<h3>2. Normalisasi matriks partisi dengan membagi tiap elemen dengan total barisnya</h3>";
$gab2.="<div><table border='1'><tr><td>No<td>c1<td>c2<td>c3<td>SUM</tr>";
for($i=0;$i<$jd;$i++){
	$no=$i+1;
	$AS1[$i]=$AR1[$i]/$AR[$i];
	$AS2[$i]=$AR2[$i]/$AR[$i];
	$AS3[$i]=$AR3[$i]/$AR[$i];
	$AS[$i]=$AS1[$i]+$AS2[$i]+$AS3[$i];
		$gab2.="<tr><td>$no<td>$AS1[$i]<td>$AS2[$i]<td>$AS3[$i]<td>$AS[$i]</tr>";
}
$gab2.="</table></div>";

echo $gab2;
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


$gab3="<h3>Loop $lop #3. Hitung pusat cluster V (c x m)</h3>";
$gab3.="<div><table border=''1><tr>
<td>No
<td>x1
<td>x2
<td>x3
<td>x4
<td>x5
<td>c1
<td>c2
<td>c3
<td>c1<sup>2</sup>
<td>c2<sup>2</sup>
<td>c3<sup>2</sup>

	<td>x1.c1<sup>2</sup>
	<td>x1.c2<sup>2</sup>
	<td>x1.c3<sup>2</sup>

	<td>x2.c1<sup>2</sup>
	<td>x2.c2<sup>2</sup>
	<td>x2.c3<sup>2</sup>
	
	<td>x3.c1<sup>2</sup>
	<td>x3.c2<sup>2</sup>
	<td>x3.c3<sup>2</sup>
	
	<td>x4.c1<sup>2</sup>
	<td>x4.c2<sup>2</sup>
	<td>x4.c3<sup>2</sup>
	
	<td>x5.c1<sup>2</sup>
	<td>x5.c2<sup>2</sup>
	<td>x5.c3<sup>2</sup>
</tr>";

for($i=0;$i<$jd;$i++){
	$no=$i+1;
	$ASS1[$i]=$AS1[$i]*$AS1[$i];
	$ASS2[$i]=$AS2[$i]*$AS2[$i];
	$ASS3[$i]=$AS3[$i]*$AS3[$i];
		$arv11[$i]=$arv1[$i]*$ASS1[$i];
		$arv12[$i]=$arv1[$i]*$ASS2[$i];
		$arv13[$i]=$arv1[$i]*$ASS3[$i];

		$arv21[$i]=$arv2[$i]*$ASS1[$i];
		$arv22[$i]=$arv2[$i]*$ASS2[$i];
		$arv23[$i]=$arv2[$i]*$ASS3[$i];

		$arv31[$i]=$arv3[$i]*$ASS1[$i];
		$arv32[$i]=$arv3[$i]*$ASS2[$i];
		$arv33[$i]=$arv3[$i]*$ASS3[$i];

		$arv41[$i]=$arv4[$i]*$ASS1[$i];
		$arv42[$i]=$arv4[$i]*$ASS2[$i];
		$arv43[$i]=$arv4[$i]*$ASS3[$i];

		$arv51[$i]=$arv5[$i]*$ASS1[$i];
		$arv52[$i]=$arv5[$i]*$ASS2[$i];
		$arv53[$i]=$arv5[$i]*$ASS3[$i];
	
	$gab3.="<tr>
	<td>$no
	<td>$arv1[$i]
	<td>$arv2[$i]
	<td>$arv3[$i]
	<td>$arv4[$i]
	<td>$arv5[$i]
	
	<td>$AS1[$i]
	<td>$AS2[$i]
	<td>$AS3[$i]

	<td>$ASS1[$i]
	<td>$ASS2[$i]
	<td>$ASS3[$i]

	<td>$arv11[$i]
	<td>$arv12[$i]
	<td>$arv13[$i]
	
	<td>$arv21[$i]
	<td>$arv22[$i]
	<td>$arv23[$i]
	
	<td>$arv31[$i]
	<td>$arv32[$i]
	<td>$arv33[$i]
	
	<td>$arv41[$i]
	<td>$arv42[$i]
	<td>$arv43[$i]
	
	<td>$arv51[$i]
	<td>$arv52[$i]
	<td>$arv53[$i]	
	</tr>";
}
$totv1=array_sum($arv1);
$totv2=array_sum($arv2);
$totv3=array_sum($arv3);
$totv4=array_sum($arv4);
$totv5=array_sum($arv5);

$totc1=array_sum($AS1);
$totc2=array_sum($AS2);
$totc3=array_sum($AS3);

$totc12=array_sum($ASS1);
$totc22=array_sum($ASS2);
$totc32=array_sum($ASS3);

$totv11=array_sum($arv11);
$totv12=array_sum($arv12);
$totv13=array_sum($arv13);

$totv21=array_sum($arv21);
$totv22=array_sum($arv22);
$totv23=array_sum($arv23);

$totv31=array_sum($arv31);
$totv32=array_sum($arv32);
$totv33=array_sum($arv33);

$totv41=array_sum($arv41);
$totv42=array_sum($arv42);
$totv43=array_sum($arv43);

$totv51=array_sum($arv51);
$totv52=array_sum($arv52);
$totv53=array_sum($arv53);


$gab3.="<tr>
	<td>Total
	<td>$totv1
	<td>$totv2
	<td>$totv3
	<td>$totv4
	<td>$totv5
	
	<td>$totc1
	<td>$totc2
	<td>$totc3

	<td>$totc12
	<td>$totc22
	<td>$totc32

	<td>$totv11
	<td>$totv12
	<td>$totv13
	
	<td>$totv21
	<td>$totv22
	<td>$totv23
	
	<td>$totv31
	<td>$totv32
	<td>$totv33
	
	<td>$totv41
	<td>$totv42
	<td>$totv43
	
	<td>$totv51
	<td>$totv52
	<td>$totv53
	</tr>";
	
$gab3.="</table></div>";


echo $gab3;


$X11=$totv11/$totc12;
$X12=$totv21/$totc12;
$X13=$totv31/$totc12;
$X14=$totv41/$totc12;
$X15=$totv51/$totc12;

$X21=$totv12/$totc22;
$X22=$totv22/$totc22;
$X23=$totv32/$totc22;
$X24=$totv42/$totc22;
$X25=$totv52/$totc22;

$X31=$totv13/$totc32;
$X32=$totv23/$totc32;
$X33=$totv33/$totc32;
$X34=$totv43/$totc32;
$X35=$totv53/$totc32;

$gab5="<h3>Loop $lop #4. Hitung fungsi obyektif (P)</h3>";
$gab5.="<div><table border='1'>";
$gab5.="<tr><td>No<td>x1<td>x2<td>x3<td>x4<td>x5
<td>dx11<td>dx12<td>dx13<td>dx14<td>dx15
<td>dx21<td>dx22<td>dx23<td>dx24<td>dx25
<td>dx31<td>dx32<td>dx33<td>dx34<td>dx35

<td>dy11<td>dy12<td>dy13<td>dy14<td>dy15
<td>dy21<td>dy22<td>dy23<td>dy24<td>dy25
<td>dy31<td>dy32<td>dy33<td>dy34<td>dy35

";
for($i=0;$i<$jd;$i++){
	$no=$i+1;
	$arx11[$i]=pow($arv1[$i]-$X11,2);$ary11[$i]=$arx11[$i]*$AR1[$i];
	$arx12[$i]=pow($arv2[$i]-$X12,2);$ary12[$i]=$arx12[$i]*$AR1[$i];
	$arx13[$i]=pow($arv3[$i]-$X13,2);$ary13[$i]=$arx13[$i]*$AR1[$i];
	$arx14[$i]=pow($arv4[$i]-$X14,2);$ary14[$i]=$arx14[$i]*$AR1[$i];
	$arx15[$i]=pow($arv5[$i]-$X15,2);$ary15[$i]=$arx15[$i]*$AR1[$i];
	
	$arx21[$i]=pow($arv1[$i]-$X21,2);$ary21[$i]=$arx21[$i]*$AR2[$i];
	$arx22[$i]=pow($arv2[$i]-$X22,2);$ary22[$i]=$arx22[$i]*$AR2[$i];
	$arx23[$i]=pow($arv3[$i]-$X23,2);$ary23[$i]=$arx23[$i]*$AR2[$i];
	$arx24[$i]=pow($arv4[$i]-$X24,2);$ary24[$i]=$arx24[$i]*$AR2[$i];
	$arx25[$i]=pow($arv5[$i]-$X25,2);$ary25[$i]=$arx25[$i]*$AR2[$i];
	
	$arx31[$i]=pow($arv1[$i]-$X31,2);$ary31[$i]=$arx31[$i]*$AR3[$i];
	$arx32[$i]=pow($arv2[$i]-$X32,2);$ary32[$i]=$arx32[$i]*$AR3[$i];
	$arx33[$i]=pow($arv3[$i]-$X33,2);$ary33[$i]=$arx33[$i]*$AR3[$i];
	$arx34[$i]=pow($arv4[$i]-$X34,2);$ary34[$i]=$arx34[$i]*$AR3[$i];
	$arx35[$i]=pow($arv5[$i]-$X35,2);$ary35[$i]=$arx35[$i]*$AR3[$i];
	
	$T1[$i]=$arx11[$i]+$arx12[$i]+$arx13[$i]+$arx14[$i]+$arx15[$i];
	$T2[$i]=$arx21[$i]+$arx22[$i]+$arx23[$i]+$arx24[$i]+$arx25[$i];
	$T3[$i]=$arx31[$i]+$arx32[$i]+$arx33[$i]+$arx34[$i]+$arx35[$i];
	
	$U1[$i]=pow($T1[$i],-1);
	$U2[$i]=pow($T2[$i],-1);
	$U3[$i]=pow($T3[$i],-1);
	$T[$i]=$U1[$i]+$U2[$i]+$U3[$i];
	
	$C1[$i]=$T1[$i]/$T[$i];
	$C2[$i]=$T2[$i]/$T[$i];
	$C3[$i]=$T3[$i]/$T[$i];
	
	$H[$i]=1;
	$K[$i]="KelompokA";
	$B[$i]=0;
	if($C1[$i]>=$C2[$i] && $C1[$i]>=$C3[$i] ){$H[$i]=1;$K[$i]="KelompokA";$B[$i]=$C1[$i];}
	elseif($C2[$i]>=$C1[$i] && $C2[$i]>=$C3[$i] ){$H[$i]=2;$K[$i]="KelompokB";$B[$i]=$C2[$i];}
	elseif($C3[$i]>=$C2[$i] && $C3[$i]>=$C1[$i] ){$H[$i]=3;$K[$i]="KelompokC";$B[$i]=$C3[$i];}

	
	$gab5.="<tr>
	<td>$no
	<td>$arv1[$i]
	<td>$arv2[$i]
	<td>$arv3[$i]
	<td>$arv4[$i]
	<td>$arv5[$i]
	
	<td>$arx11[$i]
	<td>$arx12[$i]
	<td>$arx13[$i]
	<td>$arx14[$i]
	<td>$arx15[$i]

	<td>$arx21[$i]
	<td>$arx22[$i]
	<td>$arx23[$i]
	<td>$arx24[$i]
	<td>$arx25[$i]

	<td>$arx31[$i]
	<td>$arx32[$i]
	<td>$arx33[$i]
	<td>$arx34[$i]
	<td>$arx35[$i]

	<td>$arx41[$i]
	<td>$arx42[$i]
	<td>$arx43[$i]
	<td>$arx44[$i]
	<td>$arx45[$i]

	<td>$arx51[$i]</td>
	<td>$arx52[$i]</td>
	<td>$arx53[$i]</td>
	<td>$arx54[$i]</td>
	<td>$arx55[$i]</td>
	
	<td>$ary11[$i]</td>
	<td>$ary12[$i]</td>
	<td>$ary13[$i]</td>
	<td>$ary14[$i]</td>
	<td>$ary15[$i]</td>

	<td>$ary21[$i]
	<td>$ary22[$i]
	<td>$ary23[$i]
	<td>$ary24[$i]
	<td>$ary25[$i]

	<td>$ary31[$i]
	<td>$ary32[$i]
	<td>$ary33[$i]
	<td>$ary34[$i]
	<td>$ary35[$i]

	<td>$ary41[$i]
	<td>$ary42[$i]
	<td>$ary43[$i]
	<td>$ary44[$i]
	<td>$ary45[$i]

	<td>$ary51[$i]
	<td>$ary52[$i]
	<td>$ary53[$i]
	<td>$ary54[$i]
	<td>$ary55[$i]
	
	";
}

$totalP1=array_sum($ary11)+array_sum($ary12)+array_sum($ary13)+array_sum($ary14)+array_sum($ary15);
$totalP2=array_sum($ary21)+array_sum($ary22)+array_sum($ary23)+array_sum($ary24)+array_sum($ary25);
$totalP3=array_sum($ary31)+array_sum($ary32)+array_sum($ary33)+array_sum($ary34)+array_sum($ary35);
$totalP=$totalP1+$totalP2+$totalP3;

if($lop>1){
	$n=$lop-1;
	$ARP[$n]=$totalP;
	$ep=abs($totalP-$ARP[$n-1]);
}

$gab5.="</table><h4>Total P: $totalP</h4>";
$gab5.="</div>";


$gab4="<h3>Loop $lop #4. Bangkitkan matriks V</h3>";
$gab4.="<div><table border='1'>";
$gab4.="<tr><td>#<td>x1<td>x2<td>x3<td>x4<td>x5</tr>";
$gab4.="<tr><td>c1<td>$X11<td>$X12<td>$X13<td>$X14<td>$X15</tr>";
$gab4.="<tr><td>c2<td>$X21<td>$X22<td>$X23<td>$X24<td>$X25</tr>";
$gab4.="<tr><td>c3<td>$X31<td>$X32<td>$X33<td>$X34<td>$X35</tr>";
$gab4.="</table>";
$gab4.="</div>";


echo $gab4;
echo $gab5;

$gab6="<h3>Loop $lop #5. Pembentukan matriks partisi (µ)</h3>";
$gab6.="<div><table border='1'>";
$gab6.="<tr><td>No<td>c1<td>c2<td>c3<td>c1<sup>-1</sup><td>c2<sup>-1</sup><td>c3<sup>-1</sup><td>sum</td></tr>";
for($i=0;$i<$jd;$i++){
	$no=$i+1;
$gab6.="<tr><td>$no
<td>$T1[$i]<td>$T2[$i]<td>$T3[$i]
<td>$U1[$i]<td>$U2[$i]<td>$U3[$i]
<td>$T[$i]</td></tr>";	
}
$gab6.="</table>";
$gab6.="</div>";

echo $gab6;

if($lop==$maxIter){
	$sql="delete from `$tbhasil` where `id_penilaian`='$id_penilaian'";
	$hapus=process($conn,$sql);
}

$gab7="<h3>Loop $lop #6. Update matriks partisi (µ)</h3>";
$gab7.="<div><table border='1'>";
$gab7.="<tr><td>No<td>c1<td>c2<td>c3<td>Cluster<td>Result</td></tr>";
for($i=0;$i<$jd;$i++){
	
	//update nilai random awal AR..LOOP if |Pi-Pi-1|<e atau i>MaxIter then berhenti
	$AR1[$i]=$C1[$i];
	$AR2[$i]=$C2[$i];
	$AR3[$i]=$C3[$i];
	
	
if($lop==$maxIter){
	$sql=" INSERT INTO `$tbhasil` (
`id_hasil` ,
`id_penilaian`,
`id_pemohon`,
`bobot`,
`hasil`,
`keterangan` ,
`status` 
) VALUES (
'',
'$id_penilaian',
'$arIP[$i]', 
'$B[$i]', 
'$H[$i]',
'$C1[$i] : $C2[$i] : $C3[$i] ',
'Proses'
)";
$simpan=process($conn,$sql);
}

	$no=$i+1;
$gab7.="<tr><td>$no
<td>$C1[$i]
<td>$C2[$i]
<td>$C3[$i]
<td>$H[$i]
<td>$K[$i]
</td></tr>";	
}
$gab7.="</table>";
$gab7.="</div>";

echo $gab7;
//==================================================================


}//while
?>















</div>

	
	
	
