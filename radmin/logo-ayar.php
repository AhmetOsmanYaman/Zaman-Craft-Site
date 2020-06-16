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

          <?php } if ($_GET['islem']=="ok") {?>
                <div class=" alert badge-success  alert-dismissible fade show"> İşlem başarılı.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php }  if ($_GET['islem']=="format") {?>
                <div class=" alert badge-danger  alert-dismissible fade show"> Hata! Resim yüklerken sadece izin verilen dosya formatlarını yükleyebilirsiniz.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php }?>

             <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Logo Ayarlar</h6>
                </div>
                <div class="card-body">
                <form method="post" action="ayar/islem.php" enctype="multipart/form-data">
                		<div class="text-center">
                		 <img class="" src="../<?= $ayarcek['ayar_logo'] ?>" width="150" height="150">
                	
                		  <br>
                     <div class="form-group row">
                      <label  class="col-sm-3 col-form-label">Site Logo*</label>
                      <div class="col-sm-9">
                        <input type="file" required="" class="form-control" name="ayar_logo">
                      </div>
                    </div>
                 
            
       

   <div class="form-group row text-right">
                      <div class="col-sm-10">
                        <button type="submit" name="logo-ayar" class="btn btn-primary">Güncelle</button>
                      </div>
                    </div>
                	</form>
                
                </div>
              </div>
          <!--Row-->

        
       
<?php require_once 'footer.php';?>
