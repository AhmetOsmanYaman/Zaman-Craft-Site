<?php 
ob_start();require_once 'header.php'; 

if (!$kullanici) { 
 header("Location:index.php?giris=no"); 
 }
 $siparissor = $db->prepare("SELECT siparis.*,urun.*,kullanici.* FROM siparis INNER JOIN urun ON siparis.urun_id=urun.urun_id INNER JOIN kullanici ON siparis.kullanici_id=kullanici.kullanici_id where siparis.kullanici_id=:id");
 $siparissor->execute(array(
        'id' => $kullanici['kullanici_id']
 ));





?>

	<div class="container mt-5 mb-5 ">
	
	<div class="row">
	<div class="col-md-8 mb-5">
		 <?php if ($_GET['durum']=="ok") {?>
                <div class=" alert bg-success  alert-dismissible fade show">Bilgiler Kaydedildi
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>

          <?php } ?>



 <div class="card text-<?= $sitecek['site_yazirenk'] ?> " style="background: <?= $sitecek['site_sidebarrenk'] ?>;border-top-left-radius: 15px;border-top-right-radius:15px">
 	<?php if ($_GET['sil']=="ok") {?>
 		 <div class=" alert bg-success  alert-dismissible fade show">Başarıyla silindi
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>
 	<?php } if ($_GET['sil']=="no") {?>
 		 <div class=" alert bg-danger  alert-dismissible fade show">Hata işlem tamamlanamadı
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                </div>
 	<?php } ?>

								<div class="card-header text-<?= $sitecek['site_yazirenk'] ?> " style="border-top-left-radius: 15px;border-top-right-radius:15px;background: <?= $sitecek['site_renk'] ?>" >
								<span>Depom</span>
							</div>
							<div class="card-body p-0 text-<?= $sitecek['site_yazirenk'] ?>">
								<div class="table-responsive text-<?= $sitecek['site_yazirenk'] ?>">
									<table class="table  text-<?= $sitecek['site_yazirenk'] ?>">
										<thead>
											<tr>
												<th class="text-center">#</th>
												<th class="text-center">Ürün Adı</th>
												<th class="text-center">Açılma Tarihi</th>
												<th class="text-center">Durumu</th>
												
												<th class="text-center"></th>
											</tr>
										</thead>
										<tbody>
													
									    <?php
                     




									     $sayac=0;  while ($sipariscek = $siparissor->fetch(PDO::FETCH_ASSOC))  {
									     	
									     	
                         



									     	$sayac++;?>
									  										<tr>
													<td class="text-center">
														<?= $sayac ?>
													</td>
														<td class="text-center"><button class="btn btn-info btn-sm"><?= $sipariscek['urun_baslik'] ?></button></td>
													

                               <?php if (empty( $sipariscek['siparis_kayit'])) {?>
                              <td class="text-center"><button class="btn btn-sm btn-danger">Süresi Başlamamış</button></td>
                              <?php }else{?>
                              	<td class="text-center"><button class="btn btn-sm btn-success"><?= $sipariscek['siparis_kayit'] ?></button></td>
                             <?php } ?>



												
                                  <?php if ($sipariscek['siparis_durum']==0) {?>
                                  	<form method="post" action="ayar/kullanici.php">
                                  	<td class="text-center">

                                 <input type="hidden" name="urun_sure" value="<?= $sipariscek['urun_sure'] ?>">
                                 <input type="hidden" name="siparis_id" value="<?= $sipariscek['siparis_id']?>">
                                
                                   <input type="hidden" name="siparis_durum" value="<?= $sipariscek['siparis_durum'] ?>">
                                 <input type="hidden" name="urun_komut" value="<?= $sipariscek['urun_komut'] ?>">
                                  <input type="hidden" name="urun_baslangickod" value="<?= $sipariscek['urun_baslangickod'] ?>">
                                     <input type="hidden" name="urun_id" value="<?= $sipariscek['urun_id']?>">

                                  	 <button type="submit" name="urunsure-baslat" onclick="return confirm('Aktif ederseniz ürün oyundaki hesabınıza geçer ve süre başlatılır (Geri Alınamaz) onaylıyor musun')" class="btn btn-sm btn-secondary">Aktif Et</button></a></td></form>
                                 <?php } if ($sipariscek['siparis_durum']==1) {?>
                                  	<td class="text-center"><button class="btn btn-sm btn-success">Aktif</button></td>
                                 <?php } 



                       if ($sipariscek['siparis_durum']==2) {?>
                                  	<td class="text-center"><button class="btn btn-sm btn-danger">Süresi Dolmuş</button></td>


                                 <?php }  ?>
												</tr>
												
									  <?php  }?>
																
													
											
																					</tbody>

									</table>
					<?php    if ($siparissor->rowCount()==0) {?>
                    <b class="badge-lg badge-pill bg-danger form-control text-<?= $sitecek['site_yazirenk'] ?> ">Henüz ürün satın almadınız</b><br>
                 
                     <?php  } ?>
								</div>
							</div>

</div> 
		

		
		
		
		
		
		
		
</div>
		
	<?php 
	 require_once 'sidebar.php';

	 ?>

		