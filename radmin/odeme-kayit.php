<?php require_once 'header.php'; 
      require_once 'sidebar.php';


?>

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
     

             <div class="card mb-4">
<?php if ($_GET['islem']=="ok") {?>
                <div class=" alert badge-success  alert-dismissible fade show"> Ödeme kaydedildi kullanıcının kredisi gönderildi!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php }  if ($_GET['islem']=="no") {?>
                <div class=" alert bg-danger  alert-dismissible fade show"> Hata ! işlem kaydedilemedi
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php }  if ($_GET['islem']=="hatalibilgi") {?>
                <div class=" alert badge-danger  alert-dismissible fade show"> Hata! Girdiğiniz bilgiler uyuşmuyor
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php }?>



                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">İninal ödemeleri tamamlandıktan sonra sisteme kayıt etme</h6>
                
                </div>
                <div class="card-body">
                <form method="post" action="ayar/islem.php" >
                		
                		
               
      
                        <div class="form-group row">
                     
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Kullanıcı Adı*</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" required="" name="kullanici_username"  placeholder="Kullanıcı Adını Giriniz">
                      </div>
                    </div>
                      <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Kullanıcı E-posta*</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" required="" name="kullanici_mail" placeholder="Kullanıcı E-postasını Giriniz">
                      </div>
                    </div>
                      <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Kredi Miktarı</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control"  required="" name="kredi" placeholder="Kullanıcının Aldığı Kredi Miktarını Giriniz">
                      </div>
                    </div>
   <div class="form-group row text-right">
                      <div class="col-sm-10">
                        
                        <button onclick="return confirm('Girdiğin bilgilerin doğru olduğunu onaylıyor musun?')" type="submit" name="odeme-kayit" class="btn btn-primary">Ödeme Kayıt</button>
                      </div>
                    </div>
                	</form>
                
                </div>
              </div>
          <!--Row-->

        
       
<?php require_once 'footer.php';?>
