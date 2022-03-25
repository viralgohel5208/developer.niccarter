<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $page_title; ?> | Charsha</title>
    
    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('assets/css/sb-admin-2.min.css'); ?>" rel="stylesheet">

    <!--jquery-->
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
    
    <!--data table css and js-->
    <link href="<?php echo base_url('assets/datatable/datatables.min.css'); ?>" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('admin/company'); ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin<sup></sup></div>
            </a>

           

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <!--<li class="nav-item active">-->
            <!--    <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">-->
            <!--        <i class="fas fa-fw fa-cog"></i>-->
            <!--        <span>Course</span>-->
            <!--    </a>-->
            <!--    <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">-->
            <!--        <div class="bg-white py-2 collapse-inner rounded">-->
            <!--            <h6 class="collapse-header">Course Components:</h6>-->
            <!--            <a class="collapse-item" href="<?php echo base_url('admin/course'); ?>">Course</a>-->
            <!--            <a class="collapse-item" href="<?php echo base_url('admin/tutorial'); ?>">Tutorial</a>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</li>-->
            <?php $page_name = basename($_SERVER['REQUEST_URI']); ?>
           
            
            <li class="nav-item <?php if($page_name=='company' || $page_name=='add_company'){echo "active";}?>">
                <a class="nav-link <?php if($page_name=='company' || $page_name=='add_company'){echo "";}else{echo "collapsed";}?>" href="#" data-toggle="collapse" data-target="#collapseCompany" aria-expanded="<?php if($page_name=='company' || $page_name=='add_company'){echo "true";}else{echo "false";}?>" aria-controls="collapseCompany">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Company</span>
                </a>
                <div id="collapseCompany" class="collapse <?php if($page_name=='company' || $page_name=='add_company'){echo "show";}?>" aria-labelledby="headingCompany" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Company Components:</h6>
                        <a class="collapse-item" href="<?php echo base_url('admin/company'); ?>">View Company</a>
                        <a class="collapse-item" href="<?php echo base_url('admin/company/add_company'); ?>">Add Detail</a>
                    </div>
                </div>
            </li>
            
            <li class="nav-item <?php if($page_name=='employee' || $page_name=='add_employee'){echo "active";}?>">
                <a class="nav-link <?php if($page_name=='employee' || $page_name=='add_employee'){echo "";}else{echo "collapsed";}?>" href="#" data-toggle="collapse" data-target="#collapseEmployee" aria-expanded="<?php if($page_name=='employee' || $page_name=='add_employee'){echo "true";}else{echo "false";}?>" aria-controls="collapseCompany">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Employee</span>
                </a>
                <div id="collapseEmployee" class="collapse <?php if($page_name=='employee' || $page_name=='add_employee'){echo "show";}?>" aria-labelledby="headingEmployee" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Employee Components:</h6>
                        <a class="collapse-item" href="<?php echo base_url('admin/employee'); ?>">View Employee</a>
                        <a class="collapse-item" href="<?php echo base_url('admin/employee/add_employee'); ?>">Add Detail</a>
                    </div>
                </div>
            </li>
            
            <li class="nav-item <?php if($page_name=='salary' || $page_name=='add_salary'){echo "active";}?>">
                <a class="nav-link <?php if($page_name=='salary' || $page_name=='add_salary'){echo "";}else{echo "collapsed";}?>" href="#" data-toggle="collapse" data-target="#collapseSalary" aria-expanded="<?php if($page_name=='salary' || $page_name=='add_salary'){echo "true";}else{echo "false";}?>" aria-controls="collapseCompany">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Salary</span>
                </a>
                <div id="collapseSalary" class="collapse <?php if($page_name=='salary' || $page_name=='add_salary'){echo "show";}?>" aria-labelledby="headingSalary" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Salary Components:</h6>
                        <a class="collapse-item" href="<?php echo base_url('admin/salary'); ?>">View Salary</a>
                        <a class="collapse-item" href="<?php echo base_url('admin/salary/add_salary'); ?>">Add Detail</a>
                    </div>
                </div>
            </li>       
        </ul>

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">