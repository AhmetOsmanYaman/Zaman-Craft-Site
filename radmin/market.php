<?php require_once 'header.php'; 
      require_once 'sidebar.php';

$urunceksor = $db->prepare("SELECT * FROM urun order by urun_id  desc");
$urunceksor->execute();


?>

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
     

          <div class="row mb-3">
       

     
       
            
           
            <!-- DataTable with Hover -->
            <div class="col-lg-12 col-12">
              <div class="card mb-4">

<?php if ($_GET['islem']=="ok") {?>
                <div class=" alert badge-success  alert-dismissible fade show"> İşlem başarılı bir şekilde kaydedildi!
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
                <div class=" alert bg-danger  alert-dismissible fade show">urun Silindi
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php } ?>


                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Ürünlerim</h6>
                     <a href="urun-ekle.php"><button class="btn btn-success">Ürün Ekle</button></a>
                  
                     

                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>Ürün Resim</th>
                        <th>Ürün Başlık</th>
                        <th>Ürün Fiyat</th>
                        <th>İşlem</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      while ($uruncek=$urunceksor->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <tr>
                        <td><img width="100" height="100" src="../<?= $uruncek['urun_resim'] ?>"></td>
                        <td><?= $uruncek['urun_baslik'] ?></td>
                        <td><?= $uruncek['urun_fiyat'] ?></td>
                       
                     <td><a href="urun-duzenle.php?urun_id=<?=$uruncek['urun_id'] ?>"><button class="btn btn-sm btn-success">Düzenle</button></a>

                     	<form method="post" action="ayar/islem.php">
                     		<input type="hidden" name="urun_id" value="<?=$uruncek['urun_id']?> ">
                     		<input type="hidden" name="urun_resim" value="<?=$uruncek['urun_resim']?> ">
               <button class="btn btn-sm btn-danger" type="submit" name="urunsil" onclick="return confirm('Silme işlemini onaylıyor musun? (Geri Alınamaz)')">Sil</button>
               </form>
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