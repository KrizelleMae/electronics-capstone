<?php
  require('session.php');
  confirm_logged_in();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <style type="text/css">
#overlay {
  position: absolute;
  z-index: 50;
  display: none;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.5);
  cursor: pointer;
}
#text{
  position: absolute;
  top: 50%;
  left: 50%;
  font-size: 50px;
  color: white;
  transform: translate(-50%,-50%);
  -ms-transform: translate(-50%,-50%);
}
</style>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Repairs and Inventory</title>
  <link rel="icon" href="https://www.freeiconspng.com/uploads/sales-icon-7.png">

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <!-- Box icons -->
  <script src="../css/box-icons.js"></script>
</head>

<body id="page-top" class="mt-20">
          
  <!-- Page Wrapper -->
  <div id="wrapper"  >
    
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" >

      <!-- Sidebar - Brand -->
      <!-- <div class=""><a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <!-- <div class="sidebar-brand-text mx-3">Repair Management System</div> 
      </a></div> -->
      

      <!-- Divider -->
      <!-- <hr class="sidebar-divider "> -->

      <!-- Nav Item - Dashboard -->
      <li class="nav-item mt-2 <?php if($page === 'dashboard') {echo 'active';}?>">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-home"></i>
          <span>Dashboard</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider mt-2">

      <!-- Heading -->
      <div class="sidebar-heading">
        Tables
      </div>
      <!-- Tables Buttons -->
      <li class="nav-item <?php if($page === 'customer') {echo 'active';}?>">
        <a class="nav-link" href="customer.php">
          <i class="fas fa-fw fa-user"></i>
          <span>Customer</span></a>
      </li>
      
      <li class="nav-item <?php if($page === 'product') {echo 'active';}?>">
        <a class="nav-link" href="product.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Product</span></a>
      </li>
      
      <li class="nav-item <?php if($page === 'inventory') {echo 'active';}?>">
        <a class="nav-link" href="inventory.php">
          <i class="fas fa-fw fa-archive"></i>
          <span>Inventory</span></a>
      </li>
      
      <li class="nav-item <?php if($page === 'transaction') {echo 'active';}?>">
        <a class="nav-link" href="transaction.php">
          <i class="fas fa-fw fa-retweet"></i>
          <span>Transaction</span></a>
      </li>
      
      <li class="nav-item <?php if($page === 'repairs') {echo 'active';}?>">
        <a class="nav-link" href="repairs.php">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Repair Orders</span></a>
      </li>

      <li class="nav-item <?php if($page === 'supplier') {echo 'active';}?>">
        <a class="nav-link" href="supplier.php">
          <i class="fas fa-fw fa-cogs"></i>
          <span>Supplier</span></a>
      </li>
      
       <li class="nav-item <?php if($page === 'employee') {echo 'active';}?>">
        <a class="nav-link" href="employee.php">
          <i class="fas fa-fw fa-user"></i>
          <span>Employee</span></a>
      </li>
      <li class="nav-item <?php if($page === 'accounts') {echo 'active';}?>">
        <a class="nav-link" href="user.php">
          <i class="fas fa-fw fa-users"></i>
          <span>Accounts</span></a>
      </li>
      <li class="nav-item <?php if($page === 'settings') {echo 'active';}?>">
        <a class="nav-link" href="custom.php">
          <i class="fas fa-fw fa-hammer"></i>
          <span>Settings</span></a>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
    <?php include_once 'topbar.php'; ?>
