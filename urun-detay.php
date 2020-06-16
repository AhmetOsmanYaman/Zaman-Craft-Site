<?php 
ob_start();
require_once 'header.php';

 $urunsor = $db->prepare("SELECT * FROM urun where urun_seobaslik=:urun_seobaslik and urun_id=:urun_id");
 $urunsor->execute(array(
        'urun_seobaslik' => $_GET['sef'],
        'urun_id' => $_GET['urun_id']
 ));
 $uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);















 ?>





	<div class="container mt-5 mb-5 ">
	
	<div class="row">
   
      <div class="col-md-8 mb-4   text-white" >



      	 <?php if ($_GET['kredi']=="yetersiz") {?>
                <div class=" alert bg-danger  alert-dismissible fade show"> Kredi Yetersiz! Satın Alınamadı.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php } ?>
                                                    
               <div class="card" style= "background:  <?= $sitecek['site_sidebarrenk'] ?>;border-radius: 10px ">
              <div class="card-header" style="background:  <?= $sitecek['site_renk'] ?>;border-radius: 10px" >
                <?= $uruncek['urun_baslik'] ?> adlı ürün detayları
              </div>
              <div class="card-body">


                <div class="row store-cards">
                                                                              <div class="col-sm-12 col-md-3  text-center">
                     
                                                <img class=""  width="170" height="170"  src="<?= $uruncek['urun_resim'] ?>" alt=".">
                                            </div>
<hr>
                     
                       <div class="col-md-7 ">  <br><br>
                            <h4 class="text-center" style="color:gray">------Ürün Bilgisi------</h4>


               
                  <span class=" font-weight-bold text-center">Ürün Adı:</span>
                  <span class="badge badge-pill badge-primary text-center" ><?= $uruncek['urun_baslik'] ?></span><br>
                  <span class=" font-weight-bold text-center" >Fiyat:</span>
                 	<span class="badge badge-pill badge-warning text-center">  <?= $uruncek['urun_fiyat'] ?> kredi</span>
                  </span><br>

                  <span class=" font-weight-bold">Süre:</span>
                  <span class="">
                                           <span class="badge badge-danger badge-pill"><?= $uruncek['urun_sure'] ?> gün</span>
                                      </span><br>
                                      <hr>
                                       <h4 class="text-center" style="color:gray">------Ürün Açıklaması------</h4>
               
        
                                <p><?= $uruncek['urun_detay'] ?></p>

              
           
            <?php if ($kullanici) {?>
            	 <div class="col-auto text-right">
                <form method="post" action="ayar/kullanici.php">
                	<input type="hidden" name="urun_baslik" value="<?= $uruncek['urun_baslik'] ?>">
                	<input type="hidden" name="urun_fiyat" value="<?= $uruncek['urun_fiyat'] ?>">
                	<input type="hidden" name="urun_id" value="<?= $uruncek['urun_id'] ?>">
                	<input type="hidden" name="urun_sure" value="<?= $uruncek['urun_sure'] ?>">
                  <button onclick="return confirm('Satın alma işlemini onaylamak istiyormusunuz kredi hesabınızdan düşürülür (işlem geri alınamaz)')"  class="btn-success btn" name="sipariskayit"><i class="fa fa-shopping-cart"> Satın Al</i> </button>
                </div>
                </form>
            <?php }else{?>

 <div class="col-auto text-right">
              
                  <button  class="btn-success btn">
                  <a href="giris.php">  Giriş Yap</a>
                  </button>
                </div>
           <?php  } ?>
               
            
        
 




 </div>
             
              
                      </div>












                    </div>
                     
                                  </div>
              </div>
        
                       
		
	<?php 
	require_once 'sidebar.php';

	 ?>

	