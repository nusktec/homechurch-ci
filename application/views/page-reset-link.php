<!DOCTYPE html>
<html lang="en">
<!--header-->
<?php include 'layout/layout-head.php'; ?>
<body>
<!--NavBar-->
<?php include 'layout/layout-nav.php'; ?>
<div class="content content-fixed content-auth-alt">
    <div class="container d-flex justify-content-center ht-100p" id="app">
        <?php if ($data) { ?>
            <form onsubmit="return false">
                <div class="mx-wd-300 wd-sm-450 ht-100p d-flex flex-column align-items-center justify-content-center">
                    <div class="wd-80p wd-sm-300 mg-b-15">
                        <img src="<?php echo base_url(); ?>assets/img/reset.png"
                             class="img-fluid" alt=""></div>
                    <h4 class="tx-20 tx-sm-24">Set New Password</h4>
                    <small class="tx-14 tx-color-03 mg-b-10 tx-center">Enter your new password and confirm it</small>
                    <p class="tx-12 tx-color-03 mg-b-10 tx-center">
                        Hey <?php echo strtolower(explode(" ", @$data['uname'])[0]); ?>, now you can change your
                        password.</p>
                    <strong>{{info}}</strong>
                    <div class="w-75 d-flex flex-column flex-sm-row mg-b-2">
                        <input :disabled="disabled" v-model="user.pass1" type="password"
                               class="form-control wd-sm-100 flex-fill mb-2"
                               placeholder="Enter new password">
                        <input :disabled="disabled" v-model="user.pass2" type="password"
                               class="form-control wd-sm-100 flex-fill"
                               placeholder="Confirm new password">
                    </div>
                    <button type="submit" :disabled="disabled" @click="btnReset"
                            class="btn btn-success btn-sm w-75 mb-4">Change Password
                    </button>
                    <div class="tx-12 mg-t-0 tx-center">Remembered now ? <a
                                href="<?php echo site_url(); ?>login">Login Now</a>
                        <br>
                        <span class="tx-10 tx-color-03">Lost everything ?, contact super user <a
                                    href="mailto:<?php echo config_item('meta')['su-email'] ?>"><?php echo config_item('meta')['su-email'] ?></a></span>

                    </div>

                </div>
            </form>
        <?php } else {
            ?>
            <p class="tx-12 tx-color-03 mg-b-10 tx-center">The token has expired or not valid,
                <br>
                <a class="btn btn-danger" href="<?php echo base_url(); ?>">Back Home
                </a></p>
            <?php
        } ?>
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
            user: {
                pass1: "",
                pass2: "",
                token: '<?php echo @$token; ?>'
            },
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
            axios.post(userApi.resetlink, data, {headers: config.axiosHeaders})
                .then(function (res) {
                    var resp = res.data;
                    logs(res);
                    if (resp.status) {
                        //logged in
                        setProgress(vue, resp.msg, true);
                        setTimeout(function () {
                            window.location.href = "<?php echo site_url(); ?>"
                        }, 8000)
                    } else {
                        setProgress(vue, resp.msg, false);
                    }
                })
                .catch(function (err) {
                    setProgress(vue, "Unable to reset at the moment...", false);
                })
        } else {
            setProgress(vue, "Check form fields and try again !", false);
        }
    }
</script>
