<?php

/** --------------------------------------------------------------------------------
 * This repository class manages all the data absctration for predefined responses
 *
 * @package    CRM
 * @author     Fernando Aguilar Madriz- Jeffrey S.S-Derian
 *----------------------------------------------------------------------------------*/

namespace App\Repositories;

use App\Models\Predefined;
use Illuminate\Http\Request;
//use DB;
//use Illuminate\Support\Facades\Schema;

class PredefinedRepository{



    /**
     * The predefined repository instance.
     */
    protected $predefined;

    /**
     * Inject dependecies
     */
    public function __construct(Predefined $predefined) {
        $this->predefined = $predefined;
    }

}