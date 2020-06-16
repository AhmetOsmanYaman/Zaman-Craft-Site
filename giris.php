<?php 


require_once 'header.php'; ?>
	<div class="container mt-5 mb-5 ">
		
	
		
		
	<div class="row">
	<div class="col-md-8 mb-5">
	



                <div class="card  border-0" style=" background:<?= $sitecek['site_renk'] ?>;">
          <div class="card-header text-<?= $sitecek['site_yazirenk'] ?> border-0">
            Giriş Yap
          </div>
          <div class="card-body  text-<?= $sitecek['site_yazirenk'] ?>" style="background:<?= $sitecek['site_sidebarrenk'] ?>">
          	  <?php if ($_GET['giris']=="error") {?>
                <div class=" alert bg-danger  alert-dismissible fade show"> Kullanıcı adı veya şifre yanlış
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php }  if ($_GET['mail']=="ok") {?>
                <div class=" alert bg-success  alert-dismissible fade show"> Yeni şifreniz mail adresinize gönderildi
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php } ?>
          <div class="mt-2"></div>
            <form action="ayar/kullanici.php" method="post">
              <div class="form-group">
                <input style="background: <?= $sitecek['site_sidebarrenk'] ?>;color:white; " type="text" class="form-control  " name="kullanici_username" placeholder="Kullanıcı Adı" value="" required="">
              </div>
            
              <div class="form-group">
                <input style="background: <?= $sitecek['site_sidebarrenk'] ?>;color:white; " type="password" class="form-control  " name="kullanici_password" placeholder="Şifre" required="">
              </div>
           
                            <div class="form-group custom-control custom-checkbox">
                <input style="" type="checkbox" class="custom-control-input" id="acceptRules" name="acceptRules" checked="checked">
                <label class="custom-control-label" for="acceptRules">
                 Beni Hatırla
                </label>
								<span class="pull-right  "><a class="text-<?= $sitecek['site_yazirenk'] ?>; " href="sifremi-unuttum.php">Şifremi Unuttum?</a></span>
              </div>
            <button type="submit" class=" btn text-<?= $sitecek['site_yazirenk'] ?> w-100" name="giris-yap" style="background: <?= $sitecek['site_renk'] ?>">Giriş Yap</button>
            </form>
          </div>
       
        </div>
   

   
	
   
		
		
		
</div>
<?php 
require_once 'sidebar.php';


 ?>