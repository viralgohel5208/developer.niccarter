<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Project</title>
    
    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('assets/css/sb-admin-2.min.css'); ?>" rel="stylesheet">

    <!--jquery-->
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
    
    <!--data table css and js-->
    <link href="<?php echo base_url('assets/datatable/datatables.min.css'); ?>" rel="stylesheet">
    
    <script src="<?php echo base_url('assets/datatable/datatables.min.js'); ?>"></script>
     
</head>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

  <!-- Topbar -->
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
      <i class="fa fa-bars"></i>
    </button>

    

    

  </nav>
  <!-- End of Topbar -->





                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Employee Report</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Sr No</th>        
                                    <th>Employee Name</th>                                    
                                    <th>Address</th>
                                    <th>Company Name</th>
                                    <th>Salary</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $i=1;
                                if(count($data) > 0){
                                foreach($data as $data):
                                ?>
                                    <tr>
                                        <td><?=$i;?></td>
                                       
                                        <td><?=$data['name'];?></td>                                        
                                        <td><?=$data['email']; ?></td>                                       
                                        <td><?=$data['company_name']; ?></td>
                                        <td><?=$data['salary_amount']; ?></td>
                                    </tr>
                                <?php
                                $i++;
                                endforeach;
                                }else{ ?>
                                    <tr><td colspan="11">No Data Found.</td></tr>
                                <?php } ?>
                            </tbody>                        
                        </table>
                    </div>
                </div>
            </div>

    
     <script>
     
     $(document).ready( function () {
      
        $('#dataTable').DataTable();

     })
     
      </script>
