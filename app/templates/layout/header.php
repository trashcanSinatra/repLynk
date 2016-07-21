<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>AAI RepLynk </title>

  <!-- Bootstrap core CSS -->
  <link href="http://{{current_url}}/rep/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link href="http://{{current_url}}/rep/css/animate.min.css" rel="stylesheet">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

  <!-- Custom styling plus plugins -->
  <link href="http://{{current_url}}/rep/css/custom.css" rel="stylesheet">
  <link href="http://{{current_url}}/rep/css/styles.css" rel="stylesheet">

  <!-- Fonts -->
  <link href='http://fonts.googleapis.com/css?family=Cedarville+Cursive'rel='stylesheet'type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Lato:400,300' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Alegreya+Sans:300' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Josefin+Sans:400,100' rel='stylesheet' type='text/css'>

  <script src="http://{{current_url}}/rep/js/vendor/jquery.min.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

</head>


<body class="nav-md">
   <script src="//code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
   <script src="http://{{current_url}}/rep/js/vendor/bootstrap.min.js"></script>

   <!-- Needed for menu Nav in chrome browser -->
   <script>
   Sys.WebForms.PageRequestManager.getInstance().add_endRequest(EndRequest);
     function EndRequest(sender, args) {
         if (args.get_error() == undefined) {
         $('.dropdown-toggle').dropdown();
         }
     }
</script>
  <div class="container body">


    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

          <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title">
            <i class="fa fa-chain"></i> <span>&nbsp;RepLynk</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu prile quick info -->
          <div class="profile">
            <div class="profile_pic">
              <img src="http://{{current_url}}/rep/img/users/aaron.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2>Aaron Vogt</h2>
            </div>
          </div>
          <!-- /menu prile quick info -->

          <br />
