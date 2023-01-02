<?php include('./include/header.php'); ?>
   
   <style>
      
        .container{
            margin-top: 10%;
        }




    </style>
    <title>Edit</title>
</head>
<body>
    




    <div class="container">
        <h1>Edit Profile</h1>
          <hr>
        <div class="row">
          <!-- left column -->
          <div class="col-md-3">
            <div class="text-center">
              <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
              <h6>Upload a different photo...</h6>
              
              <input type="file" class="form-control">
            </div>
          </div>
          
          <!-- edit form column -->
          <div class="col-md-9 personal-info">
        
            <h3>Personal info</h3>
            
            <form class="form-horizontal" role="form">
              <div class="form-group">
                <label class="col-lg-3 control-label">Full name:</label>
                <div class="col-lg-8">
                  <input class="form-control" type="text" placeholder="">
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-lg-3 control-label">Email:</label>
                <div class="col-lg-8">
                  <input class="form-control" type="text" placeholder="">
                </div>
              </div>
             
            
              <div class="form-group">
                <label class="col-md-3 control-label">Password:</label>
                <div class="col-md-8">
                  <input class="form-control" type="password" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label">Confirm password:</label>
                <div class="col-md-8">
                  <input class="form-control" type="password" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-8">
                  <input type="button" class="btn btn-primary" value="Save Changes">
                  <span></span>
                  <input type="reset" class="btn btn-default" value="Cancel">
                </div>
              </div>
            </form>
          </div>
      </div>
    </div>
    <hr>


    <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <script src="js/mixitup.min.js"></script>
        <script src="js/jquery.countdown.min.js"></script>
        <script src="js/jquery.slicknav.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.nicescroll.min.js"></script>
        <script src="js/main.js"></script>
    </body>

    </html>