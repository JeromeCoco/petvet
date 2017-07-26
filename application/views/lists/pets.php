<tr id="pet<?php echo $petid; ?>">
	<td><?php echo $owner; ?></td>
	<td id="<?php echo "petname".$petid; ?>"><?php echo $petname; ?></td>
	<td id="<?php echo "specie".$petid; ?>"><?php echo $specie; ?></td>
	<td id="<?php echo "breed".$petid; ?>"><?php echo $breed; ?></td>
	<?php $translateGender = $gender == '1' ? "Male" : "Female"; ?>
	<td id="<?php echo "gender".$petid; ?>"><?php echo $translateGender; ?></td>
	<td>
		<a href="editPets/<?php echo $petid; ?>">
			<button id="btnEditPet" class="btn btn-default">Edit</button>
		</a>
		<button id="btnRemovePet" class="btn btn-danger" data-id="<?php echo $petid; ?>">Remove</button>
	</td>
</tr>