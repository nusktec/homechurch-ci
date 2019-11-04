<div class="content-body pd-0" id="app">
    <!--Populate your body data here-->
    <div class="pd-20 pd-lg-25 pd-xl-30">
        <h6 id="channelTitle" class="mg-b-5">#<? echo @$desc; ?></h6>
        <div class="row row-xs">
            <!--Row started-->
            <div class="col-sm-3 col-md-3 flex-xl-fill mb-5">
                <div class="card card-profile shadow-sm overflow-hidden">
                    <img style="filter: blur(10px); -webkit-filter: blur(10px);"
                         src="<?php echo base_url(); ?>assets/img/profiles/<?php echo @$avatar; ?>"
                         class="card-img-top" alt="">
                    <div class="card-body tx-13 border-0">
                        <div>
                            <button :disabled="imgdisabled"
                                    style="background-image: url('<?php echo base_url(); ?>assets/img/profiles/<?php echo @$avatar; ?>'); background-repeat: no-repeat; background-size: cover;"
                                    onclick="$('#fileshooter').trigger('click');" type="button"
                                    class="btn btn-outline-secondary btn-icon avatar avatar-lg">
                                <i data-feather="camera"></i>
                            </button>
                            <small>{{imgInfo}}</small>
                            <h5><? echo $user['uname']; ?></h5>
                            <p>
                                <small>Registered <? echo timeago($user['ucreated']); ?></small>
                            </p>
                            <input accept="image/*" class="d-none" id="fileshooter"
                                   onchange="fileshooter(<? echo $user['uid']; ?>)"
                                   type="file">
                        </div>
                    </div>
                </div><!-- card -->
            </div><!-- col -->

            <div class="card col-sm-4 col-md-4 border-0 shadow-sm">
                <div class="card-header">Personal Data</div>
                <div class="flex-xl-fill p-4">
                    <div class="form-group">
                        <label>Name</label>
                        <input v-model="user.uname" :disabled="disabled" type="text"
                               class="form-control border-0"
                               placeholder="your name">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input v-model="user.uemail" :disabled="true" type="email"
                               class="form-control border-0"
                               placeholder="yourname@yourmail.com">
                    </div>
                    <div class="form-group">
                        <div class="d-flex justify-content-between mg-b-5">
                            <label class="mg-b-0-f">Phone</label>
                        </div>
                        <input v-model="user.uphone" :disabled="disabled" type="text"
                               class="form-control border-0"
                               placeholder="Phone">
                    </div>
                    <div class="form-group">
                        <div class="d-flex justify-content-between mg-b-5">
                            <label class="mg-b-0-f">Gender</label>
                        </div>
                        <select :disabled="disabled" v-model="user.ugender" name="gender"
                                class="form-control border-0">
                            <option selected value="">Choose</option>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="card col-sm-5 col-md-5 border-0 shadow-sm">
                <div class="card-header">Other Data</div>
                <div class="flex-xl-fill p-4">
                    <div class="form-group">
                        <label>Country</label>
                        <select :disabled="disabled" v-model="user.ucountry" name="country"
                                class="form-control">
                            <option selected value="">Choose</option>
                            <?php
                            include __DIR__ . '/../misc.country.php';
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>State</label>
                        <input v-model="user.ustate" type="text"
                               class="form-control border-0"
                               placeholder="school name">
                    </div>
                    <div class="form-group">
                        <div class="d-flex justify-content-between mg-b-5">
                            <label class="mg-b-0-f">Address</label>
                        </div>
                        <input v-model="user.uaddress" type="text"
                               class="form-control border-0"
                               placeholder="Address">
                    </div>
                    <div class="form-group">
                        <div class="d-flex justify-content-between mg-b-5">
                            <label class="mg-b-0-f">Date Joined</label>
                        </div>
                        <input readonly="readonly" value="<? echo @$user['ucreated']; ?>" type="text"
                               class="form-control border-0"
                               placeholder="Created">
                    </div>
                    <strong v-html="info"></strong>
                    <button @click="updateInfo" type="button" class="btn btn-primary btn-block">Update Info
                    </button>
                </div>
            </div>
        </div>

    </div><!-- row -->
</div>
<script>
    var user = <?php echo json_encode($user); ?>;
</script>