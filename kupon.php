<?php 
require_once 'header.php';
if (!$kullanici) { 
 header("Location:index.php?giris=no"); 
 }


$ayarsor = $db->prepare("SELECT * FROM ayar where ayar_id=0");
$ayarsor->execute();
$ayarcek = $ayarsor->fetch(PDO::FETCH_ASSOC);

?>





	<div class="container mt-5 mb-5  text-<?= $sitecek['site_yazirenk'] ?>">
	
	<div class="row">
	<div class="col-md-8 mb-5">


    <div class="card border-0" style="background: <?= $sitecek['site_renk'] ?> ">
          <div class="card-header text-<?= $sitecek['site_yazirenk'] ?>  border-0">
            Kupon
          </div>
          <div class="card-body  text-<?= $sitecek['site_yazirenk'] ?>" style="background: <?= $sitecek['site_sidebarrenk'] ?>">
          	  <?php if ($_GET['kupon']=="no") {?>
                <div class=" alert bg-danger  alert-dismissible fade show">Girdiğiniz kupon kodu geçersiz
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php }  if ($_GET['kupon']=="ok") {?>
                <div class=" alert bg-success  alert-dismissible fade show"> Kupon kodu başarıyla bozduruldu
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php } if ($_GET['kupon']=="hakkinizyok") {?>
                <div class=" alert bg-danger  alert-dismissible fade show">Kupon kodunu zaten kullandın.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php }  ?>
          <div class="mt-2"></div>
            <form action="ayar/kullanici.php" method="post">
              
            
              <div class="form-group">
                <input style="background: <?= $sitecek['site_sidebarrenk'] ?>" type="text" class="form-control  " name="kupon_ad" placeholder="Kupon kodunu buraya giriniz" required="">
              </div>
                   <button type="submit" onclick="return confirm('bazı durumlarda serverde olman gerekebilir yoksa eşya gelmiyebilir her kupon kodunu sadece 1 defa kullanabilirsin (kupon kodunu onaylıyor musun)')" class=" btn  w-100 text-<?= $sitecek['site_yazirenk'] ?>"  style="background: <?= $sitecek['site_renk'] ?>" name="kupon">Kuponu Bozdur</button>
            </form>
          </div>
         
        </div>
   
		
</div>
		
	<?php 
	 require_once 'sidebar.php';

	 ?>

	


