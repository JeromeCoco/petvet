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
              <li><a href="#"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
            </ul>
        </div>
      </div>
    </nav>
    <div class="left-nav col-xs-2">
      <ul class="list-group">
        <a href="<?php echo base_url(); ?>index.php/home/index">
          <li class="list-group-item actives">Dashboard </li>
        </a>
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
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ut ultrices lacus. Fusce porta augue nec odio fringilla volutpat. Praesent in ante molestie, tempus tortor quis, aliquam nisl. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus hendrerit quam metus, ut aliquet nisi venenatis eget. Cras dapibus nunc eget orci pellentesque, suscipit euismod nulla cursus. Nullam at sem leo. Fusce sem eros, interdum eu faucibus non, finibus at orci.

          Nulla sodales elementum sapien vel pellentesque. Vestibulum odio mi, vehicula ac vulputate et, pulvinar ac orci. Pellentesque nec volutpat dui. Proin vel placerat neque, et tincidunt metus. Sed vulputate, eros non condimentum faucibus, nunc dui condimentum erat, eget lacinia orci lacus vel ipsum. Nulla facilisi. Fusce et tortor metus. Fusce ut leo vitae nulla mollis convallis in eget urna. Cras rutrum massa risus, tincidunt placerat purus rhoncus non. Aliquam viverra dapibus arcu sed volutpat. Integer vitae lacinia lectus, vitae congue massa. Ut purus odio, fermentum ut viverra bibendum, interdum sed metus. Fusce tincidunt sit amet arcu ut porta. Duis euismod enim eu libero interdum pulvinar. Nullam dignissim posuere elit quis tristique. Pellentesque mi augue, suscipit vel congue vel, porta dapibus nunc.

          Aenean eget orci vel risus ultrices tristique. Ut vel posuere nisl, a pharetra est. Nulla nec tincidunt tortor. Vestibulum non commodo magna. Donec non vestibulum leo. In auctor quam sed pulvinar auctor. Praesent cursus odio nec lorem elementum, a rhoncus ipsum varius. Morbi interdum, leo a varius fermentum, erat ipsum lobortis sem, sit amet lacinia dolor libero vitae magna. Nulla scelerisque ante non nulla luctus tristique. Vivamus hendrerit ipsum aliquam ultrices fringilla. Phasellus quis eleifend lacus, quis accumsan nunc.

          Duis vestibulum ligula eu velit porta porttitor. Nullam ac malesuada sapien, id efficitur massa. Sed viverra lorem tempor, faucibus lorem sollicitudin, efficitur nibh. Fusce et nunc nec erat aliquet rutrum. Quisque ac pretium ligula, et porttitor orci. Aenean nec augue metus. Nulla at fermentum velit, vitae suscipit nibh. Phasellus vestibulum non leo vitae fringilla. Curabitur luctus tincidunt purus, ut vestibulum metus tincidunt eget. Vivamus non bibendum lectus. Nam imperdiet dolor sit amet felis aliquam cursus.

          Nunc finibus consectetur neque, malesuada convallis nibh tristique non. Duis tincidunt orci at nisi ullamcorper mattis. Vivamus libero odio, iaculis sit amet quam eget, mattis interdum sem. Etiam malesuada commodo quam, vitae suscipit ante placerat sed. Nam sed ipsum condimentum, tincidunt velit non, dignissim sem. Morbi auctor, sem et aliquet varius, tellus lacus tristique leo, sit amet malesuada tellus mauris id odio. Vivamus fermentum elit ut ipsum dictum, sed vulputate nisi dapibus.
        </div>
      </div>
    </div>
    <script src = '<?php echo base_url();?>js/tinymce/tinymce.min.js'></script>
    <script type = 'text/javascript' src = "<?php echo base_url();?>js/jquery-1.11.3.js"></script>
    <script type = 'text/javascript' src = "<?php echo base_url();?>js/bootstrap.min.js"></script>
    <script type = 'text/javascript' src = "<?php echo base_url();?>js/script.js"></script>
  </body>
</html>