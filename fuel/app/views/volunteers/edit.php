<h2>Editing Volunteer</h2>
<br>

<?php echo render('volunteers/_form'); ?>
<p>
	<?php echo Html::anchor('volunteers/view/'.$volunteer->id, 'View'); ?> |
	<?php echo Html::anchor('volunteers', 'Back'); ?></p>
