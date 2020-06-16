<?php require_once 'header.php'; 
      require_once 'sidebar.php';



$eklenti = $db->prepare("SELECT * from eklenti where eklenti_id=:id");
$eklenti->execute(array(
        'id'=> $_GET['eklenti_id']
 ));
$eklenticek = $eklenti->fetch(PDO::FETCH_ASSOC);







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
                  <h6 class="m-0 font-weight-bold text-primary">Eklenti Ayar</h6>
                </div>
                <div class="card-body">
                	<form action="ayar/islem.php" method="post" enctype="multipart/form-data">


                		     <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Eklenti Adı*</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" disabled="" value="<?= $eklenticek['eklenti_ad'] ?>" >
                      </div>
                    </div>

	     <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Nasıl Eklerim</label>
                      <div class="col-sm-9">
                       <textarea class="form-control" disabled=""><?= $eklenticek['eklenti_bilgi'] ?></textarea>
                      </div>
                    </div>

                     <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Eklenti Kod*</label>
                      <div class="col-sm-9">
               <textarea  class="form-control" name="eklenti_kod"><?= $eklenticek['eklenti_kod'] ?></textarea>
                      </div>
                    </div>
                   
           

	     <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Eklenti Adı*</label>
                      <div class="col-sm-9">
                        <select class="form-control" name="eklenti_durum">
                        	<?php if ($eklenticek['eklenti_durum']==1) {?>
                        	<option selected="" value="1">Aktif</option>
                        	<?php }else{?>
                             <option value="1">Aktif</option>
                        	<?php } ?>
                        		<?php if ($eklenticek['eklenti_durum']==0) {?>
                        	<option selected="" value="0">Pasif</option>
                        	<?php }else{?>
                             <option value="0">Pasif</option>
                        	<?php } ?>
                        
                        	
                        	
                        </select>
                      </div>
                    </div>
              
               

                   
   <div class="form-group row text-right">
                      <div class="col-sm-10">
                        <input type="hidden" name="eklenti_resimm" value="<?= $eklenticek['eklenti_resim'] ?>">
                      	<input type="hidden" name="eklenti_id" value="<?= $_GET['eklenti_id'] ?>">
                        <button type="submit" name="eklenti-guncelle" class="btn btn-primary">Kaydet</button>
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