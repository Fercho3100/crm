<?php

/** --------------------------------------------------------------------------------
 * This middleware class handles [create] precheck processes for projects
 *
 * @package    CRM
 * @author     Fernando Aguilar Madriz- Jeffrey S.S-Derian
 *----------------------------------------------------------------------------------*/

namespace App\Http\Middleware\Projects;
use Closure;
use Log;

class Create {

    /**
     * This middleware does the following:
     *   1. checks users permissions to [create] a new resource
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        //frontend
        $this->fronteEnd();

        //does user have permission to create a new project
        if (auth()->user()->is_team) {
            if (auth()->user()->role->role_projects >= 2) {
                //permission granted
                return $next($request);
            }
        }

        //permission denied
        Log::error("permission denied", ['process' => '[permissions][projects][create]', 'ref' => config('app.debug_ref'), 'function' => __function__, 'file' => basename(__FILE__), 'line' => __line__, 'path' => __file__]);
        abort(403);
    }

    /*
     * various frontend and visibility settings
     */
    private function fronteEnd() {

        //defaults
        config([
            'visibility.project_modal_client_fields' => true,
            'visibility.project_show_project_option' => true,
        ]);

        //assigning a project and setting its manager
        if (auth()->user()->role->role_assign_projects == 'yes') {
            config(['visibility.project_modal_assign_fields' => true]);
        } else {
            //assign only to current user and also make manager
            request()->merge([
                'assigned' => [auth()->id()],
                'manager' => auth()->id(),
            ]);
        }

        //set project permissions
        if (auth()->user()->role->role_set_project_permissions == 'yes') {
            config(['visibility.project_modal_project_permissions' => true]);
        }

        //client resource
        if (request('projectresource_type') == 'client') {
            if ($client = \App\Models\Client::Where('client_id', request('projectresource_id'))->first()) {

                //hide some form fields
                config(['visibility.project_modal_client_fields' => false]);

                //required form data
                request()->merge([
                    'project_clientid' => request('projectresource_id'),
                ]);

            } else {
                //error not found
                Log::error("the resource project could not be found", ['process' => '[permissions][projects][create]', 'ref' => config('app.debug_ref'), 'function' => __function__, 'file' => basename(__FILE__), 'line' => __line__, 'path' => __file__]);
                abort(404);
            }
        }

    }
}
