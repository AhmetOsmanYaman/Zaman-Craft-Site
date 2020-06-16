<?php require_once 'header.php'; 
      require_once 'sidebar.php';







$kulsorr = $db->prepare("SELECT * FROM kullanici order by kullanici_id desc");
$kulsorr->execute();



$kullanicitop = $db->prepare("SELECT COUNT(*) as toplamkullanici FROM kullanici");
$kullanicitop->execute();
 $kullanicitopcek = $kullanicitop->fetch(PDO::FETCH_ASSOC);





?>

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
     

          <div class="row mb-3">
  
           
            <!-- DataTable with Hover -->
            <div class="col-lg-12 col-12">

              <div class="card mb-4">

              	 <?php if ($_GET['islem']=="no") {?>
                <div class=" alert badge-danger  alert-dismissible fade show"> Hata! İşlem kaydedilemedi
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php }if ($_GET['islem']=="ok") {?>
                <div class=" alert badge-success alert-dismissible fade show"> İşlem Kaydedildi
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php }?>
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Kayıtlı Oyuncular </h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                      	<th>#</th>
                        <th>Oyuncu Adı</th>
                        <th>Oyuncu Mail</th>
                        <th>Oyuncu Kredi</th>
                        <th class="text-center">İşlem</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <?php 

                   $sayac=0;
                      while ($kulcek=$kulsorr->fetch(PDO::FETCH_ASSOC)) { $sayac++; ?>
                        <tr>
                        	<td><?= $sayac; ?></td>
                        <td><?= $kulcek['kullanici_username'] ?></td>
                        <td><?= $kulcek['kullanici_mail'] ?></td>
                        <td><?= $kulcek['kullanici_kredi'] ?></td>
                      

                   <td><a href="oyuncu-islem.php?oyuncu=<?= $kulcek['kullanici_username'] ?>"><button class="btn btn-success btn-sm">Düzenle</button></a>
          <a onclick="return confirm('Silme işlemini onaylıyor musun (Geri Alınamaz)') "href="ayar/islem.php?kullanici-sil=ok&kullanici_id=<?= $kulcek['kullanici_id'] ?>"><button class="btn btn-danger btn-sm">Sil</button></a>

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