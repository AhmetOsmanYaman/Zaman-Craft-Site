<?php 

require_once 'header.php'; 


if (!$kullanici) { 
 header("Location:index.php?giris=no"); 
 }

if ($_GET['kullanici_id']=$kullanici['kullanici_id']) {
	$sil = $db->prepare("DELETE FROM destek  

         where destek_id = {$_GET['destek_id']}
		");
	$sil->execute();
}
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



 <div class="text-<?= $sitecek['site_yazirenk'] ?> " style="background:<?= $sitecek['site_sidebarrenk'] ?>">
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

								<div class="card-header text-<?= $sitecek['site_yazirenk'] ?>" style="border-top-left-radius: 15px;border-top-right-radius:15px;background:<?= $sitecek['site_renk'] ?>" >
								<span>Destek Taleplerim</span>
							</div>
							<div class="card-body p-0 text-<?= $sitecek['site_yazirenk'] ?>">
								<div class="table-responsive text-<?= $sitecek['site_yazirenk'] ?>">
									<table class="table  text-<?= $sitecek['site_yazirenk'] ?>">
										<thead>
											<tr>
												<th class="text-center">#</th>
												<th class="text-center">Destek Başlığı</th>
												<th class="text-center">Açılma Tarihi</th>
												<th class="text-center">Durumu</th>
												<th class="text-center">İşlemler</th>
												<th class="text-center"></th>
											</tr>
										</thead>
										<tbody>
													
									    <?php
                     




									     $sayac=0;  while ($destekcek = $desteksor->fetch(PDO::FETCH_ASSOC))  {$sayac++;?>
									  										<tr>
													<td class="text-center">
														<?= $sayac ?>
													</td>
														<td class="text-center"><?= $destekcek['destek_baslik'] ?></td>
													<td class="text-center"><?= $destekcek['destek_zaman'] ?></td>
												
                                  <?php if ($destekcek['destek_durum']==1) {?>
                                  	<td class="text-center"><button class="btn btn-sm btn-success">Aktif</button></td>
                                 <?php } else{?>
                                      	<td class="text-center"><button class="btn btn-sm btn-danger">Cevaplandı</button></td>
                            <?php }?> 



									<form action="destek-detay.php" method="post">
									<input type="hidden" name="destek_id" value="<?= $destekcek['destek_id'] ?>">		

						<td class="text-center"><button class="btn btn-sm btn-info" type="submit" name="destekdetay">Detay</button></td>
</form>
     <?php if ($destekcek['destek_durum']==0) {?>
     	                          <form method="post" action="radmin/ayar/islem.php">

                                  <td class="text-center"><button name="desteksil" type="submit" onclick="return confirm('Silme işlemini onaylıyor musun?')" class="btn btn-sm btn-danger">Sil</button></td>
                                     <input type="hidden" name="destek_resim" value="<?= $destekcek['destek_resim'] ?>">
                                  <input type="hidden" name="destek_id" value="<?= $destekcek['destek_id'] ?>">
                                  </form>
                                 <?php } ?> 

	
												</tr>
												
									  <?php  } 



									  ?>
																
													
											
																					</tbody>

									</table>
					<?php    if ($desteksor->rowCount()==0) {?>
                    <b class="badge-lg badge-pill bg-danger form-control text-<?= $sitecek['site_yazirenk'] ?> ">Henüz Destek Talebi Oluşturmadın</b><br>
                    <a href="destek-olustur.php"><button class="btn btn-outline-success">Şimdi Oluştur</button></a>
                     <?php  } ?>
								</div>
							</div>

</div> 
		

		
		
		
		
		
		
		
</div>
		
	<?php 
	 require_once 'sidebar.php';

	 ?>

	