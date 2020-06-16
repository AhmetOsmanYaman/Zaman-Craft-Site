<?php require_once 'header.php'; 
      require_once 'sidebar.php';

$destek = $db->prepare("SELECT destek.*,kullanici.kullanici_id,kullanici.kullanici_username FROM destek INNER JOIN kullanici ON kullanici.kullanici_id=destek.kullanici_id where destek_durum=:durum");
$destek->execute(array(
   'durum' => 1
));



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

          <?php }  if ($_GET['islem']=="format") {?>
                <div class=" alert badge-danger  alert-dismissible fade show"> Hata! Resim yüklerken sadece izin verilen dosya formatlarını yükleyebilirsiniz.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php }?>

          <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">

                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

                  <h6 class="m-0 font-weight-bold text-primary">Cevap Bekleyen Destek Talepleri</h6>

               
                     
                </div>
                <div class="table-responsive">

                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">

                      <tr>
                        <th>Oyunu Ad</th>
                        <th>Destek Başlık</th>
                        <th>Açılma Tarihi</th>
                        <th>Durum</th>
                      </tr>
                    </thead>
                    <tbody>
                     
                   <?php  if ($destek->rowCount()==0) {?>
                   	 <div class=" alert bg-danger  alert-dismissible fade show">Cevap Bekleyen Destek Talebi yok!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
               
            <?php }
                    else{


                       while ( $destekcek = $destek->fetch(PDO::FETCH_ASSOC)){?>
                       <tr>
                        <td><a href="../oyuncu-<?= seo($destekcek['kullanici_username'])?>"><?= $destekcek['kullanici_username'] ?></a></td>
                          <td><?= $destekcek['destek_baslik'] ?></td>
                        <td><?= $destekcek['destek_zaman'] ?></td>
                        <td><a href="destek-detay.php?destek_id=<?= $destekcek['destek_id']?>"><span class="badge badge-primary">Cevapla</span></a></td>

                      
                      </tr>
                     <?php } ?>
                
                     
                    </tbody>
                      <?php  }?>
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