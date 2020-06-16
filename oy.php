<?php 
require_once 'header.php';



$ayarsor = $db->prepare("SELECT * FROM ayar where ayar_id=0");
$ayarsor->execute();
$ayarcek = $ayarsor->fetch(PDO::FETCH_ASSOC);

?>





	<div class="container mt-5 mb-5 text-<?= $sitecek['site_yazirenk'] ?>">
	
	<div class="row">
	<div class="col-md-8 mb-5">
<div class=" mb-5 p-3 text-<?= $sitecek['site_yazirenk'] ?>" style="border-radius: 10px;background:<?= $sitecek['site_renk'] ?>" >Duyurular</div>	

<div class="card header" style="border-radius: 15px ; background:<?= $sitecek['site_sidebarrenk'] ?> ">

<h4 class="text-info" style="margin-top: 270px; position: absolute"><b><?= $duyurucek['duyuru_baslik'] ?></b></h4>
							
  <div class="card-body" style="background:<?= $sitecek['site_sidebarrenk'] ?>;border-radius: 15px ">
 <?php if (empty($ayarcek['ayar_oy'])) {?>
	<div class=" alert " style="background:<?= $sitecek['site_renk'] ?>">Oy Linki eklenmemiş </div>

<?php }else{
	$url = $ayarcek['ayar_oy'];
	header("Location: $url");
}


 ?>
   
  </div>
</div> 

		
</div>
		
	<?php 
	 require_once 'sidebar.php';

	 ?>

	


