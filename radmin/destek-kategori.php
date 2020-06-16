<?php require_once 'header.php'; 
      require_once 'sidebar.php';
$kategorisorr = $db->prepare("SELECT * FROM  destek_kategori");
$kategorisorr->execute();





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
            <div class="col-lg-12 mb-4 text-center">
              <!-- Simple Tables -->
              <div class="card">

                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

                  <h6 class="m-0 font-weight-bold text-primary">Ürün Kategorileri</h6>

                 
                     <a href="destek-kategori-olustur.php"><button class="btn btn-info">Kategori Ekle</button></a>
                  
                </div>
                <div class="table-responsive">

                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">

                      <tr>
                        <th>#</th>
                        <th>Kategori Adı</th>
                        <th>Durum</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sayac=0;
                       while ($kategoricek=$kategorisorr->fetch(PDO::FETCH_ASSOC)) {
                     $sayac++;
                       	?>
                      <tr>
                        <td><?= $sayac ?></td>
                        <td><?= $kategoricek['kategori_ad'] ?></td>

                        <td>
                       <a href="ayar/islem.php?destek-kategorisil=ok & destekkategori_id=<?= $kategoricek['destekkategori_id'] ?>"><span onclick="return confirm('Silme işlemini onaylıyor musun ? (Geri alınamaz)')" class="btn btn-danger btn-sm">Sil</span></a>
                        </td>
                     
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