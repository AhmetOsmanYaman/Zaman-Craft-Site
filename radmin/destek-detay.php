<?php require_once 'header.php'; 
      require_once 'sidebar.php';


$destek = $db->prepare("SELECT destek_kategori.*,destek.*,kullanici.kullanici_id,kullanici.kullanici_username FROM destek INNER JOIN kullanici ON kullanici.kullanici_id=destek.kullanici_id  INNER JOIN destek_kategori ON destek_kategori.destekkategori_id = destek.destekkategori_id where destek_id=:destek_id");
$destek->execute(array(
   'destek_id' => $_GET['destek_id']

));
$destekcek = $destek->fetch(PDO::FETCH_ASSOC);



?>

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
     

             <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Destek Ekleme</h6>
                </div>
                <div class="card-body">
                  <form method="post" action="ayar/islem.php"  enctype="multipart/form-data">




    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Oyuncu Adı*</label>
                      <div class="col-sm-9">
                        <input type="text" disabled="" class="form-control"  value="<?= $destekcek['kullanici_username'] ?>">
                      </div>
                    </div>

                         <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Destek baslik*</label>
                      <div class="col-sm-9">
                        <input disabled="" type="text" required="" class="form-control"  value="<?= $destekcek['destek_baslik'] ?>" >
                      </div>
                    </div>
     <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Destek Kategori*</label>
                      <div class="col-sm-9">
                        <input type="text" disabled=""  class="form-control" name="Destek_kategoriad" value="<?= $destekcek['kategori_ad'] ?>" >
                      </div>
                    </div>
               


                         <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Destek Detay*</label>
                      <div class="col-sm-9">
                             <textarea disabled="" id="ckeditor1"  class="form-control ckeditor"><?= $destekcek['destek_detay'] ?></textarea>
                      </div>
                    </div>

                     <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Cevap Yaz*</label>
                      <div class="col-sm-9">
                             <textarea  class="ckeditor" name="destek_cevap"  id="editor1"></textarea>
                      </div>
                    </div>
                   
           
            <input type="hidden" name="destek_id" value="<?= $_GET['destek_id'] ?>">
   <div class="form-group row text-right">
                      <div class="col-sm-10">
                        <button type="submit" name="destek-cevap" class="btn btn-primary">Cevabı Gönder</button>
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