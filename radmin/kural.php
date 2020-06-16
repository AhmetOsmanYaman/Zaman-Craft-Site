<?php require_once 'header.php'; 
      require_once 'sidebar.php';

      $kuralsor = $db->prepare("SELECT * FROM kural");
 $kuralsor->execute();
$kuralcek = $kuralsor->fetch(PDO::FETCH_ASSOC);



?>

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
     

             <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Kural Güncelleme</h6>
                </div>


                <div class="card-body">

                	 <?php if ($_GET['islem']=="ok") {?>
                <div class=" alert badge-success  alert-dismissible fade show"> İşlem başarılı bir şekilde kaydedildi!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php }  if ($_GET['islem']=="no") {?>
                <div class=" alert badge-danger  alert-dismissible fade show"> İşlem başarısız şekilde kaydedildi!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php }?>
                	<form method="post" action="ayar/islem.php">

          
                     <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Kural Detay*</label>
                      <div class="col-sm-9">
                             <textarea  class="ckeditor" name="kural_detay" id="editor1"><?=$kuralcek['kural_detay']?></textarea>
                      </div>
                    </div>
                   
           


   <div class="form-group row text-right">
                      <div class="col-sm-10">
                        <button type="submit" name="kuralguncelle" class="btn btn-primary">Güncelle</button>
                      </div>
                    </div>
                	</form>
                
                </div>
              </div>
          <!--Row-->

        
       
      <?php require_once 'footer.php';?>
