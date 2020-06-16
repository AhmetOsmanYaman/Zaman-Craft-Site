<?php 
ob_start();
require_once 'header.php'; 

 $kullanicii = $db->prepare("SELECT * FROM kullanici  where kullanici_username=:username");
 $kullanicii->execute(array(
        'username' => $_GET['sef']

 ));
  $kullanicicekk = $kullanicii->fetch(PDO::FETCH_ASSOC);

 if ($kullanici['kullanici_username']==$_GET['sef']) {
	header("Location: profil.php");
} ?>
	<div class="container mt-5 mb-5 ">
	
	<div class="row">
	<div class="col-md-8 mb-5">
		 <?php if ($_GET['durum']=="ok") {?>
                <div class=" alert bg-success  alert-dismissible fade show">Bilgiler Kaydedildi
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php } ?>
<div class="card " style=" background: <?= $sitecek['site_arkarenk'] ?>   ">


	  <div class="card-header text-<?= $sitecek['site_yazirenk'] ?> mb-3" style="text-text-<?= $sitecek['site_yazirenk'] ?>;background-color:<?= $sitecek['site_renk'] ?>">
		  
		 <?= $kullanicicekk['kullanici_username']." "."adlı oyuncunun bilgileri"?>
	</div>
<div class="text-<?= $sitecek['site_yazirenk'] ?>">
		
 
          

             <td class=""><img  src="<?php echo $kullanicicekk['kullanici_resim'] ?> " alt="Avatar" width="100px" class="float-right"> </td><p class="mt-4 ml-4" ><b>Oyuncu Adı: </b> <?php echo $kullanicicekk['kullanici_username'] ?><br><b>Kredi: </b> <?php echo $kullanicicekk['kullanici_kredi'] ?> <a href=""></a><br>
            
              
                     <b>Skype: </b><?php if (empty($kullanicicekk['kullanici_skype'])) {
                       echo "-";
                     }else{
                        echo $kullanicicekk['kullanici_skype'];
                     } ?><br>
                           <b>Discord:  </b><?php if (empty($kullanicicekk['kullanici_discord'])) {
                       echo "-";
                     }else{
                        echo $kullanicicekk['kullanici_discord'];
                     } ?>
                      <br> <b>Kayıt Tarihi: </b> <?php echo $kullanicicekk['kullanici_kayittarih'] ?>
                     <br><br>
                           <div class="text-center">
                           <a href="kredigonder-<?= seo($kullanicicekk['kullanici_username']) ?>"><button class="btn btn-sm btn-success">Kredi Gönder</button></a>
                           
                           </div>
<br>
   
              </p>

								


	  
	  


  </div>
</div> 
		

		
		
		
		
		
		
		
</div>
		
	<?php 
	 require_once 'sidebar.php';

	 ?>

	