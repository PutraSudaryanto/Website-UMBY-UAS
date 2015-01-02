<?php if(empty($dialogDetail)) {?>
<?php } else {
	if(empty($dialogWidth)) {?>
	<?php } else {?>
	<?php }
}
	$pageTitle = $pageTitle != '' ? $pageTitle : 'Jangan lupa halamannya belum dikasih judul';
	$display = (!empty($dialogDetail)) ? 'style="display: block;"' : '';
	if(!empty($dialogDetail)) {
		$dialogWidth = !empty($dialogWidth) ? $dialogWidth.'px' : '650px';
	} else {
		$dialogWidth = '';
	}
?>

<!DOCTYPE html>
<html>
 <head>
  <meta charset="UTF-8" />
  <meta name="description" content="<?php echo $pageDescription;?>" />
<meta name="keywords" content="<?php echo $pageMeta;?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/general.css') ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/form.css') ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/typography.css') ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/layout.css') ?>" />
<title><?php echo $pageTitle;?> | 12111075 Dwi Putra Sudaryanto</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="author" content="Ommu Platform (ommu@sudaryanto.me)" />
  <script type="text/javascript">
	var baseUrl = '<?php echo base_url() ?>';
	//javascript attribute
	var dialogGroundUrl = '<?php echo !empty($dialogDetail) ? (!empty($dialogGroundUrl) ? $dialogGroundUrl : '') : '';?>';
  </script>
  <link rel="shortcut icon" href="<?php echo base_url('favicon.ico') ?>" />
  <style type="text/css"></style>
 </head>	
 <body <?php echo (!empty($dialogDetail)) ? 'style="overflow-y: hidden;"' : '';?>>
	<?php //begin.Header ?>
	<header></header>
	<?php //end.Header ?>
	
	<?php //begin.Notifier ?>
	<div class="notifier" <?php echo (!empty($dialogDetail) && !empty($dialogWidth)) ? 'name="'.$dialogWidth.'" '.$display : '';?>>
		<div class="fixed">
			<div class="valign">
				<div class="dialog-box">
					<div class="content" id="<?php echo $dialogWidth;?>" name="notifier-wrapper"><?php echo (!empty($dialogDetail) && !empty($dialogWidth)) ? $content : '';?></div>
				</div>
			</div>
		</div>
	</div>
	<?php //end.Notifier ?>

	<?php //begin.Dialog ?>
	<div class="dialog" <?php echo (!empty($dialogDetail) && empty($dialogWidth)) ? 'name="'.$dialogWidth.'" '.$display : '';?>>
		<div class="fixed">
			<div class="valign">
				<div class="dialog-box">
					<div class="content" id="<?php echo $dialogWidth;?>" name="dialog-wrapper"><?php echo (!empty($dialogDetail) && empty($dialogWidth)) ? $content : '';?></div>
				</div>
			</div>
		</div>
	</div>
	<?php //end.Dialog ?>
	
	<?php //begin.Body Content ?>
	<div class="body clearfix">
		<?php //begin.Sidebar ?>
		<div class="sidebar">
			<div class="table">
				<?php //begin.Account ?>
				<div class="account">
					<a id="uplaod-image" class="photo" href="" title="Change Photo: Putra Sudaryanto"><img src="<?php echo $this->Utility->getTimThumb(base_url('assets/images/default.png'), 82, 82, 1);?>" alt="Ommu Platform"/></a>
					<div class="info">
						Welcome, <a href="" title="Edit Account: Putra Sudaryanto">Putra Sudaryanto</a>
						<span>Last sign in : 30-12-2014</span>
						<a class="signout" href="" title="Logout: Putra Sudaryanto">Logout</a>
					</div>
				</div>
				<?php //end.Account ?>
				
				<?php //begin.Menu ?>
				<div class="menu clearfix">	
					<?php //begin.Mainmenu ?>
					<div class="mainmenu">
						<ul>
							<li <?php echo in_array($this->uri->segment(2), array('newscategory','news','newstags')) ? 'class="active"' : ''?>><a href="<?php echo site_url('admin/news/manage')?>" title="News">News</a></li>
							<li <?php echo in_array($this->uri->segment(2), array('userlevel','users','userlogin','useremail','userpassword')) ? 'class="active"' : ''?>><a href="<?php echo site_url('admin/users/manage')?>" title="Users">Users</a></li>
							<li <?php echo in_array($this->uri->segment(2), array('tags')) ? 'class="active"' : ''?>><a href="<?php echo site_url('admin/tags/manage')?>" title="Tags">Tags</a></li>
						</ul>
					</div>
					<?php //begin.Submenu ?>
					<div class="submenu">
						<h3>Mainmenu</h3>
						<ul>
							<?php if(in_array($this->uri->segment(2), array('newscategory','news','newstags'))) {?>
								<li <?php echo $this->uri->segment(2) == 'news' ? 'class="selected"' : '';?>><a href="<?php echo site_url('admin/news/manage')?>" title="News">News</a></li>
								<li <?php echo $this->uri->segment(2) == 'newscategory' ? 'class="selected"' : '';?>><a href="<?php echo site_url('admin/newscategory/manage')?>" title="Category">Category</a></li>
								<li <?php echo $this->uri->segment(2) == 'newstags' ? 'class="selected"' : '';?>><a href="<?php echo site_url('admin/newstags/manage')?>" title="News Tags">News Tags</a></li>
							<?php } else if(in_array($this->uri->segment(2), array('userlevel','users','userlogin','useremail','userpassword'))) {?>							
								<li <?php echo $this->uri->segment(2) == 'users' ? 'class="selected"' : '';?>><a href="<?php echo site_url('admin/users/manage')?>" title="Users">Users</a></li>
								<li <?php echo $this->uri->segment(2) == 'userlevel' ? 'class="selected"' : '';?>><a href="<?php echo site_url('admin/userlevel/manage')?>" title="User Level">User Level</a></li>
								<li <?php echo $this->uri->segment(2) == 'userlogin' ? 'class="selected"' : '';?>><a href="<?php echo site_url('admin/userlogin/manage')?>" title="History Login">History Login</a></li>
								<li <?php echo $this->uri->segment(2) == 'useremail' ? 'class="selected"' : '';?>><a href="<?php echo site_url('admin/useremail/manage')?>" title="History Change Email">History Change Email</a></li>
								<li <?php echo $this->uri->segment(2) == 'userpassword' ? 'class="selected"' : '';?>><a href="<?php echo site_url('admin/userpassword/manage')?>" title="History Cange Password">History Cange Password</a></li>
							<?php } else if(in_array($this->uri->segment(2), array('tags'))) {?>
								<li <?php echo $this->uri->segment(2) == 'tags' ? 'class="selected"' : '';?>><a href="<?php echo site_url('admin/tags/manage')?>" title="Tags">Tags</a></li>
							<?php }?>
						</ul>	
					</div>
				</div>
				<?php //end.Menu ?>				
			</div>
		</div>
		<?php //begin.Content ?>
		<div class="content">
			<div class="wrapper"><?php echo (empty($dialogDetail)) ? $content : '';?></div>
		</div>
	</div>
	<?php //end.Body Content ?>
	
	<?php //begin.Footer ?>
	<footer class="clearfix">
		<div class="copyright">
			Copyright &copy; 2015 <a href="<?php echo base_url() ?>" title="12111075 - Dwi Putra Sudaryanto">12111075 - Dwi Putra Sudaryanto</a>. All rights reserved.
		</div>
		<div class="powered">
			powered by <a off_address="" href="http://www.ommu.co" target="_blank" title="Ommu Platform">Ommu Platform</a>
		</div>
	</footer>
	<?php //end.Footer ?>
	
  <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-2.1.3.min.js') ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/custom/custom.js') ?>"></script>
 </body>
</html>


