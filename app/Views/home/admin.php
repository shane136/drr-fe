<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
  <meta charset="UTF-8">
  <title>ADMIN | Admin Section</title>
    <!--<title> Drop Down Sidebar Menu | CodingLab </title>-->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/sidebar.css">
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
        <a href="/home">
          <i class='bx bx-home' ></i>
          <span class="link_name" href="/home">Home</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="/home">Home</a></li>
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
      <!-- <li>
        <a href="#">
          <i class='bx bx-user-circle' ></i>
          <span class="link_name">CDRRMO Personnel</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Setting</a></li>
        </ul>
      </li> -->
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
        <span class="text"><b>ILIGAN CITY DISASTER RISK REDUCTION AND MANAGEMENT OFFICE</b></span>
  
     <!-- <h2 class="mb-3 fw-bold">Add Details</h2> -->

     <div class="container-xl px-4 mt-2">
     <hr class="mt-0 mb-4">
        <h2> ADMIN SECTION </h2>
      <div class="box">
          <div class="box-header">
              <div style="padding:10px;">
                                  
              <button class="btn btn-success mb-2" type="submit" data-bs-toggle="modal" data-bs-target="#Edit">
              <iconify-icon inline icon="material-symbols:add-circle-rounded" flip="horizontal"></iconify-icon> ADD NEW
              </button>

              <button class="btn btn-success mb-2" type="submit" data-bs-toggle="modal" data-bs-target="#batchAdd">
                <iconify-icon inline icon="material-symbols:add-circle-rounded" flip="horizontal"></iconify-icon> BATCH ADD
              </button>

              <?php if (session()->has('added')) : ?>
                  <div class="alert alert-success w-100">
                    <?php echo session()->get("added");?>
                  </div>
              <?php endif; ?>

              <!--BATCH ADD -->
              <div class="modal fade" id="batchAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                      <div class="modal-content">
                      <form method="post" action="/batch_add_admin" enctype="multipart/form-data">
                          <div class="modal-header" style="justify-content: center; font-weight:bolder;">
                          <h3 class="modal-title">Batch Add Official(s)</h3>
                            <!-- <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button> -->
                          </div>
                          <div class="modal-body">
                          <div class="col-md-10">
                              <label for="exampleInputEmail1" class="form-label fs-6 px-2 mt-2 text-danger">Must fill out the required fields.</label>
                          </div>
                          <div class="col-md-8">
                            <div class="form-group mb-3 w-100 mt-3">
                                <div class="mb-3">
                                    <input type="file" name="file" class="form-control" id="file">
                                </div>					   
                            </div>
                          </div>
                          <div style="clear:both;"></div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-success">Save changes</button>
                          </div>
                          </div>
                      </form>
                      </div>
                      </div>
              </div>

               <!--ADD USER -->
              <div class="modal fade" id="Edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                      <div class="modal-content">
                      <form method="post" action="/add_admin">
                          <div class="modal-header" style="justify-content: center; font-weight:bolder;">
                          <h3 class="modal-title">Add New Admin Personnel</h3>
                            <!-- <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button> -->
                          </div>
                          <div class="modal-body">
                          <div class="col-md-10">
                              <label for="exampleInputEmail1" class="form-label fs-6 px-2 mt-2 text-danger">Must fill out the required fields.</label>
                          </div>
                          <div class="col-md-8">
                              <div class="form-group " style="width:140%; height:120%;">
                              <div class="form-group">
						                      <label>Complete Name</label>
						                      <input type="text" class="form-control" name="name" required>
                              </div>
                              <div class="form-group">
						                      <label>Contact Number</label>
						                      <input type="text" class="form-control" name="contact" required>
                              </div>
                              <div class="form-group">
						                      <label>Address</label>
						                      <input type="text" class="form-control" name="address" required>
                              </div>
                              <div class="form-group">
						                      <label>Position</label>
						                      <input type="text" class="form-control" name="pos" required>
                              </div>
                              </div>
                          </div>
                          <div style="clear:both;"></div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-success">Save changes</button>
                          </div>
                          </div>
                      </form>
                      </div>
                      </div>
                  </div>
              </div>                       
      
                                   
          </div>

          <div class="card-body">
                <div class="table-responsive-sm">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th></th>
                                <th>COMPLETE NAME</th>
                                <th><center>CONTACT NUMBER</center></th>
                                <th><center>ADDRESS</center></th>   
                                <th><center>POSITION</center></th>              
                                <th style="width: 17% !important;"><center>Option</center></th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php 
                        foreach($admins as $admin){
                          $name = $admin->NAME;
                          $contact = $admin->CONTACT;
                          $address = $admin->ADDRESS;
                          $pos = $admin->POSITION;
                        ?>
                        	
                        <tr>

                        <td><input type="hidden" name="id" value="<?php echo $admin->ID; ?>"></td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $contact; ?></td>
                        <td><?php echo $address; ?></td>     
                        <td><?php echo $pos; ?></td>                 
                        <td>
                        
                        <a type="submit" data-bs-toggle="modal" data-bs-target="#Edit<?php echo $admin->ID;?>" 
                            class="btn btn-warning btn-sm mb-1 w-75 align-self-center">
                              <i class="fa fa-pencil"></i>  <span> Edit</span>  
                        </a>

                        <a href="delete_admin/<?php echo $admin->ID;?> " 
                            class="btn btn-danger btn-sm w-75 align-self-center"
                              onclick="return confirm('Are you sure you want to delete this data?');"> 
                              <i class="fa fa-minus-circle"></i>  <span> Delete</span>           
                        </a>

              <!--EDIT USER -->
                <div class="modal fade" id="Edit<?php echo $admin->ID;?>" tabindex="-1" aria-labelledby="exampleModalLabel">
                  <div class="modal-dialog">
                      <div class="modal-content">
                      <form method="post" action="update_admin/<?php echo $admin->ID;?>">
                          <div class="modal-header" style="justify-content: center; font-weight:bolder;">
                          <h3 class="modal-title">Edit Details</h3>
                            <!-- <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button> -->
                          </div>
                          <div class="modal-body">
                          <div class="col-md-10">
                              <label for="exampleInputEmail1" class="form-label fs-6 px-2 mt-2 text-danger">Must fill out the required fields.</label>
                          </div>
                          <div class="col-md-8">
                              <div class="form-group " style="width:140%; height:120%;">
                              <div class="form-group">
						                      <label>Complete Name</label>
						                      <input type="text" class="form-control" name="name" value="<?php echo $admin->NAME;?>" required>
                              </div>
                              <div class="form-group">
						                      <label>Contact Number</label>
						                      <input type="text" class="form-control" name="contact" value="<?php echo $admin->CONTACT;?>" required>
                              </div>
                              <div class="form-group">
						                      <label>Address</label>
						                      <input type="text" class="form-control" name="address" value="<?php echo $admin->ADDRESS;?>" required>
                              </div>
                              <div class="form-group">
						                      <label>Position</label>
						                      <input type="text" class="form-control" name="pos" value="<?php echo $admin->POSITION;?>" required>
                              </div>
                              </div>
                          </div>
                          <div style="clear:both;"></div>
                          <div class="modal-footer">
                              <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                              <button type="submit" class="btn btn-success">Save changes</button>
                          </div>
                          </div>
                      </form>
                      </div>
                      </div>
                  </div>

                      </td>
                        </tr>
                        <?php 
                        }
                        ?>

                        <?php if (session()->has('update')) : ?>
                          <div class="alert alert-success w-100" style="background-color: #A9EED1;">
                              <?php echo session()->get("update");?>
                          </div>
                        <?php endif; ?>

                        <?php if (session()->has('success')) : ?>
                          <div class="alert alert-success w-100" style="background-color: #A9EED1;">
                              <?php echo session()->get("success");?>
                          </div>
                        <?php endif; ?>
                          
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

           

    </form>
  </div>



  </section>

  
  
</body>
</html>
      