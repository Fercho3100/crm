<?php

/** --------------------------------------------------------------------------------
 * This classes renders the response for the [store] process for the estimates
 * controller
 * @package    CRM
 * @author     Fernando Aguilar Madriz- Jeffrey S.S-Derian
 *----------------------------------------------------------------------------------*/

namespace App\Http\Responses\Estimates;
use Illuminate\Contracts\Support\Responsable;

class StoreCloneResponse implements Responsable {

    private $payload;

    public function __construct($payload = array()) {
        $this->payload = $payload;
    }

    /**
     * render the view for estimates
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function toResponse($request) {

        //set all data to arrays
        foreach ($this->payload as $key => $value) {
            $$key = $value;
        }

        
        //redirect to estimate page
        $jsondata['redirect_url'] = url("/estimates/$id");

        //response
        return response()->json($jsondata);
    }

}
