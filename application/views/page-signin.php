<!DOCTYPE html>
<html lang="en">
<!--header-->
<?php include 'layout/layout-head.php'; ?>
<body>
<!--NavBar-->
<?php include 'layout/layout-nav.php'; ?>
<div class="content content-fixed content-auth">
    <div class="container bg-transparent">
        <div class="media align-items-stretch justify-content-center ht-100p pos-relative mg-lg-y-100">
            <div class="sign-wrapper mg-lg-l-50 mg-xl-l-60">
                <div class="wd-100p" id="app">
                    <h3 class="tx-color-01 mg-b-5">Sign In</h3>
                    <p class="tx-color-03 tx-16 mg-b-40">Welcome back! Please signin to continue.</p>

                    <form onsubmit="return false" id="form1" class="needs-validation" novalidate autocomplete="off">
                        <div class="form-group">
                            <label>Email address</label>
                            <input v-model="user.email" :disabled="disabled" type="email" class="form-control"
                                   placeholder="yourname@yourmail.com">
                        </div>
                        <div class="form-group">
                            <div class="d-flex justify-content-between mg-b-5">
                                <label class="mg-b-0-f">Password</label>
                                <a href="<?php echo site_url(); ?>reset" class="tx-13">Forgot password?</a>
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
<script>
    var vue = new Vue({
        el: '#app',
        data: {
            user: {},
            disabled: false,
            info: ""
        },
        methods: {
            btnLogin: loginNow
        }
    });
    //begin login in
    function loginNow() {
        setProgress(vue, "Please wait...", true);
        var data = vue.$data.user;
        if (JsonSanitizer(data)) {
            axios.post(userApi.login, data, {headers: config.axiosHeaders})
                .then(function (res) {
                    var resp = res.data;
                    console.log(res);
                    if (resp.status) {
                        //logged in
                        setProgress(vue, resp.msg, true);
                        setTimeout(function () {
                            window.location.href = "<?php echo site_url(); ?>"
                        }, 3000)
                    } else {
                        setProgress(vue, resp.msg, false);
                    }
                })
                .catch(function (err) {
                    setProgress(vue, "Unable to login at the moment...", false);
                })
        } else {
            setProgress(vue, "Check form fields and try again !", false);
        }
    }
</script>
