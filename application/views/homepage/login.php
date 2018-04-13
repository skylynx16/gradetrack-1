
<div class="col-md-4 animated zoomIn">
	<div class="login-container">
			<h1 class="login-title">Login</h1><br>

<!--START ------------------------------ Backup Error --------------------------------------------------------- -->
<?php
    if ($this->session->flashdata('msg')){ //change!
        echo '<div class="backupErrorMsg">';
        echo $this->session->flashdata('msg');
        echo "</div>";
    }
?>
<!--END -------------------------------- Backup Error ----------------------------------------------------------- -->

			<?php $fattr = array('class' => 'form-signin');
					echo form_open(site_url().'main/login/', $fattr); ?>
				<div class="form-group">
					<?php echo form_input(array(
							'name'=>'username', 
							'id'=> 'username', 
							'placeholder'=>'Username', 
							'class'=>'form-control', 
							'value'=> set_value('username'))); ?>
						<?php echo form_error('username', '<div style="color:red; font-size:0.8rem; font-family: Arial, Helvetica, sans-serif; text-align:center; margin-top:0.5rem;">', '</div>') ?>
				</div>
				<br>
				<div class="form-group space">
					<?php echo form_password(array(
							'name'=>'password', 
							'id'=> 'password', 
							'placeholder'=>'Password', 
							'class'=>'form-control', 
							'value'=> set_value('password'))); ?>
						<?php echo form_error('password','<div style="color:red; font-size:0.8rem; font-family: Arial, Helvetica, sans-serif; text-align:center; margin-top:0.5rem;">', '</div>') ?>
				</div>
				<br>
						<?php echo form_submit(array('value'=>'Sign In', 'class'=>'btn btn-lg btn-primary btn-block')); ?>
						<?php echo form_close(); ?>
				<center>
						<p>Click <a href="<?php echo site_url();?>main/forgot_password">here</a> if you forgot your password.</p>
				</center>				
	</div> <!--container-->
</div><!--col-md-4-->
					</div>