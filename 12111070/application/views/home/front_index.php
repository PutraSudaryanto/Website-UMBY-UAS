<!-- Top News Section -->
<div class="top-news float-width">
   <div class="float-width sec-cont">
	  <h3 class="sec-title">Buku Terbaru</h3>
	  <div class="top-big-two">
<?php 
$i = 0;
foreach($book as $key => $val) {
$i++;
if($i <= 2) {
	if($val->cover != '')
		$media = base_url('public/'.$val->cover);
	else
		$media = base_url('public/default.png');?>	
<div class="<?php echo $i == 1 ? 'big-two-1' : 'big-two-2'?> blocky boxgrid3 caption">
	<img alt="" src="<?php echo $this->Utility->getTimThumb($media, 367, 269, 1);?>"/>
	<div class="cover boxcaption3">
		<h3><a href="<?php echo site_url('home/view/'.$val->book_id.'/'.$this->Utility->getUrlTitle($val->title))?>" title="<?php echo $val->title;?>"><?php echo $this->Utility->shortText($val->title, 30);?></a></h3>
		<p class="artcl-time-1">
			<span><i class="fa fa-clock-o"></i><?php echo $this->Utility->dateFormat($val->creation_date);?></span>
		</p>
		<p><?php echo $this->Utility->shortText($val->description, 200);?></p>
	</div>
</div>
<?php }
}?>
	  </div>
   </div>

<?php 
$i = 0;
foreach($book as $key => $val) {
$i++;
if($i > 2) {
	if($val->cover != '')
		$media = base_url('public/'.$val->cover);
	else
		$media = base_url('public/default.png');?>
   <div class="tn-small-1 blocky">
	  <a href="<?php echo site_url('home/view/'.$val->book_id.'/'.$this->Utility->getUrlTitle($val->title))?>"><img alt="<?php echo $val->title;?>" class="lefty" src="<?php echo $this->Utility->getTimThumb($media, 107, 85, 1);?>" /></a>
	  <h4 class="lefty"><?php echo $this->Utility->shortText($val->title, 50);?></h4>
	  <br/><br/>
	  <a class="lefty cat-a cat-label4" href="#"><?php echo $this->BookSubjectModel->findByPk($val->subject_id)->subject;?></a>
	  <p class="righty"><span><i class="fa fa-clock-o"></i><?php echo $this->Utility->dateFormat($val->creation_date);?></span></p>
   </div>
<?php }
}?>
</div>