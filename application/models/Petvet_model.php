<?php
	class Petvet_model extends CI_Model{
		private $pdo;

	    public function __construct()
	    {
	    	parent::__construct();
	      	$this->pdo = $this->load->database('pdo', true);
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
	    	$selectSpecies = $this->pdo->query("SELECT name FROM specie");
	    	return $selectSpecies;
	    }
	}
?>