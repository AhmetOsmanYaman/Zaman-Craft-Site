<?php require_once 'header.php'; 
      require_once 'sidebar.php';







$kulsor = $db->prepare("SELECT kullanici.*,siparis.*,urun.urun_sure,urun.urun_baslik,urun.urun_id FROM siparis INNER JOIN kullanici ON siparis.kullanici_id=kullanici.kullanici_id INNER JOIN urun ON siparis.urun_id=urun.urun_id order by siparis.siparis_id desc  ");
$kulsor->execute();



$gelir = $db->prepare("SELECT SUM(kredi) as toplamgelir FROM  odeme where durum=:durum");
$gelir->execute(array(
    'durum' => 1
));
 $gelircek = $gelir->fetch(PDO::FETCH_ASSOC);



$kullanicitop = $db->prepare("SELECT COUNT(*) as toplamkullanici FROM kullanici");
$kullanicitop->execute();
 $kullanicitopcek = $kullanicitop->fetch(PDO::FETCH_ASSOC);


$destek = $db->prepare("SELECT COUNT(*) as destek FROM destek where destek_durum=:durum");
$destek->execute(array(
   'durum' => 1
));
 $destekcek = $destek->fetch(PDO::FETCH_ASSOC);






?>

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
     

          <div class="row mb-3">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Toplam Gelir</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php 
                if (empty($gelircek['toplamgelir'])) {
                 echo "0";
                } else{
              echo  $gelircek['toplamgelir'];
                }?>
                      <span style="font-size: 10px">TL</span> </div>
                      
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Toplam Satış</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $kulsor->rowCount(); ?></div>
                     
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-shopping-cart fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- New User Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Kayıtlı Kullanıcılar</div>
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $kullanicitopcek['toplamkullanici'] ?></div>
                     
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Yeni Destek Talepleri</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $destekcek['destek'] ?></div>
                      
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-life-ring fa-2x text-warning"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


     
       
            
           
            <!-- DataTable with Hover -->
            <div class="col-lg-12 col-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Sipariş Takip </h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>Oyuncu Adı</th>
                        <th>Ürün Adı</th>
                        <th>Ürün Fiyat</th>
                        <th>Ürün Süresi</th>
                        <th>Ürün Siparis Tarih</th>
                        <th>Durumu</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 

                  
                      while ($kulcek=$kulsor->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr>
                        <td><?= $kulcek['kullanici_username'] ?></td>
                        <td><?= $kulcek['urun_baslik'] ?></td>
                        <td><?= $kulcek['urun_fiyat'] ?><span style="font-size: 10px">TL</span></td>
                        <td><?= $kulcek['urun_sure'] ?> Gün</td>
                        <td><?= $kulcek['siparis_kayit'] ?></td>
                       
                     <?php if ($kulcek['siparis_durum']==0) {?>
                                    <td class="text-center"><button class="btn btn-sm btn-secondary">Henüz Başlamadı</button></td>
                                 <?php } if ($kulcek['siparis_durum']==1) {?>
                                    <td class="text-center"><button class="btn btn-sm btn-success">Aktif</button></td>
                                 <?php } if ($kulcek['siparis_durum']==2) {?>
                                    <td class="text-center"><button class="btn btn-sm btn-danger">Süresi Dolmuş</button></td>
                  
                                 <?php } ?>  


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