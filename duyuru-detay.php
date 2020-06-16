<?php 

require_once 'header.php'; 



 $duyurusor = $db->prepare("SELECT * FROM duyuru where duyuru_id=:duyuru_id");
 $duyurusor->execute(array(
         'duyuru_id' => $_GET['duyuru_id']
 ));
 $duyurucek = $duyurusor->fetch(PDO::FETCH_ASSOC);




if (!$_COOKIE['hit'.$_GET['duyuru_id']]) {
	$duyuruhit = $db->prepare("UPDATE duyuru set
           duyuru_hit=:hit
           where duyuru_id = {$_GET['duyuru_id']}
	");
$duyuruhit->execute(array(
    'hit' => $duyurucek['duyuru_hit']+1
));	
setcookie('hit'.$_GET['duyuru_id'], '_', time()+3600);
}
	





 $yorumsor = $db->prepare("SELECT yorum.*,duyuru.duyuru_id,kullanici.* FROM yorum INNER JOIN duyuru ON duyuru.duyuru_id=yorum.duyuru_id INNER JOIN kullanici ON kullanici.kullanici_id=yorum.kullanici_id
   where yorum.duyuru_id=:id and yorum.yorum_onay=:onay
  ");
 $yorumsor->execute(array(
     'id' => $_GET['duyuru_id'],
     'onay' => 1
 ));

 if ($_GET['yorum']=="ok") {?>
 	<script type="text/javascript">
 alert("Yorumunuz Kaydedildi Yönetiniden Onay Bekleniliyor! ");
 </script>
 <?php }
?>

?>



	<div class="container mt-5 mb-5 ">
	
	<div class="row">
	<div class="col-md-8 mb-5">
		
<div class="card " style=" background-color:<?= $sitecek['site_sidebarrenk'] ?> ">


	  <div class="card-header  text-<?= $sitecek['site_yazirenk'] ?> mb-3" style="background-color:<?= $sitecek['site_renk'] ?>">
		  
		  <?= $duyurucek['duyuru_baslik'] ?>
	</div>
<div class=" text-center" style="color:gray">
		<i class="fa fa-user "> </i> <?= $duyurucek['duyuru_yazar'] ?> &nbsp;  &nbsp;<i class="fa fa-ticket " > </i> <?= $duyurucek['duyuru_kategoriad'] ?>&nbsp; &nbsp;   <i class=" fa fa-calendar"> </i>  <?= $duyurucek['duyuru_kayit'] ?> <br>
	<i class="fa fa-eye " style="color:gray"></i> <?= $duyurucek['duyuru_hit'] ?> |
		<i class="fa fa-comments " style="color:gray"></i> <?= $yorumsor->rowCount(); ?> 	</div>
	  <div class="card-body text-<?= $sitecek['site_yazirenk'] ?>" style="background-color:<?= $sitecek['site_sidebarrenk'] ?>">

 <p class="card-text text-<?= $sitecek['site_yazirenk'] ?>" ><?= $duyurucek['duyuru_detay'] ?></p>
	  


  </div>
</div>  <br>

<?php 

     
     if (!$kullanici) {?>
     	 <div class="alert bg-danger">Yorum Yapmanız için giriş yapmanız gerekiyor</div>

     <?php } else { ?>
     <div class="card mb-4 text-<?= $sitecek['site_yazirenk'] ?> " style="background-color:<?= $sitecek['site_sidebarrenk'] ?> ">
                <div class="card-header " style="background-color:<?= $sitecek['site_renk'] ?>">
             Yorum Yap
                </div>
                <div  class="card-body">
                	<form method="post" action="ayar/kullanici.php">
            <textarea style=" background-color:<?= $sitecek['site_renk'] ?> "  class="form-control" name="yorum_detay" rows="5" required=""></textarea>
            <input type="hidden" name="duyuru_id" value="<?= $_GET['duyuru_id'] ?>">
            <input type="hidden" name="duyuru_baslik" value="<?= $_GET['sef'] ?>">
                 <hr>
                 <button class="btn btn-success pull-right" name="yorumkaydet">Gönder</button>
                </form>
                 
                
                         
                           



					
					  
     </div>
            </div>
     <?php } ?>
         
      





		<div class="card mb-4 text-<?= $sitecek['site_yazirenk'] ?> " style=" background-color:<?= $sitecek['site_arkarenk'] ?> ">
                <div class="card-header " style=" background-color:<?= $sitecek['site_renk'] ?> ">
                  Yorumlar (<?= $yorumsor->rowCount()?>)
                </div>
                <div  class="card-body" style="background-color:<?= $sitecek['site_sidebarrenk'] ?>">
  

                  <?php while ($yorumcek=$yorumsor->fetch(PDO::FETCH_ASSOC)) {?>
                  <a style="font-weight: 600;  text-decoration: none;" class="" href="/oyuncu/mertefeC">
                           <?= $yorumcek['kullanici_username'] ?>    </a>
                                                    
                          <div class=" pull-right">
                           <small><i class="fa fa-calendar" style="color:gray"></i></small> <?= $yorumcek['yorum_zaman'] ?>  </div>
                      <p style="color:gray"> <?= $yorumcek['yorum_detay'] ?> </p>
                        
                     
                 <hr>
                  <?php } ?>
                         
                           



					
					  
     </div>
            </div>
            <hr>








	</div>
		
	<?php 
	 require_once 'sidebar.php';

	 ?>

	