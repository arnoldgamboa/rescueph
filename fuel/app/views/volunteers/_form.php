<?php echo Form::open(array('class' => 'form-stacked')); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Username', 'username'); ?>

			<div class="input">
				<?php echo Form::input('username', Input::post('username', isset($volunteer) ? $volunteer->username : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<!-- <div class="clearfix">
			<?php echo Form::label('Password', 'password'); ?>

			<div class="input">
				<?php echo Form::input('password', Input::post('password', isset($volunteer) ? $volunteer->password : ''), array('class' => 'span6')); ?>

			</div>
		</div> -->
		<div class="clearfix">
			<?php echo Form::label('Name', 'name'); ?>

			<div class="input">
				<?php echo Form::input('name', Input::post('name', isset($volunteer) ? $volunteer->name : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Email', 'email'); ?>

			<div class="input">
				<?php echo Form::input('email', Input::post('email', isset($volunteer) ? $volunteer->email : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<!-- <div class="clearfix">
			<?php echo Form::label('Approved', 'approved'); ?>

			<div class="input">
				<?php echo Form::input('approved', Input::post('approved', isset($volunteer) ? $volunteer->approved : ''), array('class' => 'span6')); ?>

			</div>
		</div> -->
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>