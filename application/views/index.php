<!DOCTYPE html>
<html lang="en">
<head>
   <title>Admin Dashboard - Travel Blog</title>
  <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
   <!-- Favicon icon -->
   <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
   <link rel="icon" href="assets/favicon.ico" type="image/x-icon">

   <!-- Google font-->
   <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700" rel="stylesheet">

   <!-- themify -->
   <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
   <link rel="stylesheet" type="text/css" href="assets/icon/simple-line-icons/css/simple-line-icons.css">
   <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="assets/css/main.css">
   <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">

    <link rel="stylesheet" href="<?= base_url('assets/css/main.min.css') ?> ">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

    <!-- jQuery UI (depends on jQuery) -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">


    <!-- flickity slider -->
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

    <!-- Remix icon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!-- jQuery Calendar-->
    <link rel="stylesheet" href="<?= base_url('assets/pickmeup/css/pickmeup.css') ?>">

    <!-- Animate on scroll -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <script src="<?= base_url('assets/js/jquery-3.6.1.js') ?>"></script>
</head>

<body class="sidebar-mini fixed">
   
   <div class="wrapper">
      <!-- Navbar-->
  <?php include 'include/header.php';?>
      <!-- Side-Nav-->
       <?php include 'include/sidebar.php';?>
      <div class="content-wrapper">
         <!-- Container-fluid starts -->
         <!-- Main content starts -->
         <div class="container-fluid">
            <div class="row">
               <div class="main-header">
                  <h4>Dashboard</h4>
               </div>
            </div>
            <!-- 4-blocks row start -->
            <div class="row dashboard-header">
               <div class="col-lg-3 col-md-6">
                  <div class="card dashboard-product">
                     <span>Products</span>
                     <h2 class="dashboard-total-products">4500</h2>
                     <span class="label label-warning">Sales</span>Arriving Today
                     <div class="side-box">
                        <i class="ti-signal text-warning-color"></i>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6">
                  <div class="card dashboard-product">
                     <span>Products</span>
                     <h2 class="dashboard-total-products">37,500</h2>
                     <span class="label label-primary">Views</span>View Today
                     <div class="side-box ">
                        <i class="ti-gift text-primary-color"></i>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6">
                  <div class="card dashboard-product">
                     <span>Products</span>
                     <h2 class="dashboard-total-products">$<span>30,780</span></h2>
                     <span class="label label-success">Sales</span>Reviews
                     <div class="side-box">
                        <i class="ti-direction-alt text-success-color"></i>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6">
                  <div class="card dashboard-product">
                     <span>Products</span>
                     <h2 class="dashboard-total-products">$<span>30,780</span></h2>
                     <span class="label label-danger">Sales</span>Reviews
                     <div class="side-box">
                        <i class="ti-rocket text-danger-color"></i>
                     </div>
                  </div>
               </div>
            </div>
          </div>
         
      </div>
   </div>


  
   <!-- Required Jqurey -->
   <script src="assets/plugins/Jquery/dist/jquery.min.js"></script>
   <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
   <script src="assets/plugins/tether/dist/js/tether.min.js"></script>
   <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/main.min.js"></script>
   <script src="assets/js/menu.min.js"></script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.js"></script>
   <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>


   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"></script>
   <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
   <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
   <script src="<?= base_url('assets/js/slider.js') ?>"></script>
   <script src="<?= base_url('assets/js/jquery.preloadinator.min.js') ?>"></script>
   <script src="<?= base_url('assets/js/preloader.js') ?>"></script>

   <!-- jQuery Calendar -->
   <script src="<?= base_url('assets/pickmeup/js/pickmeup.js') ?>"></script>
   <script src="<?= base_url('assets/js/date-picker.js') ?>"></script>
   <script src="<?= base_url('assets/js/trip-selector.js') ?>"></script>

   <script src="<?= base_url('assets/js/trip-selector.js') ?>"></script>
   <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
   <script>
       AOS.init();
   </script>
</body>
</html>
