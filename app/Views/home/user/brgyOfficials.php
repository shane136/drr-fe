<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
  <meta charset="UTF-8">
  <title>ILIGAN CITY | Barangays</title>
    <!--<title> Drop Down Sidebar Menu | CodingLab </title>-->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/sidebar.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/user.css">
    <!-- script -->
    <script src="<?php echo base_url(); ?>/assets/js/sidebar.js"></script>
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- datatables -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/pagination.js"></script>
    <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/evo-calendar@1.1.2/evo-calendar/css/evo-calendar.min.css"/>
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
            <span class="link_name">LGU Iligan</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">LGU Iligan</a></li>
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
      <i class='bx bx-menu' ></i>
        <span class="text"><b>ABCDEFGHIJK CITY</b></span>
  
     <!-- <h2 class="mb-3 fw-bold">Add Details</h2> -->

     <div class="container-xl px-4 mt-2">
     <hr class="mt-0 mb-4">
        <h2> BARANGAY OFFICIALS </h2>
      <div class="box">
          <div class="box-header">
              <div style="padding:10px;">
    
              </div>                       
                                   
          </div>

            <div class="card-body">
                <div class="table-responsive-sm">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="header-row">
                                <th></th>
                                <th><center>BARANGAY</center></th>
                                <th><center>NAME</center></th>
                                <th><center>CONTACT NUMBER</center></th>
                                <th><center>EMAIL ADDRESS</center></th>                 
                                
                            </tr>
                        </thead>
                        <tbody>
                        	
                        <?php 
                          foreach($brgy as $barangay){
                            $barangay_name = $barangay->BRGY;
                            $name = $barangay->NAME;
                            $cnum = $barangay->CONTACT_NUMBER;
                            $email = $barangay->EMAIL_ADD;                          
                        ?>

                        <tr>

                        <td><input type="hidden" name="id" value="<?php echo $barangay->ID; ?>"></td>
                        <td><?php echo $barangay_name;?></td>
                        <td><?php echo $name;?></td>
                        <td><?php echo $cnum;?></td>     
                        <td><?php echo $email;?></td>                 
                                 
                        </tr>
                        <?php 
                        }
                        ?>

                        </tbody>
                    </table>
                    </div>
                  </div>
              </div>
      
            </div>
          </div>
            <div class="pagination-container">
              <ul class="pagination"></ul>
            </div>
           </div>
  </div>


  </section>

  
  
</body>
</html>
      