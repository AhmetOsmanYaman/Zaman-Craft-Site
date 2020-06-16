<?php require_once 'header.php'; 
      require_once 'sidebar.php';



$kuponkayit = $db->prepare("SELECT kuponkayit.*,kullanici.kullanici_username,kullanici.kullanici_id from kuponkayit INNER JOIN kullanici ON kuponkayit.kullanici_id=kullanici.kullanici_id where kuponkayit.kupon_id=:id");
$kuponkayit->execute(array(
        'id'=> $_GET['kupon_id']
 ));



?>

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
     

          <div class="row mb-3">
       

     
       
            
           
            <!-- DataTable with Hover -->
            <div class="col-lg-12 col-12">
              <div class="card mb-4">
  



<?php if ($_GET['islem']=="ok") {?>
                <div class=" alert badge-success  alert-dismissible fade show">İşlem Başarılı.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php }  if ($_GET['islem']=="no") {?>
                <div class=" alert bg-danger  alert-dismissible fade show"> Hata ! İşlem Başarısız.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

        <?php } ?>


                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Kuponu Kullanan Kullanıcılar(<?=$kuponkayit->rowCount();?>)</h6>
                  
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                      	<th>#</th>
                        <th class="text-center">Kullanıcı Adı</th>
                        <th class="text-center">Kullanım zamanı</th>
                        
                         
                      </tr>
                    </thead>
                    <tbody>
                      <?php $sayac=0; 
                      while ($kuponkayitcek = $kuponkayit->fetch(PDO::FETCH_ASSOC)) { $sayac++; ?>
                        <tr>
                        	<td><?= $sayac; ?></td>
                        <td class="text-center"><?= $kuponkayitcek['kullanici_username'] ?></td>
                        <td class="text-center"><?= $kuponkayitcek['kuponkayit_zaman'] ?></td>
                        
                        
                       
                    

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