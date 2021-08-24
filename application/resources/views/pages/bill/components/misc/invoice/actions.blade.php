<!--CRUMBS CONTAINER (RIGHT)-->
<div class="col-md-12  col-lg-5 align-self-center text-right p-b-9 {{ $page['list_page_actions_size'] ?? '' }} {{ $page['list_page_container_class'] ?? '' }}"
    id="list-page-actions-container">
    <div id="list-page-actions">
        @if(auth()->user()->is_team && auth()->user()->role->role_invoices >= 2)
        @if($bill->bill_status == 'draft')
        <!--publish-->
        <button type="button" data-toggle="tooltip" title="{{ cleanLang(__('lang.publish_invoice')) }}"
            class="list-actions-button btn btn-page-actions waves-effect waves-dark confirm-action-info"
            href="javascript:void(0)" data-confirm-title="{{ cleanLang(__('lang.publish_invoice')) }}"
            data-confirm-text="{{ cleanLang(__('lang.the_invoice_will_be_sent_to_customer')) }}"
            data-url="{{ urlResource('/invoices/'.$bill->bill_invoiceid.'/publish') }}"
            id="invoice-action-publish-invoice"><i class="sl-icon-share-alt"></i></button>
        @endif
        <!--email invoice-->
        <button type="button" data-toggle="tooltip" title="{{ cleanLang(__('lang.send_email')) }}"
            class="list-actions-button btn btn-page-actions waves-effect waves-dark confirm-action-info"
            href="javascript:void(0)" data-confirm-title="{{ cleanLang(__('lang.send_email')) }}"
            data-confirm-text="{{ cleanLang(__('lang.confirm')) }}"
            data-url="{{ urlResource('/invoices/'.$bill->bill_invoiceid.'/resend') }}"
            id="invoice-action-email-invoice"><i class="ti-email"></i></button>
        
        
        
    
       
        <!--delete-->
        <button type="button" data-toggle="tooltip" title="{{ cleanLang(__('lang.delete_invoice')) }}"
            class="list-actions-button btn btn-page-actions waves-effect waves-dark confirm-action-danger"
            data-confirm-title="{{ cleanLang(__('lang.delete_invoice')) }}" data-confirm-text="{{ cleanLang(__('lang.are_you_sure')) }}"
            data-ajax-type="DELETE" data-url="{{ url('/') }}/invoices/{{ $bill->bill_invoiceid }}?source=page"><i
                class="sl-icon-trash"></i></button>

        @endif

        <!--Download PDF-->
        <a data-toggle="tooltip" title="{{ cleanLang(__('lang.download')) }}" id="invoiceDownloadButton"
            href="{{ url('/invoices/'.$bill->bill_invoiceid.'/pdf') }}"
            class="list-actions-button btn btn-page-actions waves-effect waves-dark" download>
            <i class="mdi mdi-download"></i>
        </a>

    </div>
</div>