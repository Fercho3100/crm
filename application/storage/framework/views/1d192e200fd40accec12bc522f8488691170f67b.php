                <!-- Nav tabs -->
                <ul class="nav nav-tabs profile-tab" role="tablist">
                    <!--timeline-->
                    <li class="nav-item">
                        <a class="nav-link  tabs-menu-item <?php echo e($page['tabmenu_timeline'] ?? ''); ?>"
                            href="<?php echo e(url('clients')); ?>/<?php echo e($client->client_id); ?>" role="tab"><?php echo e(cleanLang(__('lang.timeline'))); ?></a>
                    </li>
                    <!--contacts-->
                    <li class="nav-item">
                        <a class="nav-link  tabs-menu-item js-dynamic-url js-ajax-ux-request <?php echo e($page['tabmenu_contacts'] ?? ''); ?>"
                            data-toggle="tab" data-loading-class="loading-tabs" data-loading-target="embed-content-container" id="tabs-menu-contacts"
                            data-dynamic-url="<?php echo e(url('clients')); ?>/<?php echo e($client->client_id); ?>/contacts"
                            data-url="<?php echo e(url('/contacts')); ?>?contactresource_type=client&contactresource_id=<?php echo e($client->client_id); ?>&source=ext&page=1"
                            href="#clients_ajaxtab" role="tab"><?php echo e(cleanLang(__('lang.users'))); ?></a>
                    </li>
                    <!--projects-->
                    <li class="nav-item">
                        <a class="nav-link tabs-menu-item js-dynamic-url js-ajax-ux-request <?php echo e($page['tabmenu_projects'] ?? ''); ?>"
                            data-toggle="tab" data-loading-class="loading-tabs" id="tabs-menu-projects" data-loading-target="embed-content-container"
                            data-dynamic-url="<?php echo e(_url('clients/'.$client->client_id.'/projects')); ?>"
                            data-url="<?php echo e(url('/projects')); ?>?projectresource_type=client&projectresource_id=<?php echo e($client->client_id); ?>&source=ext&page=1"
                            href="#clients_ajaxtab" role="tab"><?php echo e(cleanLang(__('lang.projects'))); ?></a>
                    </li>
                    
                    
                    <!--contracts-->
                    <li class="nav-item hidden">
                        <a class="nav-link tabs-menu-item js-dynamic-url js-ajax-ux-request <?php echo e($page['tabmenu_projects'] ?? ''); ?>"
                            data-toggle="tab" data-loading-class="loading-tabs" id="tabs-menu-contracts" data-loading-target="embed-content-container"
                            data-dynamic-url="<?php echo e(url('clients')); ?>/<?php echo e($client->client_id); ?>/projects"
                            data-url="<?php echo e(url('/contracts')); ?>?type=client&id=<?php echo e($client->client_id); ?>&source=ext&page=1"
                            href="#clients_ajaxtab" role="tab"><?php echo e(cleanLang(__('lang.contracts'))); ?></a>
                    </li>
                    <!--billing-->
                    <li class="nav-item dropdown <?php echo e($page['tabmenu_financial'] ?? ''); ?>">
                        <a class="nav-link dropdown-toggle tabs-menu-item tabs-menu-item" data-toggle="dropdown"
                            id="tabs-menu-billing" href="javascript:void(0)" role="button" aria-haspopup="true"
                            id="tabs-menu-billing" aria-expanded="false">
                            <span class="hidden-xs-down"><?php echo e(cleanLang(__('lang.financial'))); ?></span>
                        </a>
                        <div class="dropdown-menu" x-placement="bottom-start" id="fx-client-misc-topnave-billing">
                            <!--[invoices]-->
                            <a class="dropdown-item js-dynamic-url  js-ajax-ux-request <?php echo e($page['tabmenu_invoices'] ?? ''); ?>"
                                data-toggle="tab" data-loading-class="loading-tabs" data-loading-target="embed-content-container"
                                data-dynamic-url="<?php echo e(url('/clients')); ?>/<?php echo e($client->client_id); ?>/invoices"
                                data-url="<?php echo e(url('/invoices')); ?>?source=ext&page=1&invoiceresource_id=<?php echo e($client->client_id); ?>&invoiceresource_type=client"
                                href="#projects_ajaxtab" role="tab"><?php echo e(cleanLang(__('lang.invoices'))); ?></a>
                           
                            <!--[expenses]-->
                            <a class="dropdown-item js-dynamic-url  js-ajax-ux-request <?php echo e($page['tabmenu_invoices'] ?? ''); ?>"
                                data-toggle="tab" data-loading-class="loading-tabs" data-loading-target="embed-content-container"
                                data-dynamic-url="<?php echo e(url('/clients')); ?>/<?php echo e($client->client_id); ?>/expenses"
                                data-url="<?php echo e(url('/expenses')); ?>?source=ext&page=1&expenseresource_id=<?php echo e($client->client_id); ?>&expenseresource_type=client"
                                href="#projects_ajaxtab" role="tab"><?php echo e(cleanLang(__('lang.expenses'))); ?></a>
                           
                        </div>
                    </li>

                    

                </ul><?php /**PATH /www/wwwroot/fernando.sngcr.com/application/resources/views/pages/client/components/misc/topnav.blade.php ENDPATH**/ ?>