<!DOCTYPE html>
<html lang="en">
<!--header-->
<?php
$title = "Error";
include __DIR__ . '/../../layout/layout-head.php'; ?>
<body>
<div class="content content-fixed content-auth-alt">
    <div class="container ht-100p tx-center">
        <div class="ht-100p d-flex flex-column align-items-center justify-content-center">
            <div class="wd-70p wd-sm-250 wd-lg-300 mg-b-15"><img src="<?php echo site_url() ?>/assets/img/error.png"
                                                                 class="img-fluid" alt=""></div>
            <h1 class="tx-color-01 tx-24 tx-sm-32 tx-lg-36 mg-xl-b-5">Global Error 02</h1>
            <h5 class="tx-16 tx-sm-18 tx-lg-20 tx-normal mg-b-20">Oopps. There was an error, please try again
                later.</h5>
            <p class="tx-color-03 mg-b-30">The server encountered an internal server error and was unable to complete
                your request.</p>
            <div class="mg-b-40"><a href="<?php echo site_url() ?>" class="btn btn-white pd-x-30">Back to Home</a></div>
            <span class="tx-12 tx-color-03">Contact developer <a href="http://rscbyte.com">rscbyte.com</a></span>
            <?php if (show_error_code) { ?>
                <code>
                    <?php echo $message; ?>
                </code>
            <?php } ?>
        </div>
    </div><!-- container -->
</div>
</body>
</html>
<?php
exit(0);
?>

