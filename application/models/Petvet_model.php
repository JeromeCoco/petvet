<?php
	class Petvet_model extends CI_Model{
		private $pdo;

	    public function __construct()
	    {
	    	parent::__construct();
	      	$this->pdo = $this->load->database('pdo', true);
	    }

	    public function checkUserAdmin($data)
	    {
	    	extract($data);
	    	$encodePassword = hash('sha1', $password);
	    	$selectUser = $this->pdo->query("SELECT username, password FROM user_admin WHERE username = '$username' AND password = '$encodePassword' ");
	    	return $selectUser->result();
	    }

	    public function saveMember($data)
	    {
	    	extract($data);
	    	$hashpassword = hash('sha1', $password);
	    	$insertMember = "INSERT INTO customer(lastName, firstName, address, mobile, email, username, password, enabled) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
	    	$this->pdo->query($insertMember, array($lastName, $firstName, $address, $mobileNumber, $emailAddress, $userName, $hashpassword, 1));
	    	return "New member successfully added.";
	    }

	    public function getMemberDetails()
	    {
	    	$selectMembers = $this->pdo->query("SELECT * FROM customer WHERE enabled = 1");
        	return $selectMembers;
	    }

	    public function deleteMember($data)
	    {
	    	extract($data);
	        $removeMember = "UPDATE customer SET enabled = 0 WHERE id = ?";
	        $this->pdo->query($removeMember, array($memberid));
	        return "Member successfully removed.";
	    }

	    public function getMemberInfo($data)
	    {
	    	extract($data);
	    	$selectMemberDetails = $this->pdo->query("SELECT * FROM customer WHERE id = $memberid ");
	    	return $selectMemberDetails->result();
	    }

	    public function updateMemberDetails($data)
	    {
	    	extract($data);
	    	$updateMember = "UPDATE customer SET firstname = ?, lastname = ?, address = ?, mobile = ?, email = ? WHERE id = ?";
	        $this->pdo->query($updateMember, array($newFirstName, $newLastName, $newAddress, $newMobileNumber, $newEmailAddress, $id));
	        return "Member details successfully updated.";
	    }

	    public function saveProductDetails($data)
	    {
	    	extract($data);
	    	$productDescriptionEncoded = htmlentities($productDescription);
	        $insertProduct = "INSERT INTO product(name, description, price, image, enabled) VALUES(?, ?, ?, ?, ?)";
	        $this->pdo->query($insertProduct, array($productName, $productDescriptionEncoded, $productPrice, $filename, 1));
	    }

	    public function saveServiceDetails($data)
	    {
	    	extract($data);
	    	$serviceDescriptionEncoded = htmlentities($serviceDescription);
	        $insertService = "INSERT INTO service(name, description, price, image, enabled) VALUES(?, ?, ?, ?, ?)";
	        $this->pdo->query($insertService, array($serviceName, $serviceDescriptionEncoded, $servicePrice, $filename, 1));
	    }

	    public function updateServiceDetails($data)
	    {
	    	extract($data);
	    	$editServiceDescriptionEncoded = htmlentities($editServiceDescription);
	    	$insertService = "UPDATE service SET name = ?, description = ?, price = ?, image = ? WHERE id = ?";
	        $this->pdo->query($insertService, array($editServiceName, $editServiceDescriptionEncoded, $editServicePrice, $filename, $serviceid));
	    }

	    public function updateProductDetails($data)
	    {
	    	extract($data);
	    	$editProductDescriptionEncoded = htmlentities($editProductDescription);
	    	$insertProduct = "UPDATE product SET name = ?, description = ?, price = ?, image = ? WHERE id = ?";
	        $this->pdo->query($insertProduct, array($editProductName, $editProductDescriptionEncoded, $editProductPrice, $filename, $productid));
	    }

	    public function getProductDetails()
	    {
	    	$selectProducts = $this->pdo->query("SELECT * FROM product WHERE enabled = 1");
	    	return $selectProducts;
	    }

	    public function deleteProduct($data)
	    {
	    	extract($data);
	        $removeProduct = "UPDATE product SET enabled = 0 WHERE id = ?";
	        $this->pdo->query($removeProduct, array($productid));
	        return "Product successfully removed.";
	    }

	    public function addNewUserAdminDetails($data)
	    {
	    	extract($data);
	    	$hashpassword = hash('sha1', $password);
	    	$insertUser = "INSERT INTO user_admin(username, password, enabled) VALUES(?, ?, ?)";
	        $this->pdo->query($insertUser, array($userName, $hashpassword, 1));
	        return "New user admin successfully added.";
	    }

	    public function insertDoctorDetails($data)
	    {
	    	extract($data);
	    	$insertDoctor = "INSERT INTO doctor(lastName, firstName, mobile, mon, tue, wed, thur, fri, sat, sun, time_in, time_out, enabled) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
	        $this->pdo->query($insertDoctor, array($lastName, $firstName, $mobileNumber, $mon, $tues, $wed, $thurs, $fri, $sat, $sun, $timeIn, $timeOut, 1));
	        return "New doctor successfully added.";
	    }

	    public function getDoctorDetails()
	    {
	    	$selectDoctors = $this->pdo->query("SELECT * FROM doctor WHERE enabled = 1");
	    	return $selectDoctors;
	    }

	    public function deleteDoctorDetails($data)
	    {
	    	extract($data);
	        $removeDoctor = "UPDATE doctor SET enabled = 0 WHERE id = ?";
	        $this->pdo->query($removeDoctor, array($doctorid));
	    }

	    public function selectDoctorDetails($data)
	    {
	    	extract($data);
	    	$selectDoctors = $this->pdo->query("SELECT * FROM doctor WHERE id = $doctorid");
	    	return $selectDoctors->result();
	    }

	    public function updateDoctorDetails($data)
	    {
	    	extract($data);
	    	$updateDoctor = "UPDATE doctor SET 	lastname = ?, firstname = ?, mobile = ?, mon = ?, tue = ?, wed = ?, thur = ?, fri = ?, sat = ?, sun = ?, time_in = ?, time_out = ? WHERE id = ?";
	        $this->pdo->query($updateDoctor, array($editLastName, $editFirstName, $editMobileNumber, $mon, $tues, $wed, $thurs, $fri, $sat, $sun, $timeIn, $timeOut, $doctorid));
	        return "Doctor details successfully updated.";
	    }

	    public function getUserDetails()
	    {
	    	$selectUsers = $this->pdo->query("SELECT * FROM user_admin");
	    	return $selectUsers;
	    }

	    public function getOwnerDetails()
	    {
	    	$selectOwners = $this->pdo->query("SELECT lastname, firstname FROM customer WHERE enabled = 1");
	    	return $selectOwners;
	    }

	    public function getSpecieDetails()
	    {
	    	$selectSpecies = $this->pdo->query("SELECT * FROM specie");
	    	return $selectSpecies;
	    }

	    public function getAllBreedDetails()
	    {
	    	$selectBreeds = $this->pdo->query("SELECT name FROM breed");
	    	return $selectBreeds;
	    }

	    public function getBreedDetails($data)
	    {
	    	extract($data);
	    	
	    	$selectSpecieId = $this->pdo->query("SELECT id FROM specie WHERE name = '$speciename' ");
	    	$specieIdResult = $selectSpecieId->result();
	    	$id = $specieIdResult[0]->id;

	    	$selectBreeds = $this->pdo->query("SELECT name FROM breed WHERE specie_id = '$id' ");
	    	return $selectBreeds->result();
	    }

	    public function addNewPetDetails($data)
	    {
	    	extract($data);

	    	$owner = explode(" ", $ownerName);
	    	$selectOwnerId = $this->pdo->query("SELECT id FROM customer WHERE lastname = '$owner[1]' AND firstname = '$owner[0]' ");
	    	$ownerIdResult = $selectOwnerId->result();
	    	$ownerid = $ownerIdResult[0]->id;

	    	$selectSpecieId = $this->pdo->query("SELECT id FROM specie WHERE name = '$specie' ");
	    	$specieIdResult = $selectSpecieId->result();
	    	$specieid = $specieIdResult[0]->id;

			$selectBreedId = $this->pdo->query("SELECT id FROM breed WHERE name = '$breed' ");
	    	$breedIdResult = $selectBreedId->result();
	    	$breedid = $breedIdResult[0]->id;

	    	$insertPet = "INSERT INTO pet(owner_id, name, breed_id, specie_id, sex) VALUES(?, ?, ?, ?, ?)";
	        $this->pdo->query($insertPet, array($ownerid, $petName, $breedid, $specieid, $petGender));
	        return "New pet successfully added.";
	    }

	    public function getPetDetails()
	    {
	    	$selectPetDetails = $this->pdo->query("SELECT pet.owner_id AS ownerid,
	    												pet.id AS petid,
	    												customer.firstname AS owner, 
					    								pet.name AS petname, 
					    								pet.sex AS gender,
					    								specie.name AS specie,
					    								breed.name AS breed
				    								FROM customer, pet, specie, breed
				    								WHERE customer.id = pet.owner_id 
				    								AND pet.specie_id = specie.id 
				    								AND pet.breed_id = breed.id");
    		return $selectPetDetails;
	    }

	    public function getPetCompleteOwnerDetails($data)
	    {
	    	extract($data);
	    	$selectPetCompleteDetails = $this->pdo->query("SELECT pet.owner_id AS ownerid,
	    												pet.id AS petid,
	    												customer.firstname AS owner, 
					    								pet.name AS petname, 
					    								pet.sex AS gender,
					    								specie.name AS specie,
					    								breed.name AS breed
				    								FROM customer, pet, specie, breed
				    								WHERE pet.id = '$id'
				    								AND customer.id = pet.owner_id 
				    								AND pet.specie_id = specie.id 
				    								AND pet.breed_id = breed.id");
    		return $selectPetCompleteDetails->result();
	    }

	    public function getOwnersFullNameDetails($data)
	    {
	    	extract($data);
	    	$selectOwnersId = $this->pdo->query("SELECT lastname, firstname FROM customer WHERE id = $ownerid");
	    	return $selectOwnersId->result();
	    }

	    public function removePetDetails($data)
	    {
	    	extract($data);
	    	$removeDoctor = "DELETE FROM pet WHERE id = ?";
	        $this->pdo->query($removeDoctor, array($petid));
	    }

	    public function getMembersDetailsAndPets($data)
	    {
	    	extract($data);

	    	$selectMember = $this->pdo->query("SELECT * FROM customer WHERE id = $id");
	    	$details['memberDetails'] = $selectMember->result();

	    	$selectPets = $this->pdo->query("SELECT id, name FROM pet WHERE owner_id = $id");
	    	$details['petDetails'] = $selectPets->result();

	    	return $details;
	    }

	    public function getServicesDetails()
	    {
	    	$selectServices = $this->pdo->query("SELECT * FROM service WHERE enabled = 1");
	    	return $selectServices;
	    }

	    public function deleteService($data)
	    {
	    	extract($data);
	        $removeService = "UPDATE service SET enabled = 0 WHERE id = ?";
	        $this->pdo->query($removeService, array($id));
	        return "Service successfully removed.";
	    }

	    public function getServiceEditDetails($data)
	    {
	    	extract($data);
	    	$selectServicesDetails = $this->pdo->query("SELECT * FROM service WHERE id = '$lastSegment' ");
	    	return $selectServicesDetails->result();
	    }

	    public function getProductEditDetails($data)
	    {
	    	extract($data);
	    	$selectProductDetails = $this->pdo->query("SELECT * FROM product WHERE id = '$lastSegment' ");
	    	return $selectProductDetails->result();
	    }

	    public function updateServicesDetails($data)
	    {
	    	extract($data);
	        $updateService = "UPDATE service SET name = ?, description = ?, price = ? WHERE id = ?";
	        $this->pdo->query($updateService, array($editServiceName, $textareatinymce, $editServicePrice, $id));
	        return "Service successfully updated.";
	    }

	    public function updateProductsDetails($data)
	    {
	    	extract($data);
	        $updateProduct = "UPDATE product SET name = ?, description = ?, price = ? WHERE id = ?";
	        $this->pdo->query($updateProduct, array($editProductName, $textareatinymce, $editProductPrice, $id));
	        return "Product successfully updated.";
	    }

	    public function updatePetDetails($data)
	    {
	    	extract($data);

	    	$selectSpecieId = $this->pdo->query("SELECT id FROM specie WHERE name = '$optSpecie' ");
	    	$specieIdResult = $selectSpecieId->result();
	    	$specieid = $specieIdResult[0]->id;

			$selectBreedId = $this->pdo->query("SELECT id FROM breed WHERE name = '$optBreed' ");
	    	$breedIdResult = $selectBreedId->result();
	    	$breedid = $breedIdResult[0]->id;

	    	$gender = $petGender == "Male" ? '1' : '0';

	    	$updatePet = "UPDATE pet SET name = ?, breed_id = ?, specie_id = ?, sex = ? WHERE id = ?";
	        $this->pdo->query($updatePet, array($petName, $breedid, $specieid, $gender, $id));
	        return "Pet successfully updated.";
	    }
	}
?>