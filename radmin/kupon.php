<?php require_once 'header.php'; 
      require_once 'sidebar.php';

$kupon = $db->prepare("SELECT * FROM kupon order by  kupon_id  desc");
$kupon->execute();


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
                  <h6 class="m-0 font-weight-bold text-primary">Kuponlarım </h6>
                  <a href="kupon-ekle.php"><button class="btn btn-success btn-sm">Kupon Ekle</button></a> 
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                      	<th>#</th>
                        <th>Kupon Kodu</th>
                        <th>Kalan Miktar</th>
                         <th>Faydalananlar</th>
                           <th>Durum</th>
                        <th>İşlem</th>
                         
                      </tr>
                    </thead>
                    <tbody>
                      <?php $sayac=0; 
                      while ($kuponcek=$kupon->fetch(PDO::FETCH_ASSOC)) { $sayac++; ?>
                        <tr>
                        	<td><?= $sayac; ?></td>
                        <td><?= $kuponcek['kupon_ad'] ?></td>
                        <td><?= $kuponcek['kupon_miktar'] ?></td>
                          <td><a href="kupon-faydalanan.php?kupon_id=<?=$kuponcek['kupon_id'] ?>"><button class="btn btn-sm btn-primary">Kontrol Et</button></a></td>
                        <td> <?php  if ($kuponcek['kupon_durum']==1 && $kuponcek['kupon_miktar']>0) {?>
                        	<button class="btn btn-sm btn-success">Aktif</button>
                      <?php  }

                    if ($kuponcek['kupon_miktar']<1) {?>
                        	<button class="btn btn-sm btn-danger">Kupon tükendi</button>
                      <?php  }
               


                      ?>

                  </td>
                       
                     <td><a href="kupon-duzenle.php?kupon_id=<?=$kuponcek['kupon_id'] ?>"><button class="btn btn-sm btn-success">Düzenle</button></a>
               <a href="ayar/islem.php?kuponsil=ok&kupon_id=<?=$kuponcek['kupon_id']?>  "><button class="btn btn-sm btn-danger" onclick="return confirm('Silme işlemini onaylıyor musun? (Geri Alınamaz)')">Sil</button></a>
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