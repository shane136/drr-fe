<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Drop Down Sidebar Menu | CodingLab </title>-->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/sidebar.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/dashboard_admin.css">
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
        <a href="#">
          <i class='bx bx-home' ></i>
          <span class="link_name" href="/home">Home</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Home</a></li>
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
          <li><a href="/CityOfficials">City Officials</a></li>
          <li><a href="/BrgyOfficials">Barangay Officials</a></li>
          <li><a href="/govt">Government Offices</a></li>
          <li><a href="/offices">Offices</a></li>
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
          <li><a href="/admin">Admin</a></li>
          <li><a href="/commcen">Communication Center</a></li>
          <li><a href="/logistics">Logistics</a></li>
          <li><a href="/ops">Operations</a></li>
          <li><a href="/training">Training</a></li>
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
    <span class="text"><b>CHAR CHAR DIRECTORY WEB</b></span>
    <span id="clock"></span>
    <div class="dashboard">
      <div class="box">
        <h3>Box 1</h3>
          <iconify-icon inline icon="twemoji:wolf" style="font-size: 100px;"></iconify-icon>
      </div>
      <div class="box">
        <h3>Box 2</h3>
          <iconify-icon inline icon="twemoji:wolf" style="font-size: 100px;"></iconify-icon>
      </div>
      <div class="box">
        <h3>Box 3</h3>
          <iconify-icon inline icon="twemoji:wolf" style="font-size: 100px;"></iconify-icon>
      </div>
    </div>
  </div>
</section>



</body>
</html>
