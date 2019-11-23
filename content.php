<!DOCTYPE html>
<html>
<script src="plugins/jquery/jquery.min.js"></script>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Welcome To Monitoring Website</title>
    
<?php 
    include('link.php');
    ?>

</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <?php 
    include('header.php');
    ?>

    <?php 
    include('sidebar.php');
    ?>

<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    Browser
                </h2>
            </div>
            <!-- Example -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Add Site</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="intrinsic-container intrinsic-container-16x9">
                            <?php 
                            $url = $_GET[url];
                            echo '<iframe src="'.$url.'" width="1500" height="900" allowfullscreen><p>Your browser does not support iframes.</p></iframe>';
                            ?>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Example -->
        </div>
    </section>



    <?php 
    include('script.php');
?>
    
</body>

</html>
