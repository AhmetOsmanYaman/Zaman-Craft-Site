<?php 

require_once 'header.php'; ?>
	<div class="container mt-5 mb-5 ">
		
	
		
		
	<div class="row">
	<div class="col-md-8 mb-5">
	



                <div class="card  border-0" style="background: <?= $sitecek['site_renk'] ?>">
          <div class="card-header text-<?= $sitecek['site_yazirenk'] ?>  border-0">
            Kayıt Ol
          </div>
          <div class="card-body  text-<?= $sitecek['site_yazirenk'] ?>" style="background: <?= $sitecek['site_sidebarrenk'] ?>">
          	  <?php if ($_GET['durum']=="no") {?>
                <div class=" alert bg-danger  alert-dismissible fade show">Kayıt yapılamadı
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php } if ($_GET['durum']=="ok") {
       header("refresh:2;url=giris.php");

          	?>
                <div class=" alert bg-success  alert-dismissible fade show">Kayıt Başarılı! Giriş sayfasına yölendiriliyorsun.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php } if ($_GET['durum']=="sifrekisa") {?>
                <div class=" alert bg-danger  alert-dismissible fade show">Şifreniz çok kolay
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php } if ($_GET['durum']=="uyemevcut") {?>
                <div class=" alert bg-danger  alert-dismissible fade show">Zaten böyle bir üye mevcut
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php } if ($_GET['durum']=="sifreuyusmuyor") {
       header("refresh:2;url=giris.php");

          	?>
                <div class=" alert bg-success  alert-dismissible fade show">Hata! Şifre uyuşmuyor.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php }?>         <div class="mt-2"></div>
            <form action="ayar/kullanici.php" method="post">
              <div class="form-group">
                <input style="background: <?= $sitecek['site_sidebarrenk'] ?>;color:white; " type="text" class="form-control  " name="kullanici_username" placeholder="Oyuncu Adı"  required="">
              </div>
             <div class="form-group">
                <input style="background: <?= $sitecek['site_sidebarrenk'] ?>;color:white;" type="text" class="form-control  " name="kullanici_mail" placeholder="Email Adresi"  required="">
              </div>
              <div class="form-group">
                <input style="background: <?= $sitecek['site_sidebarrenk'] ?>;color:white;" type="password" class="form-control  " name="password1" placeholder="Şifre" required="">
              </div>
               <div class="form-group">
                <input style="background: <?= $sitecek['site_sidebarrenk'] ?>;color:white;" type="password" class="form-control  " name="password2" placeholder="Şifre(tekrar)" required="">
              </div>
                  <div class="form-group">
                <input style="background: <?= $sitecek['site_sidebarrenk'] ?>;color:white;" type="number" class="form-control  " name="kullanici_guvenlikkod" placeholder="Güvenlik kodunuz" required="">
              </div>
           
                            <div class="form-group custom-control custom-checkbox">
                <input style="background: <?= $sitecek['site_sidebarrenk'] ?>" type="checkbox" class="custom-control-input" id="acceptRules" name="acceptRules" checked="checked" required="">
                <label class="custom-control-label" for="acceptRules">
                <a href="kurallar.php">Kuralları</a> okudum kabul ediyorum
                </label>
								
              </div>
                        <button type="submit" class=" btn  text-<?= $sitecek['site_yazirenk'] ?>  w-100" name="kayit-ol" style="background: <?= $sitecek['site_renk'] ?>">Kayıt Ol</button>
            </form>
          </div>
   
        </div>
   

   
	
   
		
		
		
</div>
<?php 
require_once 'sidebar.php';


 ?>