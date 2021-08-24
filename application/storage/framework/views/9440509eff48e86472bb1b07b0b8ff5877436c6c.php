<div class="row">
    <div class="col-lg-12">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs profile-tab project-top-nav list-pages-crumbs" role="tablist">
            <!--overview-->
            <li class="nav-item">
                <a class="nav-link tabs-menu-item" href="/projects/<?php echo e($project->project_id); ?>" role="tab"
                    id="tabs-menu-overview"><?php echo e(cleanLang(__('lang.overview'))); ?></a>
            </li>
            <!--details-->
            <li class="nav-item">
                <a class="nav-link tabs-menu-item   js-dynamic-url js-ajax-ux-request" data-toggle="tab"
                    id="tabs-menu-details" data-loading-class="loading-tabs"
                    data-loading-target="embed-content-container"
                    data-dynamic-url="<?php echo e(_url('/projects')); ?>/<?php echo e($project->project_id); ?>/details"
                    data-url="<?php echo e(_url('/projects')); ?>/<?php echo e($project->project_id); ?>/project-details"
                    href="#projects_ajaxtab" role="tab"><?php echo e(cleanLang(__('lang.details'))); ?></a>
            </li>
           
            <!--[comments]-->
            <?php if(config('settings.project_permissions_view_comments')): ?>
            <li class="nav-item ">
                <a class="nav-link  tabs-menu-item   js-dynamic-url js-ajax-ux-request <?php echo e($page['tabmenu_discussions'] ?? ''); ?>"
                    id="tabs-menu-comments" data-toggle="tab" data-loading-class="loading-tabs"
                    data-loading-target="embed-content-container"
                    data-dynamic-url="<?php echo e(_url('/projects')); ?>/<?php echo e($project->project_id); ?>/comments"
                    data-url="<?php echo e(url('/comments')); ?>?source=ext&commentresource_type=project&commentresource_id=<?php echo e($project->project_id); ?>"
                    href="#projects_ajaxtab" role="tab"><?php echo e(cleanLang(__('lang.comments'))); ?></a>
            </li>
            <?php endif; ?>
            
            <!--notes-->
            <?php if(config('settings.project_permissions_view_notes')): ?>
            <li class="nav-item ">
                <a class="nav-link  tabs-menu-item   js-dynamic-url js-ajax-ux-request <?php echo e($page['tabmenu_notes'] ?? ''); ?>"
                    id="tabs-menu-notes" data-toggle="tab" data-loading-class="loading-tabs"
                    data-loading-target="embed-content-container"
                    data-dynamic-url="<?php echo e(_url('/projects')); ?>/<?php echo e($project->project_id); ?>/notes"
                    data-url="<?php echo e(url('/notes')); ?>?source=ext&noteresource_type=project&noteresource_id=<?php echo e($project->project_id); ?>"
                    href="#projects_ajaxtab" role="tab"><?php echo e(cleanLang(__('lang.notes'))); ?></a>
            </li>
            <?php endif; ?>
            <!--billing-->
            <?php if(auth()->user()->is_team || auth()->user()->is_client_owner): ?>
            <li class="nav-item dropdown <?php echo e($page['tabmenu_more'] ?? ''); ?>">
                <a class="nav-link dropdown-toggle  tabs-menu-item" data-loading-class="loading-tabs"
                    data-toggle="dropdown" href="javascript:void(0)" role="button" aria-haspopup="true"
                    id="tabs-menu-billing" aria-expanded="false">
                    <span class="hidden-xs-down"><?php echo e(cleanLang(__('lang.financial'))); ?></span>
                </a>
                <div class="dropdown-menu" x-placement="bottom-start" id="fx-topnav-dropdown">
                    <!--[invoices]-->
                    <?php if(config('settings.project_permissions_view_invoices')): ?>
                    <a class="dropdown-item   js-dynamic-url js-ajax-ux-request <?php echo e($page['tabmenu_invoices'] ?? ''); ?>"
                        data-toggle="tab" data-loading-class="loading-tabs"
                        data-loading-target="embed-content-container"
                        data-dynamic-url="<?php echo e(_url('/projects')); ?>/<?php echo e($project->project_id); ?>/invoices"
                        data-url="<?php echo e(url('/invoices')); ?>?source=ext&invoiceresource_id=<?php echo e($project->project_id); ?>&invoiceresource_type=project"
                        href="#projects_ajaxtab" role="tab"><?php echo e(cleanLang(__('lang.invoices'))); ?></a>
                    <?php endif; ?>
                   
                    
                    <!--[payments]-->
                    <?php if(config('settings.project_permissions_view_payments')): ?>
                    <a class="dropdown-item   js-dynamic-url js-ajax-ux-request <?php echo e($page['tabmenu_invoices'] ?? ''); ?>"
                        data-toggle="tab" data-loading-class="loading-tabs"
                        data-loading-target="embed-content-container"
                        data-dynamic-url="<?php echo e(_url('/projects')); ?>/<?php echo e($project->project_id); ?>/payments"
                        data-url="<?php echo e(url('/payments')); ?>?source=ext&paymentresource_id=<?php echo e($project->project_id); ?>&paymentresource_type=project"
                        href="#projects_ajaxtab" role="tab"><?php echo e(cleanLang(__('lang.payments'))); ?></a>
                    <?php endif; ?>
                    <!--[expenses]-->
                    <?php if(config('settings.project_permissions_view_expenses')): ?>
                    <a class="dropdown-item   js-dynamic-url js-ajax-ux-request <?php echo e($page['tabmenu_invoices'] ?? ''); ?>"
                        data-toggle="tab" data-loading-class="loading-tabs"
                        data-loading-target="embed-content-container"
                        data-dynamic-url="<?php echo e(_url('/projects')); ?>/<?php echo e($project->project_id); ?>/expenses"
                        data-url="<?php echo e(url('/expenses')); ?>?source=ext&expenseresource_id=<?php echo e($project->project_id); ?>&expenseresource_type=project"
                        href="#projects_ajaxtab" role="tab"><?php echo e(cleanLang(__('lang.expenses'))); ?></a>
                    <?php endif; ?>
                    <!--[timesheets]-->
                   
                </div>
            </li>
            <?php endif; ?>
        </ul>
        <!-- Tab panes -->

        <?php echo $__env->make('pages.files.components.actions.checkbox-actions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </div>
</div><?php /**PATH /www/wwwroot/fernando.sngcr.com/application/resources/views/pages/project/components/misc/topnav.blade.php ENDPATH**/ ?>