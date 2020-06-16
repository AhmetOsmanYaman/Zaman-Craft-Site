<?php



require_once 'header.php'; 

$kullanici = $_SESSION['oturum'];
if (!$kullanici) {
	header("Location: giris");
}
$destekcek = $desteksor->fetch(PDO::FETCH_ASSOC);


if ($_GET['sef']) {
	 $kullanici = $db->prepare("SELECT * FROM kullanici where  kullanici_username=:username");
 $kullanici->execute(array(
        'username' => $_GET['sef']

 ));
  $kullanicicekk = $kullanici->fetch(PDO::FETCH_ASSOC);
}
?>


	<div class="container mt-5 mb-5 ">
	
	<div class="row">
	<div class="col-md-8 mb-5">

<div class="card " style=" background: #152e4d   ">


	 
<div class="text-white">
		

      <div class="card bg-info border-0" >
          <div class="card-header text-white  border-0">
            Kredi Gönder
          </div>
         <div class="card-body text-white" style=" background: #152e4d   ">
         		  <?php if ($_GET['durum']=="hata") {?>
                <div class=" alert bg-danger  alert-dismissible fade show"> Kendine Kredi Gönderemessin
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php } 
             if ($_GET['durum']=="ok") {?>
                <div class=" alert bg-success  alert-dismissible fade show"> Kredi başarıyla gönderildi
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php }
           if ($_GET['durum']=="error") {?>
                <div class=" alert bg-danger  alert-dismissible fade show"> Hata ! kredi gönderilemedi
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php }



          if ($_GET['durum']=="bakiyeyetersiz") {?>
                <div class=" alert bg-danger  alert-dismissible fade show">Bakiye Yetersiz
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php } if ($_GET['durum']=="kullanicibulunamadı") {?>
                <div class=" alert bg-danger  alert-dismissible fade show">Kullanıcı Bulunamadı
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php } ?>                <form action="ayar/kullanici.php" method="post" enctype="multipart/form-data">
                 
                   
                    
                 
                
                  <div class="form-group row">
                    <label class="col-sm-3">Kullanıcı: *</label>
                    <div class="col-sm-9">
                      <input style="background: #152e4d; border: 1px solid #4244A6" type="text" class="form-control" name="kullanici_username" required="" placeholder="Kullanıcı Adını Giriniz." value="<?= $kullanicicekk['kullanici_username'] ?>" >
                    </div>
                  </div>
                     <div class="form-group row">
                    <label class="col-sm-3">Miktar: </label>
                    <div class="col-sm-9">
                      <input style="background: #152e4d; border: 1px solid #4244A6" type="number" class="form-control" name="miktar" placeholder="Gönderilecek Miktar." >
                    </div>
                  </div>
                 
                
                                    <hr>
               
                               <div class="clearfix">
                               
                    <div class="text-center">
            
                      <button type="submit" onclick="return confirm('Krediyi göndermek istediğine emin misin? (geri alınamaz)')" class="btn btn-success btn-rounded" name="kredi-gonder">Kredi Gönder</button>
                    </div>
                  </div>
                </form>
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

