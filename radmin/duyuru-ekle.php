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
                  <h6 class="m-0 font-weight-bold text-primary">Duyuru Ekleme</h6>
                </div>
                <div class="card-body">
                	<form method="post" action="ayar/islem.php"  enctype="multipart/form-data">

                    

    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Yazar*</label>
                      <div class="col-sm-9">
                        <input type="text" disabled="" class="form-control" name="duyuru_yazar" value="<?= $kullanici['kullanici_username'] ?>">
                      </div>
                    </div>

                		     <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Duyuru baslik*</label>
                      <div class="col-sm-9">
                        <input type="text" required="" class="form-control" name="duyuru_baslik" placeholder="Başlık giriniz" >
                      </div>
                    </div>
                     <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Duyuru Detay*</label>
                      <div class="col-sm-9">
                             <textarea  class="ckeditor" name="duyuru_detay"  id="editor1"></textarea>
                      </div>
                    </div>
                   
           


                       <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Duyuru Kategori*</label>
                      <div class="col-sm-9">
                        <input type="text" required="" class="form-control" name="duyuru_kategoriad" placeholder="Örn:Genel (max 10 harf giriniz)" >
                      </div>
                    </div>
               

                      <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Resim*</label>
                      <div class="col-sm-9">
                        <input type="file" required="" name="duyuru_resim"  class="form-control"  placeholder="Rcon şifresini giriniz.">
                      </div>
                    </div>



   <div class="form-group row text-right">
                      <div class="col-sm-10">
                        <button type="submit" name="duyuru-kaydet" class="btn btn-primary">Kaydet</button>
                      </div>
                    </div>
                	</form>
                
                </div>
              </div>
          <!--Row-->

        
       
      <?php require_once 'footer.php';?>

