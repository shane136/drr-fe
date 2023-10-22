<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>USER | Home </title>
    <!--<title> Drop Down Sidebar Menu | CodingLab </title>-->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/sidebar.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/user.css">
    <!-- script -->
    <script src="<?php echo base_url(); ?>/assets/js/pagination.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/sidebar.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.5/iconify-icon.min.js"></script>
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body onload="sidebar()">
  <div class="sidebar close">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">CDRRMO</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="/user_home">
          <i class='bx bx-home' ></i>
          <span class="link_name" href="/user_home">Home</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="/user_home">Home</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-collection' ></i>
            <span class="link_name">LGU XYZ</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">LGU XYZ</a></li>
          <li><a href="/cityOfficials">City Officials</a></li>
          <li><a href="/brgyOfficials">Barangay Officials</a></li>
          <li><a href="/government">Government Offices</a></li>
        </ul>
      </li>

      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-collection' ></i>
            <span class="link_name">ICDRRMO</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">ICDRRMO</a></li>
          <li><a href="/Admin">Admin</a></li>
          <li><a href="/Commcen">Communication Center</a></li>
          <li><a href="/Logistics">Logistics</a></li>
          <li><a href="/Operations">Operations</a></li>
          <li><a href="/Training">Training</a></li>
        </ul>
      </li>
      <li>
        <a href="/notification">
        <i class="bx bx-bell"></i>
          <span class="link_name">Notifications</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="/notification">Notifications</a></li>
        </ul>
      </li> 
      <li>
<div class="profile-details">
  <li>
      <a href="<?php echo base_url("logout"); ?>" onclick="return confirm('Are you sure you want to log out?')">
        <i class='bx bx-log-out' ></i>
        <span class="link_name" href="/login">Logout</span>
      </a>
      <ul class="sub-menu blank">
          <li><a class="link_name" onclick="return confirm('Are you sure you want to log out?')"
            href="/login">Logout</a></li>
      </ul>
  </li>
</div>  
  </li>
</ul>
</div>
  
<section class="home-section">
  <div class="home-content">
    <i class='bx bx-menu'></i>
    <span class="text"><b>DIRECTORY 2023</b></span>
    <span id="clock"></span>
    <div>
  <?php
  if (session()->get('logged_in')) {
      $username = session()->get('name');
      echo "<span class='greeting'>";

      date_default_timezone_set('Asia/Manila');
      $hour = date('G');
      if ($hour < 12 ) {
          echo "Good morning, ";
      } else if ($hour >= 12 && $hour < 17) {
          echo "Good afternoon, ";
      } else if ($hour >= 17 && $hour <= 24) {
          echo "Good evening, ";
      }

      echo "$username!</span>";
  }
  ?>
<!-- </div>

<iframe width="1288" height="578" src="https://embed.windy.com/embed2.html?lat=8.381&lon=124.000&detailLat=8.381&detailLon=124.000&width=650&height=450&zoom=8&level=surface&overlay=wind&product=ecmwf&menu=&message=&marker=&calendar=now&pressure=&type=map&location=coordinates&detail=&metricWind=default&metricTemp=default&radarRange=-1" frameborder="0"></iframe>

  </div> -->
</section>

</body>
</html>
