<?php require_once 'header.php'; 
      require_once 'sidebar.php';



$kullsor = $db->prepare("SELECT * from kullanici where kullanici_username=:kullanici_username");
$kullsor->execute(array(
        'kullanici_username'=> $_GET['oyuncu']
 ));
$kulcek = $kullsor->fetch(PDO::FETCH_ASSOC);







?>

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
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

             <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Oyuncu Düzenleme</h6>
                </div>
                <div class="card-body">
                  <form action="ayar/islem.php" method="post" enctype="multipart/form-data">
                         <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Kullanıcı adı</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="kullanici_username" value="<?= $kulcek['kullanici_username'] ?>" >
                      </div>
                    </div>
                         <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Kullanıcı E-posta</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="kullanici_mail" value="<?= $kulcek['kullanici_mail'] ?>" >
                      </div>
                    </div>
                   
           


                     <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Kullanıcı Kredi</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="kullanici_kredi" value="<?= $kulcek['kullanici_kredi'] ?>" >
                      </div>
                    </div>
                   
              
                     <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Kullanıcı Güvenlikkod</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="kullanici_guvenlikkod" value="<?= $kulcek['kullanici_guvenlikkod'] ?>" >
                      </div>
                    </div>
                   

                          <div class="form-group row">
     <label for="inputEmail3" class="col-sm-3 col-form-label">Oyuncu Yetki</label>
             

                     
                      <div class="col-sm-9">
                        <select class="form-control form-control-md  mb-3"  name="kullanici_yetki">
                         
                   
                     <?php if($kulcek['kullanici_yetki']=="admin"){?>
                           <option selected="" value="admin">Admin</option>
                    <?php } else{?>
                           <option selected="" value="admin">Admin</option>
                    <?php }?>  
                        <?php if($kulcek['kullanici_yetki']=="oyuncu"){?> 
                             <option selected="" value="oyuncu">Oyuncu</option>
                          <?php } else{?> 
                              <option  value="oyuncu">Oyuncu</option>
                          <?php }?>
                        
                 
                   
                   
                  </select>
                      </div>
                    </div>



                   
   <div class="form-group row text-right">
                      <div class="col-sm-10">
                       
                       <input type="hidden" name="kullanici_id" value="<?= $kulcek['kullanici_id'] ?>">
                        <button type="submit" name="kullanici-guncelle" class="btn btn-primary">Güncelle</button>
                      </div>
                    </div>
                  </form>
                
                </div>
              </div>
          <!--Row-->

        
       
      <?php require_once 'footer.php';?>
