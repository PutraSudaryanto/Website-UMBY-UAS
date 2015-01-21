<?php 
if(empty($this->session->userdata('logged_in')))
	if($this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3) != 'admin/home/login')
		redirect('admin/home/login');

$session_data = $this->session->userdata('logged_in');
$pageTitle = $pageTitle != '' ? $pageTitle : 'Jangan judul halamannya';
?>
<!DOCTYPE html>
<html>
 <head>
  <meta charset="UTF-8" />
  <meta name="description" content="<?php echo $pageDescription;?>" />
<meta name="keywords" content="<?php echo $pageMeta;?>" />
<link rel="stylesheet" href="<?php echo base_url('assets/css/linecons.css') ?>" id="style-resource-2">
<link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" id="style-resource-3">
<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css') ?>" id="style-resource-4">
<link rel="stylesheet" href="<?php echo base_url('assets/css/xenon-core.css') ?>" id="style-resource-5">
<link rel="stylesheet" href="<?php echo base_url('assets/css/xenon-forms.css') ?>" id="style-resource-6">
<link rel="stylesheet" href="<?php echo base_url('assets/css/xenon-components.css') ?>" id="style-resource-7">
<link rel="stylesheet" href="<?php echo base_url('assets/css/xenon-skins.css') ?>" id="style-resource-8">
<link rel="stylesheet" href="<?php echo base_url('assets/css/custom.css') ?>" id="style-resource-9">
<title><?php echo $pageTitle;?> | 12111070 Sulistiyadi</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="author" content="" />
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Arimo:400,700,400italic" id="style-resource-1">
 
  <script type="text/javascript">
	var baseUrl = '<?php echo base_url() ?>';
	//javascript attribute
  </script>
  <link rel="shortcut icon" href="<?php echo base_url('favicon.ico') ?>" />
  <style type="text/css"></style>
 </head>	
 <body class="page-body <?php echo ($this->uri->segment(2).'/'.$this->uri->segment(3) == 'home/login') ? 'lockscreen-page' : '';?>">
 
 <?php if($this->uri->segment(2).'/'.$this->uri->segment(3) == 'home/login') {?>
 <div class="login-container">
	 <div class="row">
		 <div class="col-sm-7">
			<?php echo $content;?>
		 </div>
	 </div>
 </div>
 
 <?php } else {?>
 <div class="page-container">
	<?php //begin.Sidebar ?>
	<div class="sidebar-menu toggle-others fixed">        
        <div class="sidebar-menu-inner">
			<header class="logo-env">
				<div class="logo">
					<a href="<?php echo site_url()?>" class="logo-expanded">
						<img src="<?php echo base_url('assets/images/logo@2x.png') ?>" width="80" alt="" />
					</a>
					<a href="<?php echo site_url()?>" class="logo-collapsed">
						<img src="<?php echo base_url('assets/images/logo-collapsed@2x.png') ?>" width="40" alt="" />
					</a>
				</div> 
			</header>
			
			<ul id="main-menu" class="main-menu">
				<li>
					<a href="<?php echo site_url('admin/home/index')?>">
						<i class="linecons-cog"></i>
						<span class="title">Dashboard</span>
					</a>
				</li>
				
				<li>
					<a href="<?php echo site_url('admin/book/manage')?>">
						<i class="linecons-desktop"></i>
						<span class="title">Buku</span>
					</a>              
					<ul>
						<li><a href="<?php echo site_url('admin/book/manage')?>" title="Buku"><span class="title">Buku</span></a></li>
						<li><a href="<?php echo site_url('admin/book/add')?>" title="Tambah Buku"><span class="title">Tambah Buku</span></a></li>
						<li><a href="<?php echo site_url('admin/bookpublisher/manage')?>" title="Penerbit"><span class="title">Penerbit</span></a></li>
						<li><a href="<?php echo site_url('admin/bookpublisher/add')?>" title="Tambah Penerbit"><span class="title">Tambah Penerbit</span></a></li>
						<li><a href="<?php echo site_url('admin/booksubject/manage')?>" title="Tema"><span class="title">Tema</span></a></li>
						<li><a href="<?php echo site_url('admin/booksubject/add')?>" title="Tambah Tema"><span class="title">Tambah Tema</span></a></li>
					</ul>
				</li>
				
				<li>
					<a href="<?php echo site_url('admin/adminuser/manage')?>">
						<i class="linecons-desktop"></i>
						<span class="title">Admin</span>
					</a>              
					<ul>
						<li><a href="<?php echo site_url('admin/adminuser/manage')?>" title="Admin User"><span class="title">Admin User</span></a></li>
						<li><a href="<?php echo site_url('admin/adminuser/add')?>" title="Tambah Admin User"><span class="title">Tambah Admin User</span></a></li>
						<li><a href="<?php echo site_url('admin/admingroup/manage')?>" title="Admin Grup"><span class="title">Admin Grup</span></a></li>
						<li><a href="<?php echo site_url('admin/admingroup/add')?>" title="Tambah Admin User"><span class="title">Tambah Admin Grup</span></a></li>
					</ul>
				</li>
				
				<li>
					<a href="<?php echo site_url('admin/zonecountry/manage')?>">
						<i class="linecons-desktop"></i>
						<span class="title">Zona</span>
					</a>              
					<ul>
						<li><a href="<?php echo site_url('admin/zonecountry/manage')?>" title="Zona Negara"><span class="title">Zona Negara</span></a></li>
						<li><a href="<?php echo site_url('admin/zoneprovince/manage')?>" title="Zona Provinsi"><span class="title">Zona Provinsi</span></a></li>
						<li><a href="<?php echo site_url('admin/zonecity/manage')?>" title="Zona Kota"><span class="title">Zona Kota</span></a></li>
					</ul>
				</li>
				<li>
					<a href="<?php echo site_url('admin/tags/manage')?>">
						<i class="linecons-desktop"></i>
						<span class="title">Tags</span>
					</a>
				</li>
				<li>
					<a href="<?php echo site_url('admin/contact/manage')?>">
						<i class="linecons-desktop"></i>
						<span class="title">Kontak</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<?php //end.Sidebar ?>
	
	<?php //begin.Content ?>
	<div class="main-content">
	
		<?php //begin.Header ?>
		<nav class="navbar user-info-navbar" role="navigation">
			<h1><?php echo $pageTitle;?></h1>
			<ul class="user-info-menu right-links list-inline list-unstyled">            
				<li class="dropdown user-profile">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img src="<?php echo base_url('assets/images/user.png') ?>" alt="user-image" class="img-circle img-inline userpic-32" width="28" />
						<span><?php echo $session_data['displayname'];?> <i class="fa-angle-down"></i></span>	
					</a>
					<ul class="dropdown-menu user-profile-menu list-unstyled">                
						<li><a href="<?php echo site_url('admin/book/add')?>"><i class="fa-edit"></i>New Book</a></li>                
						<li class="last"><a href="<?php echo site_url('admin/home/logout')?>"><i class="fa-lock"></i>Logout</a></li>
					</ul>
				</li>
			</ul>
		</nav>
		<?php //end.Header ?>
	
		<?php echo $content;?>
		
	</div>
	<?php //end.Content ?>
	
 </div>
 <?php }?>

<script src="<?php echo base_url('assets/js/jquery-1.11.1.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>" id="script-resource-1"></script>    
<script src="<?php echo base_url('assets/js/TweenMax.min.js') ?>" id="script-resource-2"></script>    
<script src="<?php echo base_url('assets/js/resizeable.js') ?>" id="script-resource-3"></script>    
<script src="<?php echo base_url('assets/js/joinable.js') ?>" id="script-resource-4"></script>    
<script src="<?php echo base_url('assets/js/xenon-api.js') ?>" id="script-resource-5"></script>    
<script src="<?php echo base_url('assets/js/xenon-toggles.js') ?>" id="script-resource-6"></script>    
<script src="<?php echo base_url('assets/js/xenon-custom.js') ?>" id="script-resource-7"> </script>
 </body>
</html>