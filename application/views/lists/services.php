<tr id="service<?php echo $id; ?>">
	<td><?php echo $name; ?></td>
	<td><?php echo $price; ?></td>
	<td>
		<a href="<?php echo base_url()."www/images/".$image ?>">
			<img class="thumbnail" src="<?php echo base_url()."www/images/".$image ?>">
		</a>
	</td>
	<td>
		<button id="btnEditService" class="btn btn-default" data-id="<?php echo $id; ?>">Edit</button>
		<button id="btnRemoveService" class="btn btn-danger" data-id="<?php echo $id; ?>">Remove</button>
	</td>
</tr>