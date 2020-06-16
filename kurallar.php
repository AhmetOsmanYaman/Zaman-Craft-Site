<?php 

require_once 'header.php';

 $kuralsor = $db->prepare("SELECT * FROM kural");
 $kuralsor->execute();
$kuralcek = $kuralsor->fetch(PDO::FETCH_ASSOC);





 ?>





	<div class="container mt-5 mb-5 text-<?= $sitecek['site_yazirenk'] ?>">
	
	<div class="row">
	<div class="col-md-8 mb-5">
<div class=" mb-5 p-3 text-<?= $sitecek['site_yazirenk'] ?>" style="border-radius: 10px;background:<?= $sitecek['site_renk'] ?>">Kurallar</div>	




<div class="card mb-5  " style="border-radius: 15px ; background:<?= $sitecek['site_arkarenk'] ?>  ">

 


		 									
  <div class="card-body" style="background:<?= $sitecek['site_sidebarrenk'] ?>">

    <p class="card-text text-<?= $sitecek['site_yazirenk'] ?>" ><?= $kuralcek['kural_detay'] ?></p>

  
  </div>
</div> 

		

		
		
		
		
		
		
		
</div>
		
	<?php 
	 require_once 'sidebar.php';

	 ?>

	