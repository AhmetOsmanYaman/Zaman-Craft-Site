<?php 

  require_once 'header.php'; 
if (isset($_POST['destekdetay'])) {
  


$kullanici = $_SESSION['oturum'];
if (!$kullanici) { 
 header("Location:index.php?giris=no"); 
 }


 $destek = $db->prepare("SELECT  destek.*,destek_kategori.* FROM destek INNER JOIN destek_kategori ON destek_kategori.destekkategori_id=destek.destekkategori_id where kullanici_id=:id and destek_id=:destek_id");
 $destek->execute(array(
        'id' => $kullanici['kullanici_id'],
        'destek_id' => $_POST['destek_id']

      ));

  
$destekcek = $destek->fetch(PDO::FETCH_ASSOC);



 ?>




  <div class="container mt-5 mb-5 ">
  
  <div class="row">
  <div class="col-md-8 mb-5">

<div class="card " style="  background: <?= $sitecek['site_arkarenk'] ?> ">


   
<div class="text-<?= $sitecek['site_yazirenk'] ?>">
    

      <div class="card border-0" style=" background: <?= $sitecek['site_renk'] ?>" >
          <div class="card-header text-<?= $sitecek['site_yazirenk'] ?>  border-0">
         #<?= $destekcek['destek_id'] ?> Numaralı  Destek Talebi Detayları
          </div>
         <div class="card-body text-<?= $sitecek['site_yazirenk'] ?>" style="  background: <?= $sitecek['site_sidebarrenk'] ?>  ">
              <?php if ($_GET['durum']=="error") {?>
                <div class=" alert bg-danger  alert-dismissible fade show"> Şifre yanlış
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php } ?>
                
                 

                    
                 
                
                  <div class="form-group row">
                    <label class="col-sm-3">Başlık: </label>
                    <div class="col-sm-9">
                      <input style=" border: 1px solid #4244A6" type="text" class="form-control" disabled="" value="<?= $destekcek['destek_baslik'] ?>"  >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3">Kategori: </label>
                    <div class="col-sm-9">
      
                      <input style="border: 1px solid #4244A6" type="text" class="form-control" disabled="" value="<?= $destekcek['kategori_ad'] ?>"  >
                  
                     
                          
        

                     
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3">Cevap: </label>
                    <div class="col-sm-9">
                     <textarea  style=" border: 1px solid #4244A6" class="form-control ckeditor" id="editor1"  disabled="" placeholder="Henüz cevaplanmadı">

                      <?php if (empty($destekcek['destek_cevap'])) {
                        echo "Destek talebiniz henüz cevaplanmadı";
                      }else{
                      echo $destekcek['destek_cevap'] ;
                    } ?> </textarea>
                    </div>
                  </div>
                                    <hr>
                
                    <input type="hidden" name="kullanici_username" value="<?= $kullanicicek['kullanici_username'] ?>">
                               <div class="clearfix">
                    <div class="float-right">

                      <button onclick="geri()" class="btn btn-success btn-rounded" name="profil-guncelle"><i class="fa fa-chevron-circle-left"> Geri Dön</i></button>
                    </div>
                  </div>
            
              </div>
       
        </div>
<br>
   
              </p>

                


    
    


  </div>
</div> 
    

    
    
    
    
    
    
    
</div>
    
  <?php 
   require_once 'sidebar.php';

   ?>
<script type="text/javascript">
  


    function geri(){

      history.back()

    }



</script>

<?php }


	