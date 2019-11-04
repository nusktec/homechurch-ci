<!DOCTYPE html>
<html lang="en">
<!--header-->
<?php include 'layout/layout-head.php'; ?>
<body>
<!--NavBar-->
<div class="content content-fixed content-auth-alt">
    <div class="container ht-100p tx-center">
        <div class="ht-100p d-flex flex-column align-items-center justify-content-center">
            <div class="wd-70p wd-sm-250 wd-lg-300 mg-b-15"><img src="<?php echo site_url() ?>assets/img/error.png"
                                                                 class="img-fluid" alt=""></div>
            <h1 class="tx-color-01 tx-24 tx-sm-32 tx-lg-36 mg-xl-b-5">Permission Denied !</h1>
            <h5 class="tx-16 tx-sm-18 tx-lg-20 tx-normal mg-b-20">Not allow to view this page...
            </h5>
            <p class="tx-color-03 mg-b-30">Type of account doesn't have the role to perform this task.
                <a href="<?php echo base_url('logout'); ?>" class="tx-bold text-danger"> Force Logout</a>
            </p>
            <div class="mg-b-40">
                <a href="<?php echo site_url() ?>" class="btn btn-white pd-x-30">Back to Home</a>
            </div>
            <span class="tx-12 tx-color-03">Contact developer <a href="http://rscbyte.com">rscbyte.com</a></span>
        </div>
    </div><!-- container -->
</div>
<!--footer-->
<?php include 'layout/layout-footer.php'; ?>
</body>
<?php include 'layout/layout-out.php'; ?>
</html>