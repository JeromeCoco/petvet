<tr id="doctor<?php echo $id; ?>">
	<td><?php echo $firstname; ?></td>
	<td><?php echo $lastname; ?></td>
	<td><?php echo $mobile; ?></td>
	<td>
		<button id="btnEditDoctor" class="btn btn-default" data-id="<?php echo $id; ?>">Edit</button>
		<button id="btnRemoveDoctor" class="btn btn-danger" data-id="<?php echo $id; ?>">Remove</button>
	</td>
</tr>