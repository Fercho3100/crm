<?php

/** --------------------------------------------------------------------------------
 * This middleware class handles [create] precheck processes for knowledgebase
 *
 * @package    CRM
 * @author     Fernando Aguilar Madriz- Jeffrey S.S-Derian
 *----------------------------------------------------------------------------------*/

namespace App\Http\Middleware\Knowledgebase;
use Closure;
use Log;

class Create {

    /**
     * This middleware does the following
     *   2. checks users permissions to [view] knowledgebases
     *   3. modifies the request object as needed
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        //permission: does user have permission create knowledgebases
        if (auth()->user()->role->role_knowledgebase >= 2) {

            
            return $next($request);
        }
        
        //permission denied
        Log::error("permission denied", ['process' => '[permissions][knowledgebase][create]', 'ref' => config('app.debug_ref'), 'function' => __function__, 'file' => basename(__FILE__), 'line' => __line__, 'path' => __file__]);
        abort(403);
    }
}
