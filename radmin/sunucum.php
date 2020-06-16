<?php require_once 'header.php'; 
      require_once 'sidebar.php';

?>

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
     

          <div class="row mb-3">
       

     
       
            
           
            <!-- DataTable with Hover -->
            <div class="col-lg-12 col-12">
   
 <?php if ($_GET['islem']=="ok") {?>
                <div class=" alert badge-success  alert-dismissible fade show"> İşlem başarılı bir şekilde kaydedildi!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php }  if ($_GET['islem']=="no") {?>
                <div class=" alert bg-danger  alert-dismissible fade show"> Hata ! işlem kaydedilemedi
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php } ?>
          <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">

                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

                  <h6 class="m-0 font-weight-bold text-primary">Sunucularım</h6>

                  <?php if (empty($sunucucek['sunucu_adres'])) { ?>
                     <a href="sunucu-islem.php?ekle=ok"><button class="btn btn-info">Sunucu-ekle</button></a>
                  <?php }else{?>
                    
                   <a href="sunucu-islem.php?duzen=ok&sunucu_id=<?=$sunucucek['sunucu_id'] ?>"><button class="btn btn-info">Sunucu-Düzenle</button></a>
              <?php } ?>
                     
                </div>
                <div class="table-responsive">

                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">

                      <tr>
                        <th>Sunucu Ad</th>
                        <th>Sunucu Adres</th>
                        <th>Sunucu Port</th>
                      </tr>
                    </thead>
                    <tbody>
                     
                     
                      
                      <tr>
                        <td><?= $sunucucek['sunucu_ad'] ?></td>
                        <td><?= $sunucucek['sunucu_adres'] ?></td>
                        <td><?= $sunucucek['sunucu_port'] ?></td>
                      
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>
          <!--Row-->
        </div>
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