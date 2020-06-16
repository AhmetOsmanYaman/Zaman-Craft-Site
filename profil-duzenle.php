<?php 
ob_start();
require_once 'header.php'; 

$kullanici = $_SESSION['oturum'];
if (!$kullanici) {
	header("Location: index.php");
}

?>

	<div class="container mt-5 mb-5 ">
	
	<div class="row">
	<div class="col-md-8 mb-5">

<div class="card "  style="background: <?= $sitecek['site_arkarenk'] ?>">


	 
<div class="text-<?= $sitecek['site_yazirenk'] ?>">
		

      <div class="card border-0" style="background: <?= $sitecek['site_renk'] ?>" >
          <div class="card-header text-<?= $sitecek['site_yazirenk'] ?>  border-0">
            Profil Düzenle
          </div>
         <div class="card-body text-<?= $sitecek['site_yazirenk'] ?>" style="background: <?= $sitecek['site_sidebarrenk'] ?>">
         		  <?php if ($_GET['durum']=="error") {?>
                <div class=" alert bg-danger  alert-dismissible fade show"> Şifre yanlış
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php }  if ($_GET['durum']=="ok") {?>
                <div class=" alert bg-success  alert-dismissible fade show"> Bilgileriniz Kaydedildi
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php } ?>
                <form action="ayar/kullanici.php" method="post">
                 
                   
                    
                 
                
                  <div class="form-group row">
                    <label class="col-sm-3">Email Adresi:</label>
                    <div class="col-sm-9">
                      <input style="background: <?= $sitecek['site_sidebarrenk'] ?>" type="email" class="form-control" name="kullanici_mail" placeholder="Örn: merhaba@gmail.com" value="<?= $kullanicicek['kullanici_mail'] ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3">Skype:</label>
                    <div class="col-sm-9">
                      <input style="background: <?= $sitecek['site_sidebarrenk'] ?>" type="text" class="form-control" name="kullanici_skype" placeholder="Skype adresinizi giriniz." value="<?= $kullanicicek['kullanici_skype'] ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3">Discord:</label>
                    <div class="col-sm-9">
                      <input style="background: <?= $sitecek['site_sidebarrenk'] ?>" type="text" class="form-control" name="kullanici_discord" placeholder="Discord adresinizi giriniz." value="<?= $kullanicicek['kullanici_discord'] ?>">
                    </div>
                  </div>
                                    <hr>
                  <div class="form-group row">
                    <label class="col-sm-3">Şifre:*</label>
                    <div class="col-sm-9">
                      <input style="background: <?= $sitecek['site_sidebarrenk'] ?>" type="password" class="form-control" name="kullanici_password" placeholder="Değişiklerin onaylanması için mevcut şifrenizi giriniz.">
                    </div>
                  </div>
                    <input type="hidden" name="kullanici_username" value="<?= $kullanicicek['kullanici_username'] ?>">
                               <div class="clearfix">
                    <div class="float-right">

                      <button type="submit" class="btn btn-success btn-rounded" name="profil-guncelle">Kaydet</button>
                    </div>
                  </div>
                </form>
              </div>
       
        </div>
<br>
   
              </p>

								


	  
	  


  </div>
</div> 
		

		
		
		
		
		
		
		
</div>
		
	<?php 
	 require_once 'sidebar.php';

	 ?>

	