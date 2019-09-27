
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Stellar Admin</title>
    <!-- header -->
    <?php require('views/public/header.php'); ?>
    </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <?php require('views/public/navbar.php'); ?>
      <!-- partial -->
        <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php require('views/public/sidebar.php'); ?>
        <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                <div class="grid-item">
               <?php 	require 'views/head.php'; ?>
               <link rel="stylesheet" href="views/upload/style.css">
                
              
                        <h3>Plant Manangement</h3>
                        <nav aria-label="breadcrumb" class="nav2">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">UI Elements</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Buttons</li>
                </ol>
              </nav>
                        <!-- <button type="button" class="btn btn-primary btn-icon-text btn-add" data-target=".upload-modal" data-toggle="modal">
                        <i class="icon-plus btn-icon-prepend" ></i>upload</button> -->

                       
                    </div> 
                    <?php require('views/upload/index.php') ?><br><br>
                    <link rel="stylesheet" href="views/upload/style.css">
                        <?php require('views/data_share/index.php') ?>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
              
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!--start modal upload -->
<div class="modal fade upload-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <?php require('views/public/footer.php'); ?>
    </div>
  </div>
</div>
  </body>
</html>