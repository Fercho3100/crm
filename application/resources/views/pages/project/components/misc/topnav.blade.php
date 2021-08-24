<div class="row">
    <div class="col-lg-12">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs profile-tab project-top-nav list-pages-crumbs" role="tablist">
            <!--overview-->
            <li class="nav-item">
                <a class="nav-link tabs-menu-item" href="/projects/{{ $project->project_id }}" role="tab"
                    id="tabs-menu-overview">{{ cleanLang(__('lang.overview')) }}</a>
            </li>
            <!--details-->
            <li class="nav-item">
                <a class="nav-link tabs-menu-item   js-dynamic-url js-ajax-ux-request" data-toggle="tab"
                    id="tabs-menu-details" data-loading-class="loading-tabs"
                    data-loading-target="embed-content-container"
                    data-dynamic-url="{{ _url('/projects') }}/{{ $project->project_id }}/details"
                    data-url="{{ _url('/projects') }}/{{ $project->project_id }}/project-details"
                    href="#projects_ajaxtab" role="tab">{{ cleanLang(__('lang.details')) }}</a>
            </li>
           
            <!--[comments]-->
            @if(config('settings.project_permissions_view_comments'))
            <li class="nav-item ">
                <a class="nav-link  tabs-menu-item   js-dynamic-url js-ajax-ux-request {{ $page['tabmenu_discussions'] ?? '' }}"
                    id="tabs-menu-comments" data-toggle="tab" data-loading-class="loading-tabs"
                    data-loading-target="embed-content-container"
                    data-dynamic-url="{{ _url('/projects') }}/{{ $project->project_id }}/comments"
                    data-url="{{ url('/comments') }}?source=ext&commentresource_type=project&commentresource_id={{ $project->project_id }}"
                    href="#projects_ajaxtab" role="tab">{{ cleanLang(__('lang.comments')) }}</a>
            </li>
            @endif
            
            <!--notes-->
            @if(config('settings.project_permissions_view_notes'))
            <li class="nav-item ">
                <a class="nav-link  tabs-menu-item   js-dynamic-url js-ajax-ux-request {{ $page['tabmenu_notes'] ?? '' }}"
                    id="tabs-menu-notes" data-toggle="tab" data-loading-class="loading-tabs"
                    data-loading-target="embed-content-container"
                    data-dynamic-url="{{ _url('/projects') }}/{{ $project->project_id }}/notes"
                    data-url="{{ url('/notes') }}?source=ext&noteresource_type=project&noteresource_id={{ $project->project_id }}"
                    href="#projects_ajaxtab" role="tab">{{ cleanLang(__('lang.notes')) }}</a>
            </li>
            @endif
            <!--billing-->
            @if(auth()->user()->is_team || auth()->user()->is_client_owner)
            <li class="nav-item dropdown {{ $page['tabmenu_more'] ?? '' }}">
                <a class="nav-link dropdown-toggle  tabs-menu-item" data-loading-class="loading-tabs"
                    data-toggle="dropdown" href="javascript:void(0)" role="button" aria-haspopup="true"
                    id="tabs-menu-billing" aria-expanded="false">
                    <span class="hidden-xs-down">{{ cleanLang(__('lang.financial')) }}</span>
                </a>
                <div class="dropdown-menu" x-placement="bottom-start" id="fx-topnav-dropdown">
                    <!--[invoices]-->
                    @if(config('settings.project_permissions_view_invoices'))
                    <a class="dropdown-item   js-dynamic-url js-ajax-ux-request {{ $page['tabmenu_invoices'] ?? '' }}"
                        data-toggle="tab" data-loading-class="loading-tabs"
                        data-loading-target="embed-content-container"
                        data-dynamic-url="{{ _url('/projects') }}/{{ $project->project_id }}/invoices"
                        data-url="{{ url('/invoices') }}?source=ext&invoiceresource_id={{ $project->project_id }}&invoiceresource_type=project"
                        href="#projects_ajaxtab" role="tab">{{ cleanLang(__('lang.invoices')) }}</a>
                    @endif
                   
                    
                    <!--[payments]-->
                    @if(config('settings.project_permissions_view_payments'))
                    <a class="dropdown-item   js-dynamic-url js-ajax-ux-request {{ $page['tabmenu_invoices'] ?? '' }}"
                        data-toggle="tab" data-loading-class="loading-tabs"
                        data-loading-target="embed-content-container"
                        data-dynamic-url="{{ _url('/projects') }}/{{ $project->project_id }}/payments"
                        data-url="{{ url('/payments') }}?source=ext&paymentresource_id={{ $project->project_id }}&paymentresource_type=project"
                        href="#projects_ajaxtab" role="tab">{{ cleanLang(__('lang.payments')) }}</a>
                    @endif
                    <!--[expenses]-->
                    @if(config('settings.project_permissions_view_expenses'))
                    <a class="dropdown-item   js-dynamic-url js-ajax-ux-request {{ $page['tabmenu_invoices'] ?? '' }}"
                        data-toggle="tab" data-loading-class="loading-tabs"
                        data-loading-target="embed-content-container"
                        data-dynamic-url="{{ _url('/projects') }}/{{ $project->project_id }}/expenses"
                        data-url="{{ url('/expenses') }}?source=ext&expenseresource_id={{ $project->project_id }}&expenseresource_type=project"
                        href="#projects_ajaxtab" role="tab">{{ cleanLang(__('lang.expenses')) }}</a>
                    @endif
                    <!--[timesheets]-->
                   
                </div>
            </li>
            @endif
        </ul>
        <!-- Tab panes -->

        @include('pages.files.components.actions.checkbox-actions')

    </div>
</div>