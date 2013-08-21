<table>
<?php foreach ($rescues as $rescue): ?>		<tr>

			<td><?php echo $rescue->name; ?></td>
			<td><?php echo $rescue->address; ?><br>
				<strong><?php echo $rescue->GeoCityNames->city_region_name ?></strong>
			</td>
			<td><?php echo $rescue->specifics; ?><br>
				<strong>by: <?php echo $rescue->reporter; ?></strong><br>
				<!-- <strong>source: <?php echo $rescue->source; ?></strong></td> -->
			<!-- <td><?php echo $rescue->reporter; ?></td> -->
			<!-- <td><?php echo $rescue->source; ?></td> -->
			<td>
				<span class="<?php if ($rescue->status_id == 1): ?>red
				<?php elseif ($rescue->status->id == 2): ?>
					blue
				<?php else: ?>
					green
				<?php endif ?>"><?php echo $rescue->status->name; ?></span></td>
			<!-- <td>
				<?php echo Html::anchor('rescue/view/'.$rescue->id, 'View'); ?> |
				<?php echo Html::anchor('rescue/edit/'.$rescue->id, 'Edit'); ?> |
				<?php echo Html::anchor('rescue/delete/'.$rescue->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td> -->
			<td><?php echo $rescue->date_added ? date('M. d, Y g:i a', $rescue->date_added )  : "Aug. 20, 2013 7:00 pm"?></td>
		</tr>
<?php endforeach; ?>
</table>