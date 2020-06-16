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
                <form method="post" action="ayar/islem.php" >
                		
                		
               

                        <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Site Başlığı</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="ayar_title" value="<?= $ayarcek['ayar_title'] ?>" placeholder="Site Başlığı Giriniz">
                      </div>
                    </div>
                      <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Site Açıklama</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="ayar_description" value="<?= $ayarcek['ayar_description'] ?>" placeholder="Site açıklama Giriniz">
                      </div>
                    </div>
                      <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Site Anahtar Kelime</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="ayar_keywords" value="<?= $ayarcek['ayar_keywords'] ?>" placeholder="Site anahtar kelime giriniz">
                      </div>
                    </div>

                  
   <div class="form-group row text-right">
                      <div class="col-sm-10">
                        <button type="submit" name="genel-ayar" class="btn btn-primary">Güncelle</button>
                      </div>
                    </div>
                	</form>
                
                </div>
              </div>
          <!--Row-->

        
       
<?php require_once 'footer.php';?>
