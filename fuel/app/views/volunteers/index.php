<h2>Listing Volunteers</h2>
<br>
<?php if ($volunteers): ?>
<table class="zebra-striped">
	<thead>
		<tr>
			<th>Username</th>
			<th>Password</th>
			<th>Name</th>
			<th>Email</th>
			<th>Approved</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($volunteers as $volunteer): ?>		<tr>

			<td><?php echo $volunteer->username; ?></td>
			<td><?php echo $volunteer->password; ?></td>
			<td><?php echo $volunteer->name; ?></td>
			<td><?php echo $volunteer->email; ?></td>
			<td><?php echo $volunteer->approved; ?></td>
			<td>
				<?php echo Html::anchor('volunteers/view/'.$volunteer->id, 'View'); ?> |
				<?php echo Html::anchor('volunteers/edit/'.$volunteer->id, 'Edit'); ?> |
				<?php echo Html::anchor('volunteers/delete/'.$volunteer->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Volunteers.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('volunteers/create', 'Add new Volunteer', array('class' => 'btn success')); ?>

</p>
