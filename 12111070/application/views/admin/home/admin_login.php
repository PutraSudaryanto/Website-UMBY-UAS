<?php echo form_open('admin/home/login', array(
	'class' => 'lockcreen-form fade-in-effect in',
	'id' => 'lockscreen',
)); ?>
	<div class="user-thumb">
		<a href="#"><img src="http://themes.laborator.co/xenon/assets/images/user-5.png" class="img-responsive img-circle" /></a>
	</div>

	<div class="form-group">
		<h3>Welcome back</h3>
		<p>Enter your password to access the admin.</p>

		<div class="input-group">
			<input type="text" class="form-control input-dark" name="LoginFormAdmin[username]" id="username" placeholder="Username" style="margin-bottom: 10px;" />
			<input type="password" class="form-control input-dark" name="LoginFormAdmin[password]" id="password" placeholder="Password" style="" />
			<span class="input-group-btn">
				<button type="submit" class="btn btn-primary">Log In</button>
			</span>
		</div>
	</div>
<?php echo form_close(); ?>