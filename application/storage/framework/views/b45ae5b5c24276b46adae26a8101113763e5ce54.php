<header class="topbar">

    <nav class="navbar top-navbar navbar-expand-md navbar-light">

        <div class="navbar-header">


            <?php if(request('dashboard_section') == 'settings'): ?>
            <!--exist-->
            <div class="sidenav-menu-item exit-panel m-b-17">
                <a class="waves-effect waves-dark text-info" href="/home" id="settings-exit-button"
                    aria-expanded="false" target="_self">
                    <i class="sl-icon-logout text-info"></i>
                    <span id="settings-exit-text"><?php echo e(cleanLang(__('lang.exit_settings'))); ?></span>
                </a>
            </div>
            <?php else: ?>
            <!--logo-->
            <div class="sidenav-menu-item logo m-t-0">
                <a class="navbar-brand" href="/home">
                    <img src="<?php echo e(runtimeLogoSmall()); ?>" alt="homepage" class="logo-small" />
                    <img src="<?php echo e(runtimeLogoLarge()); ?>" alt="homepage" class="logo-large" />
                </a>
            </div>
            <?php endif; ?>
        </div>


        <div class="navbar-collapse header-overlay" id="main-top-nav-bar">

            <div class="page-wrapper-overlay js-toggle-side-panel hidden" data-target=""></div>

            <ul class="navbar-nav mr-auto">

                <!--left menu toogle (hamburger menu) - main application -->
                <?php if(request('visibility_left_menu_toggle_button') == 'visible'): ?>
                <li class="nav-item main-hamburger-menu">
                    <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)">
                        <i class="sl-icon-menu"></i>
                    </a>
                </li>
                <li class="nav-item main-hamburger-menu">
                    <a class="nav-link sidebartoggler hidden-sm-down waves-effect waves-dark update-user-ux-preferences"
                        data-type="leftmenu" data-progress-bar="hidden" data-url=""
                        data-url-temp="<?php echo e(url('/')); ?>/<?php echo e(auth()->user()->team_or_contact); ?>/updatepreferences"
                        data-preference-type="leftmenu" href="javascript:void(0)">
                        <i class="sl-icon-menu"></i>
                    </a>
                </li>
                <?php endif; ?>


                <!--left menu toogle (hamburger menu) - settings section -->
                <?php if(request('visibility_settings_left_menu_toggle_button') == 'visible'): ?>
                <li class="nav-item settings-hamburger-menu hidden">
                    <a class="nav-link waves-effect waves-dark js-toggle-settings-menu" href="javascript:void(0)">
                        <i class="sl-icon-menu"></i>
                    </a>
                </li>
                <?php endif; ?>

                <!--timer-->
                <?php if(auth()->user()->is_team): ?>
                <li class="nav-item dropdown hidden-xs-down my-timer-container <?php echo e(runtimeVisibility('topnav-timer', request('show_users_running_timer'))); ?>"
                    id="my-timer-container-topnav">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="javascript:void(0)"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="timer-container"><i class="ti-timer font-18"></i>
                            <span class="my-timer-time-topnav"
                                id="my-timer-time-topnav"><?php echo clean(runtimeSecondsHumanReadable(request('users_running_timer'),
                                false)); ?></span></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-left">
                        <div class="active-timer-topnav">
                            <div class="x-heading"><?php echo app('translator')->get('lang.active_timer'); ?></div>
                            <?php if(request('users_running_timer_task')): ?>
                            <div class="x-task">
                                <a
                                    href="<?php echo e(urlResource('/tasks/v/'.request('users_running_timer_task_id').'/'.str_slug(request('users_running_timer_task_title')))); ?>">
                                    <?php echo e(str_limit(request('users_running_timer_task_title'), 100)); ?></a>
                                <!--polling trigger-->
                                <?php if(Auth::user() && auth()->user()->is_team && env('APP_DEBUG_TOOLBAR') === false): ?>
                                <span class="hidden" id="js-trigger-topnav-timer"
                                    data-progress-bar='hidden' data-notifications="disabled"
                                    data-skip-checkboxes-reset="TRUE" data-url="<?php echo e(url('/polling/timer')); ?>"></span>
                                <?php endif; ?>
                            </div>

                            <div class="x-button">


                                <!--stoptimer-->
                                <button type="button" id="my-timer-time-topnav-stop-button"
                                    class="btn waves-effect waves-light btn-sm btn-danger js-timer-button js-ajax-request"
                                    data-url="<?php echo e(url('tasks/timer/'.request('users_running_timer_task_id').'/stop?source=topnav')); ?>"
                                    data-form-id="tasks-list-table"
                                    data-progress-bar='hidden'><?php echo app('translator')->get('lang.stop_timer'); ?></button>
                            </div>
                            <?php else: ?>
                            <div class="x-task"><?php echo app('translator')->get('lang.task_not_found'); ?></div>
                            <div class="x-button"><button type="button"
                                    class="btn waves-effect waves-light btn-sm btn-danger js-timer-button js-ajax-request timer-stop-button"
                                    data-url="<?php echo e(url('tasks/timer/stop?source=topnav')); ?>"
                                    data-form-id="tasks-list-table"
                                    data-progress-bar='hidden'><?php echo app('translator')->get('lang.stop_timer'); ?></button>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </li>
                <?php endif; ?>



                <!--[UPCOMING] search icon-->
                <li class="nav-item hidden-xs-down search-box hidden">
                    <a class="nav-link hidden-sm-down waves-effect waves-dark" href="javascript:void(0)">
                        <i class="icon-Magnifi-Glass2"></i>
                    </a>
                    <form class="app-search">
                        <input type="text" class="form-control" placeholder="Search & enter">
                        <a class="srh-btn">
                            <i class="ti-close"></i>
                        </a>
                    </form>
                </li>
            </ul>


            <!--RIGHT SIDE-->
            <ul class="navbar-nav navbar-top-right my-lg-0" id="right-topnav-navbar">

                

                

                <!-- profile -->
                <li class="nav-item dropdown u-pro">
                    <a class="nav-link dropdown-toggle p-l-20 p-r-20 waves-dark profile-pic" href="javascript:void(0)"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?php echo e(auth()->user()->avatar); ?>" id="topnav_avatar" alt="user" class="" />
                        <span class="hidden-md-down" id="topnav_username"><?php echo e(auth()->user()->first_name); ?>

                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right animated flipInY">
                        <ul class="dropdown-user">
                            <li>
                                <div class="dw-user-box">
                                    <div class="u-img"><img src="<?php echo e(auth()->user()->avatar); ?>"
                                            id="topnav_dropdown_avatar" alt="user"></div>
                                    <div class="u-text">
                                        <h4 id="topnav_dropdown_full_name"><?php echo e(auth()->user()->first_name); ?>

                                            <?php echo e(auth()->user()->last_name); ?></h4>
                                        <p class="text-muted" id="topnav_dropdown_email"><?php echo e(auth()->user()->email); ?></p>
                                        <a href="javascript:void(0)"
                                            class="btn btn-rounded btn-danger btn-sm edit-add-modal-button js-ajax-ux-request reset-target-modal-form"
                                            data-toggle="modal" data-target="#commonModal"
                                            data-url="<?php echo e(url('/user/avatar')); ?>" data-loading-target="commonModalBody"
                                            data-modal-size="modal-sm"
                                            data-modal-title="<?php echo e(cleanLang(__('lang.update_avatar'))); ?>"
                                            data-header-visibility="hidden" data-header-extra-close-icon="visible"
                                            data-action-url="<?php echo e(url('/user/avatar')); ?>"
                                            data-action-method="PUT"><?php echo e(cleanLang(__('lang.update_avatar'))); ?></a>
                                    </div>
                                </div>
                            </li>
                            <li role="separator" class="divider"></li>
                            <!--my profile-->
                            <li>
                                <a href="javascript:void(0)"
                                    class="edit-add-modal-button js-ajax-ux-request reset-target-modal-form"
                                    data-toggle="modal" data-target="#commonModal"
                                    data-url="<?php echo e(url('/contacts/'.auth()->id().'/edit?type=profile')); ?>"
                                    data-loading-target="commonModalBody"
                                    data-modal-title="<?php echo e(cleanLang(__('lang.update_my_profile'))); ?>"
                                    data-action-url="<?php echo e(url('/contacts/'.auth()->id())); ?>" data-action-method="PUT"
                                    data-action-ajax-class="" data-modal-size="modal-lg"
                                    data-action-ajax-loading-target="team-td-container">
                                    <i class="ti-user p-r-4"></i>
                                    <?php echo e(cleanLang(__('lang.update_my_profile'))); ?></a>
                            </li>

                            <!--my timesheets-->
                            <?php if(auth()->user()->is_team && auth()->user()->role->role_timesheets >= 1): ?>
                            <li>
                                <a href="<?php echo e(url('/timesheets/my')); ?>">
                                    <i class="ti-timer p-r-4"></i>
                                    <?php echo e(cleanLang(__('lang.my_time_sheets'))); ?></a>
                            </li>
                            <?php endif; ?>

                            <?php if(auth()->user()->is_client_owner): ?>
                            <!--edit company profile-->
                            <li>
                                <a href="javascript:void(0)"
                                    class="edit-add-modal-button js-ajax-ux-request reset-target-modal-form"
                                    data-toggle="modal" data-target="#commonModal"
                                    data-url="<?php echo e(url('/clients/'.auth()->user()->clientid.'/edit')); ?>"
                                    data-loading-target="commonModalBody"
                                    data-modal-title="<?php echo e(cleanLang(__('lang.company_details'))); ?>"
                                    data-action-url="<?php echo e(url('/clients/'.auth()->user()->clientid)); ?>"
                                    data-action-method="PUT">
                                    <i class="ti-pencil-alt p-r-4"></i>
                                    <?php echo e(cleanLang(__('lang.company_details'))); ?></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"
                                    class="edit-add-modal-button js-ajax-ux-request reset-target-modal-form"
                                    data-toggle="modal" data-target="#commonModal" data-url="<?php echo e(url('/clients/logo')); ?>"
                                    data-loading-target="commonModalBody" data-modal-size="modal-sm"
                                    data-modal-title="<?php echo e(cleanLang(__('lang.update_avatar'))); ?>"
                                    data-header-visibility="hidden" data-header-extra-close-icon="visible"
                                    data-action-url="<?php echo e(url('/clients/logo')); ?>" data-action-method="PUT">
                                    <i class="ti-pencil-alt p-r-4"></i>
                                    <?php echo e(cleanLang(__('lang.company_logo'))); ?></a>
                            </li>
                            <?php endif; ?>

                            <!--update notifcations-->
                            <li>
                                <a href="javascript:void(0)" id="topnavUpdateNotificationsButton"
                                    class="edit-add-modal-button js-ajax-ux-request reset-target-modal-form"
                                    data-toggle="modal" data-target="#commonModal"
                                    data-url="<?php echo e(url('user/updatenotifications')); ?>"
                                    data-loading-target="commonModalBody"
                                    data-modal-title="<?php echo e(cleanLang(__('lang.notification_settings'))); ?>"
                                    data-action-url="<?php echo e(url('user/updatenotifications')); ?>" data-action-method="PUT"
                                    data-modal-size="modal-lg" data-form-design="form-material"
                                    data-header-visibility="hidden" data-header-extra-close-icon="visible"
                                    data-action-ajax-class="js-ajax-ux-request"
                                    data-action-ajax-loading-target="commonModalBody">
                                    <i class="sl-icon-bell p-r-4"></i>
                                    <?php echo e(cleanLang(__('lang.notification_settings'))); ?></a>
                            </li>

                            <!--update password-->
                            <li>
                                <a href="javascript:void(0)" id="topnavUpdatePasswordButton"
                                    class="edit-add-modal-button js-ajax-ux-request reset-target-modal-form"
                                    data-toggle="modal" data-target="#commonModal"
                                    data-url="<?php echo e(url('user/updatepassword')); ?>" data-loading-target="commonModalBody"
                                    data-modal-title="<?php echo e(cleanLang(__('lang.update_password'))); ?>"
                                    data-action-url="<?php echo e(url('user/updatepassword')); ?>" data-action-method="PUT"
                                    data-action-ajax-class="" data-modal-size="modal-sm"
                                    data-form-design="form-material" data-header-visibility="hidden"
                                    data-header-extra-close-icon="visible"
                                    data-action-ajax-loading-target="commonModalBody">
                                    <i class="ti-lock p-r-4"></i>
                                    <?php echo e(cleanLang(__('lang.update_password'))); ?></a>
                            </li>

                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="/logout">
                                    <i class="fa fa-power-off p-r-4"></i> <?php echo e(cleanLang(__('lang.logout'))); ?></a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- /#profile -->
            </ul>
        </div>
    </nav>


</header><?php /**PATH /www/wwwroot/fernando.sngcr.com/application/resources/views/nav/topnav.blade.php ENDPATH**/ ?>