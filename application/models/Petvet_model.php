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

	    public function addDoctorDetails($data)
	    {

	    }

	    public function addNewUserAdminDetails($data)
	    {
	    	extract($data);
	    	$hashpassword = hash('sha1', $password);
	    	$insertProduct = "INSERT INTO user_admin(username, password, enabled) VALUES(?, ?, ?)";
	        $this->pdo->query($insertProduct, array($userName, $hashpassword, 1));
	        return "New user admin successfully added.";
	    }
	}
?>