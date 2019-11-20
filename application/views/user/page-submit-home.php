<div class="content-body pd-0" id="app">
    <!--Populate your body data here-->
    <div class="pd-20 pd-lg-25 pd-xl-30">
        <h6 id="channelTitle" class="mg-b-5">#<? echo @$desc; ?></h6>
        <div class="row row-xs">
            <!--Row started-->
            <div class="container">
                <div class="row">
                    <div class="card shadow p-5 mg-r-auto mg-l-auto ">
                        <form data-parsley-validate>
                        <div class="alert alert-warning" role="alert">
                            <p>
                                Please note that your profile information will be used as reference to your request 
                            </p>

                            <p class="tx-danger" v-if="error">
                                {{ error }}
                            </p>
                        </div>
                            <div class="form-group">
                                <label for="inputAddress">Address</label>
                                <input type="hidden" class="form-control"  v-model="user.uid" >
                                <input type="text" class="form-control" id="inputAddress" v-model="shForm.address" required>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Address 2</label>
                                <input type="text" class="form-control" id="inputAddress2" v-model="shForm.address2" placeholder="(Optional)">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label>Church Location</label>
                                    <select class="form-control" v-model="shForm.clocation" required>
                                        <option label="Choose one"></option>
                                        <option value="1">DIGC London</option>
                                        <option value="2" selected>DIGC Russia</option>
                                        <option value="3">DIGC France</option>
                                        <option value="4">DIGC Ukraine</option>
                                        <option value="5">DIGC Spain</option>
                                    </select>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1" v-model="agree" required>
                                    <label class="custom-control-label" for="customCheck1">Agree with Terms of Use and Privacy Policy</label>
                                </div>
                            </div>
                            <button type="submit" :disabled="agree?false:true"  @click.prevent="submitHome" class="btn btn-primary">Submit Form</button>
                        </form>
                    </div>
                    <!--Row ends-->
                </div>
                <div class="row">
                    <div class="card shadow p-5 col-8 mg-l-auto mg-r-auto">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Request</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="sm in userSH">
                                    <td scope="row">{{sm.sh_address}}</td>
                                    <td>{{ sm.sh_status == 1?"Approved":"Pending"}}</td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--Row ends-->
                </div>
                
            </div>
        </div>
    </div><!-- row -->
</div>
<div id="toastme" ref="toastit" data-delay="3000" class="toast bg-success pos-absolute t-10 r-10" style="z-index:9000" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <h6 class="tx-inverse  tx-14 mg-b-0 mg-r-auto">Notification</h6>
    <!-- <small>0 mins ago</small> -->
    <button type="button" class="ml-2 mb-1 close tx-normal" data-dismiss="toast" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="toast-body text-white" ref="body" id="tstbody" data-cs>
    Message Sucessfully sent.
  </div>
</div>
<script>
    var islogged = <?php echo json_encode($islogged); ?>;
    var user = <?php echo json_encode($user); ?>;
    var getSH = <?php echo json_encode($getSH); ?>;
</script>