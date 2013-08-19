<h2>Viewing #<?php echo $volunteer->id; ?></h2>

<p>
	<strong>Username:</strong>
	<?php echo $volunteer->username; ?></p>
<p>
	<strong>Password:</strong>
	<?php echo $volunteer->password; ?></p>
<p>
	<strong>Name:</strong>
	<?php echo $volunteer->name; ?></p>
<p>
	<strong>Email:</strong>
	<?php echo $volunteer->email; ?></p>
<p>
	<strong>Approved:</strong>
	<?php echo $volunteer->approved; ?></p>

<?php echo Html::anchor('volunteers/edit/'.$volunteer->id, 'Edit'); ?> |
<?php echo Html::anchor('volunteers', 'Back'); ?>