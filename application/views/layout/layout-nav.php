<?php
/**
 * Created by PhpStorm.
 * User: revelation
 * Date: 10/18/19
 * Time: 5:10 PM
 */
?>
<header class="navbar navbar-header navbar-header-fixed sticky-top">
    <a href="" id="mainMenuOpen" class="burger-menu d-none">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
             class="feather feather-menu">
            <line x1="3" y1="12" x2="21" y2="12"></line>
            <line x1="3" y1="6" x2="21" y2="6"></line>
            <line x1="3" y1="18" x2="21" y2="18"></line>
        </svg>
    </a>
    <a href="" id="filemgrMenu" class="burger-menu d-lg-none">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
             class="feather feather-arrow-left">
            <line x1="19" y1="12" x2="5" y2="12"></line>
            <polyline points="12 19 5 12 12 5"></polyline>
        </svg>
    </a>
    <div class="navbar-brand">
        <a href="" class="df-logo">Presta<span>Sheet</span></a>
    </div><!-- navbar-brand -->
    <div id="navbarMenu" class="navbar-menu-wrapper">
        <div class="navbar-menu-header">
            <a href="" class="df-logo">Presta<span>Sheet</span></a>
            <a id="mainMenuClose" href=""><i data-feather="x"></i></a>
        </div><!-- navbar-menu-header -->
        <ul class="nav navbar-menu">
            <li class="nav-label pd-l-20 pd-lg-l-25 d-lg-none">Main Navigation</li>
            <?php if (!@$this->session->has_userdata('user')) { ?>
                <li class="nav-item with-sub">
                    <a href="<?php echo base_url(); ?>" class="nav-link <?php echo @$menu_num == 0 ? 'active' : ''; ?>"><i
                                data-feather="user"></i> Quick Links</a>
                    <ul class="navbar-menu-sub">
                        <li class="nav-sub-item"><a href="<? echo base_url(); ?>login" class="nav-sub-link"><i
                                        data-feather="user"></i>Sign
                                In</a></li>
                        <li class="nav-sub-item"><a href="<? echo base_url(); ?>create-account" class="nav-sub-link"><i
                                        data-feather="users"></i>Create
                                An Account</a></li>
                        <li class="nav-sub-item"><a href="<? echo base_url(); ?>reset" class="nav-sub-link"><i
                                        data-feather="mail"></i>Reset
                                Password</a></li>
                    </ul>
                </li>
            <?php } ?>
            <?php if (true) { ?>
                <li class="nav-item <?php echo @$menu_num == 0 ? 'active' : ''; ?>"><a class="nav-link" href="#"><i
                                data-feather="file-text"></i>Main</a></li>
                <li class="nav-item <?php echo @$menu_num == 1 ? 'active' : ''; ?>"><a class="nav-link" href="#"><i
                                data-feather="file-text"></i>Blog</a></li>
                <li class="nav-item <?php echo @$menu_num == 2 ? 'active' : ''; ?>"><a class="nav-link" href="#"><i
                                data-feather="calendar"></i>About Us</a></li>
                <li class="nav-item <?php echo @$menu_num == 3 ? 'active' : ''; ?>"><a class="nav-link" href="#"><i
                                data-feather="message-square"></i>Our Team</a></li>
                <li class="nav-item <?php echo @$menu_num == 4 ? 'active' : ''; ?>"><a class="nav-link" href="#"><i
                                data-feather="users"></i>Contact Us</a></li>
                <li class="nav-item <?php echo @$menu_num == 5 ? 'active' : ''; ?>"><a class="nav-link" href="#"><i
                                data-feather="mail"></i>API Doc</a>
                </li>
            <?php } ?>
        </ul>
    </div><!-- navbar-menu-wrapper -->
    <!--Hide this options for non super (logged in) user-->
    <?php if (@$this->session->has_userdata('user')) { ?>
        <div class="navbar-right">
            <div class="dropdown dropdown-message">
                <a href="" class="dropdown-link new-indicator" data-toggle="dropdown">
                    <i data-feather="message-square"></i>
                    <span><?php echo @count($msgalerts); ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header">New Messages</div>
                    <?php if (count($msgalerts) === 0) { ?>
                        <div class="media-body mg-l-15">
                            <span>No New Messages</span>
                        </div><!-- media-body -->
                        <?php
                    }
                    //messages lookup
                    foreach ($msgalerts as $key => $values) {
                        ?>
                        <a href="" class="dropdown-item">
                            <div class="media">
                                <div class="avatar avatar-sm"><span class="avatar-initial rounded-circle"><i
                                                class="fa fa-envelope"></i></span></div>
                                <div class="media-body mg-l-15">
                                    <p><?php echo $values['mbody']; ?></p>
                                    <span><?php echo $values['mcreated'] ?></span>
                                </div><!-- media-body -->
                            </div><!-- media -->
                        </a>
                    <?php } ?>
                    <div class="dropdown-footer"><a href="#" onclick="clearNotifications('<?php echo @$uid; ?>','<? echo $values['mid'] ?>')">View all Messages</a></div>
                </div><!-- dropdown-menu -->
            </div><!-- dropdown -->

            <div class="dropdown dropdown-notification">
                <a href="" class="dropdown-link new-indicator" data-toggle="dropdown">
                    <i data-feather="bell"></i>
                    <span><?php echo @count($notifications); ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header">Notifications</div>
                    <?php if (count($notifications) === 0) { ?>
                        <div class="media-body mg-l-15">
                            <span>No New Notifications</span>
                        </div><!-- media-body -->
                        <?php
                    }
                    //messages lookup
                    foreach ($notifications as $key => $values) {
                        ?>
                        <a href="#" class="dropdown-item">
                            <div class="media">
                                <div class="avatar avatar-sm"><span class="avatar-initial rounded-circle"><i
                                                class="fa fa-bell"></i></span></div>
                                <div class="media-body mg-l-15">
                                    <p><?php echo $values['nbody']; ?></p>
                                    <span><?php echo $values['ncreated']; ?></span>
                                </div><!-- media-body -->
                            </div><!-- media -->
                        </a>
                    <?php } ?>
                    <div class="dropdown-footer"><a href="#">View all Notifications</a></div>
                </div><!-- dropdown-menu -->
            </div><!-- dropdown -->


            <div class="dropdown dropdown-profile">
                <a href="" class="dropdown-link" data-toggle="dropdown" data-display="static">
                    <div class="avatar avatar-sm"><img
                                src="<?php echo base_url(); ?>assets/img/profiles/<?php echo @$avatar; ?>"
                                class="rounded-circle"
                                alt=""></div>
                </a><!-- dropdown-link -->
                <div class="dropdown-menu dropdown-menu-right tx-13">
                    <div class="avatar avatar-lg mg-b-15"><img
                                src="<?php echo base_url(); ?>assets/img/profiles/<?php echo @$avatar; ?>"
                                class="rounded-circle" alt=""></div>
                    <h6 class="tx-semibold mg-b-5"><?php echo @$user['uname']; ?></h6>
                    <p class="mg-b-25 tx-12 tx-color-03"><?php echo @$user['utype'] === 1 ? 'student' : 'lecturer'; ?>@<?php echo @strtolower($institute['inick']); ?></p>

                    <a href="#" class="dropdown-item"><i data-feather="edit-3"></i> Edit Profile</a>
                    <a href="#" class="dropdown-item"><i data-feather="user"></i> View Profile</a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item"><i data-feather="settings"></i> Settings</a>
                    <a href="#" class="dropdown-item"><i data-feather="settings"></i> PSA Token</a>
                    <a href="#" class="dropdown-item"><i data-feather="help-circle"></i> Help Center</a>
                    <a href="<?php echo base_url('logout') ?>" class="dropdown-item"><i data-feather="log-out"></i>Sign
                        Out</a>
                </div><!-- dropdown-menu -->
            </div><!-- dropdown -->


        </div><!-- navbar-right -->
    <?php } ?>

</header><!-- navbar -->

