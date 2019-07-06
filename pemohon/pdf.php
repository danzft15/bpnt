<?php
require_once"../koneksivar.php";

$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
if ($conn->connect_error) {
  trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
}
if (!function_exists('set_magic_quotes_runtime')) {
    function set_magic_quotes_runtime($new_setting) {
        return true;
    }
}
/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

define('FPDF_FONTPATH', '../ypathcss/bantuan/fpdf/font/');
require('../ypathcss/bantuan/fpdf/fpdf.php');

class PDF extends FPDF{
  function Header(){
    $this->SetTextColor(128,0,0);
    $this->SetFont('Arial','B','12');//	$this->SetFont('Times','',12);
    $this->Cell(20,0,'Data Pemohon',0,0,'L');
    $this->Ln();
    $this->Cell(5,1,'Laporan Data Pemohon',0,0,'L');
    $this->Ln();
	

	
  }
  
  function Footer(){
	$this->SetY(-4,6);
	$this->Image("../ypathfile/avatar.jpg", (8.5/2)-1.5, 9.8, 3, 1, "JPG", "http://www.lp2maray.com");
    $this->SetY(-2,6);
    $this->Cell(0,1,$this->PageNo(),0,0,'C');
	
  }
} 

$sql = "select * from `$tbpemohon`";
$jml =  getJum($conn,$sql);

$i=0;
$arr=getData($conn,$sql);
		foreach($arr as $d) {	
  $cell[$i][0]=$d["id_pemohon"];
  $cell[$i][1]=$d["nama_pemohon"];
  $cell[$i][2]=$d["jenis_kelamin"];
  $cell[$i][3]=$d["tlp"];
  $cell[$i][4]=$d["email"];
  $cell[$i][5]=$d["alamat"];
  $cell[$i][6]=$d["no_kk"];
  $i++;
}
				
				
$pdf=new PDF('L','cm','A4');
//$pdf=new PDF("P","in","Letter");
$pdf->Open();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B','9');
$pdf->SetFillColor(192,192,192);
$pdf->Cell(1,1,'no','LRTB',0,'LRTB',1);
//$pdf->MultiCell(0, 0.5, $lipsum1, 'LR', "L");
$pdf->Cell(2,1,'ID Pemohon','LRTB',0,'C',1);
$pdf->Cell(4,1,'Nama Pemohon','LRTB',0,'C',1);
$pdf->Cell(2,1,'Jenis Kelamin','LRTB',0,'C',1);
$pdf->Cell(3,1,'Telepon','LRTB',0,'C',1);
$pdf->Cell(4,1,'Email','LRTB',0,'C',1);
$pdf->Cell(8,1,'Alamat','LRTB',0,'C',1);
$pdf->Cell(4,1,'Nomer kk','LRTB',0,'C',1);
$pdf->Ln();
$pdf->SetFont('Arial','','8');

for ($j=0;$j<$i;$j++){
  $pdf->Cell(1,1,$j+1,'LRTB',0,'L');         // no
  $pdf->Cell(2,1,$cell[$j][0],'LRTB',0,'L'); // id_pemohon
  $pdf->Cell(4,1,$cell[$j][1],'LRTB',0,'L'); // nama_pemohon
  $pdf->Cell(2,1,$cell[$j][2],'LRTB',0,'L'); // jenis_kelamin
  $pdf->Cell(3,1,$cell[$j][3],'LRTB',0,'L'); // tlp
  $pdf->Cell(4,1,$cell[$j][4],'LRTB',0,'L'); // email
  $pdf->Cell(8,1,$cell[$j][5],'LRTB',0,'L'); // alamat
  $pdf->Cell(4,1,$cell[$j][6],'LRTB',0,'L'); // no_kk
  $pdf->Ln();
}
$pdf->Output();
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

