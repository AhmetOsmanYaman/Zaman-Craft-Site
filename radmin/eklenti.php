<?php require_once 'header.php'; 
      require_once 'sidebar.php';

$eklenticeksor = $db->prepare("SELECT * FROM eklenti order by  eklenti_id  desc");
$eklenticeksor->execute();


?>

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
     

          <div class="row mb-3">
       

     
       
            
           
            <!-- DataTable with Hover -->
            <div class="col-lg-12 col-12">
              <div class="card mb-4">

<?php if ($_GET['islem']=="ok") {?>
                <div class=" alert badge-success  alert-dismissible fade show"> İşleminiz Başarıyla Kaydedildi!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php } if ($_GET['islem']=="no") {?>
                <div class=" alert bg-danger  alert-dismissible fade show">Hata ! İşlem Başarısız
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php } ?>


                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Eklentilerim</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>#</th>
                        <th>Eklenti Adı</th>
                        <th>Durum</th>
                        <th>İşlem</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <?php $sayac=0;
                      while  ($eklenticek=$eklenticeksor->fetch(PDO::FETCH_ASSOC)) { $sayac++; ?>
                        <tr>
                        <td><?= $sayac ?></td>
                        <td><?= $eklenticek['eklenti_ad'] ?></td>
                        
                       
                     <td>
              <?php  if ($eklenticek['eklenti_durum']==1) {?>
              	<button class="btn btn-sm btn-success">Aktif</button>
            <?php }if ($eklenticek['eklenti_durum']==0) {?>
              	<button class="btn btn-sm btn-danger">Pasif</button>
            <?php } ?>

             <td><a href="eklenti-ayar.php?eklenti_id=<?= $eklenticek['eklenti_id'] ?>"><button class="btn btn-sm btn-primary">Ayarla</button></a></td>
                     	
                     </td>


                      </tr>
                      <?php } ?>
                     
                    </tbody>
                  </table>
                </div>
              </div>
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