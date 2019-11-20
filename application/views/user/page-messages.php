<div class="content-body pd-0" id="app">
  <!--Populate your body data here-->
  <div class="pd-20 pd-lg-25 pd-xl-30">
    <h6 id="channelTitle" class="mg-b-5">#<? echo @$desc; ?></h6>
    <div class="row row-xs">
      <!--Row started-->


      <div class="container">
        <div class="chat-wrapper">

          <div class="chat-sidebar">

            <div class="chat-sidebar-header">
              <a href="#" data-toggle="dropdown" class="dropdown-link">
                <div class="d-flex align-items-center">
                  <div class="avatar avatar-sm mg-r-8"><span class="avatar-initial rounded-circle">{{ user.uname | firststr}}</span></div>
                  <span class="tx-color-01 tx-semibold">{{ user.uname}}</span>
                </div>
                <span><i data-feather="chevron-down"></i></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <a href="" class="dropdown-item"><i data-feather="user-plus"></i> Invite People</a>
                <a href="" class="dropdown-item"><i data-feather="plus-square"></i> Create Channel</a>
                <a href="" class="dropdown-item"><i data-feather="server"></i> Server Settings</a>
                <a href="" class="dropdown-item"><i data-feather="bell"></i> Notification Settings</a>
                <a href="" class="dropdown-item"><i data-feather="zap"></i> Privacy Settings</a>
                <div class="dropdown-divider"></div>
                <a href="" class="dropdown-item"><i data-feather="edit-3"></i> Edit Team Details</a>
                <a href="" class="dropdown-item"><i data-feather="shield-off"></i> Hide Muted Channels</a>
              </div><!-- dropdown-menu -->
            </div><!-- chat-sidebar-header -->

            <!-- start sidebar body -->
            <div class="chat-sidebar-body">

              <!-- <div class="flex-fill pd-y-20 pd-x-10">
                <div class="d-flex align-items-center justify-content-between pd-x-10 mg-b-10">
                  <span class="tx-10 tx-uppercase tx-medium tx-color-03 tx-sans tx-spacing-1">Important</span>
                  <a href="#modalCreateChannel" class="chat-btn-add" data-toggle="modal"><span data-toggle="tooltip" title="Create Channel"><i data-feather="plus-circle"></i></span></a>
                </div>
                <nav id="allChannels" class="nav flex-column nav-chat mg-b-20">
                  <a href="#general" class="nav-link active"># General</a>
                  <a href="#engineering" class="nav-link"># Home Church Leader</a>
            
                </nav>
              </div> -->

              <div class="flex-fill pd-y-20 pd-x-10 bd-t">
                <p class="tx-10 tx-uppercase tx-medium tx-color-03 tx-sans tx-spacing-1 pd-l-10 mg-b-10">INBOX</p>
                <div id="chatDirectMsg" class="chat-msg-list">
                  <div v-if="msgs.length == 0 ">
                    <p class="tx-dark">You Have No Message</p>
                  </div>
                  <div v-else>
                  <a  href="#" class="media" v-for="msg in inboxMsg" @click.prevent="displayMessage(msg)">
                    <div class="avatar avatar-sm avatar-online"><span class="avatar-initial bg-dark rounded-circle">b</span></div>
                    <div class="media-body mg-l-10">

                      <h6 class="mg-b-0">{{ msg[0].uname }}</h6>
                      <small class="d-block tx-color-04">{{msg.mcreated | timeago }}</small>
                    </div><!-- media-body -->
                  </a><!-- media -->
                  </div>
                </div><!-- media-list -->
              </div>
              <div class="flex-fill pd-y-20 pd-x-10 bd-t">
                <p class="tx-10 tx-uppercase tx-medium tx-color-03 tx-sans tx-spacing-1 pd-l-10 mg-b-10">OUTBOX</p>
                <div id="chatDirectMsg" class="chat-msg-list">
                  <div v-if="msgsFrom.length == 0 ">
                    <p class="tx-dark">You Have No Message</p>
                  </div>
                  <div v-else>
                    
                  <a  href="#" class="media" v-for="msg in outboxMsg" @click.prevent="displayMessage(msg,msg.mto,'inbox')">
                    <div class="avatar avatar-sm avatar-online"><span class="avatar-initial bg-dark rounded-circle">b</span></div>
                    <div class="media-body mg-l-10">

                      <h6 class="mg-b-0">{{ msg[0].uname }}</h6>
                      <small class="d-block tx-color-04">{{msg.mcreated | timeago }}</small>
                    </div><!-- media-body -->
                  </a><!-- media -->
                  </div>
                </div><!-- media-list -->
              </div>
            </div><!-- chat-sidebar-body -->

            <!-- <div class="chat-sidebar-footer">
              <div class="d-flex align-items-center">
                <div class="avatar avatar-sm avatar-online mg-r-8"><img src="https://via.placeholder.com/500" class="rounded-circle" alt=""></div>
                <h6 class="tx-semibold mg-b-0">{{user.uname}}</h6>
              </div>
              <div class="d-flex align-items-center">
                <a href=""><i data-feather="mic"></i></a>
                <a href=""><i data-feather="settings"></i></a>
              </div>
            </div> -->
            <!-- chat-sidebar-footer -->

          </div><!-- chat-sidebar -->

          <div class="chat-content">
            <div class="chat-content-header">
              <h6 id="channelTitle" class="mg-b-0"></h6>
              <div id="directTitle" class="d-none">
                <div class="d-flex align-items-center">
                  <div class="avatar avatar-sm avatar-online"><span class="avatar-initial rounded-circle">b</span></div>
                  <h6 class="mg-l-10 mg-b-0">@dfbot</h6>
                </div>
              </div>
              <div class="d-flex">
                <nav id="channelNav">
                  <!-- <a href="#modalInvitePeople" data-toggle="modal"><span data-toggle="tooltip" title="Invite People"><i data-feather="user-plus"></i></span></a>
                   -->
                  <a id="showMemberList" href="" data-toggle="tooltip" title="Message list" class="d-flex align-items-center">
                    <i data-feather="users"></i>
                    <span class="tx-medium mg-l-5" v-if="inboxMsg > 0">{{ inboxMsg.length }}</span>
                  </a>
                </nav>
                <nav id="directNav" class="d-none">
                  <a href="" data-toggle="tooltip" title="Call User"><i data-feather="phone"></i></a>
                  <a href="" data-toggle="tooltip" title="User Details"><i data-feather="info"></i></a>
                  <a href="" data-toggle="tooltip" title="Add to Favorites"><i data-feather="star"></i></a>
                  <a href="" data-toggle="tooltip" title="Flag User"><i data-feather="flag"></i></a>
                </nav>
                <div class="search-form mg-l-15 d-none d-sm-flex">
                  <input type="search" class="form-control" placeholder="Search">
                  <button class="btn" type="button"><i data-feather="search"></i></button>
                </div>
                <nav class="mg-sm-l-10">
                  <a href="" data-toggle="tooltip" title="Channel Settings" data-placement="left"><i data-feather="more-vertical"></i></a>
                </nav>
              </div>
            </div><!-- chat-content-header -->

            <div class="chat-content-body">
              <div class="chat-group" v-if="message">
  
                <div class="pd-20 pd-lg-25 pd-xl-30" v-for="dm in message">
                <div class="divider-text">{{dm.mcreated | dateConv}}</div>
                  <h5 class="mg-b-30">{{dm.mtitle}}</h5>

                  <h6 class="tx-semibold mg-b-0">{{dm.uname}}</h6>
                  <p class="tx-color-03">{{dm.ustate}} - {{dm.ucountry }}</p>

                  <!-- <p>Greetings!</p> -->
                  <p>
                    {{ dm.mbody }}
                  </p>
                  <!-- <p>
                    <span>Sincerely yours,</span><br>
                    <strong>Envato Design Team</strong>
                  </p> -->
                </div>
              
              </div>
            </div><!-- chat-content-body -->

            <div class="chat-sidebar-right">
              <div class="pd-y-20 pd-x-10">
                <div class="tx-10 tx-uppercase tx-medium tx-color-03 tx-sans tx-spacing-1 pd-l-10">Members List</div>
                <div class="chat-member-list">
                 
                </div><!-- chat-msg-list -->
              </div>
            </div>
            <!-- chat-sidebar-right -->

            <!-- <div class="chat-content-footer">
              <a href="" data-toggle="tooltip" title="Add File" class="chat-plus"><i data-feather="plus"></i></a>
              <input type="text" class="form-control align-self-center bd-0" placeholder="Reply">
              <nav>
                <a href="" data-toggle="tooltip" title="Add GIF"><i data-feather="image"></i></a>
                <a href="" data-toggle="tooltip" title="Add Gift"><i data-feather="gift"></i></a>
                <a href="" data-toggle="tooltip" title="Add Smiley"><i data-feather="smile"></i></a>
              </nav>
            </div>chat-content-footer -->
          </div><!-- chat-content -->

        </div><!-- chat-wrapper -->

      </div>

      <!-- END OF IMAGE LIST DIV-->
    </div>
    <!--Row ends-->

  </div>



  <div class="modal fade" id="modal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel6" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content tx-14">
        <div class="modal-header bg-dark tx-white">Send Message</h6>
          <button type="button" class="close tx-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card shadow p-5 mg-r-auto mg-l-auto ">
            <form>
              <div class="form-row">

                <div class="form-group col-md-6">
                  <label for="inputEmail4">Subject</label>
                  <input type="text" v-model="mform.mtitle" class="form-control" id="mtitle" placeholder="Message Subject">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <input type="hidden" v-model="mform.mfrom" class="form-control" id="mfrom" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputAddress">Message Body</label>
                <textarea type="text" v-model="mform.mbody" class="form-control" id="mBody" placeholder="Please type in your message" required>

                                </textarea>
              </div>
              <div class="form-group">
                <label for="inputAddress2">To</label>
                <select v-model="mform.mto" class="form-control" placeholder="Apartment, studio, or floor" required>
                  <option v-for="user in allUser" :value="user.uid">{{user.uname}}</option>
                </select>
              </div>
              <button type="button" @click.prevent="sendM" class="btn btn-primary">Send Message</button>
            </form>
          </div>
        </div>
        <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary tx-13">Save changes</button>
            </div> -->
      </div>
    </div>
  </div>
</div><!-- row -->
<div id="element" data-delay="3000" class="toast bg-success pos-absolute t-10 r-10" style="z-index:9000" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <h6 class="tx-inverse  tx-14 mg-b-0 mg-r-auto">Notification</h6>
    <!-- <small>0 mins ago</small> -->
    <button type="button" class="ml-2 mb-1 close tx-normal" data-dismiss="toast" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="toast-body text-white" id="tstbody" data-cs>
    Message Sucessfully sent.
  </div>
</div>
<a href="#modal6" data-toggle="modal" data-animation="effect-slide-in-right" class="float">
  <i class="fa fa-paper-plane my-float"></i>
</a>

</div>



<script>
  var messages_raw = <?php echo json_encode($messages_raw); ?>;
  var messages_from = <?php echo json_encode($messages_from); ?>;
  var allUser = <?php echo json_encode($allUser); ?>;
  var user = <?php echo json_encode($user); ?>;
</script>

