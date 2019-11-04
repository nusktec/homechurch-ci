<!DOCTYPE html>
<html lang="en">
<!--header-->
<?php include 'layout/layout-head.php'; ?>
<body>
<!--NavBar-->
<?php include 'layout/layout-nav.php'; ?>

<div class="content content-fixed content-auth-alt">
    <div class="container ht-100p tx-center">
        <div class="row justify-content-center">
            <div class="col-10 col-sm-6 col-md-4 col-lg-3 d-flex flex-column">
                <div class="tx-100 lh-1"><i class="icon ion-ios-clock"></i></div>
                <h3 class="mg-b-25">Students</h3>
                <p class="tx-color-03 mg-b-25">Marking your attendance just one step left, just the quick information we
                    wants from you.</p>
                <button data-toggle="modal" href="#modalMA" class="btn btn-danger btn-block tx-13 tx-bold">Mark
                    Attendance
                </button>
            </div><!-- col -->
            <div class="col-10 col-sm-6 col-md-4 col-lg-3 mg-t-40 mg-sm-t-0 d-flex flex-column">
                <div class="tx-100 lh-1"><i class="icon ion-ios-cog"></i></div>
                <h3 class="mg-b-25">Manage Account</h3>
                <p class="tx-color-03 mg-b-25">The easiest was to take an advantage over the script and students sheet,
                    take the advantage of data query</p>
                <a href="<?php echo base_url('login') ?>" class="btn btn-outline-secondary btn-block tx-13 tx-bold">My
                    Account</a>
            </div><!-- col -->
            <div class="col-10 col-sm-6 col-md-4 col-lg-3 mg-t-40 mg-md-t-0 d-flex flex-column">
                <div class="tx-100 lh-1"><i class="icon ion-ios-walk"></i></div>
                <h3 class="mg-b-25">New User ?</h3>
                <p class="tx-color-03 mg-b-25">Don't have an account ?, feel free to click and register, no cost
                    added</p>
                <a href="<?php echo base_url('create-account') ?>"
                   class="btn btn-outline-secondary btn-block tx-13 tx-bold">Create
                    An Account</a>
            </div><!-- col -->
        </div><!-- row -->
    </div><!-- container -->
</div>

<div class="modal fade effect-scale" id="modalMA" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body pd-20 pd-sm-30">
                <button type="button" class="close pos-absolute t-15 r-20" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h5 class="tx-18 tx-sm-20 mg-b-30">Quick Attendance</h5>

                <div class="sign-wrapper mg-lg-l-50 mg-xl-l-60">
                    <div class="wd-100p" id="app">
                        <h3 class="tx-color-01 mg-b-5">Sign In</h3>
                        <p class="tx-color-03 tx-13 mg-b-40">Welcome back! Please signin to continue.</p>

                        <form onsubmit="return false" id="form1" class="needs-validation" novalidate autocomplete="off">
                            <div class="form-group">
                                <label>Email address</label>
                                <input v-model="user.email" :disabled="disabled" type="email" class="form-control"
                                       placeholder="yourname@yourmail.com">
                            </div>
                            <div class="form-group">
                                <div class="d-flex justify-content-between mg-b-5">
                                    <label class="mg-b-0-f">Password</label>
                                    <a href="<?php echo site_url(); ?>reset" class="tx-12">Forgot password?</a>
                                </div>
                                <input v-model="user.pass1" :disabled="disabled" type="password" class="form-control"
                                       placeholder="Enter your password">
                            </div>
                            <strong v-html="info"></strong>
                            <button type="submit" :disabled="disabled" @click="btnLogin"
                                    class="btn btn-brand-02 btn-block">
                                Sign In
                            </button>
                            <div class="divider-text">or</div>
                            <div class="tx-13 mg-t-20 tx-center">Don't have an account? <a
                                        href="<?php echo site_url(); ?>create-account">Create an
                                    Account</a></div>
                        </form>
                    </div>
                </div><!-- sign-wrapper -->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger mg-sm-l-5" data-dismiss="modal">Close</button>
            </div><!-- modal-footer -->
        </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div><!-- modal -->

<!--footer-->
<?php include 'layout/layout-footer.php'; ?>
</body>
<?php include 'layout/layout-out.php'; ?>
</html>
<script src="<?php base_url() ?>lib/xyz/cmd/signin.js" type="text/javascript"></script>
