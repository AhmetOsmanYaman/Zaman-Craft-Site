<?php 

require_once 'header.php'; 

	
$kullanici = $_SESSION['oturum'];
if (!$kullanici) { 
 header("Location:index.php?giris=no"); 
 }
$destekcek = $desteksor->fetch(PDO::FETCH_ASSOC);

?>

	<div class="container mt-5 mb-5 ">
	
	<div class="row">
	<div class="col-md-8 mb-5">

<div class="card " style="  background: <?= $sitecek['site_arkarenk'] ?>  ">


	 
<div class="text-<?= $sitecek['site_yazirenk'] ?>">
		

      <div class="card border-0" style=" background: <?= $sitecek['site_renk'] ?>" >
          <div class="card-header text-<?= $sitecek['site_yazirenk'] ?> border-0">
            Destek Talebi Oluştur
          </div>

         <div class="card-body text-white" style=" background: <?= $sitecek['site_sidebarrenk'] ?> ">
         		  <?php if ($_GET['islem']=="no") {?>
                <div class=" alert bg-danger  alert-dismissible fade show"> Destek talebi oluşturulamadı
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php } ?>
                <form action="radmin/ayar/islem.php" method="post" enctype="multipart/form-data">
                 
                   
                    
                 
                
                  <div class="form-group row">
                    <label class="col-sm-3">Başlık: *</label>
                    <div class="col-sm-9">
                      <input style=" border: 1px solid #4244A6" type="text" class="form-control" name="destek_baslik" placeholder="Destek başlığınızı giriniz." >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3">Kategori: *</label>
                    <div class="col-sm-9">
                      <select name="destekkategori_id" style=" border: 1px solid #4244A6" class="form-control">

                  <?php 
                  $kategorisor = $db->prepare("SELECT * FROM destek_kategori ");
$kategorisor->execute();
                  while ($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) {?>
                  	 <option value="<?= $kategoricek['destekkategori_id'] ?>"><?= $kategoricek['kategori_ad'] ?></option>  
                 <?php  } ?>
                               	
        

                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3">Detay: *</label>
                    <div class="col-sm-9">
                     <textarea name="destek_detay"  style="background: #152e4d; border: 1px solid #4244A6" class="form-control ckeditor" id="editor1"></textarea>
                    </div>
                  </div>
                                
               
                    <input type="hidden" name="kullanici_username" value="<?= $kullanicicek['kullanici_username'] ?>">
                               <div class="clearfix">
                               	<div class="float-left">
                            <a href="destek.php" class="btn btn-primary btn-rounded" ><i class="fa fa-chevron-circle-left"> Geri dön</i></a>
                               	</div>
                    <div class="float-right">

                      <button type="submit" class="btn btn-success btn-rounded" name="destek-kaydet">Destek Talebi oluştur</button>
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

