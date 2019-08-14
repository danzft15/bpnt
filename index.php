<?php
if (version_compare(phpversion(), "5.3.0", ">=")  == 1)
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
else
  error_reporting(E_ALL & ~E_NOTICE);  
  ?>
<?php
session_start();
//error_reporting(0);
require_once"konmysqli.php";

$mnu=$_GET["mnu"];
date_default_timezone_set("Asia/Jakarta");

if(!isset($_SESSION["cid"])){
	echo "<script>document.location.href='login.php';</script>";
		}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Aplikasi Penerima BPNT">
  <title>Aplikasi Penerima BPNT</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  <script src="lib/chart-master/Chart.js"></script>

</head>

<body>
  <section id="container">
      <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index.php" class="logo"><b>Seleksi<span>Penerima BPNT</span></b></a>
      <!--logo end-->
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="index.php?mnu=logout">Logout</a></li>
        </ul>
      </div>
    </header>
     <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><img src="img/apple-touch-icon.png" class="img-circle" width="80"></a></p>
          <h5 class="centered"><?php echo $_SESSION["cnama"];?></h5>
       

       
<?php if($_SESSION["cstatus"]=="Petugas"){  ?>
      
        <li ><a  href="index.php?mnu=user"><i class="fa fa-child"></i><span>Petugas</span></a></li>
        <li ><a  href="index.php?mnu=pemohon"><i class="fa fa-child"></i><span>Pemohon</span></a></li>
        <li ><a  href="index.php?mnu=penilaian"><i class="fa fa-file-powerpoint-o"></i><span>Penilaian</span></a></li>
        <li ><a  href="index.php?mnu=hasil"><i class="fa fa-file-text-o"></i><span>Hasil</span></a></li>
    <?php }elseif($_SESSION["cstatus"]=="Pemohon"){?>  
        <!-- <li ><a  href="index.php?mnu=home"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li> -->
        <li ><a  href="index.php?mnu=profil"><i class="fa fa-child"></i><span>Data Diri</span></a></li>
        <li ><a  href="index.php?mnu=chasil"><i class="fa fa-child"></i><span>Hasil Permohonan</span></a></li>
       


    <?php }else{?>  
           <li class="mt"><a  href="index.php?mnu=home"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
    <li class="mt"><a href="index.php?mnu=login"><i class="fa fa-dashboard"></i><span>Login</span></a></li>


    <?php }?>    
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
       <section id="main-content">
      <section class="wrapper">
        <div class="row">

      <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
            <?php if ($mnu=="admin") {$npage="Form Admin";}
			elseif($mnu=="user") {$npage="Form User";}
            elseif($mnu=="pemohon") {$npage="Form Pemohon";}
            elseif($mnu=="penilaian") {$npage="Form Penilaian";}
            elseif($mnu=="hasil") {$npage="Form Hasil";}
			else{$npage="Form Home";}
            ?>
              <h4 class="mb"><i class="fa fa-angle-right"></i> <?php echo $npage;?></h4>
          <?php 

        
if($mnu=="admin"){require_once"admin/admin.php";}
else if($mnu=="user"){require_once"user/user.php";}
else if($mnu=="pemohon"){require_once"pemohon/pemohon.php";}
else if($mnu=="penilaian"){require_once"penilaian/penilaian.php";}
else if($mnu=="penilaian_detail"){require_once"penilaian_detail/penilaian_detail.php";}
else if($mnu=="hasil"){require_once"hasil/hasil.php";}
else if($mnu=="login"){require_once"login.php";}
else if($mnu=="profil"){require_once"pemohon/profil.php";}
else if($mnu=="updateprofil"){require_once"pemohon/updateprofil.php";}
else if($mnu=="chasil"){require_once"hasil/chasil.php";}
else if($mnu=="logout"){require_once"logout.php";}

else if($mnu=="fcmeans"){require_once"fcmeans.php";}
else {require_once"home.php";}
        
   
 ?>
 </div>
 </div>
 </div>
 </div>
          <!-- /col-lg-3 -->
        <!-- /row -->
    </section>
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>FCMEANS</strong>. All Rights Reserved
        </p>
        <div class="credits">
          <!--
            You are NOT allowed to delete the credit link to TemplateMag with free version.
            You can delete the credit link only if you bought the pro version.
            Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
            Licensing information: https://templatemag.com/license/
          -->
          Created with <a href="#">FCMEANS</a>
        </div>
        <a href="index.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
 
 <?php if($mnu=="" ||$mnu=="home"){?>
  <script src="lib/jquery/jquery.min.js"></script>
<?php }?>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="lib/sparkline-chart.js"></script>
  <script src="lib/zabuto_calendar.js"></script>
 
  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>
</body>

</html>

<?php function RP($rupiah){return number_format($rupiah,"2",",",".");}?>
<?php
function WKT($sekarang){
$tanggal = substr($sekarang,8,2)+0;
$bulan = substr($sekarang,5,2);
$tahun = substr($sekarang,0,4);

$judul_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei","Juni", "Juli", "Agustus", "September","Oktober", "November", "Desember");
$wk=$tanggal." ".$judul_bln[(int)$bulan]." ".$tahun;
return $wk;
}
?>
<?php
function WKTP($sekarang){
$tanggal = substr($sekarang,8,2)+0;
$bulan = substr($sekarang,5,2);
$tahun = substr($sekarang,2,2);

$judul_bln=array(1=> "Jan", "Feb", "Mar", "Apr", "Mei","Jun", "Jul", "Agu", "Sep","Okt", "Nov", "Des");
$wk=$tanggal." ".$judul_bln[(int)$bulan]."'".$tahun;
return $wk;
}
?>
<?php
function BAL($tanggal){
  $arr=explode(" ",$tanggal);
  if($arr[1]=="Januari" || $arr[1]=="January"){$bul="01";}
  else if($arr[1]=="Februari" || $arr[1]=="February"){$bul="02";}
  else if($arr[1]=="Maret" ||  $arr[1]=="March"){$bul="03";}
  else if($arr[1]=="April" ||  $arr[1]=="April"){$bul="04";}
  else if($arr[1]=="Mei" ||  $arr[1]=="May"){$bul="05";}
  else if($arr[1]=="Juni" ||  $arr[1]=="June"){$bul="06";}
  else if($arr[1]=="Juli" ||  $arr[1]=="July"){$bul="07";}
  else if($arr[1]=="Agustus" ||  $arr[1]=="August"){$bul="08";}
  else if($arr[1]=="September" ||  $arr[1]=="September"){$bul="09";}
  else if($arr[1]=="Oktober" ||  $arr[1]=="October"){$bul="10";}
  else if($arr[1]=="November" ||  $arr[1]=="November"){$bul="11";}
  else if($arr[1]=="Desember" ||  $arr[1]=="December"){$bul="12";}
return "$arr[2]-$bul-$arr[0]";  
}
?>

<?php
function BALP($tanggal){
  $arr=split(" ",$tanggal);
  if($arr[1]=="Jan"){$bul="01";}
  else if($arr[1]=="Feb"){$bul="02";}
  else if($arr[1]=="Mar"){$bul="03";}
  else if($arr[1]=="Apr"){$bul="04";}
  else if($arr[1]=="Mei"){$bul="05";}
  else if($arr[1]=="Jun"){$bul="06";}
  else if($arr[1]=="Jul"){$bul="07";}
  else if($arr[1]=="Agu"){$bul="08";}
  else if($arr[1]=="Sep"){$bul="09";}
  else if($arr[1]=="Okt"){$bul="10";}
  else if($arr[1]=="Nov"){$bul="11";}
  else if($arr[1]=="Nop"){$bul="11";}
  else if($arr[1]=="Des"){$bul="12";}
return "$arr[2]-$bul-$arr[0]";  
}
?>


<?php
function process($conn,$sql){
$s=false;
$conn->autocommit(FALSE);
try {
  $rs = $conn->query($sql);
  if($rs){
      $conn->commit();
      $last_inserted_id = $conn->insert_id;
    $affected_rows = $conn->affected_rows;
      $s=true;
  }
} 
catch (Exception $e) {
  echo 'fail: ' . $e->getMessage();
    $conn->rollback();
}
$conn->autocommit(TRUE);
return $s;
}

function getJum($conn,$sql){
  $rs=$conn->query($sql);
  $jum= $rs->num_rows;
  $rs->free();
  return $jum;
}

function getField($conn,$sql){
  $rs=$conn->query($sql);
  $rs->data_seek(0);
  $d= $rs->fetch_assoc();
  $rs->free();
  return $d;
}

function getData($conn,$sql){
  $rs=$conn->query($sql);
  $rs->data_seek(0);
  $arr = $rs->fetch_all(MYSQLI_ASSOC);
  //foreach($arr as $row) {
  //  echo $row['nama_kelas'] . '*<br>';
  //}
  
  $rs->free();
  return $arr;
}

function getAdmin($conn,$kode){
$field="username";
$sql="SELECT `$field` FROM `tb_admin` where `kode_admin`='$kode'";
$rs=$conn->query($sql); 
  $rs->data_seek(0);
  $row = $rs->fetch_assoc();
  $rs->free();
    return $row[$field];
  }
function getPemohon($conn,$kode){
$field="nama_pemohon";
$sql="SELECT `$field` FROM `tb_pemohon` where `id_pemohon`='$kode'";
$rs=$conn->query($sql); 
  $rs->data_seek(0);
  $row = $rs->fetch_assoc();
  $rs->free();
    return $row[$field];
  }
function getPenilaian($conn,$kode){
$field="nama_penilaian";
$sql="SELECT `$field` FROM `tb_penilaian` where `id_penilaian`='$kode'";
$rs=$conn->query($sql); 
  $rs->data_seek(0);
  $row = $rs->fetch_assoc();
  $rs->free();
    return $row[$field];
  }
  
function getV1($v){
 $e=0;
if($v=="Buruh"){$e=0.7;}
else  if($v=="Wirausaha"){$e=0.3;}
else  if($v=="Wiraswasta"){$e=0.2;}
else  if($v=="Pemulung"){$e=0.6;}
else  if($v=="Tukang Batu"){$e=0.8;}
else  if($v=="Pegawai Tetap"){$e=0.1;}
else  if($v=="Tukang Ojek Pangkalan"){$e=0.4;}
else  if($v=="Supir"){$e=0.5;}
else  if($v=="Tidak Bekerja"){$e=0.9;}
 return $e;
}

function getV2($v){
 $e=0;
if($v>5000000){$e=0.1;}
else if($v>3000000){$e=0.3;}
else if($v>2000000){$e=0.5;}
else if($v>1000000){$e=0.7;}
else if($v>=0){$e=0.9;}
 return $e;
}
function getV3($v){
 $e=0;
if($v>5){$e=0.9;}
else if($v>4){$e=0.7;}
else if($v>3){$e=0.5;}
else if($v>2){$e=0.3;}
else if($v>=0){$e=0.1;}
 return $e;
}

function getV4($v){
 $e=0;
if($v=="Rumah Sendiri"){$e=0.3;}
else if($v=="Mengontrak"){$e=0.7;}
 return $e;
}

function getV5($v){
 $e=0;
if($v=="Ada"){$e=0.35;}
else if($v=="Tidak Ada"){$e=0.75;}
 return $e;
}
?>

