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
      var parts = window.location.href.split('/');
      var lastSegment = parts.pop() || parts.pop();
      
      $(document).ready(function(){
        $.ajax({
          url: "../getEditServiceDetails",
          type: "POST",
          data: { lastSegment: lastSegment },
          dataType: "json",
          success: function(data)
          {
            $('#serviceid').val(data[0]['id']);
            $('#editServiceName').val(data[0]['name']);
            setTimeout(function(){
              tinyMCE.activeEditor.setContent(data['decoded']);
            },1000);
            $('#filename').val(data[0]['image']);
            $('#editServicePrice').val(data[0]['price']);
            $('#currentImage').html("<img src='"+window.location.origin+"/www/images/"+data[0]['image']+"' style='width:300px'>");
          }
        });

        $('#showInputFile').click(function(){
          $("#btnSubmit").css('display', 'block');
          $("#btnUpdateService").css('display', 'none');
          $("#fileService").css('display', 'block');
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
          <li class="list-group-item actives">Services </li>
        </a>
        <a href="<?php echo base_url(); ?>index.php/home/doctors">
          <li class="list-group-item">Doctors </li>
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
          <div class="addNewHeaderText">Edit Service Details<hr/> </div>
          <div id="updateStatus" class="col-sm-12">
            <?php 
              if (isset($error))
              {
                echo $error; 
              }
            ?>
          </div>
          <?php echo form_open_multipart('home/updateService');?>
            <div class="col-sm-6">
              <input type="hidden" name="serviceid" id="serviceid">
              <input type="text" class="form-control" name="editServiceName" id="editServiceName" placeholder="Service Name" />
            </div>
            <div class="col-sm-12">
              <br/>
              Service Description:
              <textarea name="editServiceDescription" id="textareatinymce"></textarea>
            </div>
            <div class="col-sm-6">
              <br/>
              Price:
              <input type="number" class="form-control" name="editServicePrice" id="editServicePrice" placeholder="Service Price" />
              <br/>
            </div>
            <div class="col-sm-12">
              <a href="javascript:void(0)" id="showInputFile"/>Upload New Image</a>
            </div>
            <div class="col-sm-12">
              Current Image:
              <div id="currentImage"></div>
            </div>
            <div class="col-sm-12" id="uploadDiv">
              <br/>
              <input id="fileService" name="userfile" type="file"/>
            </div>
            <div class="col-sm-6">
              <br/>
              <input type="hidden" name="filename" id="filename"/> <!-- This is the filename -->
              <input id="btnSubmit" type="submit" class="btn btn-success" value="Update service"/>
              <input id="btnUpdateService" class="btn btn-success" value="Update service"/>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>