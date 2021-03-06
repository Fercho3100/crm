<?php

/** --------------------------------------------------------------------------------
 * This classes renders the response for the [save] process for the invoices
 * controller
 * @package    CRM
 * @author     Fernando Aguilar Madriz- Jeffrey S.S-Derian
 *----------------------------------------------------------------------------------*/

namespace App\Http\Responses\Invoices;
use Illuminate\Contracts\Support\Responsable;

class SaveResponse implements Responsable {

    private $payload;

    public function __construct($payload = array()) {
        $this->payload = $payload;
    }

    /**
     * render the view for invoices
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function toResponse($request) {

        //set all data to arrays
        foreach ($this->payload as $key => $value) {
            $$key = $value;
        }

        //rediect to invoice
        $jsondata['redirect_url'] = url('invoices/' . $invoice->bill_invoiceid);

        //flash notice
        request()->session()->flash('success-notification', __('lang.request_has_been_completed'));

        //response
        return response()->json($jsondata);

    }

}
