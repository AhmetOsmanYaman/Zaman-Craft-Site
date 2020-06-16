<?php require_once 'header.php'; 
      require_once 'sidebar.php';


$yorumsor = $db->prepare("SELECT yorum.*,kullanici.*,duyuru.* FROM yorum 
	INNER JOIN duyuru ON duyuru.duyuru_id=yorum.duyuru_id INNER JOIN kullanici ON kullanici.kullanici_id=yorum.kullanici_id
	where yorum.yorum_onay='0' order by yorum.yorum_id desc");
$yorumsor->execute();



?>

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
     

          <div class="row mb-3">
       

     
       
            
           
            <!-- DataTable with Hover -->
            <div class="col-lg-12 col-12">
   
 <?php if ($_GET['islem']=="ok") {?>
                <div class=" alert btn-success  alert-dismissible fade show"> İşlem başarılı bir şekilde kaydedildi!
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

                  <h6 class="m-0 font-weight-bold text-primary">Onay Bekleyen Yorumlar</h6>
                     
                </div>
                <div class="table-responsive">

                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">

                      <tr>
                        <th>Oyuncu Ad</th>
                        <th>Duyuru Başlık</th>
                        <th>İşlem</th>
                      </tr>
                    </thead>
                    <tbody>
                     
                     
                       <?php while ($yorumcek = $yorumsor->fetch(PDO::FETCH_ASSOC)) {?>
                      <tr>
                
                        <td><?= $yorumcek['kullanici_username'] ?></td>
                        <td><?= $yorumcek['yorum_detay'] ?></td>
                      <td><a href="yorum-detay.php?yorum_id=<?= $yorumcek['yorum_id'] ?>"><button class="btn btn-primary btn-sm">Detay</button></a></td>
                       </tr>
                       <?php } ?>
                      
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