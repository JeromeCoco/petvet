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
          <li class="list-group-item actives">Doctors </li>
        </a>
        <a href="<?php echo base_url(); ?>index.php/home/members">
          <li class="list-group-item">Members </li>
        </a>
        <a href="<?php echo base_url(); ?>index.php/home/pets">
          <li class="list-group-item">Pets </li>
        </a>
        <a href="<?php echo base_url(); ?>index.php/home/useradmin">
          <li class="list-group-item">User Admin </li>
        </a>
      </ul>
    </div>
    <div class="col-xs-10">
      <div class="container">
        <div class="main-container">
          <div class="addNewHeaderText">Add New Doctor <hr/> </div>
          <div class="col-sm-12 ">
            <div id="saveStatus">
              <!-- Error messages -->
            </div>
          </div>
          <div class="col-sm-6">
            <input type="text" class="form-control" id="firstName" placeholder="First Name" />
          </div>
          <div class="col-sm-6">
            <input type="text" class="form-control" id="lastName" placeholder="Last Name" />
          </div>
          <div class="col-sm-6">
            <br/>
            <input type="number" class="form-control" id="mobileNumber" placeholder="Mobile Number" />
          </div>
          <div class="col-sm-12">
            <br/>
            Set Schedule:
            <div class="checkbox">
              <label><input class="dayOption" type="checkbox" id="sunday">Sunday</label>
            </div>
            <div class="checkbox">
              <label><input class="dayOption" type="checkbox" id="monday">Monday</label>
            </div>
            <div class="checkbox">
              <label><input class="dayOption" type="checkbox" id="tuesday">Tuesday</label>
            </div>
            <div class="checkbox">
              <label><input class="dayOption" type="checkbox" id="wednesday">Wednesday</label>
            </div>
            <div class="checkbox">
              <label><input class="dayOption" type="checkbox" id="thursday">Thursday</label>
            </div>
            <div class="checkbox">
              <label><input class="dayOption" type="checkbox" id="friday">Friday</label>
            </div>
            <div class="checkbox">
              <label><input class="dayOption" type="checkbox" id="saturday">Saturday</label>
            </div>
            <br/>
          </div>
          <div class="col-sm-6">
            Time in:
            <input type="time" id="timeIn" class="form-control" />
          </div>
          <div class="col-sm-6">
            Time out:
            <input type="time" id="timeOut" class="form-control" />
          </div>
          <div class="col-sm-6">
            <br/>
            <button id="btnSaveDoctor" class="btn btn-success">Save doctor details</button>
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