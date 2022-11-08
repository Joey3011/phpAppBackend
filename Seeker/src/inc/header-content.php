<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/../DiYer/Seeker/css/bootstrap.min.css">
  <link rel="stylesheet" href="/../DiYer/Seeker/css/bootstrap.css">
  <link rel="stylesheet" href="/../DiYer/Seeker/css/style.css">
  <link rel="stylesheet" href="/../DiYer/Seeker/css/form.css">
  <link rel="stylesheet" href="/../DiYer/Seeker/css/navbar.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/javascript" src="/../DiYer/Seeker/js/bootstrap.js"></script>
  <script type="text/javascript" src="/../DiYer/Seeker/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="/../DiYer/Seeker/js/jquery-3.5.1.min.js"></script>
  <title><?= $title ?? 'Dashboard' ?></title>
</head>
<body>
  <nav>
<div class="navbar">
      <i class="fa fa-bars" aria-hidden="true"></i>
      <div class="logo"><a href="index"><img src="/../DiYer/Seeker/image/main-logo.PNG"></a></div>
      <div class="nav-links">
          <div class="sidebar-logo">
            <span class="logo-name"><a href="index"><img src="/../DiYer/Seeker/image/main-logo.PNG"></a></span>
            <i class="fa fa-close"  aria-hidden="true"></i>
          </div>
          <ul class="links">
              <li><a href="index">Home</a></li> 
              <li>
              <a href="#">Record</a>
              <i class='fa fa-caret-down ts-arrow arrow'></i>
                <ul class="ts-sub-menu sub-menu">
                <li><a href="userRecord">User Information</a></li>
                  <li><a href="mainRecord">Main Issue Record</a></li>
                  <li><a href="suboneRecord">Sub One Record</a></li>
                  <li><a href="subtwoRecord">Sub Two Record</a></li>
                  <li><a href="subthreeRecord">Sub Three Record</a></li>
                  <li><a href="subfourRecord">Sub Four Record</a></li>
                  <li><a href="subfiveRecord">Sub Five Record</a></li>                  
                </ul>
              </li>
              <li><a href="addRecord">Add Content</a></li>  
              <li><a href="register">Register User</a></li>  
              <li><a href="logout">Logout</a></li>         
              <li><a href="#">Hi! <?= current_user() ?> </a></li>
          </ul>
      </div>
    </div>
  </nav>




