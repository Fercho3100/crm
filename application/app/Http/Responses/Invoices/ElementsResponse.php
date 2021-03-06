<?php

/** --------------------------------------------------------------------------------
 * This classes renders the response for the [elements] process for the invoices
 * controller
 * @package    CRM
 * @author     Fernando Aguilar Madriz- Jeffrey S.S-Derian
 *----------------------------------------------------------------------------------*/

namespace App\Http\Responses\Invoices;
use Illuminate\Contracts\Support\Responsable;

class ElementsResponse implements Responsable {

    private $payload;

    public function __construct($payload = array()) {
        $this->payload = $payload;
    }

    /**
     * render the view
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function toResponse($request) {

        //set all data to arrays
        foreach ($this->payload as $key => $value) {
            $$key = $value;
        }

        //return rendered txt popover element
        if ($type == 'tax-popover') {
            $view =  view('pages/bill/components/elements/taxpopover', compact('invoice', 'taxrates'))->render();
        }

    }

}
