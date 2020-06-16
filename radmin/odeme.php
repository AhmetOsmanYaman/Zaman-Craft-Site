<?php require_once 'header.php'; 
      require_once 'sidebar.php';
$odesor = $db->prepare("SELECT * FROM odeme_yontemi WHERE odeme_id=2");
$odesor->execute();
$odecek=$odesor->fetch(PDO::FETCH_ASSOC);
?>

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
     

             <div class="card mb-4">
              <?php if ($_GET['durum']=="ok") {?>
                <div class=" alert badge-success  alert-dismissible fade show"> İşlem başarılı bir şekilde kaydedildi!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php }  if ($_GET['durum']=="no") {?>
                <div class=" alert bg-danger  alert-dismissible fade show"> Hata ! İşlem kaydedilemedi 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php } ?>
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Ödeme Yöntemi </h6>
                </div>
                <div class="card-body">
           
          
                <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Shopier Geri Dönüş Url:</label>
                      <div class="col-sm-9">
                        
                         <b >https://www.siteadı.uzantı/kredi/callback.php</b>
                      </div>
                    </div>
                  <form action="ayar/islem.php" method="post"> 
         
                        <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Ödeme Adı*</label>
                      <div class="col-sm-9">

                        <input type="text" class="form-control" disabled="" placeholder="<?= $odecek['odeme_ad'] ?>">
                      </div>
                    </div>
     <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Ödeme KullaniciAPI*</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="odeme_kullaniciapi" placeholder="Shopier API kullanıcı " value="<?= $odecek['odeme_kullaniciapi'] ?>">
                      </div>
                    </div>
     <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Ödeme ŞifreAPI*</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="odeme_sifreapi"placeholder="Shopier API şifre" value="<?= $odecek['odeme_sifreapi'] ?>">
                      </div>

                    </div>

<hr>
<?php $ininalsor = $db->prepare("SELECT * FROM odeme_yontemi WHERE odeme_id=1");
$ininalsor->execute();
$ininalcek=$ininalsor->fetch(PDO::FETCH_ASSOC); ?>
<div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Ödeme Adı*</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" disabled="" placeholder="<?= $ininalcek['odeme_ad'] ?>">
                      </div>
                    </div>
     <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">İninal Barkod*</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" name="ininal_barkod" placeholder="İninal Barkod" value="<?= $ininalcek['ininal_barkod'] ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">İninal Hediye*</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" name="ininal_hediye" placeholder="İninal ile alıma teşfik için oyunculara yönelik hediye Örn: %20 fazla kredi" value="<?= $ininalcek['ininal_hediye'] ?>">
                      </div>
                    </div>


   <div class="form-group row text-right">
                      <div class="col-sm-10">

                        <input type="hidden" name="odeme_ad" value="<?= $odecek['odeme_ad'] ?>">
                        <button type="submit" name="odemeyontem" class="btn btn-primary">Güncelle</button>
                      </div>
                    </div>
                  </form>
                
                </div>
              </div>
          <!--Row-->

        
       
      <?php require_once 'footer.php';?>