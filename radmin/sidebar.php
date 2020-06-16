<!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
        </div>
        <div class="sidebar-brand-text mx-3">RowadorTR</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>AnaSayfa</span></a>
      </li><?php if (!$kontrol){exit();} ?>
      <hr class="sidebar-divider">
      

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#duyuru"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="fa fa-edit"></i>
          <span>Duyurular</span>
        </a>
        <div id="duyuru" class="collapse" aria-labelledby="headingBootstrap" data-parent="#duyuru">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="duyuru-ekle.php">Duyuru Ekle</a>
           <a class="collapse-item" href="duyuru.php">Duyurularım</a>
          </div>
        </div>
      </li>









      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ayar"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="fa fa-server"></i>
          <span>Sunucu Ayarları</span>
        </a>
        <div id="ayar" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
           <a class="collapse-item" href="sunucum.php">Sunucularım</a>
          </div>
        </div>
      </li>

   <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#market"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="fa fa-shopping-cart"></i>
          <span>Market</span>
        </a>
        <div id="market" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
           <a class="collapse-item" href="market-kategori.php">Ürün-Kategori İşlemleri</a>
            <a class="collapse-item" href="market.php">Ürün İşlemleri</a>
          </div>
        </div>
      </li>



<?php 
 $destekk = $db->prepare("SELECT * from destek where destek_durum='1'");
$destekk->execute();
if (!$rwdlsn){exit();}
 ?>



     <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#destek"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="fa fa-life-ring"></i>
          <span>Destek <?php if ($destekk->rowCount()>0) {?>
           (<?=$destekk->rowCount();?>)

        <?php }?>
         </span>
        </a>
        <div id="destek" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
             <a class="collapse-item" href="destek-kategori.php">Destek-Kategori İşlemleri</a>
            <a class="collapse-item" href="destek.php">Destek Talepleri <?php if ($destekk->rowCount()>0) {?>
           (<?=$destekk->rowCount();?>)

        <?php }?></a>
          </div>
        </div>
      </li>
  <li class="nav-item">
        <a class="nav-link" href="kural.php">
          <i class="fa fa-book"></i>
          <span>Kurallar </span>
        </a>
      </li>

<?php 
 $yorumsor = $db->prepare("SELECT * from yorum where yorum_onay='0'");
$yorumsor->execute();

 ?>


      <li class="nav-item">
        <a class="nav-link" href="yorumlar.php">
          <i class="fa fa-comments"></i>
          <span>Yorumlar <?php if ($yorumsor->rowCount()>0) {?>
           (<?=$yorumsor->rowCount();?>)
         <?php } ?> 

            </span>
        </a>
      </li>

          <li class="nav-item">
        <a class="nav-link collapsed" href="oyuncular.php">
          <i class="fa fa-users"></i>
          <span>Oyuncu Ayarları</span>
        </a>
          <li class="nav-item">
        <a class="nav-link collapsed" href="eklenti.php">
          <i class="fa fa-bolt"></i>
           <span>Eklenti Yönetimi &nbsp;&nbsp;&nbsp;&nbsp;   <span class="badge badge-sm pull-right badge-pill badge-danger"><small> yeni</small></span></span> 
        </a>
      
      
      </li>
 <li class="nav-item">
        <a class="nav-link" href="odeme-kayit.php">
          <i class="fa fa-cart-plus"></i>
          <span>Ödeme Kayıt &nbsp;&nbsp;&nbsp;&nbsp;   <span class="badge badge-pill pull-right badge-warning"><small>    ininal</small></span></span> 
        </a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="kupon.php">
          <i class="fa fa-bookmark"></i>
          <span>Kupon</span> 
        </a>
      </li>

  <li class="nav-item">
        <a class="nav-link" href="odeme.php">
          <i class="fa fa-lira-sign"></i>
          <span>Ödeme </span>
        </a>
      </li>



     <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#sunucu"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="fa fa-cogs"></i>
          <span>Site Ayarları</span>
        </a>
        <div id="sunucu" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="genel-ayar.php">Genel Ayarlar</a>
               <a class="collapse-item" href="sunucu-ayar.php">Sunucu Ayar</a>
                        <a class="collapse-item" href="logo-ayar.php">Logo Ayarlar</a>
                          <a class="collapse-item" href="site-ozellestir.php">Site Özelleştir</a>
                    

          </div>
        </div>
      </li>


     
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
           
            
           
            <li class="nav-item dropdown no-arrow mx-1"></li>






            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
               <img class="img-profile rounded-circle" src="<?= $kullanici['kullanici_resim'] ?>" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small"><?= $kullanici['kullanici_username'] ?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../cikis.php">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Güvenli Çıkış
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->