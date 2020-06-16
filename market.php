<?php 

require_once 'header.php';
if ($_GET['sef']) {
 $urunsor = $db->prepare("SELECT urun.*,urun_kategori.* FROM urun INNER JOIN urun_kategori ON urun.kategori_id=urun_kategori.kategori_id where urun_kategori.kategori_seoad=:ad order by urun_id asc LIMIT 5");
 $urunsor->execute(array(
        'ad' => $_GET['sef']
 ));
}else{
	 $urunsor = $db->prepare("SELECT urun.*,urun_kategori.* FROM urun INNER JOIN urun_kategori ON urun.kategori_id=urun_kategori.kategori_id  order by urun_id asc LIMIT 5");
 $urunsor->execute(array(
        'ad' => $_GET['sef']
 ));
}


 $kategorisor = $db->prepare("SELECT * FROM urun_kategori order by kategori_id asc ");
 $kategorisor->execute();

 ?>









	<div class="container mt-5 mb-5 ">
	
	<div class="row">
      <div class="col-md-3 mb-4 text-white" >
                          <div class="card" style="border-radius: 10px; background: <?= $sitecek['site_renk'] ?>">
            <div class="card-header" >
              Kategoriler
            </div>
            <div class="card-body p-0">
              <ul class="list-group list-group-flush"  >

<?php while ($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) {?>
	
                                  <li class="list-group-item " style="border-radius: 11px; background: <?= $sitecek['site_sidebarrenk'] ?>   ">
                   <a href="kategori-<?= seo($kategoricek['kategori_ad']) ?>"> <button class="w-100 btn text-left  text-<?= $sitecek['site_yazirenk'] ?> btn-outline-<?= $sitecek['site_yazirenk'] ?>" style=""><?= $kategoricek['kategori_ad'] ?></button></a>
                  </li>
 <?php } ?>
                              </ul>
            </div>
          </div>
              </div>
      <div class="col-md-5 mb-4    text-<?= $sitecek['site_yazirenk'] ?>" >
                                                    
               <div class="card" style= "background:  <?= $sitecek['site_sidebarrenk'] ?>;border-radius: 10px ">
              <div class="card-header " style="border-radius: 10px;background:  <?= $sitecek['site_renk'] ?>" >
                Ürünler
              </div>
              <div class="card-body">
 
  <?php  

    while ($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)) {?>
    <div class="row store-cards">
                                                                              <div class="col-sm-12 col-md-4 mb-4">
                     
                                                <img  width="100%" height="100%"  src="<?= $uruncek['urun_resim'] ?>" alt=".">
                                            </div>

                       
                        <div class="col-md-8 ">
                        	 <span class="pull-right" style="font-size: 25px"> <?= $uruncek['urun_fiyat'] ?><span style="font-size: 10px"> Kredi</span></span>
                            <span class="text-center ml-4">  <?= $uruncek['urun_baslik'] ?></span><br>
                             <small class="text-center text-success ml-4"> <?= $uruncek['kategori_ad'] ?></small><br>
                             <span class="text-success text-center ml-4"></span><br>
                             <a href="urun-<?= seo($uruncek['urun_baslik'])."-".$uruncek['urun_id'] ?>"><button class="btn btn-success btn-sm pull-right">Detay</button></a>
                           
                       </div>
                          
                                                   
                  
                      </div>


<hr>
   <?php }
   ?>

            

  









                    </div>
                     
                                  </div>
              </div>
        
                       
		
	<?php 
	require_once 'sidebar.php';

	 ?>

	