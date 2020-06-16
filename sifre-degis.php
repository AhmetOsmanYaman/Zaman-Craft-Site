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

<div class="card " style=" background:<?= $sitecek['site_arkarenk'] ?> ">


	 
<div class="text-<?= $sitecek['site_yazirenk'] ?>">
		

      <div class="card border-0" style="background:<?= $sitecek['site_renk'] ?>" >
          <div class="card-header text-<?= $sitecek['site_yazirenk'] ?>  border-0">
            Şifre Değiştirme
          </div>
         <div class="card-body text-<?= $sitecek['site_yazirenk'] ?>" style=" background:<?= $sitecek['site_sidebarrenk'] ?>   ">
         		  <?php if ($_GET['durum']=="sifreuyusmuyor") {?>
                <div class=" alert bg-danger  alert-dismissible fade show"> Girdiğiniz Şifreler uyuşmuyor
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php } 
                  if ($_GET['durum']=="hata") {?>
                <div class=" alert bg-danger  alert-dismissible fade show">Girdiğiniz şifre eskisiyle aynı!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php } 	
            

          	if ($_GET['durum']=="sifrekisa") {?>
                <div class=" alert bg-danger  alert-dismissible fade show"> Şifreniz Çok Kısa
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>


          <?php }  	if ($_GET['durum']=="error") {?>
                <div class=" alert bg-danger  alert-dismissible fade show"> Mevcut şifrenizi hatalı girdiniz
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php } if ($_GET['durum']=="ok") {?>
                <div class=" alert bg-success  alert-dismissible fade show">Şifreniz başarıyla değiştirildi
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php } ?>
                <form action="ayar/kullanici.php" method="post">
                 
                   
                    
                 
                
                  <div class="form-group row">
                    <label class="col-sm-3">Mevcut Şifre: *</label>
                    <div class="col-sm-9">
                      <input style="background:<?= $sitecek['site_sidebarrenk'] ?>" type="password" class="form-control" required="" name="kullanici_password" placeholder="Mevcut şifrenizi giriniz">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3">Yeni Şifre: *</label>
                    <div class="col-sm-9">
                      <input style="background:<?= $sitecek['site_sidebarrenk'] ?>" type="password" class="form-control" name="password1" required="" placeholder="Şifrenizi giriniz." 	>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3">Yeni Şifre (Tekrar): *</label>
                    <div class="col-sm-9">
                      <input style="background:<?= $sitecek['site_sidebarrenk'] ?>" type="password" class="form-control" name="password2" required="" placeholder="Şifrenizi tekrar giriniz." >
                    </div>
                  </div>
                                    <hr>
                
                    <input type="hidden" name="kullanici_username" value="<?= $kullanicicek['kullanici_username'] ?>">
                               <div class="clearfix">
                    <div class="float-right">

                      <button type="submit" class="btn btn-success btn-rounded" name="profil-sifreguncelle">Kaydet</button>
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

	