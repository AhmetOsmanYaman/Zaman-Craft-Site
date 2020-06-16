<?php 
require_once 'header.php';
if ($_GET['giris']=="no") {?>
    <script type="text/javascript">
     
     alert("Bu içeriğe erişebilmek için giriş yapmalısın");
   </script>
<?php }


  $sayfada = 6; // sayfada gösterilecek içerik miktarını belirtiyoruz.
                     $sorgu=$db->prepare("select * from duyuru");
                     $sorgu->execute();
                     $toplam_icerik=$sorgu->rowCount();
                     $toplam_sayfa = ceil($toplam_icerik / $sayfada);
                    // eğer sayfa girilmemişse 1 varsayalım.
                     $sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;
                    // eğer 1'den küçük bir sayfa sayısı girildiyse 1 yapalım.
                     if($sayfa < 1) $sayfa = 1; 
                        // toplam sayfa sayımızdan fazla yazılırsa en son sayfayı varsayalım.
                     if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa; 
                     $limit = ($sayfa - 1) * $sayfada;
                                 
                                  $duyurusor = $db->prepare("SELECT * FROM duyuru order by duyuru_id DESC limit $limit,$sayfada");
                                $duyurusor->execute();
                                             ?>





	<div class="container mt-5 mb-5 <?= $ayarcek['ayar_yazirenk'] ?>">
	
	<div class="row">
	<div class="col-md-8 mb-5">
<div class=" mb-5 p-3 text-<?= $sitecek['site_yazirenk'] ?>" style="border-radius: 10px;background-color:<?= $sitecek['site_renk'] ?>">Duyurular</div>	
<?php if ($duyurusor->rowCount()==0){?>
	<div class=" alert bg-warning" style="">Duyuru Eklenmemiş</div>
<?php } 
	
 while ($duyurucek=$duyurusor->fetch(PDO::FETCH_ASSOC)) {

 $yorumsor = $db->prepare("SELECT * from yorum where yorum_onay=:onay and duyuru_id=:duyuru_id
  ");
 $yorumsor->execute(array(
     'onay' => 1,
     'duyuru_id' => $duyurucek['duyuru_id']
 ));

	?>
<div class="card img-hover-zoom mb-5  " style="border-radius: 15px ;background-color:<?= $sitecek['site_renk'] ?>  ">

  <img class="card-img-container  " src="<?= $duyurucek['duyuru_resim'] ?>" alt="Card image cap" style="height: 300px"  >
  <hr>
<h4 style="margin-top: 270px; position: absolute;color:<?= $sitecek['site_renk'] ?>"><b><?= $duyurucek['duyuru_baslik'] ?></b></h4>
	
<span class="badge badge-pill text-<?= $sitecek['site_yazirenk'] ?>" style="position: absolute;background-color:<?= $sitecek['site_renk'] ?>" ><?= substr_replace($duyurucek['duyuru_kategoriad'],0,8) ?></span>
	<span class="badge badge-pill  text-<?= $sitecek['site_yazirenk'] ?>" style="position: absolute;margin-left:80px; background-color:<?= $sitecek['site_renk'] ?> ;" ><i class="fa fa-eye"></i> <?= $duyurucek['duyuru_hit'] ?></span>
	<span class="badge badge-pill  text-<?= $sitecek['site_yazirenk'] ?>" style="position: absolute;background-color: <?= $sitecek['site_renk'] ?> ; margin-left: 120px" ><i class="fa fa-comments "> <?= $yorumsor->rowCount(); ?></i></span>
		 									
  <div class="card-body text-<?= $sitecek['site_yazirenk'] ?>" >

    <p class="card-text text-<?= $sitecek['site_yazirenk'] ?>" ><?= substr($duyurucek['duyuru_detay'],0,500) ?></p>

  <a class=" btn w-100 border mb-2 text-<?= $sitecek['site_yazirenk'] ?> " style="background: <?= $sitecek['site_renk'] ?>" href="duyuru-<?= seo($duyurucek['duyuru_baslik'])."-".$duyurucek['duyuru_id'] ?>" >DEVAMINI OKU</a>
  </div>
</div> 
<?php } ?>

		

	<div class="col-md-12 text-center">
                     		<ul class="pagination justify-content-center">

                     			<?php

                     			$s=0;

                     			while ($s < $toplam_sayfa) {

                     				$s++; ?>

                     				<?php 

                     				if ($s==$sayfa) {?>

                     				<li class="active page-item">

                     					<a class="page-link" href="index?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a>

                     				</li>

                     				<?php } else {?>


                     				<li class="page-item">

                     					<a class="page-link" href="index?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a>

                     				</li>

                     				<?php   }

                     			}

                     			?>

                     		</ul>
                     	</div>
		
		
		
		
		
		
</div>
		
	<?php 
	 require_once 'sidebar.php';

	 ?>

	