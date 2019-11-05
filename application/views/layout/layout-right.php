<aside class="aside aside-fixed">
    <div class="aside-header">
        <a href="<? echo base_url(); ?>" class="aside-logo">Home<span>Church</span></a>
        <a href="" class="aside-menu-link">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="feather feather-menu">
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="feather feather-x">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </a>
        <a href="<?php echo base_url('logout'); ?>" id="chatContentClose" class="burger-menu d-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="feather feather-arrow-left">
                <line x1="19" y1="12" x2="5" y2="12"></line>
                <polyline points="12 19 5 12 12 5"></polyline>
            </svg>
        </a>
    </div>
    <div class="aside-body ps">
        <div class="aside-loggedin">
            <div class="d-flex align-items-center justify-content-start">
                <a href="<? echo base_url(); ?>" class="avatar"><img
                            src="<? echo base_url() ?>/assets/img/profiles/<? echo $avatar; ?>" class="rounded-circle"
                            alt=""></a>
                <?
                //messages alert algorithms
                $msg_noti = array_count_values(array_column(@$messages, "mstatus"))[0];
                $num_sms_unread = !$msg_noti ? 0 : $msg_noti;
                ?>
                <div class="aside-alert-link">
                    <a href="<? echo base_url('messages') ?>" class="<? echo $num_sms_unread > 0 ? 'new' : ''; ?>"
                       data-toggle="tooltip" title=""
                       data-original-title="You have <? echo $num_sms_unread; ?> unread messages">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-message-square">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg>
                    </a>
                    <?
                    //notification filtering algorithms
                    $notif_num = array_count_values(array_column(@$notifications, "nstatus"))[0];
                    $num_unread = !$notif_num ? 0 : $notif_num;
                    ?>
                    <a href="" class="<? echo $num_unread > 0 ? 'new' : ''; ?>" data-toggle="tooltip" title=""
                       data-original-title="You have <? echo $num_unread ?> new notifications">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-bell">
                            <path d="M22 17H2a3 3 0 0 0 3-3V9a7 7 0 0 1 14 0v5a3 3 0 0 0 3 3zm-8.27 4a2 2 0 0 1-3.46 0"></path>
                        </svg>
                    </a>
                    <a href="<? echo base_url('logout') ?>" data-toggle="tooltip" title=""
                       data-original-title="Sign out">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-log-out">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                            <polyline points="16 17 21 12 16 7"></polyline>
                            <line x1="21" y1="12" x2="9" y2="12"></line>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="aside-loggedin-user">
                <a href="#loggedinMenu" class="d-flex align-items-center justify-content-between mg-b-2"
                   data-toggle="collapse">
                    <h6 class="tx-semibold mg-b-0"><? echo ucwords(@$user['uname']); ?></h6>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-chevron-down">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </a>
                <p class="tx-color-03 tx-12 mg-b-0"><? echo (int)$user['utype'] == 1 ? USER_ROLE_1_NAME : USER_ROLE_2_NAME; ?></p>
            </div>
            <div class="collapse" id="loggedinMenu">
                <ul class="nav nav-aside mg-b-0">
                    <li class="nav-item"><a href="<? echo base_url("profile") ?>" class="nav-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-edit">
                                <path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path>
                                <polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon>
                            </svg>
                            <span>Edit Profile</span></a></li>
                    <li class="nav-item"><a href="<? echo base_url("settings") ?>" class="nav-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-settings">
                                <circle cx="12" cy="12" r="3"></circle>
                                <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                            </svg>
                            <span>Account Settings</span></a></li>
                    <li class="nav-item"><a href="<? echo base_url("help") ?>" class="nav-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-help-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                                <line x1="12" y1="17" x2="12" y2="17"></line>
                            </svg>
                            <span>Help Center</span></a></li>
                    <li class="nav-item"><a href="<? echo base_url("logout") ?>" class="nav-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-log-out">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                <polyline points="16 17 21 12 16 7"></polyline>
                                <line x1="21" y1="12" x2="9" y2="12"></line>
                            </svg>
                            <span>Sign Out</span></a></li>
                </ul>
            </div>
        </div><!-- aside-loggedin -->
        <ul class="nav nav-aside">
            <li class="nav-label">Dashboard</li>
            <li class="nav-item <? echo @(int)$rm == 0 ? 'active' : '' ?>"><a href="<? echo base_url('user'); ?>"
                                                                         class="nav-link">
                    <span><i class="fa fa-home mr-3" style="color: #8a8a8a;"></i> Home</span></a></li>
            <li class="nav-item <? echo @(int)$rm == 1 ? 'active' : '' ?>"><a href="<? echo base_url('user/profile'); ?>"
                                                                         class="nav-link">
                    <span><i class="fa fa-user mr-3" style="color: #8a8a8a;"></i> Profile</span></a></li>
            <li class="nav-item <? echo @(int)$rm == 2 ? 'active' : '' ?>"><a href="<? echo base_url('user/messages'); ?>"
                                                                         class="nav-link">
                    <span><i class="fa fa-envelope mr-3" style="color: #8a8a8a;"></i> Messages</span></a></li>
            <li class="nav-item <? echo @(int)$rm == 3 ? 'active' : '' ?>"><a href="<? echo base_url('user/notifications'); ?>"
                                                                         class="nav-link">
                    <span><i class="fa fa-bell mr-3" style="color: #8a8a8a;"></i> Notifications</span></a></li>
            <li class="nav-item <? echo @(int)$rm == 4 ? 'active' : '' ?>"><a href="<? echo base_url('user/submit-home'); ?>"
                                                                         class="nav-link">
                    <span><i class="fa fa-pen mr-3" style="color: #8a8a8a;"></i> Submit Home</span></a></li>
            <li class="nav-item <? echo @(int)$rm == 5 ? 'active' : '' ?>"><a href="<? echo base_url('user/chats'); ?>"
                                                                         class="nav-link">
                    <span><i class="fa fa-users mr-3" style="color: #8a8a8a;"></i> Chats</span></a></li>
            <li class="nav-item <? echo @(int)$rm == 6 ? 'active' : '' ?>"><a href="<? echo base_url('user/testimonies'); ?>"
                                                                         class="nav-link">
                    <span><i class="fa fa-sticky-note mr-3" style="color: #8a8a8a;"></i> Testimonies</span></a></li>
            <li class="nav-item <? echo @(int)$rm == 7 ? 'active' : '' ?>"><a href="<? echo base_url('user/testimonies'); ?>"
                                                                         class="nav-link">
                    <span><i class="fa fa-map-marker mr-3" style="color: #8a8a8a;"></i> Nearby Locations</span></a></li>

        </ul>
        <div class="ps__rail-x" style="left: 0px; top: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; right: 0px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
        </div>
    </div>
</aside>