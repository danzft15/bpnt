<?php
session_start();

require_once"konmysqli.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Dashio - Bootstrap Admin Template</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <div id="login-page">
    <div class="container">
      <form class="form-login" method="post">
        <h2 class="form-login-heading">sign in now</h2>
        <div class="login-wrap">
          <input type="text" name="user" class="form-control" placeholder="User ID" autofocus>
          <br>
          <input type="password" name="pass" class="form-control" placeholder="Password">
          <label class="checkbox">
            <span class="pull-right">
            <a data-toggle="modal" href="login.html#myModal">Registrasi</a>
            </span>
            </label>
          <button class="btn btn-theme btn-block" name="Login" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
          <hr>
        
        </div>
        <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Register Form</h4>
              </div>
              <div class="modal-body">
                
                <p>Nama Pemohon</p>
                <input type="text" name="nama_pemohon" placeholder="nama_pemohon" autocomplete="off" class="form-control placeholder-no-fix">
                

                <p>Username</p>
                <input type="text" name="username" placeholder="username" autocomplete="off" class="form-control placeholder-no-fix">
                
                <p>Password</p>
                <input type="text" name="password" placeholder="password" autocomplete="off" class="form-control placeholder-no-fix">

              </div>
              <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                <button type="submit"  name="Simpan" class="btn btn-theme" type="button">Submit</button>
              </div>
            </div>
          </div>
        </div>
        <!-- modal -->
      </form>
    </div>
  </div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("img/login-bg.jpg", {
      speed: 500
    });
  </script>
</body>

</html>

<?php
if(isset($_POST["Login"])){
	$usr=$_POST["user"];
	$pas=$_POST["pass"];
	
		$sql1="select * from `$tbuser` where `username`='$usr' and `password`='$pas' and `status`='Aktif'";
		$sql2="select * from `$tbpemohon` where `username`='$usr' and `password`='$pas'";
		//$sql3="select * from `$tbadmin` where `username`='$usr' and `password`='$pas' and `status`='Aktif'";
		
		if(getJum($conn,$sql1)>0){
			$d=getField($conn,$sql1);
				$kode=$d["id_user"];
				$nama=$d["nama_user"];
				   $_SESSION["cid"]=$kode;
				   $_SESSION["cnama"]=$nama;
				   $_SESSION["cstatus"]="Petugas";
		echo "<script>alert('Otentikasi ".$_SESSION["cnama"]." ".$_SESSION["cnama"]." (".$_SESSION["cid"].") berhasil Login!');
		document.location.href='index.php?mnu=home';</script>";
		}
		elseif(getJum($conn,$sql2)>0){
			 $d2=getField($conn,$sql2);
        $kode=$d2["id_pemohon"];
        $nama=$d2["nama_pemohon"];
           $_SESSION["cid"]=$kode;
           $_SESSION["cnama"]=$nama;
           $_SESSION["cstatus"]="Pemohon";
    echo "<script>alert('Otentikasi ".$_SESSION["cnama"]." ".$_SESSION["cnama"]." (".$_SESSION["cid"].") berhasil Login!');
    document.location.href='index.php?mnu=home';</script>";
		}
		else{
			session_destroy();
			echo "<script>alert('Otentikasi Login GAGAL !,Silakan cek data Anda kembali...');
			document.location.href='index.php?mnu=login';</script>";
		}
}



?>


<?php
if(isset($_POST["Simpan"])){
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

  $nama_pemohon=strip_tags($_POST["nama_pemohon"]);
  $username=strip_tags($_POST["username"]);
  $password=strip_tags($_POST["password"]);


$sql="INSERT INTO `tb_pemohon`(
`id_pemohon`, 
`nama_pemohon`,
`username`,
`password`
) VALUES (
'$id_pemohon', 
'$nama_pemohon',
'$username',
'$password'
)";
  
$simpan=process($conn,$sql);
    if($simpan) {echo "<script>alert('Data $id_pemohon berhasil disimpan !');document.location.href='login.php';</script>";}
    else{echo"<script>alert('Data $id_pemohon gagal disimpan...');document.location.href='login.php';</script>";}
 
}
?>
<?php 

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
?>