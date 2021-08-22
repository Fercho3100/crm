<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" id="js-trigger-nav-team">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" id="main-scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav" id="main-sidenav">
            <ul id="sidebarnav">



                <!--home-->
                <li class="sidenav-menu-item {{ $page['mainmenu_home'] ?? '' }} menu-tooltip menu-with-tooltip"
                    title="{{ cleanLang(__('lang.home')) }}">
                    <a class="waves-effect waves-dark" href="/home" aria-expanded="false" target="_self">
                        <i class="ti-home"></i>
                        <span class="hide-menu">{{ cleanLang(__('lang.dashboard')) }}
                        </span>
                    </a>
                </li>
                <!--home-->


                <!--users-->
                @if(auth()->user()->role->role_clients >= 1 || auth()->user()->role->role_contacts >= 1)
                <li class="sidenav-menu-item {{ $page['mainmenu_customers'] ?? '' }}">
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false">
                        <i class="sl-icon-people"></i>
                        <span class="hide-menu">{{ cleanLang(__('lang.customers')) }}
                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        @if(auth()->user()->role->role_clients >= 1)
                        <li class="sidenav-submenu {{ $page['submenu_customers'] ?? '' }}" id="submenu_clients">
                            <a href="/clients"
                                class="{{ $page['submenu_customers'] ?? '' }}">{{ cleanLang(__('lang.clients')) }}</a>
                        </li>
                        @endif
                        @if(auth()->user()->role->role_contacts >= 1)
                        <li class="sidenav-submenu {{ $page['submenu_contacts'] ?? '' }}" id="submenu_contacts">
                            <a href="/users"
                                class="{{ $page['submenu_contacts'] ?? '' }}">{{ cleanLang(__('lang.client_users')) }}</a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif
                <!--customers-->

                <!--projects-->
                @if(auth()->user()->role->role_projects >= 1)
                <li class="sidenav-menu-item {{ $page['mainmenu_projects'] ?? '' }}">
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false">
                        <i class="ti-folder"></i>
                        <span class="hide-menu">{{ cleanLang(__('lang.projects')) }}
                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        @if(auth()->user()->role->role_clients >= 1)
                        <li class="sidenav-submenu {{ $page['submenu_customers'] ?? '' }}" id="submenu_projects">
                            <a href="{{ _url('/projects') }}"
                                class="{{ $page['submenu_projects'] ?? '' }}">{{ cleanLang(__('lang.projects')) }}</a>
                        </li>
                        @endif
                        @if(auth()->user()->role->role_contacts >= 1)
                        <li class="sidenav-submenu {{ $page['submenu_contacts'] ?? '' }}" id="submenu_project_templates">
                            <a href="{{ _url('/templates/projects') }}"
                                class="{{ $page['submenu_templates'] ?? '' }}">{{ cleanLang(__('lang.templates')) }}</a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif
                <!--projects-->


                

                <!--billing-->
                @if(auth()->user()->role->role_invoices >= 1 || auth()->user()->role->role_estimates >= 1 ||
                auth()->user()->role->role_items >= 1 ||
                auth()->user()->role->role_expenses >= 1)
                <li class="sidenav-menu-item {{ $page['mainmenu_sales'] ?? '' }}">
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0);" aria-expanded="false">
                        <i class="ti-wallet"></i>
                        <span class="hide-menu">{{ cleanLang(__('lang.sales')) }}
                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        @if(auth()->user()->role->role_invoices >= 1)
                        <li class="sidenav-submenu {{ $page['submenu_invoices'] ?? '' }}" id="submenu_invoices">
                            <a href="/invoices"
                                class=" {{ $page['submenu_invoices'] ?? '' }}">{{ cleanLang(__('lang.invoices')) }}</a>
                        </li>
                        @endif
                        @if(auth()->user()->role->role_invoices >= 1)
                        <li class="sidenav-submenu {{ $page['submenu_payments'] ?? '' }}" id="submenu_payments">
                            <a href="/payments"
                                class=" {{ $page['submenu_payments'] ?? '' }}">{{ cleanLang(__('lang.payments')) }}</a>
                        </li>
                        @endif
                        @if(auth()->user()->role->role_estimates >= 1)
                        <li class="sidenav-submenu {{ $page['submenu_estimates'] ?? '' }}" id="submenu_estimates">
                            <a href="/estimates"
                                class=" {{ $page['submenu_estimates'] ?? '' }}">{{ cleanLang(__('lang.estimates')) }}</a>
                        </li>
                        @endif
                        @if(auth()->user()->role->role_items >= 1)
                        <li class="sidenav-submenu {{ $page['submenu_products'] ?? '' }}" id="submenu_products">
                            <a href="/products"
                                class=" {{ $page['submenu_products'] ?? '' }}">{{ cleanLang(__('lang.products')) }}</a>
                        </li>
                        @endif
                        @if(auth()->user()->role->role_expenses >= 1)
                        <li class="sidenav-submenu {{ $page['submenu_expenses'] ?? '' }}" id="submenu_expenses">
                            <a href="/expenses"
                                class=" {{ $page['submenu_expenses'] ?? '' }}">{{ cleanLang(__('lang.expenses')) }}</a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif
                <!--billing-->





            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>