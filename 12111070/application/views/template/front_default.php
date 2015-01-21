<?php
	$pageTitle = $pageTitle != '' ? $pageTitle : 'Jangan lupa halamannya belum dikasih judul';
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      
<html class="no-js lt-ie9 lt-ie8 lt-ie7">
<![endif]-->
<!--[if IE 7]>         
<html class="no-js lt-ie9 lt-ie8">
<![endif]-->
<!--[if IE 8]>         
<html class="no-js lt-ie9">
<![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js">
   <!--<![endif]-->
<head>
  <meta charset="UTF-8" />
  <meta name="description" content="<?php echo $pageDescription;?>" />
<meta name="keywords" content="<?php echo $pageMeta;?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title><?php echo $pageTitle;?> | 12111070 Sulistiyadi</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="<?php echo base_url('assets_front/css/bootstrap.min.css') ?>" />
<link rel="stylesheet" href="<?php echo base_url('assets_front/css/bootstrap-theme.css') ?>" />
<link rel="stylesheet" href="<?php echo base_url('assets_front/css/normalize.css') ?>" />
<link rel="stylesheet" href="<?php echo base_url('assets_front/css/font-awesome.min.css') ?>" />
<link rel="stylesheet" href="<?php echo base_url('assets_front/css/main.css') ?>" />
<link rel="stylesheet" href="<?php echo base_url('assets_front/css/responsive.css') ?>" />
<link rel="stylesheet" href="<?php echo base_url('assets_front/css/calendar.css') ?>" />
</head>
 <body>
      <?php /*
	  <!-- Logo and Ad banner -->
      <div class="logo-top-ad">
         <div class="container">
            <div class="row">
               <!-- Magalla Logo -->
               <div class="logo col-lg-4">
                  <a href="home-1.html"><img alt="" src="img/logo.png" /></a>
               </div>
               <div class="top-banner col-lg-8">
                  <!-- Top ad banner -->
                  <a href="#"><img alt="" src="img/top-banner.jpg" /></a>
               </div>
            </div>
         </div>
      </div>
	  */?>
	  
      <div class="main-menu">
         <div class="container">
            <div class="row">
               <div class="col-lg-8">
                  <!-- Main Menu -->
                  <ul id="main-menu-items" class="sm sm-menu menu-efct">
                     <li class="active"><a href="<?php echo site_url('home/index');?>" title="Home">Home</a></li>
					 <li><a href="<?php echo site_url('home/contact');?>" title="Kontak">Kontak</a></li>
                  </ul>
               </div>
               <div class="col-lg-4 main-search-bar">
                  <!-- Top Search bar -->
                  <form class="navbar-form float-width" role="search">
                     <div class="form-group float-width">
                        <input type="text" class="form-control float-width" placeholder="Search for games, music, movies">
                     </div>
                     <a href="#" type="submit"><i class="fa fa-search"></i></a>
                  </form>
               </div>
            </div>
            <!-- Close the Fixed Menu button -->
            <a class="fxd-mnu-x trans1" title="Close" id="hidemenu"><span class="fa-stack fa-lg"> <i class="fa fa-times fa-stack-1x fa-inverse"></i> </span></a>
         </div>
      </div>


      <!-- Main Body -->
      <div class="container">
         <!-- Main Left side -->
         <div class="main-left-side">
			<?php echo $content;?>
         </div>
         <!-- Main Right side -->
         <div class="main-right-side">
            <!-- Social Media Counter -->
            <div class="smedia lefty">
               <div class="w50 blocky"><a href="#"><img alt="" class="lefty" src="<?php echo base_url('assets_front/images/fb.png') ?>" /><span>6423</span></a></div>
               <div class="w50 blocky"><a href="#"><img alt="" class="lefty" src="<?php echo base_url('assets_front/images/tw.png') ?>" /><span>12344</span></a></div>
               <div class="w50 blocky"><a href="#"><img alt="" class="lefty" src="<?php echo base_url('assets_front/images/gplus.png') ?>" /><span>1846</span></a></div>
               <div class="w50 blocky"><a href="#"><img alt="" class="lefty" src="<?php echo base_url('assets_front/images/drp.png') ?>" /><span>416</span></a></div>
               <div class="w50 blocky"><a href="#"><img alt="" class="lefty" src="<?php echo base_url('assets_front/images/flkr.png') ?>" /><span>91</span></a></div>
               <div class="w50 blocky"><a href="#"><img alt="" class="lefty" src="<?php echo base_url('assets_front/images/ig.png') ?>" /><span>3487</span></a></div>
            </div>		
			
            <!-- Trending news right -->
			<?php /*
            <div class="trending lefty">
               <h3 class="sec-title">TRENDING</h3>
               <div class="trend-1">
                  <a href="#"><img alt="" src="<?php echo $this->Utility->getTimThumb(base_url('public/default.jpg'), 370, 250, 1);?>" /></a>
                  <a class="lefty cat-a cat-label2" href="#">GAMES</a>
                  <div class="trend-2">
                     <h3><a href="#">Watch Dogs - First gameplay this year</a></h3>
                     <p>Curabitur fringilla porttitor porta. Vivamus vel nulla ullamcorper, fringilla ligula nec, pellentesque nisl. Sed dolor..</p>
                     <p class="artcl-time-1">
                        <span><i class="fa fa-clock-o"></i>20 Jan 2014</span>
                        <span><i class="fa fa-comment-o"></i>21 comments</span>
                     </p>
                  </div>
               </div>
               <div class="float-width">
                  <div class="trend-sm float-width">
                     <a href="#"><img alt="" class="lefty" src="<?php echo $this->Utility->getTimThumb(base_url('public/default.jpg'), 107, 85, 1);?>" /></a>
                     <h4 class="lefty">USA Games Studio will release sandbox new game</h4>
                     <a class="lefty cat-a cat-label2" href="#">GAMES</a>
                     <p class="righty"><span><i class="fa fa-clock-o"></i>20 Jan 2014</span></p>
                  </div>
                  <div class="trend-sm float-width">
                     <a href="#"><img alt="" class="lefty" src="<?php echo $this->Utility->getTimThumb(base_url('public/default.jpg'), 107, 85, 1);?>" /></a>
                     <h4 class="lefty">After party of Blondi Concert will begin tomorrow</h4>
                     <a class="lefty cat-a cat-label4" href="#">MUSIC</a>
                     <p class="righty"><span><i class="fa fa-clock-o"></i>20 Jan 2014</span></p>
                  </div>
                  <div class="trend-sm float-width">
                     <a href="#"><img alt="" class="lefty" src="<?php echo $this->Utility->getTimThumb(base_url('public/default.jpg'), 107, 85, 1);?>" /></a>
                     <h4 class="lefty">The best place to see in Winter season this year</h4>
                     <a class="lefty cat-a cat-label3" href="#">TOURISM</a>
                     <p class="righty"><span><i class="fa fa-clock-o"></i>20 Jan 2014</span></p>
                  </div>
               </div>
            </div> */?>
		 
		 </div>		
	  </div>
	</div>
	
      <?php /*
	  <!-- Footer -->
      <div class="main-footers">
         <div class="container">
         </div>
      </div>
	  */?>
      <!-- Copy right footer -->
      <div class="copy-rt-ftr">
         <div class="container">
            <a class="lefty">Magalla Template &#169; Copyright 2015, All Rights Reserved</a>
         </div>
      </div>
   <!-- Main Home Layout Ends -->   
 
<script src="<?php echo base_url('assets_front/js/modernizr-2.6.2-respond-1.1.0.min.js') ?>"></script>
 </body>
</html>
