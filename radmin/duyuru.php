<?php require_once 'header.php'; 
      require_once 'sidebar.php';

$duyuruceksor = $db->prepare("SELECT * FROM duyuru order by  duyuru_id  desc");
$duyuruceksor->execute();


?>

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
     

          <div class="row mb-3">
       

     
       
            
           
            <!-- DataTable with Hover -->
            <div class="col-lg-12 col-12">
              <div class="card mb-4">

<?php if ($_GET['islem']=="ok") {?>
                <div class=" alert badge-success  alert-dismissible fade show"> Duyurunuz kaydedildi!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php }  if ($_GET['islem']=="formathata") {?>
                <div class=" alert bg-danger  alert-dismissible fade show"> Hata ! format hatalı
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php } if ($_GET['islem']=="dosyabuyuk") {?>
                <div class=" alert bg-danger  alert-dismissible fade show"> Hata ! dosya boyutu büyük
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php } if ($_GET['sil']=="ok") {?>
                <div class=" alert bg-danger  alert-dismissible fade show">Duyuru Silindi
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php } ?>


                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Duyurularım </h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>Duyuru Resim</th>
                        <th>Duyuru Baslık</th>
                        <th>Duyuru Yazar</th>
                        <th>İşlem</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      while ($duyurucek=$duyuruceksor->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr>
                        <td><img width="100" height="100" src="../<?= $duyurucek['duyuru_resim'] ?>"></td>
                        <td><?= $duyurucek['duyuru_baslik'] ?></td>
                        <td><?= $duyurucek['duyuru_yazar'] ?></td>
                       
                     <td><a href="duyuru-duzenle.php?duyuru_id=<?=$duyurucek['duyuru_id'] ?>"><button class="btn btn-sm btn-success">Düzenle</button></a>
               <a href="ayar/islem.php?duyurusil=ok&duyuru_id=<?=$duyurucek['duyuru_id']?>  "><button class="btn btn-sm btn-danger" onclick="return confirm('Silme işlemini onaylıyor musun? (Geri Alınamaz)')">Sil</button></a>
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