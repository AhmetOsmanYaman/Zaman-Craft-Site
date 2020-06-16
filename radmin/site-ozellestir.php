<?php require_once 'header.php'; 
      require_once 'sidebar.php';


$siteozellestirsor = $db->prepare("SELECT * FROM  siteozellestir where site_id=0 ");
$siteozellestirsor->execute();
$sitecek = $siteozellestirsor->fetch(PDO::FETCH_ASSOC);










?>

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
     

             <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Site Özelleştirme</h6>
                </div>
         
<?php if ($_GET['islem']=="ok") {?>
                <div class=" alert badge-success  alert-dismissible fade show"> İşleminiz Başarıyla Kaydedildi!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php } if ($_GET['islem']=="no") {?>
                <div class=" alert bg-danger  alert-dismissible fade show">Hata ! İşlem Başarısız
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php } ?>
                <div class="card-body">
                	<form method="post" action="ayar/islem.php">

                    

    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Site Renk</label>
                      <div class="col-sm-9">
                        <input type="text"  class="form-control" name="site_renk" placeholder="Varsayılan: #152e4d" value="<?= $sitecek['site_renk'] ?>">
                      </div>
                    </div>


  <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Site ArkaRenk</label>
                      <div class="col-sm-9">
                        <input type="text"  class="form-control" name="site_arkarenk" placeholder="Varsayılan: #031b37 " value="<?= $sitecek['site_arkarenk'] ?>">
                      </div>
                    </div>
 <div class="form-group row">
   	 <label for="inputEmail3" class="col-sm-3 col-form-label">Site YazıRenk</label>
             

                     
                      <div class="col-sm-9">
                        <select class="form-control form-control-md  mb-3" required="" name="site_yazirenk">
                        	<option value="white">white (Varsayılan)</option>
                        	<option value="primary">primary</option>
                        	<option value="secondary">secondary</option>
                        	<option value="success">success</option>
                        	<option value="danger">danger</option>
                        	<option value="warning">warning</option>
                        	<option value="info">info</option>
                        	<option value="dark">dark</option>
                        </select>
                      </div>
                     </div>


    


  <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Site SidebarRenk</label>
                      <div class="col-sm-9">
                        <input type="text"   class="form-control" name="site_sidebarrenk" placeholder="Varsayılan: #152e4d" value="<?= $sitecek['site_sidebarrenk'] ?>">
                      </div>
                    </div>

 <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Site Arkaplan ResimURL</label>
                      <div class="col-sm-9">
                        <input type="text" value="<?= $sitecek['site_arkarenkresim'] ?>"  class="form-control" name="site_arkarenkresim" placeholder="Arka planın resim olmasını istiyorsanız burayı doldurun. (url girin)">
                      </div>
                    </div>

      
  
                 

                     <div class="form-group row text-right">
                      <div class="col-sm-10">
                        <button type="submit" name="site-ozellestir" class="btn btn-primary">Kaydet</button>
                      </div>
                    </div>
                	</form>
                
              
          <!--Row-->

        
       
      <?php require_once 'footer.php';?>
