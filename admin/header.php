<?php
include('../includes/config.php');
if (!isset($_SESSION['loggedin']) == true) {
?>
  <script>
    window.location.href = '../login.php';
  </script>
<?php
}
?>
<!DOCTYPE html><!--
* CoreUI PRO Bootstrap Admin Template
* @version v4.3.0
* @link https://coreui.io/product/bootstrap-dashboard-template/
* Copyright (c) 2023 creativeLabs Łukasz Holeczek
* License (https://coreui.io/pro/license/)
--><!-- Breadcrumb-->
<html lang="en">

<head>
  <base href="./">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" mp>
  <meta name="description" content="CoreUI - Bootstrap Admin Template">
  <meta name="author" content="Łukasz Holeczek">
  <meta name="keyword" content="Bootstrap,Admin,Template,SCSS,HTML,RWD,Dashboard">
  <title>THEME SEVA</title>
  <link rel="apple-touch-icon" sizes="57x57" href="assets/favicon/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="assets/favicon/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="assets/favicon/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/favicon/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="assets/favicon/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="assets/favicon/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="assets/favicon/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="assets/favicon/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192" href="assets/favicon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="assets/favicon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
  <link rel="manifest" href="assets/favicon/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <!-- Vendors styles-->
  <link rel="stylesheet" href="vendors/simplebar/css/simplebar.css">
  <link rel="stylesheet" href="css/vendors/simplebar.css">
  <!-- Main styles for this application-->
  <link href="css/style.css" rel="stylesheet">
  <!-- We use those styles to show code examples, you should remove them in your application.-->
  <link href="css/examples.css" rel="stylesheet">

  <!-- Google Tag Manager-->
  <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-KX4JH47');
  </script>
  <!-- End Google Tag Manager-->
  <link href="vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
</head>

<body class="light-theme">
  <!-- Google Tag Manager (noscript)-->
  <noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KX4JH47" height="0" width="0" style="display:none;visibility:hidden"></iframe>
  </noscript>
  <script>
    document.addEventListener('contextmenu', function(e) {
      e.preventDefault();
    });
  </script>
  <!-- End Google Tag Manager (noscript)-->
  <div class="sidebar sidebar-light sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
      <img src="https://esathi.up.gov.in/citizenservices/login/images/mm.png" alt="Image" width="250" height="64">
      <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
        <use xlink:href="assets/brand/coreui.svg#signet"></use>
      </svg>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <svg class="nav-icon">
            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
          </svg>
          DASHBOARD
          <span class="badge bg-info-gradient ms-auto">NEW</span>
        </a>

        <a class="nav-link" href="profile.php">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSiJlIC175c92lC02HvMWg8Lcuj9I3nxdhpgAaKVoOmaA&s" alt="Image" width="34" height="34">
          PROFILE
          <span class="badge bg-info-gradient ms-auto">NEW</span>
        </a>



        <a class="nav-link" href="wallet.php">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSZs7jqjNpIqP4qJjMdbTwxYWu3HpFMicNUCw&s" alt="Image" width="25" height="25">
          ADD BALANCE<br>
          <span class="badge bg-info-gradient ms-auto">NEW</span>
        </a>
        <a class="nav-link" href="fullwallet.php">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSZs7jqjNpIqP4qJjMdbTwxYWu3HpFMicNUCw&s" alt="Image" width="25" height="25">
          WALLET HISTORY<br>
          <span class="badge bg-info-gradient ms-auto">NEW</span>
        </a>
        <?php
        // session_start(); // Make sure to start the session

        if ($_SESSION['userid'] == "ADMIN") {
        ?>

        <?php
        }
        ?>
        <?php
        // session_start(); // Make sure to start the session

        if ($_SESSION['userid'] == "ADMIN") {
        ?>
      <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS3uSRxKgozrn-80572ERBPXr3Io-srUZQI6Q&s" alt="Image" width="30" height="30">

          </svg> WEBSITE SETTINGS <br><span class="badge bg-info-gradient ms-auto">NEW</span></a>
        <ul class="nav-group-items">
          <li class="nav-item"><a class="nav-link" href="settings.php"><span class="nav-icon"></span> WEBSITE SETTINGS </a></li>
          <li class="nav-item"><a class="nav-link" href="notifi.php"><span class="nav-icon"></span> WEBSITE NOTIFICATION</a></li>

        </ul>
      </li>
    <?php
        }
    ?>

    <?php
    // session_start(); // Make sure to start the session

    if ($_SESSION['userid'] == "ADMIN") {
    ?>
      <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRdRSN8U8nwkKHyOqPY5ywE5P17xSZ5tYaG8wd34KQTqA&s" alt="Image" width="54" height="32">

          </svg> USERS <br><span class="badge bg-info-gradient ms-auto">NEW</span></a>
        <ul class="nav-group-items">
          <li class="nav-item"><a class="nav-link" href="adduser.php"><span class="nav-icon"></span> ADD NEW USER </a></li>
          <li class="nav-item"><a class="nav-link" href="userlist.php"><span class="nav-icon"></span> USER LIST</a></li>
          <li class="nav-item"><a class="nav-link" href="transfer.php"><span class="nav-icon"></span> BALANCE TRANSFER</a></li>

        </ul>
      </li>
    <?php
    }
    ?>
    <!--  CODE FOR DISTRIBUTOR -->


    <?php
    // session_start(); // Make sure to start the session

    if ($_SESSION['usertype'] == "DISTRIBUTOR") {
    ?>
      <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRdRSN8U8nwkKHyOqPY5ywE5P17xSZ5tYaG8wd34KQTqA&s" alt="Image" width="54" height="24">

          </svg> USERS <br><span class="badge bg-info-gradient ms-auto">NEW</span></a>
        <ul class="nav-group-items">
          <li class="nav-item"><a class="nav-link" href="adduserm.php"><span class="nav-icon"></span> ADD NEW USER </a></li>
          <li class="nav-item"><a class="nav-link" href="userlistm.php"><span class="nav-icon"></span> USER LIST</a></li>

        </ul>
      </li>
    <?php
    }
    ?>

    <!--  CODE FOR DISTRIBUTOR -->
    <li class="nav-title">Services</li>
    <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">

        <!-- SVG code representing a PDF icon -->
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcToooA2PX69StJZHt0ZCSxPra90WnrWztCNvQ&s" alt="Image" width="54" height="24">

        </svg> VOTER <br>VERIFICATION<span class="badge bg-info-gradient ms-auto">NEW</span></a></a>
      <ul class="nav-group-items">
        <li class="nav-item"><a class="nav-link" href="voter_details.php"><span class="nav-icon"></span> VERIFICATION NOW</a></li>

      </ul>
    <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQq-4v2T6GL5zx6sS1qVYv-zAqK0VsU7NKGRA&s" alt="Image" width="54" height="24">

        </svg> DL <br>VERIFICATION<span class="badge bg-info-gradient ms-auto">NEW</span></a></a>
      <ul class="nav-group-items">
        <li class="nav-item"><a class="nav-link" href="dl_verify.php"><span class="nav-icon"></span> VERIFICATION NOW</a></li>

      </ul>

    <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
        <img src="https://www.cashfree.com/static/5629953f1b125bb58e2452c38f5ddc98/Vehicle-RC.png" alt="Image" width="54" height="24">

        </svg> RC <br>VERIFICATION<span class="badge bg-info-gradient ms-auto">NEW</span></a></a>
      <ul class="nav-group-items">
        <li class="nav-item"><a class="nav-link" href="rc_verify.php"><span class="nav-icon"></span> VERIFICATION NOW</a></li>

      </ul>
    <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQq-4v2T6GL5zx6sS1qVYv-zAqK0VsU7NKGRA&s" alt="Image" width="54" height="24">

        </svg> PAN <br>VERIFICATION<span class="badge bg-info-gradient ms-auto">NEW</span></a></a>
      <ul class="nav-group-items">
        <li class="nav-item"><a class="nav-link" href="pan_details.php"><span class="nav-icon"></span> VERIFICATION NOW</a></li>

      </ul>
    <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQq-4v2T6GL5zx6sS1qVYv-zAqK0VsU7NKGRA&s" alt="Image" width="54" height="24">

        </svg> AADHAR <br>VERIFICATION<span class="badge bg-info-gradient ms-auto">NEW</span></a></a>
      <ul class="nav-group-items">
        <li class="nav-item"><a class="nav-link" href="aadhar_detail.php"><span class="nav-icon"></span> VERIFICATION NOW</a></li>

      </ul>
    <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQq-4v2T6GL5zx6sS1qVYv-zAqK0VsU7NKGRA&s" alt="Image" width="54" height="24">

        </svg>BANK <br>VERIFICATION<span class="badge bg-info-gradient ms-auto">NEW</span></a></a>
      <ul class="nav-group-items">
        <li class="nav-item"><a class="nav-link" href="bank_detail.php"><span class="nav-icon"></span> VERIFICATION NOW</a></li>

      </ul>

    <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQq-4v2T6GL5zx6sS1qVYv-zAqK0VsU7NKGRA&s" alt="Image" width="54" height="24">

        </svg>UPI <br>VERIFICATION<span class="badge bg-info-gradient ms-auto">NEW</span></a></a>
      <ul class="nav-group-items">
        <li class="nav-item"><a class="nav-link" href="upi_detail.php"><span class="nav-icon"></span> VERIFICATION NOW</a></li>

      </ul>

    <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQq-4v2T6GL5zx6sS1qVYv-zAqK0VsU7NKGRA&s" alt="Image" width="54" height="24">

        </svg>COMPANY <br>VERIFICATION<span class="badge bg-info-gradient ms-auto">NEW</span></a></a>
      <ul class="nav-group-items">
        <li class="nav-item"><a class="nav-link" href="company_detail.php"><span class="nav-icon"></span> VERIFICATION NOW</a></li>

      </ul>
      <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQq-4v2T6GL5zx6sS1qVYv-zAqK0VsU7NKGRA&s" alt="Image" width="54" height="24">

        </svg>DIN <br>VERIFICATION<span class="badge bg-info-gradient ms-auto">NEW</span></a></a>
      <ul class="nav-group-items">
        <li class="nav-item"><a class="nav-link" href="din_detail.php"><span class="nav-icon"></span> VERIFICATION NOW</a></li>

      </ul>
      <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQq-4v2T6GL5zx6sS1qVYv-zAqK0VsU7NKGRA&s" alt="Image" width="54" height="24">

        </svg>GSTIN <br>VERIFICATION<span class="badge bg-info-gradient ms-auto">NEW</span></a></a>
      <ul class="nav-group-items">
        <li class="nav-item"><a class="nav-link" href="gstin_detail.php"><span class="nav-icon"></span> VERIFICATION NOW</a></li>

      </ul>
      <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQq-4v2T6GL5zx6sS1qVYv-zAqK0VsU7NKGRA&s" alt="Image" width="54" height="24">

        </svg>UDYAM <br>VERIFICATION<span class="badge bg-info-gradient ms-auto">NEW</span></a></a>
      <ul class="nav-group-items">
        <li class="nav-item"><a class="nav-link" href="udyog_aadhar_detail.php"><span class="nav-icon"></span> VERIFICATION NOW</a></li>

      </ul>



      <hr>
      <div class="utilization-container" style="display: none;">
        <h6>System Utilization</h6>
        <div class="utilization-container" style="display: none;">
          <div class="text-uppercase mb-1 mt-4"><small><b>CPU Usage</b></small></div>
          <div class="progress progress-thin">
            <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
          </div><small class="text-medium-emphasis">348 Processes. 1/4 Cores.</small>
          <div class="text-uppercase mb-1 mt-2"><small><b>Memory Usage</b></small></div>
          <div class="progress progress-thin">
            <div class="progress-bar bg-warning" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
          </div><small class="text-medium-emphasis">11444GB/16384MB</small>
          <div class="text-uppercase mb-1 mt-2"><small><b>SSD 1 Usage</b></small></div>
          <div class="progress progress-thin">
            <div class="progress-bar bg-danger" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
          </div><small class="text-medium-emphasis">243GB/256GB</small>
          <div class="text-uppercase mb-1 mt-2"><small><b>SSD 2 Usage</b></small></div>
          <div class="progress progress-thin">
            <div class="progress-bar bg-success" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
          </div><small class="text-medium-emphasis">25GB/256GB</small>
        </div>
      </div>
  </div>
  <div class="wrapper d-flex flex-column min-vh-100 bg-light light:bg-transparent">
    <header class="header header-sticky mb-4">
      <div class="container-fluid">
        <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
          <svg class="icon icon-lg">
            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
          </svg>
        </button><a class="header-brand d-md-none" href="#">
          <svg width="118" height="46" alt="CoreUI Logo">
            <use xlink:href="assets/brand/coreui.svg#full"></use>
          </svg></a>
        <ul class="header-nav light-button d-none d-md-flex">

          <li class="nav-item"><a class="nav-link" href="../logout.php">LOGOUT</a></li>
        </ul>
        <style>
          .light-button {
            background-color: #eedd82;
            /* light background color */
            color: #eedd82;
            /* Light text color */
            padding: 10px 20px;
            /* Adjust padding as needed */
            border-radius: 5px;
            /* Rounded corners */
          }

          .light-button:hover {
            background-color: #555;
            /* Darker background color on hover */
          }
        </style>
        <nav class="header-nav ms-auto me-4">
          <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
            <input class="btn-check" id="btn-light-theme" type="radio" name="theme-switch" autocomplete="off" value="light" onchange="handleThemeChange(this)">
            <label class="btn btn-primary" for="btn-light-theme">
              <svg class="icon">
                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-sun"></use>
              </svg>
            </label>
            <input class="btn-check" id="btn-light-theme" type="radio" name="theme-switch" autocomplete="off" value="light" onchange="handleThemeChange(this)">
            <label class="btn btn-primary" for="btn-light-theme">
              <svg class="icon">
                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-moon"></use>
              </svg>
            </label>
          </div>
        </nav>
        <ul class="header-nav me-3">
          <li class="nav-item dropdown d-md-down-none"><a class="nav-link" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              <svg class="icon icon-lg my-1 mx-2">
                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-bell"></use>
              </svg><span class="badge rounded-pill position-absolute top-0 end-0 bg-danger-gradient">5</span></a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-lg pt-0">
              <div class="dropdown-header bg-light light:bg-white light:bg-opacity-10"><strong>You have 5 notifications</strong></div><a class="dropdown-item" href="#">
                <svg class="icon me-2 text-success">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user-follow"></use>
                </svg> New user registered</a><a class="dropdown-item" href="#">
                <svg class="icon me-2 text-danger">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user-unfollow"></use>
                </svg> User deleted</a><a class="dropdown-item" href="#">
                <svg class="icon me-2 text-info">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-chart"></use>
                </svg> Sales report is ready</a><a class="dropdown-item" href="#">
                <svg class="icon me-2 text-success">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-basket"></use>
                </svg> New client</a><a class="dropdown-item" href="#">
                <svg class="icon me-2 text-warning">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
                </svg> Server overloaded</a>
              <div class="dropdown-header bg-light light:bg-white light:bg-opacity-10"><strong>Server</strong></div><a class="dropdown-item d-block" href="#">
                <div class="text-uppercase mb-1"><small><b>CPU Usage</b></small></div><span class="progress progress-thin">
                  <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </span><small class="text-medium-emphasis">348 Processes. 1/4 Cores.</small>
              </a><a class="dropdown-item d-block" href="#">
                <div class="text-uppercase mb-1"><small><b>Memory Usage</b></small></div><span class="progress progress-thin">
                  <div class="progress-bar bg-warning" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                </span><small class="text-medium-emphasis">11444GB/16384MB</small>
              </a><a class="dropdown-item d-block" href="#">
                <div class="text-uppercase mb-1"><small><b>SSD 1 Usage</b></small></div><span class="progress progress-thin">
                  <div class="progress-bar bg-danger" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                </span><small class="text-medium-emphasis">243GB/256GB</small>
              </a>
            </div>
          </li>
          <li class="nav-item dropdown d-md-down-none"><a class="nav-link" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              <svg class="icon icon-lg my-1 mx-2">
                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-list-rich"></use>
              </svg><span class="badge rounded-pill position-absolute top-0 end-0 bg-warning-gradient">5</span></a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-lg pt-0">
              <div class="dropdown-header bg-light light:bg-white light:bg-opacity-10"><strong>You have 5 pending tasks</strong></div><a class="dropdown-item d-block" href="#">
                <div class="small mb-1">Upgrade NPM &amp; Bower<span class="float-end"><strong>0%</strong></span></div><span class="progress progress-thin">
                  <div class="progress-bar bg-info" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </span>
              </a><a class="dropdown-item d-block" href="#">
                <div class="small mb-1">ReactJS Version<span class="float-end"><strong>25%</strong></span></div><span class="progress progress-thin">
                  <div class="progress-bar bg-danger" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </span>
              </a><a class="dropdown-item d-block" href="#">
                <div class="small mb-1">VueJS Version<span class="float-end"><strong>50%</strong></span></div><span class="progress progress-thin">
                  <div class="progress-bar bg-warning" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </span>
              </a><a class="dropdown-item d-block" href="#">
                <div class="small mb-1">Add new layouts<span class="float-end"><strong>75%</strong></span></div><span class="progress progress-thin">
                  <div class="progress-bar bg-info" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </span>
              </a><a class="dropdown-item d-block" href="#">
                <div class="small mb-1">Angular 8 Version<span class="float-end"><strong>100%</strong></span></div><span class="progress progress-thin">
                  <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </span>
              </a><a class="dropdown-item text-center border-top" href="#"><strong>View all tasks</strong></a>
            </div>
          </li>
          <li class="nav-item dropdown d-md-down-none"><a class="nav-link" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              <svg class="icon icon-lg my-1 mx-2">
                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
              </svg><span class="badge rounded-pill position-absolute top-0 end-0 bg-info-gradient">7</span></a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-lg pt-0">
              <div class="dropdown-header bg-light light:bg-white light:bg-opacity-10"><strong>You have 4 messages</strong></div><a class="dropdown-item" href="#">
                <div class="message">
                  <div class="py-3 me-3 float-start">
                    <div class="avatar"><img class="avatar-img" src="assets/img/avatars/7.jpg" alt="user@email.com"><span class="avatar-status bg-success"></span></div>
                  </div>
                  <div><small class="text-medium-emphasis">John Doe</small><small class="text-medium-emphasis float-end mt-1">Just now</small></div>
                  <div class="text-truncate font-weight-bold"><span class="text-danger">!</span> Important message</div>
                  <div class="small text-medium-emphasis text-truncate">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</div>
                </div>
              </a><a class="dropdown-item" href="#">
                <div class="message">
                  <div class="py-3 me-3 float-start">
                    <div class="avatar"><img class="avatar-img" src="assets/img/avatars/6.jpg" alt="user@email.com"><span class="avatar-status bg-warning"></span></div>
                  </div>
                  <div><small class="text-medium-emphasis">John Doe</small><small class="text-medium-emphasis float-end mt-1">5 minutes ago</small></div>
                  <div class="text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>
                  <div class="small text-medium-emphasis text-truncate">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</div>
                </div>
              </a><a class="dropdown-item" href="#">
                <div class="message">
                  <div class="py-3 me-3 float-start">
                    <div class="avatar"><img class="avatar-img" src="assets/img/avatars/5.jpg" alt="user@email.com"><span class="avatar-status bg-danger"></span></div>
                  </div>
                  <div><small class="text-medium-emphasis">John Doe</small><small class="text-medium-emphasis float-end mt-1">1:52 PM</small></div>
                  <div class="text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>
                  <div class="small text-medium-emphasis text-truncate">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</div>
                </div>
              </a><a class="dropdown-item" href="#">
                <div class="message">
                  <div class="py-3 me-3 float-start">
                    <div class="avatar"><img class="avatar-img" src="assets/img/avatars/4.jpg" alt="user@email.com"><span class="avatar-status bg-info"></span></div>
                  </div>
                  <div><small class="text-medium-emphasis">John Doe</small><small class="text-medium-emphasis float-end mt-1">4:03 PM</small></div>
                  <div class="text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>
                  <div class="small text-medium-emphasis text-truncate">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</div>
                </div>
              </a><a class="dropdown-item text-center border-top" href="#"><strong>View all messages</strong></a>
            </div>
          </li>
        </ul>
        <ul class="header-nav me-4">
          <li class="nav-item dropdown d-flex align-items-center"><a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              <div class="avatar avatar-md"><img class="avatar-img" src="myimage.jpg"></div>
            </a>
            <div class="dropdown-menu dropdown-menu-end pt-0">
              <div class="dropdown-header bg-light py-2 light:bg-white light:bg-opacity-10">
                <div class="fw-semibold">Account</div>
              </div><a class="dropdown-item" href="profile.php">
                <svg class="icon me-2">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                </svg> Profile</a><a class="dropdown-item" href="../logout.php">

                <svg class="icon me-2">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                </svg> Logout</a>

              <a class="dropdown-item" href="certificate.php">

                <svg class="icon me-2">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                </svg> CERTIFICATE</a>
            </div>
          </li>
        </ul>
        <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#aside')).show()">
          <svg class="icon icon-lg">
            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-applications-settings"></use>
          </svg>
        </button>
      </div>
      <div class="header-divider"></div>
      <div class="container-fluid">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb my-0 ms-2">
            <li class="breadcrumb-item">
              <!-- if breadcrumb is single--><span>Home</span>
            </li>
            <li class="breadcrumb-item active"><span>Dashboard</span></li>
          </ol>
        </nav>
      </div>
    </header>

    <!-- CoreUI and necessary plugins-->
    <script src="vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
    <script src="vendors/simplebar/js/simplebar.min.js"></script>
    <script>
      if (document.body.classList.contains('light-theme')) {
        var element = document.getElementById('btn-light-theme');
        if (typeof(element) != 'undefined' && element != null) {
          document.getElementById('btn-light-theme').checked = true;
        }
      } else {
        var element = document.getElementById('btn-light-theme');
        if (typeof(element) != 'undefined' && element != null) {
          document.getElementById('btn-light-theme').checked = true;
        }
      }

      function handleThemeChange(src) {
        var event = document.createEvent('Event');
        event.initEvent('themeChange', true, true);

        if (src.value === 'light') {
          document.body.classList.remove('light-theme');
        }
        if (src.value === 'light') {
          document.body.classList.add('light-theme');
        }
        document.body.dispatchEvent(event);
      }
    </script>
    <!-- Plugins and scripts required by this view-->
    <script src="vendors/chart.js/js/chart.min.js"></script>
    <script src="vendors/@coreui/chartjs/js/coreui-chartjs.js"></script>
    <script src="vendors/@coreui/utils/js/coreui-utils.js"></script>
    <script src="js/main.js"></script>
    <script>
    </script>

</body>

</html>