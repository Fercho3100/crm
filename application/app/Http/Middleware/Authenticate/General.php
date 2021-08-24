<?php

/** --------------------------------------------------------------------------------
 * This middle class handles general precheck processes for authentication
 *
 * @package    CRM
 * @author     Fernando Aguilar Madriz- Jeffrey S.S-Derian
 *----------------------------------------------------------------------------------*/

namespace App\Http\Middleware\Authenticate;
use Closure;
use Log;

class General {

    /**
     * This middleware does the following
     *   1. validates that the foo exists
     *   2. checks users permissions to [view] the foo
     *   3. modifies the request object as needed
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        //frontend
        $this->fronteEnd();

        return $next($request);
    }

    /*
     * various frontend and visibility settings
     */
    private function fronteEnd() {

        //page level javascript
        config(['js.section' => 'authentication']);

    }

}
