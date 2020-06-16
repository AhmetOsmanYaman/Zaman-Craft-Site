<?php 
ob_start();
require_once 'header.php'; 


if (!$kullanici) {
	header("Location: index.php");
}

?>

	<div class="container mt-5 mb-5 ">
	
	<div class="row">
	<div class="col-md-8 mb-5">
		 <?php if ($_GET['durum']=="ok") {?>
                <div class=" alert bg-success  alert-dismissible fade show">Bilgiler Kaydedildi
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php }if ($_GET['odeme']=="ok") {?>
                <div class=" alert bg-success  alert-dismissible fade show">Krediniz Hesabınıza Yüklendi
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php } ?>
<div class="card " style=" background:<?= $sitecek['site_sidebarrenk'] ?> ">


	  <div class="card-header text-<?= $sitecek['site_yazirenk'] ?> mb-3" style="background: <?= $sitecek['site_renk'] ?> ">
		  
		  Profil Bilgilerim
	</div>
<div class="text-<?= $sitecek['site_yazirenk'] ?>">
		
 
          

             <td class=""><img  src="<?= $kullanicicek['kullanici_resim']?>" alt="Avatar" width="100px" class="float-right"> </td><p class="mt-4 ml-4" ><b>Oyuncu Adı: </b> <?php echo $kullanicicek['kullanici_username'] ?><br> <b>E-posta: </b> <?php echo $kullanicicek['kullanici_mail'] ?><br><b>Kredi: </b> <?php echo $kullanicicek['kullanici_kredi'] ?> <a href="odeme-yontemi.php"><i class="fa fa-plus-circle text-info"></i></a><br>
            
              
                     <b>Skype: </b><?php if (empty($kullanicicek['kullanici_skype'])) {
                       echo "-";
                     }else{
                        echo $kullanicicek['kullanici_skype'];
                     } ?><br>
                           <b>Discord:  </b><?php if (empty($kullanicicek['kullanici_discord'])) {
                       echo "-";
                     }else{
                        echo $kullanicicek['kullanici_discord'];
                     } ?><br><br>
                           <div class="text-center">
                           <a href="profil-duzenle.php"><button class="btn text-<?= $sitecek['site_yazirenk'] ?> btn-sm" style="background: <?= $sitecek['site_renk'] ?> ">Profili Düzenle</button></a>
                             <a href="sifre-degis.php"><button class="btn btn-sm text-<?= $sitecek['site_yazirenk'] ?>"  style="background: <?= $sitecek['site_renk'] ?> ">Şifeyi Değiştir</button></a>
                           </div>
<br>
   
              </p>

								


	  
	  


  </div>
</div> 
		

		
		
		
		
		
		
		
</div>
		
	<?php 
	 require_once 'sidebar.php';

	 ?>

	