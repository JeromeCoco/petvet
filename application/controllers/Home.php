<?php

//error_reporting(0);
//defined('BASEPATH') OR exit('No direct script access allowed');

    class Home extends CI_Controller {
        function __construct()
        { 
            parent::__construct(); 
            $this->load->library('session'); 
            $data = array();
            $this->load->helper('url');
            $this->load->model('Petvet_model');
            $this->load->helper('form');
        }

        public function hello()
        {
            $args = $GLOBALS['params'];
            $data = array();
            echo $_SERVER['PATH_INFO'];
            var_dump($args);
        }

        public function index($args = array()) {
            //load the pdo db config
            //$this->pdo = $this->load->database('pdo', true);
            //$stmt = $this->pdo->query("SELECT * FROM users");
            //var_dump($stmt->result());
            //$this->pdo = $this->load->database('pdo', true);
            //$sql = "INSERT INTO users(username,password) values(?,?)";
            //$this->pdo->query($sql, array('jethrotest', 'acosta'));
            //echo $GLOBALS['system_path'];
            //$data = array();
            $this->load->view('Home');
        }
        
        public function products()
        {
            $data['products_list'] = $this->getProductsList();
            $this->load->view('Products', $data);
        }

        public function getProductsList()
        {
            $products = '';
            $productdetails = array();
            $productdetails = $this->Petvet_model->getProductDetails();
            foreach ($productdetails->result() as $row)
            {
                $data = (array) $row;
                $products .= $this->load->view('lists/products', $data, true);
            }
            return $products;
        }

        public function services()
        {
            $this->load->view('Services');
        }

        public function doctors()
        {
            $data['doctors_list'] = $this->getDoctorsList();
            $this->load->view('Doctors', $data);
        }

        public function getDoctorsList()
        {
            $doctors = '';
            $doctorsdetails = array();
            $doctorsdetails = $this->Petvet_model->getDoctorDetails();
            foreach ($doctorsdetails->result() as $row)
            {
                $data = (array) $row;
                $doctors .= $this->load->view('lists/doctors', $data, true);
            }
            return $doctors;
        }

        public function members()
        {
            $data['members_list'] = $this->getMembersList();
            $this->load->view('Members', $data);
        }

        public function getMembersList()
        {
            $members = '';
            $memberdetails = array();
            $memberdetails = $this->Petvet_model->getMemberDetails();
            foreach ($memberdetails->result() as $row)
            {
                $data = (array) $row;
                $members .= $this->load->view('lists/members', $data, true);
            }
            return $members;
        }

        public function pets()
        {
            $data['species_list'] = $this->getSpeciesList();
            $data['owners_list'] = $this->getOwnersList();
            $data['pets_list'] = $this->getPetsList();
            $this->load->view('Pets', $data);
        }

        public function getPetsList()
        {
            $pets = '';
            $petdetails = array();
            $petdetails = $this->Petvet_model->getPetDetails();
            foreach ($petdetails->result() as $row)
            {
                $data = (array) $row;
                $pets .= $this->load->view('lists/pets', $data, true);
            }
            return $pets;
        }

        public function addnewuser()
        {
            $this->load->view('AddNewUserAdmin');
        }

        public function useradmin()
        {
            $data['users_list'] = $this->getUsersList();
            $this->load->view('userAdmin', $data);
        }

        public function getUsersList()
        {
            $users = '';
            $userdetails = array();
            $userdetails = $this->Petvet_model->getUserDetails();
            foreach ($userdetails->result() as $row)
            {
                $data = (array) $row;
                $users .= $this->load->view('lists/users', $data, true);
            }
            return $users;
        }

        public function addNewMember()
        {
            $this->load->view('AddNewMember');
        }

        public function saveNewMember()
        {
            $data = array();
            $data = $this->Petvet_model->saveMember($_POST);
            echo json_encode($data);
            exit;
        }

        public function removeMember()
        {
            $data = array();
            $data = $this->Petvet_model->deleteMember($_POST);
            echo json_encode($data);
            exit;
        }

        public function getMembersDetails()
        {
            $data = array();
            $data = $this->Petvet_model->getMemberInfo($_POST);
            echo json_encode($data);
            exit;
        }

        public function updateMember()
        {
            $data = array();
            $data = $this->Petvet_model->updateMemberDetails($_POST);
            echo json_encode($data);
            exit;
        }

        public function addNewProduct()
        {
            $this->load->view('addNewProduct');
        }

        public function saveProduct()
        {
            $config['upload_path']          = './www/images/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 5000;
            $config['max_width']            = 5000;
            $config['max_height']           = 5000;

            $this->load->library('upload', $config);

            if (! $this->upload->do_upload('userfile') || $_POST['productName'] == "" || $_POST['productDescription'] == "" || $_POST['productPrice'] == "")
            {
                $error = array('error' => "<div class='alert alert-warning errmess' role='alert'><center>Please enter valid information. Try again.</center></div>");
                $this->load->view('addNewProduct', $error);
            }
            else
            {
                $success = array('error' => "<div class='alert alert-success errmess' role='alert'><center>New product successfully added.</center></div>");
                $this->load->view('addNewProduct', $success);
                $upload = array();
                $upload = $this->Petvet_model->saveProductDetails($_POST);
            }
        }

        public function removeProduct()
        {
            $data = array();
            $data = $this->Petvet_model->deleteProduct($_POST);
            echo json_encode($data);
            exit;
        }

        public function addNewDoctor()
        {
            $this->load->view('AddNewDoctor');
        }

        public function addNewService()
        {
            $this->load->view('AddNewService');
        }

        public function addNewPet()
        {
            $data['species_list'] = $this->getSpeciesList();
            $data['owners_list'] = $this->getOwnersList();
            $this->load->view('AddNewPet', $data);
        }

        public function getOwnersList()
        {
            $owners = '';
            $ownerdetails = array();
            $ownerdetails = $this->Petvet_model->getOwnerDetails();
            foreach ($ownerdetails->result() as $row)
            {
                $data = (array) $row;
                $owners .= $this->load->view('lists/owners', $data, true);
            }
            return $owners;
        }

        public function getSpeciesList()
        {
            $specie = '';
            $speciedetails = array();
            $speciedetails = $this->Petvet_model->getSpecieDetails();
            foreach ($speciedetails->result() as $row)
            {
                $data = (array) $row;
                $specie .= $this->load->view('lists/species', $data, true);
            }
            return $specie;
        }

        public function addNewUserAdmin()
        {
            $data = array();
            $data = $this->Petvet_model->addNewUserAdminDetails($_POST);
            echo json_encode($data);
            exit;
        }

        public function addNewDoctorDetails()
        {
            $data = array();
            $data = $this->Petvet_model->insertDoctorDetails($_POST);
            echo json_encode($data);
            exit;
        }

        public function removeDoctor()
        {
            $data = array();
            $data = $this->Petvet_model->deleteDoctorDetails($_POST);
            echo json_encode($data);
            exit;
        }

        public function getDoctorDetails()
        {
            $data = array();
            $data = $this->Petvet_model->selectDoctorDetails($_POST);
            echo json_encode($data);
            exit;
        }

        public function updateDoctor()
        {
            $data = array();
            $data = $this->Petvet_model->updateDoctorDetails($_POST);
            echo json_encode($data);
            exit;
        }

        public function getBreed()
        {
            $data = array();
            $data = $this->Petvet_model->getBreedDetails($_POST);
            echo json_encode($data);
            exit;
        }

        public function saveNewPet()
        {
            $data = array();
            $data = $this->Petvet_model->addNewPetDetails($_POST);
            echo json_encode($data);
            exit;
        }

        public function getOwnersFullName()
        {
            $data = array();
            $data = $this->Petvet_model->getOwnersFullNameDetails($_POST);
            echo json_encode($data);
            exit;
        }

        public function removePet()
        {
            $data = array();
            $data = $this->Petvet_model->removePetDetails($_POST);
            echo json_encode($data);
            exit;
        }

        public function getMembersDetailsForView()
        {
            $data = array();
            $data = $this->Petvet_model->getMembersDetailsAndPets($_POST);
            echo json_encode($data);
            exit;
        }
    }
?>