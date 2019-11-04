<!DOCTYPE html>
<html lang="en">
<!--header-->
<?php include 'layout/layout-head.php'; ?>
<body>
<!--NavBar-->
<?php include 'layout/layout-nav.php'; ?>
<div class="content content-fixed content-auth-alt">
    <div class="container d-flex justify-content-center ht-100p" id="app">
        <form onsubmit="return false">
            <div class="wd-sm-350 ht-100p d-flex flex-row flex-column align-items-center justify-content-center">
                <div class="wd-80p wd-sm-300 mg-b-15">
                    <img src="<?php echo base_url(); ?>assets/img/reset.png"
                         class="img-fluid" alt=""></div>
                <h4 class="tx-20 tx-sm-24">Reset your password</h4>
                <p class="tx-color-03 mg-b-30 tx-center">Enter your email address and we will send you a link to reset
                    your
                    password.</p>
                <strong>{{info}}</strong>
                <div class="wd-100p d-flex flex-column flex-sm-row mg-b-40">
                    <input :disabled="disabled" v-model="user.email" type="text"
                           class="form-control wd-sm-200 flex-fill"
                           placeholder="Enter username or email address">
                    <button type="submit" :disabled="disabled" @click="btnReset"
                            class="btn btn-danger mg-sm-l-10 mg-t-10 mg-sm-t-0">Reset Password
                    </button>
                </div>
                <div class="tx-12 mg-t-0 tx-center">Remembered now ? <a
                            href="<?php echo site_url(); ?>login">Login Now</a>
                    <small class="tx-10"><br/>
                        Lost everything ?, contact super user <a
                                href="mailto:<?php echo config_item('meta')['su-email'] ?>"><?php echo config_item('meta')['su-email'] ?></a>

                    </small>
                </div>

            </div>
        </form>
    </div><!-- container -->
</div>

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
            btnReset: resetNow
        }
    });
    //begin login in
    function resetNow() {
        setProgress(vue, "Please wait...", true);
        var data = vue.$data.user;
        if (JsonSanitizer(data)) {
            axios.post(userApi.reset, data, {headers: config.axiosHeaders})
                .then(function (res) {
                    var resp = res.data;
                    logs(res);
                    if (resp.status) {
                        //logged in
                        setProgress(vue, resp.msg, true);
                        setTimeout(function () {
                            window.location.href = "<?php echo site_url(); ?>";
                        }, 8000)
                    } else {
                        setProgress(vue, resp.msg, false);
                    }
                })
                .catch(function (err) {
                    logs(err);
                    setProgress(vue, "Unable to change at the moment...", false);
                })
        } else {
            setProgress(vue, "Check form fields and try again !", false);
        }
    }
</script>
