<h2>From SMS</h2>
<table class="zebra-striped">
	<thead>
		<th>Phone no.</th>
		<th>Message</th>
		<th>Date sent</th>
		<th>&nbsp;</th>
		<?php foreach ($sms as $s): ?>
			<tr id="sms_<?php echo $s->id;?>">
				<td><?php echo $s->number ?></td>
				<td><?php echo $s->message ?></td>
				<td><?php echo date('M. d, Y g:i a', $s->date_posted) ?></td>
				<td>[ <a href="javascript:;" id="<?php echo $s->id ?>" class="processed">mark processed</a>	]</td>
			</tr>
		<?php endforeach ?>
	</thead>

</table>

<h2>From Web Submissions</h2>
<p>
<?php
require_once(APPPATH . '/vendor/enthropia/class.form_generator.php');
$form = new form_generator();
echo $form->open('areaFilter', 'POST', '/admin/', 'id="areaFilter"');
echo $form->selectbox('areaSelect', (array) $areaSelectOptions, 0, Input::post('areaSelect'), 'id="areaSelect" class="span4"');
echo $form->selectbox('areaCitySelect', (array) $areaCitySelectOptions, 0, Input::post('areaCitySelect'), 'id="areaCitySelect" class="span4" style="' . (!empty($areaCitySelectOptions) ? '' : 'display: none;') . '"');
echo $form->selectbox('status_id', (array) $statuses, 0, Input::post('status_id'), 'class="span4"');
echo $form->submit('submit', 'View', 'class="btn"');
echo '&nbsp;|&nbsp;';
echo Html::anchor('rescue/create', 'New Rescue Request', array('class' => 'btn success'));
echo $form->close();
?>

</p>


</div>
<h2>
<?php
if (!empty($cityInfo)) { echo $cityInfo->city_region_name; }
if (!empty($status)) { echo '&nbsp;' . $status->name; }
?>
</h2>
<br>
<?php if ($rescues): ?>
<table class="zebra-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Address</th>
			<th>City</th>
			<th>Specifics</th>
			<th>Reporter</th>
			<th>Source</th>
			<th>Status</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($rescues as $rescue): ?>		<tr>

			<td><?php echo $rescue->name; ?></td>
			<td><?php echo $rescue->address; ?></td>
			<td><?php echo $rescue->GeoCityNames->city_region_name; ?></td>
			<td><?php echo $rescue->specifics; ?></td>
			<td><?php echo $rescue->reporter; ?></td>
			<td><?php echo $rescue->source; ?></td>
			<td>
				<span class="<?php if ($rescue->status_id == 1): ?>red
				<?php elseif ($rescue->status->id == 2): ?>
					blue
				<?php else: ?>
					green
				<?php endif ?>"><?php echo $rescue->status->name; ?></span></td>
			<td><?php if (!empty($rescue->theuser)) { echo $rescue->theuser->name; } ?></td>
			<td style="font-size:10px">
				<?php echo Html::anchor('admin/edit/'.$rescue->id, 'Update status'); ?> |
				<?php echo Html::anchor('admin/delete/'.$rescue->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Rescues.</p>

<?php endif; ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
	$(function(){
		$(".processed").click(function(){
			id = $(this).attr('id');
			if (confirm('Are you sure this record has been processed?')) {
				$.get("<?php echo Uri::create('ajax/sms_processed/') ?>" + id, function(){
					$("#sms_" +id).hide();
				});
			};
		});
	});
</script>
