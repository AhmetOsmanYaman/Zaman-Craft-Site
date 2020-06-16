<?php require_once 'header.php'; 
      require_once 'sidebar.php';



$duyuru = $db->prepare("SELECT * from duyuru where duyuru_id=:id");
$duyuru->execute(array(
        'id'=> $_GET['duyuru_id']
 ));
$duyurucek = $duyuru->fetch(PDO::FETCH_ASSOC);







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
                  <h6 class="m-0 font-weight-bold text-primary">Duyuru Ekleme</h6>
                </div>
                <div class="card-body">
                	<form action="ayar/islem.php" method="post" enctype="multipart/form-data">
                		     <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Duyuru baslik*</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="duyuru_baslik" value="<?= $duyurucek['duyuru_baslik'] ?>" >
                      </div>
                    </div>
                     <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Duyuru Detay*</label>
                      <div class="col-sm-9">
               <textarea  class="ckeditor" id="editor1" name="duyuru_detay"><?= $duyurucek['duyuru_detay'] ?></textarea>
                      </div>
                    </div>
                   
           


                  <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Duyuru Kategori*</label>
                      <div class="col-sm-9">
               <input type="text"  class="form-control" name="duyuru_kategoriad" value="<?= $duyurucek['duyuru_kategoriad'] ?>" >
                      </div>
                    </div>
                   
               

                      <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Resim*</label>
                      <div class="col-sm-9">
               <input type="file" required="" name="duyuru_resim"  value="<?= $duyurucek['duyuru_resim'] ?>">
 
                    </div>

                      </div>
                   
   <div class="form-group row text-right">
                      <div class="col-sm-10">
                        <input type="hidden" name="duyuru_resimm" value="<?= $duyurucek['duyuru_resim'] ?>">
                      	<input type="hidden" name="duyuru_id" value="<?= $_GET['duyuru_id'] ?>">
                        <button type="submit" name="duyuru-guncelle" class="btn btn-primary">Kaydet</button>
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