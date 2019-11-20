<div class="content-body pd-0" id="app">
    <!--Populate your body data here-->
    <div class="pd-20 pd-lg-25 pd-xl-30">
        <h6 id="channelTitle" class="mg-b-5">#<? echo @$desc; ?></h6>
        <div class="row row-xs">
            <!--Row started-->
            <div class="col-sm-3 col-md-3 flex-xl-fill mb-5">
                <div class="card">
                    <!-- <img src="https://via.placeholder.com/640x427" class="card-img-top" alt=""> -->
                    <div class="card-body tx-13">
                        <div class="list-group">
                            <h4>Tags</h4>
                            <a href="#" class="list-group-item list-group-item-action active">Marriage</a>
                            <a href="#" class="list-group-item list-group-item-action">Financial</a>
                            <a href="#" class="list-group-item list-group-item-action">Healing</a>
                            <a href="#" class="list-group-item list-group-item-action">Education</a>
                            <a href="#" class="list-group-item list-group-item-action">Career</a>
                            <a href="#" class="list-group-item list-group-item-action">Preservation</a>
                            <a href="#" class="list-group-item list-group-item-action">Provision</a>
                            <a href="#" class="list-group-item list-group-item-action">Healing</a>
                            <a href="#" class="list-group-item list-group-item-action">Generational Curse</a>

                        </div>
                    </div>
                </div><!-- card -->
            </div><!-- col -->

            <div class="col-sm-12 col-md-8 border-0 shadow-sm ">
                    <div class="row">
                        <div v-if="viewT">
                        <div class="card col" >
                            <span class="d-flex mg-10 mg-t-4 p-1 tx-25 hvr" @click="viewT=false"> <i class="fas fa-angle-double-left"></i></span>

                            <div class="card-content p-5">
                                <div class="card-title ">

                                    <h5>{{ show[0].ttitle }}</h5>
                                    <small>By <a href="">{{show[0].uname}}</a> | {{ show[0].tcreated | dateConv}}</small>
                                </div>
                                <div class="card-body">
                                    {{show[0].tdesc}}

                                </div>
                                <div class="card-footer">
                                    <p class="text-bold badge badge-warning">Tags: <span class="small block-inline"> {{ show[0].ttags }}</span>
                                        </span>
                                </div>

                            </div>

                            <div class="container-fluid bg-gray-400">
                                
                                <!-- <div class="col-lg-3 shadow" v-for="otherTst in otherTestimony">
                                    {{ otherTst.ttitle}}
                                </div> -->
                            </div>
                        </div>
                        
        <div class="row">
            <div class="col">
                  <div class="card card-profile-interest">
              <div class="card-header pd-y-15 pd-x-20 d-flex align-items-center justify-content-between">
                <h6 class="tx-uppercase tx-semibold mg-b-0">Other Testimonies</h6>
                <nav class="nav nav-with-icon tx-13">
                  <a href="" class="nav-link">Browse Testimonies <i data-feather="arrow-right" class="mg-l-5 mg-r-0"></i></a>
                </nav>
              </div><!-- card-header -->
              <div class="card-body pd-10">
                <div class="row">
                  <div class="col-4-lg pd-10" v-for="tst in otherTestimony">
                    <div class="media">
                      <div class="wd-45 ht-45 bg-gray-900 rounded d-flex align-items-center justify-content-center">
                        <i data-feather="github" class="tx-white-7 wd-20 ht-20"></i>
                      </div>
                      <div class="media-body pd-l-25">
                        <h6 class="tx-color-01 mg-b-5">{{tst.ttitle}}</h6>
                        <p class="tx-12 mg-b-10">{{ tst.tsummary}} <a href="#" @click.prevent="setView(tst.tid)">Learn more</a></p>
                        <span class="tx-12 tx-color-03 small">{{ tst.tcreated | dateConv}}</span>
                      </div>
                    </div><!-- media -->

                  </div><!-- col -->
                </div><!-- row -->
              </div><!-- card-body -->
            </div><!-- card -->

            </div>
        </div>

                    </div>


                    <div v-else class="card col-lg-4 mb-5 card-profile" v-for="tst in tstm" :key="tst.tid">
                        <!-- <img src="https://via.placeholder.com/640x427" class="card-img-top" alt=""> -->
                        <div class="card-body tx-13">
                            <div>
                                <a href="">
                                    <div class="avatar avatar-lg"><span class="avatar-initial rounded-circle bg-dark">{{ tst.uname | firststr}}</span></div>
                                </a>
                                <h5 class="pb-2">{{ tst.ttitle }}</a></h5>

                                <p class="card-text text-justify">{{ tst.tdesc | custom_substr(0,100) }}...</p>

                                <div class="row">
                                    <div class="col">
                                        <p class="small">{{ tst.tcreated | timeago  }}</p>
                                    </div>

                                </div>
                                <div class="mg-b-25"><span class="tx-12 tx-color-03">By {{tst.uname}}</span></div>


                                <!-- <div class="img-group img-group-sm mg-b-5">
                            <img src="<?php echo base_url(); ?>assets/img/profiles/<?php echo @$avatar; ?>" class="img wd-40 ht-40 rounded-circle" alt="">
                        </div> -->


                                <div class="card-footer">

                                    <div class="row">
                                        <div class="col">
                                            <button type="button" class="btn btn-danger btn-icon btn-sm" @click="delTestimony(tst.tid)" v-if="tst.tby == user.uid">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                        <div class="col">
                                            <button type="button" class="btn btn-primary btn-icon" @click="setView(tst.tid)">
                                                <i class="fas fa-angle-double-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div><!-- card -->
                    <!-- col -->

                </div>
            </div>
        </div>

        <div class="modal fade" id="modal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel6" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content tx-14">
                    <div class="modal-header">Testify</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="mg-b-0">
                            <form method="post">
                                <input type="hidden" placeholder="Enter your firstname" v-model="tstmInfo.userId = <?= $user['uid'] ?>">
                                <div class="form-group">
                                    <label for="formGroupExampleInput" class="d-block">Testimony Title</label>
                                    <input type="text" class="form-control" placeholder="Enter your testimony title" v-model="tstmInfo.title">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2" class="d-block">Summary</label>
                                    <input type="text" class="form-control" placeholder="Enter your summary" v-model="tstmInfo.summary">
                                </div>
                                <div class="form-group">
                                    <label for="summary" class="d-block">Description</label>
                                    <textarea class="form-control" placeholder="Enter your description" v-model="tstmInfo.desc">

                    </textarea>
                                </div>
                                <div class="form-group"><label for="tag" class="d-block"></label>
                                    <input type="text" class="form-control" value=""  data-role="tagsinput" v-model="tstmInfo.tags">
                                </div>
                                <button class="btn btn-primary" type="button" @click.prevent="createTestimony">Submit</button>
                                <button class="btn btn-secondary" type="cancel">Cancel</button>
                            </form>

                        </p>
                    </div>
                    <!-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary tx-13">Save changes</button>
          </div> -->
                </div>
            </div>
        </div>
    </div><!-- row -->


</div>

<!-- <a href="#modal6" data-toggle="modal" data-animation="effect-flip-vertical" class="float">
        <i class="fa fa-plus my-float bg-warning"></i>
    </a> -->
</div>
<!-- TOAST DIV -->
<div id="toastme" data-delay="3000" class="toast bg-success pos-absolute t-10 r-10" style="z-index:9000" role="alert" aria-live="assertive" aria-atomic="true">
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
<!--END OF TOAST DIV -->
<!-- FLOATING BUTTON -->
<a href="#modal6" data-toggle="modal" data-animation="effect-flip-vertical" class="float">
    <i class="fa fa-plus my-float"></i>
</a>
</div>



<script>
    // store all testimoines from db
    // var tstm = echo json_encode($tstm);
    // store all users
    var user = <?php echo json_encode($user); ?>;
    // store all testimonies and users
    var tstm = <?php echo json_encode($usrTst); ?>;
    var islogged = <?php echo json_encode($islogged); ?>;
</script>