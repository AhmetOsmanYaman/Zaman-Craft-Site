<?php 
ob_start();
require_once 'header.php'; ?>
	<div class="container mt-5 mb-5 ">
		
	
		
		
	<div class="row">
	<div class="col-md-8 mb-5">
	



                <div class="card  border-0" style="background:<?= $sitecek['site_renk'] ?>">
          <div class="card-header text-<?= $sitecek['site_yazirenk'] ?>  border-0">
           Şifremi Unuttum
          </div>
          <div class="card-body  text-<?= $sitecek['site_yazirenk'] ?>" style="background:<?= $sitecek['site_sidebarrenk'] ?>">
          	  <?php if ($_GET['durum']=="mailno") {?>
                <div class=" alert bg-danger  alert-dismissible fade show"> Hata Mail Göderilermedi
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php } if ($_GET['giris']=="hatalibilgi") {?>
                <div class=" alert bg-danger  alert-dismissible fade show">Kayıt Bulunamadı!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php }?>
          <div class="mt-2"></div>
            <form action="sifre-sifirlama.php" method="post">
              <div class="form-group">
                <input style="background:<?= $sitecek['site_sidebarrenk'] ?>" type="text" class="form-control  " name="kullanici_username" placeholder="Kullanıcı Adı" value="" required="">
              </div>
            
              <div class="form-group">
                <input style="background:<?= $sitecek['site_sidebarrenk'] ?>" type="email" class="form-control  " name="kullanici_mail" placeholder="Email Adresi" required="">
              </div>
                  <div class="form-group">
                <input style="background:<?= $sitecek['site_sidebarrenk'] ?>" type="number" class="form-control  " name="kullanici_guvenlikkod" placeholder="Kayıtlı güvenlik kodunu giriniz" required="">
              </div>
       
              <button type="submit" class=" btn  text-<?= $sitecek['site_yazirenk'] ?> w-100" name="sifremiunuttum" style="background:<?= $sitecek['site_renk'] ?>">Giriş Yap</button>
            </form>
          </div>
          <div class="card-footer text-<?= $sitecek['site_yazirenk'] ?> text-center" style="background:<?= $sitecek['site_renk'] ?>">
           Şifreni hatırladın mı?
            <a href="giris.php" class="text-<?= $sitecek['site_yazirenk'] ?>">Giriş Yap</a>
          </div>
        </div>
   

   
	
   
		
		
		
</div>
<?php 
require_once 'sidebar.php';
require_once 'footer.php';

 ?>