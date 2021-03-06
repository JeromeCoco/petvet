<!DOCTYPE html> 
<html lang = "en"> 
  <head> 
    <meta charset = "utf-8"> 
    <title>PetVet</title> 
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/bootstrap.min.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/font-awesome.min.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style.css">
  </head>
  <body>
    <nav class="navbar navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!--<button class="menu-toggle">
            <i class="fa fa-bars" aria-hidden="true"></i>
          </button>-->
          <a class="navbar-brand" href="#">WebSiteName</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Page 1-1</a></li>
                <li><a href="#">Page 1-2</a></li>
                <li><a href="#">Page 1-3</a></li>
              </ul>
            </li>
            <li><a href="#">Page 2</a></li>
            <li><a href="#">Page 3</a></li>
          </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a id="btnLogOut" href="index"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
            </ul>
        </div>
      </div>
    </nav>
    <div class="left-nav col-xs-2">
      <ul class="list-group">
        <a href="<?php echo base_url(); ?>index.php/home/products">
          <li class="list-group-item">Products </li>
        </a>
        <a href="<?php echo base_url(); ?>index.php/home/services">
          <li class="list-group-item">Services </li>
        </a>
        <a href="<?php echo base_url(); ?>index.php/home/doctors">
          <li class="list-group-item">Doctors </li>
        </a>
        <a href="<?php echo base_url(); ?>index.php/home/members">
          <li class="list-group-item">Members </li>
        </a>
        <a href="<?php echo base_url(); ?>index.php/home/pets">
          <li class="list-group-item actives">Pets </li>
        </a>
        <a href="<?php echo base_url(); ?>index.php/home/useradmin">
          <li class="list-group-item">User Admin </li>
        </a>
      </ul>
    </div>
    <div class="col-xs-10">
      <div class="container">
        <div class="main-container">
          <div class="btnAdd">
            <a href="<?php echo base_url(); ?>index.php/home/addNewPet">
              <button class="btn btn-default">Add new pet</button>
            </a>
          </div>
          <table class="table table-condensed table-striped table-bordered">
            <thead>
              <tr>
                <th>Owner</th>
                <th>Name</th>
                <th>Specie</th>
                <th>Breed</th>
                <th>Gender</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php echo $pets_list; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="modal fade" id="myModalEditPets" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Pet Details</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-sm-12 ">
                <div id="editStatus">
                  <!-- Error messages -->
                </div>
              </div>
              <input type="hidden" id="editid" />
              <div class="col-sm-6">
                Owner:
                <select class="form-control" id="optOwnerName">
                  <?php echo $owners_list; ?>
                </select>
              </div>
              <div class="col-sm-6">
                Name:
                <input type="text" id="petName" class="form-control"/>
              </div>
              <div class="col-sm-6">
                <br/>
                Specie:
                <select class="form-control" id="optSpecie">
                  <option disabled selected>Choose here...</option>
                  <?php echo $species_list; ?>
                </select>
              </div>
              <div class="col-sm-6">
                <br/>
                Breed:
                <select class="form-control" id="optBreed">
                  <option>none</option>
                </select>
              </div>
              <div class="col-sm-6">
                <br/>
                Gender:
                <select class="form-control" id="petGender">
                  <option>Male</option>
                  <option>Female</option>
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" id="btnUpdatePet">Update Details</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <script src = '<?php echo base_url();?>js/tinymce/tinymce.min.js'></script>
    <script type = 'text/javascript' src = "<?php echo base_url();?>js/jquery-1.11.3.js"></script>
    <script type = 'text/javascript' src = "<?php echo base_url();?>js/bootstrap.min.js"></script>
    <script type = 'text/javascript' src = "<?php echo base_url();?>js/script.js"></script>
  </body>
</html>