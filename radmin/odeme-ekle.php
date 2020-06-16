<?php require_once 'header.php'; 
      require_once 'sidebar.php';


?>

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
     


             <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Genel Ayarlar</h6>
                </div>
                <div class="card-body">
                  <form method="post" action="ayar/islem.php">
                         <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Sunucu Ad*</label>
                      <div class="col-sm-9">
                        <input type="text" required="" class="form-control" name="ayar_sunucuad" value="<?= $ayarcek['ayar_sunucuad'] ?>" >
                      </div>
                    </div>
                     <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Sunucu Adres*</label>
                      <div class="col-sm-9">
                        <input type="text" required="" class="form-control"name="ayar_sunucuadres" value="<?= $ayarcek['ayar_sunucuadres'] ?>" >
                      </div>
                    </div>
                   
                     <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Sunucu Port*</label>
                      <div class="col-sm-9">
                        <input type="text" required="" class="form-control" name="ayar_sunucuport" value="<?= $ayarcek['ayar_sunucuport'] ?>" >
                      </div>
                    </div>
               

                      <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Rcon Şifre*</label>
                      <div class="col-sm-9">
                        <input type="password" required="" class="form-control" name="ayar_rconsifre" value="<?= $ayarcek['ayar_rconsifre'] ?>">
                      </div>
                    </div>
   <div class="form-group row text-right">
                      <div class="col-sm-10">
                        <button type="submit" name="sunucu" class="btn btn-primary">Kaydet</button>
                      </div>
                    </div>
                  </form>
                
                </div>
              </div>
        
        
       
      <?php require_once 'footer.php';?>

