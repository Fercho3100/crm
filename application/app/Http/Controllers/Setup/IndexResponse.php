<?php

/** --------------------------------------------------------------------------------
 * This controller manages the business logic for the setup wizard
 *
 * @package    CRM
 * @author     Fernando Aguilar Madriz- Jeffrey S.S-Derian
 *----------------------------------------------------------------------------------*/

namespace App\Http\Controllers\Setup;
use Illuminate\Contracts\Support\Responsable;

class IndexResponse implements Responsable {

    private $payload;

    public function __construct($payload = array()) {
        $this->payload = $payload;
    }

    /**
     * render the view for setup
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function toResponse($request) {

        //set all data to arrays
        foreach ($this->payload as $key => $value) {
            $$key = $value;
        }

        return view('pages/setup/wrapper', compact('page'))->render();

    }

}
