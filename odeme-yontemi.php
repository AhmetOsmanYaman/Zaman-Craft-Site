<?php 

require_once 'header.php';
if (!$kullanici) { 
 header("Location:index.php?giris=no"); 
 }
$odesor = $db->prepare("SELECT * FROM odeme_yontemi WHERE odeme_id=1");
$odesor->execute();
$odecek=$odesor->fetch(PDO::FETCH_ASSOC);
 ?>




    <div class="container mt-5 mb-5 ">
    
    <div class="row">
   <div class="col-md-8 text-white">
     <?php if ($_GET['odeme']=="no") {?>
                <div class=" alert bg-success  alert-dismissible fade show">Hata! İşlem Başarısız.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php }?>
          <div class="card" style="background:<?= $sitecek['site_sidebarrenk'] ?>">
              <div class="card-header" style="background:<?= $sitecek['site_renk'] ?>">
                Kredi Yükle
              </div>
              <div class="card-body">
                <form id="creditChargeForm" action="kredi-yukle.php" method="post">
                  <div class="form-group row">
                    <label for="inputPrice" class="col-sm-3 col-form-label">Ödeme Yöntemi</label>
                    <div class="col-sm-9">
                      <div  class="input-group">
                       <select class="form-control" name="odeme">
                        <option>Seçiniz</option>
                       	 <option value="ininal">İninal İle Ödeme <?php if ($odecek['ininal_hediye']) {
                          echo $odecek['ininal_hediye']."% daha fazla kredi";
                         } ?>  </option>
                         
                          <option value="banka">Kredi Kartı/Banka Kartı İle Ödeme</option>
                          

                       </select>
                       
                      </div>
                    </div>
                  </div>
                    <div class="clearfix">
                    <div class="float-right">
               
                      <button type="submit" class="btn btn-rounded btn-success" name="odemeyontemi">Kredi Yükle</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
                        </div>
        
    <?php 
     require_once 'sidebar.php';

     ?>

    