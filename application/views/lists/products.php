<tr id="product<?php echo $id; ?>">
	<td><?php echo $name; ?></td>
	<td><?php echo $price; ?></td>
	<td>
		<a href="<?php echo base_url()."www/images/".$image ?>">
			<img class="thumbnail" src="<?php echo base_url()."www/images/".$image ?>">
		</a>
	</td>
	<td>
		<a href="editProduct/<?php echo $id; ?>"><button id="btnEditProduct" class="btn btn-default" data-id="<?php echo $id; ?>">Edit</button></a>
		<button id="btnRemoveProduct" class="btn btn-danger" data-id="<?php echo $id; ?>">Remove</button>
	</td>
</tr>