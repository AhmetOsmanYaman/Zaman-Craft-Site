<?php require_once 'header.php'; 
      require_once 'sidebar.php';



$kupon = $db->prepare("SELECT * from kupon where kupon_id=:id");
$kupon->execute(array(
        'id'=> $_GET['kupon_id']
 ));
$kuponcek = $kupon->fetch(PDO::FETCH_ASSOC);







?>

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
       <?php if ($_GET['islem']=="format") {?>
                <div class=" alert badge-danger  alert-dismissible fade show"> Hata! Resim yüklerken sadece izin verilen dosya formatlarını yükleyebilirsiniz.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php }?>

             <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">kupon Ekleme</h6>
                </div>
                <div class="card-body">
                		<form method="post" action="ayar/islem.php">

    

                		     <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Kupon Kodu*</label>
                      <div class="col-sm-9">
                        <input type="text" required="" class="form-control" name="kupon_ad" value="<?= $kuponcek['kupon_ad']?>" >
                      </div>
                    </div>

                		     <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Kupon Miktar*</label>
                      <div class="col-sm-9">
                        <input type="number" required="" class="form-control" name="kupon_miktar" value="<?= $kuponcek['kupon_miktar']?>" >
                      </div>
                    </div>

                		     <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Kupon Komut*</label>
                      <div class="col-sm-9">
                        <input type="text" required="" class="form-control" name="kupon_komut" value="<?= $kuponcek['kupon_komut']?>" >
                      </div>
                    </div>
                     
                   
           


                       <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Kupon KomutMiktarı*</label>
                      <div class="col-sm-9">
                        <input type="number" required="" class="form-control" name="kupon_komutmiktar" value="<?= $kuponcek['kupon_komutmiktar']?>" >
                      </div>
                    </div>
               

           <input type="hidden" name="kupon_id" value="<?= $_GET['kupon_id'] ?>">

   <div class="form-group row text-right">
                      <div class="col-sm-10">
                        <button type="submit" name="kupon-duzenle" class="btn btn-primary">Kaydet</button>
                      </div>
                    </div>
                	</form>
                
                </div>
              </div>
          <!--Row-->

        
       
      <?php require_once 'footer.php';?>
