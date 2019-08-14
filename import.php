
    <html>
    <head>
    <title>How To Import Excel (.xls) File To MySql Database Using PHP</title>
    </head>
    <body>
    <center><h1>lp2maray</h1></center>
    <form name="import_export_form" method="post" action="import.php" enctype="multipart/form-data">
    <label>Select Excel File : </label><input type="file" name="excelfile"/><br>
    <input type="submit" name="form_submit"/>
    </form>
    </body>
    </html>


<?php
 if(isset($_POST['form_submit'])){
		require_once 'Excel/reader.php';
		$data = new Spreadsheet_Excel_Reader();
		$data->setOutputEncoding('CP1251');
		$filename = $_FILES['excelfile']['tmp_name'];
		$data->read($filename);//'Book1.xls');
		 
		for ($x = 2; $x <= count($data->sheets[0]["cells"]); $x++) {

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

			$nama_pemohon= $data->sheets[0]["cells"][$x][1];
			$tlp= $data->sheets[0]["cells"][$x][2];
			$email= $data->sheets[0]["cells"][$x][3];
			$email= $data->sheets[0]["cells"][$x][3];
			$email= $data->sheets[0]["cells"][$x][3];
			$email= $data->sheets[0]["cells"][$x][3];
			$email= $data->sheets[0]["cells"][$x][3];
			$email= $data->sheets[0]["cells"][$x][3];
			$email= $data->sheets[0]["cells"][$x][3];
			$email= $data->sheets[0]["cells"][$x][3];
			$email= $data->sheets[0]["cells"][$x][3];

$sql="INSERT INTO `tb_pemohon`(
`id_pemohon`, 
`nama_pemohon`,
`jenis_kelamin`, 
`tlp`, 
`email`, 
`alamat`, 
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
		}//for
 
 echo "<script>alert('Data  berhasil di IMPORT !');document.location.href='?mnu=pemohon';</script>";

 }
?>