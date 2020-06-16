<?php require_once 'header.php'; 
      require_once 'sidebar.php';


$kategorisor = $db->prepare("SELECT * FROM  urun_kategori");
$kategorisor->execute();










?>

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
     

             <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Ürün Ekleme</h6>
                </div>
                <?php if ($_GET['islem']=="format") {?>
                <div class=" alert badge-danger  alert-dismissible fade show"> Hata! Resim yüklerken sadece izin verilen dosya formatlarını yükleyebilirsiniz.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php }?>
                <div class="card-body">
                	<form method="post" action="ayar/islem.php"  enctype="multipart/form-data">

                    

    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Ürün Başlık*</label>
                      <div class="col-sm-9">
                        <input type="text"  class="form-control" name="urun_baslik" placeholder="Ürün başlığı giriniz.">
                      </div>
                    </div>


  <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Ürün Fiyat*</label>
                      <div class="col-sm-9">
                        <input type="number"  class="form-control" name="urun_fiyat" placeholder="Ürün fiyatı giriniz.">
                      </div>
                    </div>

  <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Ürün Süresi*</label>
                      <div class="col-sm-9">
                        <input type="number"  class="form-control" name="urun_sure" placeholder="Örn: 30 ">
                      </div>
                    </div>

    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Ürün Detay*</label>
                      <div class="col-sm-9">
                             <textarea  class="ckeditor" name="urun_detay"  id="editor1"></textarea>
                      </div>
                    </div>

      
   <div class="form-group row">
   	 <label for="inputEmail3" class="col-sm-3 col-form-label">Ürün Kategori*</label>
             

                     
                      <div class="col-sm-9">
                        <select class="form-control form-control-md  mb-3" required="" name="kategori_id">
                        	<?php while ($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) {?>
                     <option value="<?= $kategoricek['kategori_id'] ?>"><?= $kategoricek['kategori_ad'] ?></option>
                        <?php	} ?>
                   
                  </select>
                      </div>
                    </div>
               

                      <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Resim*</label>
                      <div class="col-sm-9">
                        <input type="file" required="" name="urun_resim"  class="form-control"  placeholder="Rcon şifresini giriniz.">
                      </div>
                    </div>
                         <hr>

     <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Komut</label>
                      <div class="col-sm-9">
                        <input type="text"  class="form-control" name="urun_komut" placeholder="Örn: setgroup">
                      </div>
                    </div>
                      <div class="form-group row">
                      <label for="inputEmail3"  class="col-sm-3 col-form-label">Süresi Başladığında Alacağı Yetki</label>
                      <div class="col-sm-9">
                        <input type="text"  class="form-control" name="urun_baslangickod" placeholder="Örn: VIP">
                      </div>
                    </div>
                        <div class="form-group row">
                      <label for="inputEmail3"  class="col-sm-3 col-form-label">Süresi Bittiğinde Döneceği Yetki</label>
                      <div class="col-sm-9">
                        <input type="text"  class="form-control" name="urun_bitiskod" placeholder="Örn: Oyuncu">
                      </div>
                    </div>






   <div class="form-group row text-right">
                      <div class="col-sm-10">
                        <button type="submit" name="urun-kaydet" class="btn btn-primary">Kaydet</button>
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