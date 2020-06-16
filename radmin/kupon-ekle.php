<?php require_once 'header.php'; 
      require_once 'sidebar.php';
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
                  <h6 class="m-0 font-weight-bold text-primary">Kupon Ekleme</h6>
                </div>
                <div class="card-body">
                	<form method="post" action="ayar/islem.php">

    

                		     <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Kupon Kodu*</label>
                      <div class="col-sm-9">
                        <input type="text" required="" class="form-control" name="kupon_ad" placeholder="Oluşturmak istediğiniz kupon kodunu giriniz" >
                      </div>
                    </div>

                		     <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Kupon Miktar*</label>
                      <div class="col-sm-9">
                        <input type="number" required="" class="form-control" name="kupon_miktar" placeholder="Kuponun miktarını giriniz" >
                      </div>
                    </div>

                		     <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Kupon Komut*</label>
                      <div class="col-sm-9">
                        <input type="text" required="" class="form-control" name="kupon_komut" placeholder="Örn: givemoney  ( nick girmeyiniz!!! )" >
                      </div>
                    </div>
                     
                   
           


                       <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Kupon KomutMiktarı*</label>
                      <div class="col-sm-9">
                        <input type="number" required=""  class="form-control" name="kupon_komutmiktar" placeholder="Örn: 250" >
                      </div>
                    </div>
               



   <div class="form-group row text-right">
                      <div class="col-sm-10">
                        <button type="submit" name="kupon-ekle" class="btn btn-primary">Kupon Oluştur</button>
                      </div>
                    </div>
                	</form>
                
                </div>
              </div>
          <!--Row-->

        
       
      <?php require_once 'footer.php';?>

