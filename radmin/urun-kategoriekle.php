<?php require_once 'header.php'; 
      require_once 'sidebar.php';

?>

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
     

             <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Kategori Ekle</h6>
                </div>
                <div class="card-body">
                	<form action="ayar/islem.php" method="post"> 
                		
           
                        <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Kategori Adı*</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="kategori_ad" placeholder="magaza kategori adı giriniz">
                      </div>
                    </div>
   <div class="form-group row text-right">
                      <div class="col-sm-10">
                        <button type="submit" name="urun-kategorikaydet" class="btn btn-primary">Kaydet</button>
                      </div>
                    </div>
                	</form>
                
                </div>
              </div>
          <!--Row-->

        
       
      <?php require_once 'footer.php';?>