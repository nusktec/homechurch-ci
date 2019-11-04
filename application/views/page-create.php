<!DOCTYPE html>
<html lang="en">
<!--header-->
<?php include 'layout/layout-head.php'; ?>
<body>
<!--NavBar-->
<?php include 'layout/layout-nav.php'; ?>

<div class="content content-fixed content-auth">
    <div class="container bg-transparent">
        <div class="media align-items-stretch justify-content-center ht-100p pos-relative mg-lg-y-10">
            <div class="media-body mr-md-3 mr-3">
                <?php include 'misc.carousel.php' ?>
            </div><!-- media-body -->
            <div class="sign-wrapper mg-lg-l-50 mg-xl-l-60">
                <div class="wd-100p" id="app">
                    <h4 class="tx-color-01 mg-b-5">Create New Account</h4>
                    <p class="tx-color-03 tx-12 mg-b-40">It's free to signup and only takes a minute.</p>
                    <form onsubmit="return false" id="form1" :class="'needs-validation '+validated" novalidate
                          method="post">
                        <div class="form-group">
                            <label>Fullname</label>
                            <input :disabled="disabled" v-model="user.name" type="text" class="form-control"
                                   placeholder="Enter your fullname" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>Email address</label>
                            <input :disabled="disabled" v-model="user.email" name="email" type="email"
                                   class="form-control"
                                   placeholder="Enter your email address" autocomplete="off" required="required">
                        </div>
                        <div class="form-group">
                            <label>Phone No.</label>
                            <input :disabled="disabled" v-model="user.phone" name="phone" type="text"
                                   class="form-control"
                                   placeholder="Enter your phone" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex justify-content-between mg-b-5">
                                        <label class="mg-b-0-f">Gender</label>
                                    </div>
                                    <select :disabled="disabled" v-model="user.gender" name="gender"
                                            class="form-control">
                                        <option selected value="">Choose</option>
                                        <option value="M">Male</option>
                                        <option value="F">Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <div class="d-flex justify-content-between mg-b-5">
                                        <label class="mg-b-0-f">Country</label>
                                    </div>
                                    <select :disabled="disabled" v-model="user.country" name="country"
                                            class="form-control">
                                        <option selected value="">Choose</option>
                                        <option value="M">Male</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex justify-content-between mg-b-5">
                                        <label class="mg-b-0-f">State</label>
                                    </div>
                                    <input :disabled="disabled" v-model="user.state" name="state" type="text"
                                           class="form-control"
                                           placeholder="State" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <div class="d-flex justify-content-between mg-b-5">
                                        <label class="mg-b-0-f">Password</label>
                                    </div>
                                    <input :disabled="disabled" v-model="user.pass1" name="pass1" type="password"
                                           class="form-control"
                                           placeholder="Enter your password" autocomplete="off">
                                </div>
                                <div class="col-6">
                                    <div class="d-flex justify-content-between mg-b-5">
                                        <label class="mg-b-0-f">Retype Password</label>
                                    </div>
                                    <input :disabled="disabled" v-model="user.pass2" name="pass2" type="password"
                                           class="form-control"
                                           placeholder="Retype password" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="form-group tx-11">
                            By clicking <strong>Create an account</strong> below, you agree to our terms of service and
                            privacy statement.
                        </div><!-- form-group -->
                        <strong>{{info}}</strong>
                        <button :disabled="disabled" @click="startClick" class="btn btn-brand-02 btn-block">Create
                            Account
                        </button>
                        <div class="divider-text">or</div>
                        <div class="tx-13 mg-t-20 tx-center">Already have an account? <a
                                    href="<?php echo site_url(); ?>login">Sign In</a></div>
                    </form>
                </div>
            </div><!-- sign-wrapper -->
        </div><!-- media -->
    </div><!-- container -->
</div>

<!--footer-->
<?php include 'layout/layout-footer.php'; ?>
</body>
<?php include 'layout/layout-out.php'; ?>
</html>
<script>
    //start vue declarations
    var vue = new Vue({
            el: '#app',
            data: function () {
                return {
                    user: {
                        email: "",
                        name: "",
                        phone: "",
                        gender: "",
                        pass1: "",
                        pass2: "",
                        country: '',
                        state: '',
                        address: ''
                    },
                    disabled: false,
                    info: "",
                    validated: ""
                }
            },
            mounted: function () {
                //initializer of page

            },
            methods: {
                startClick: submitNow
            }
        })
    ;
    //start submission
    function submitNow() {
        var data = vue.$data.user;
        if (JsonSanitizer(data)) {
            setProgress(vue, "Please wait...", true);
            //fire axios
            axios.post(userApi.create, data, {headers: config.axiosHeaders})
                .then(function (res) {
                    if (res.data.status) {
                        vue.$data.validated = "was-validated";
                        setProgress(vue, res.data.msg, true);
                        setTimeout(function () {
                            window.location.href = "<?php echo site_url(); ?>/login"
                        }, 3000)
                    } else {
                        setProgress(vue, res.data.msg, false);
                    }
                    logs(res);
                })
                .catch(function (err) {
                    logs(err);
                    setProgress(vue, "Unable to submit form, please try again", false);
                });
        } else {
            setProgress(vue, "Please complete the form field(s) appropriately", false);
        }
    }
</script>
