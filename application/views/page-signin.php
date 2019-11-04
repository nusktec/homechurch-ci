<!DOCTYPE html>
<html lang="en">
<!--header-->
<?php include 'layout/layout-head.php'; ?>
<body>
<!--NavBar-->
<div class="content-header">
    <div class="content-search">
        <a href="<? echo base_url(); ?>" class="aside-logo">Home<span>Church</span></a>
    </div>
    <nav class="nav">
        <a href="" class="nav-link">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="feather feather-help-circle">
                <circle cx="12" cy="12" r="10"></circle>
                <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                <line x1="12" y1="17" x2="12" y2="17"></line>
            </svg>
        </a>
        <a href="" class="nav-link">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="feather feather-grid">
                <rect x="3" y="3" width="7" height="7"></rect>
                <rect x="14" y="3" width="7" height="7"></rect>
                <rect x="14" y="14" width="7" height="7"></rect>
                <rect x="3" y="14" width="7" height="7"></rect>
            </svg>
        </a>
        <a href="" class="nav-link">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="feather feather-align-left">
                <line x1="17" y1="10" x2="3" y2="10"></line>
                <line x1="21" y1="6" x2="3" y2="6"></line>
                <line x1="21" y1="14" x2="3" y2="14"></line>
                <line x1="17" y1="18" x2="3" y2="18"></line>
            </svg>
        </a>
    </nav>
</div>
<div class="content content-fixed content-auth">
    <div class="container">
        <div class="media align-items-stretch justify-content-center ht-100p pos-relative mg-lg-y-100">
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
                        <button type="submit" :disabled="disabled" @click="btnLogin" class="btn btn-brand-02 btn-block">
                            Sign In
                        </button>
                        <div class="divider-text">or</div>
                        <div class="tx-13 mg-t-20 tx-center">Don't have an account? <a
                                    href="<?php echo site_url(); ?>create-account">Create an
                                Account</a></div>
                    </form>
                </div>
            </div><!-- sign-wrapper -->
        </div><!-- media -->
    </div><!-- container -->
</div><!-- content -->

<!--footer-->
<?php include 'layout/layout-footer.php'; ?>
</body>
<?php include 'layout/layout-out.php'; ?>
</html>
<script src="<?php base_url() ?>lib/xyz/cmd/signin.js" type="text/javascript"></script>