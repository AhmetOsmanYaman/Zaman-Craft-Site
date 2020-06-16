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
<?php if ($_GET['islem']=="ok") {?>
                <div class=" alert badge-success  alert-dismissible fade show"> İşlem başarılı bir şekilde kaydedildi!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php }  if ($_GET['islem']=="formathata") {?>
                <div class=" alert bg-danger  alert-dismissible fade show"> Hata ! İşlem Kaydedilemedi
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php } ?>



                	<form action="ayar/islem.php" method="post">
                     <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Smtp Host*</label>
                      <div class="col-sm-9">
                        <input type="text" required="" value="<?= $ayarcek['ayar_smtphost'] ?>" name="ayar_smtphost" class="form-control" placeholder="Smtp hostunuzu giriniz" >
                      </div>
                    </div>
                   
                     <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Smtp MailAdres*</label>
                      <div class="col-sm-9">
                        <input type="text" value="<?= $ayarcek['ayar_smtpuser'] ?>" name="ayar_smtpuser" required="" class="form-control"  placeholder="Smtp mail adresini giriniz" >
                      </div>
                    </div>
                  
               

                      <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Smtp Şifre*</label>
                      <div class="col-sm-9">
                        <input type="text" value="<?= $ayarcek['ayar_smtpsifre'] ?>" name="ayar_smtpsifre" required="" class="form-control"  placeholder="Smtp şifrenizi giriniz">
                      </div>
                    </div>
                      <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Smtp Port*</label>
                      <div class="col-sm-9">
                        <input type="text" value="<?= $ayarcek['ayar_smtpport'] ?>" name="ayar_smtpport" required="" class="form-control"  placeholder="Smtp portunuzu giriniz  (587)" >
                      </div>
                    </div>
   <div class="form-group row text-right">
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary" name="smtpkaydet">Kaydet</button>
                      </div>
                    </div>
                	</form>
                
                </div>
              </div>
          <!--Row-->

        
       
      <?php require_once 'footer.php';?>

 <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>