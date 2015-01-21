
<div class="news-sec-1 float-width">
	<!-- Website Contact us page Info -->
	<div class="float-width sec-cont">
		<div class="sec-1-big float-width">
			<div class="contact-form float-width">
				<h3 class="sec-title">LEAVE A message</h3>
				<?php echo form_open($form_action, array(
					'id' => 'contactform',
				));?>
					<div class="alert" id="formmsg" style="display:none;">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button><span class="error"></span>
					</div>
					<div class="form-group">
						<input required="true" type="name" name="Model[displayname]" class="form-control" id="exampleInputName" placeholder="First and last name">
					</div>
					<div class="form-group">
						<input required="true" type="email" name="Model[email]" class="form-control" id="exampleInputEmail1" placeholder="E-mail and phone number">
					</div>
					<div class="form-group">
						<textarea required="true" class="form-control" rows="6" name="Model[message]" placeholder="Your message"></textarea>
					</div>					
					<input type="submit" value="SUBMIT YOUR MESSAGE" id="contactsubmit" class="cmnt-btn trans2">
				<?php echo form_close(); ?>	
			</div>
		</div>
	</div>
</div>