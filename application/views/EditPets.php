<!DOCTYPE html> 
<html lang = "en"> 
  <head> 
    <meta charset = "utf-8"> 
    <title>PetVet</title> 
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/bootstrap.min.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/font-awesome.min.css">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style.css">
    <script src = '<?php echo base_url();?>js/tinymce/tinymce.min.js'></script>
    <script type = 'text/javascript' src = "<?php echo base_url();?>js/jquery-1.11.3.js"></script>
    <script type = 'text/javascript' src = "<?php echo base_url();?>js/bootstrap.min.js"></script>
    <script type = 'text/javascript' src = "<?php echo base_url();?>js/script.js"></script>
    <script>
      $(document).ready(function(){
        var parts = window.location.href.split('/');
        var id = parts.pop() || parts.pop();
        $.ajax({
          url: "../getPetCompleteDetails",
          type: "POST",
          data: { id:id },
          dataType: "json",
          success: function(data)
          {
            console.log(data);
            $('#petid').val(data[0]['petid']);
            $('#ownerName').html(data[0]['owner']);
            $('#petName').val(data[0]['petname']);
            $('#optSpecie').val(data[0]['specie']);
            $('#optBreed').val(data[0]['breed']);
            var petGender = data[0]['gender'] == 1 ? 'Male' : 'Female';
            $('#petGender').val(petGender);
          }
        });

        $('#optSpecie').change(function(){
          var speciename = $(this).val();
          $.ajax({
            url: "../getBreed",
            type: "POST",
            data: { speciename: speciename },
            dataType: "json",
            success: function(data)
            {
              $('#optBreed').html(" ");
              for (var i = 0; i < data.length; i++)
              {
                $('#optBreed').append("<option>"+data[i]['name']+"<option>");
              }
            }
          });
        });
      });
    </script>
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
          <div class="addNewHeaderText">Edit Pet Details<hr/> </div>
          <div class="col-sm-12 ">
            <div id="saveStatus">
              <!-- Error messages -->
            </div>
          </div>
          <div class="col-sm-12">
            Owner:
            <input type="hidden" id="petid"/>
            <div id="ownerName"></div>
            <br/>
          </div>
          <div class="col-sm-6">
            Name:
            <input type="text" id="petName" class="form-control"/>
          </div>
          <div class="col-sm-6">
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
                <?php echo $breed_list; ?>
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
          <div class="col-sm-12">
            <br/>
            <button id="btnUpdatePet" class="btn btn-success">Update pet</button>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>