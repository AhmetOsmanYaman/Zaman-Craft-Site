<?php require_once 'header.php'; 
      require_once 'sidebar.php';


$kategorisorr = $db->prepare("SELECT * FROM  urun_kategori ");
$kategorisorr->execute();





$urun = $db->prepare("SELECT * from urun where urun_id=:id");
$urun->execute(array(
        'id'=> $_GET['urun_id']
 ));
$uruncek = $urun->fetch(PDO::FETCH_ASSOC);






?>

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
     

             <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Ürün Düzenleme</h6>
                </div>
                <?php if ($_GET['islem']=="format") {?>
                <div class=" alert badge-danger  alert-dismissible fade show"> Hata! Resim yüklerken sadece izin verilen dosya formatlarını yükleyebilirsiniz.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php }?>
                <div class="card-body">
                	<form action="ayar/islem.php" method="post" enctype="multipart/form-data">
                		     <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Ürün baslik*</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="urun_baslik" value="<?= $uruncek['urun_baslik'] ?>" >
                      </div>
                    </div>
     <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Ürün Fiyat*</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" required="" name="urun_fiyat" value="<?= $uruncek['urun_fiyat'] ?>" >
                      </div>
                    </div>
                         <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Ürün Süresi*</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" required="" name="urun_sure" value="<?= $uruncek['urun_sure'] ?>" >
                      </div>
                    </div>

                     <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Ürün Detay*</label>
                      <div class="col-sm-9">
               <textarea  class="ckeditor" id="editor1" name="urun_detay"><?= $uruncek['urun_detay'] ?></textarea>
                      </div>
                    </div>
                   
              <div class="form-group row">
   	 <label for="inputEmail3" class="col-sm-3 col-form-label">Ürün Kategori*</label>
             

                     
                      <div class="col-sm-9">
                        <select class="form-control form-control-md  mb-3" required="" name="kategori_id">
                        <?php   
                        while ($kategoricek=$kategorisorr->fetch(PDO::FETCH_ASSOC)) {
                        
                if ($kategoricek['kategori_id']==$uruncek['kategori_id'] ) {?>
            <option selected="" value="<?= $kategoricek['kategori_id'] ?>"><?= $kategoricek['kategori_ad'] ?></option>
          <?php  }else{?>

              <option  value="<?= $kategoricek['kategori_id'] ?>"><?= $kategoricek['kategori_ad'] ?></option>
         <?php  } ?>
                        		


                    
                        <?php	} ?>
                   
                  </select>
                      </div>
                    </div>	

               

                      <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Resim*</label>
                      <div class="col-sm-9">
                         <img width="150" height="150" src="../<?= $uruncek['urun_resim'] ?>">
               <input type="file" required="" name="urun_resim"  value="<?= $uruncek['urun_resim'] ?>">

                    </div>

                      </div>


                          <hr>

     <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Komut</label>
                      <div class="col-sm-9">
                        <input type="text"  class="form-control" name="urun_komut" placeholder="Örn: setgroup" value="<?= $uruncek['urun_komut'] ?>">
                      </div>
                    </div>
                      <div class="form-group row">
                      <label for="inputEmail3"  class="col-sm-3 col-form-label">Süresi Başladığında Alacağı Yetki</label>
                      <div class="col-sm-9">
                        <input type="text"  class="form-control" name="urun_baslangickod" placeholder="Örn: VIP" value="<?= $uruncek['urun_baslangickod'] ?>">
                      </div>
                    </div>
                        <div class="form-group row">
                      <label for="inputEmail3"  class="col-sm-3 col-form-label">Süresi Bittiğinde Döneceği Yetki</label>
                      <div class="col-sm-9">
                        <input type="text"  class="form-control" name="urun_bitiskod" placeholder="Örn: Oyuncu" value="<?= $uruncek['urun_bitiskod'] ?>">
                      </div>
                    </div>
                   
   <div class="form-group row text-right">
                      <div class="col-sm-10">
                        <input type="hidden" name="urun_resimm" value="<?= $uruncek['urun_resim'] ?>">
                      	<input type="hidden" name="urun_id" value="<?= $_GET['urun_id'] ?>">
                        <button type="submit" name="urun-guncelle" class="btn btn-primary">Güncelle</button>
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