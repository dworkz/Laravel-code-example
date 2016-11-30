<?php namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckAccess {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $controller = '')
    {
        // todo получать название контролера

        if($request->user()->is_admin > 0)
        {
            return $next($request);
        }

        $roles = $this->getRequiredRoleForRoute($request->route());
        $allow = json_decode($request->user()->access, TRUE);

        if(isset($allow[$controller]))
        {
            foreach($roles AS $role)
            {
                if(isset($allow[$controller][$role]) AND $allow[$controller][$role] > 0)
                {
                    return $next($request);
                }
            }
        }

        return redirect()->back()->with(['message' => 'Нет прав доступа.']);
    }

    private function getRequiredRoleForRoute($route)
    {
        $actions = $route->getAction();
        return isset($actions['access']) ? $actions['access'] : null;
    }
}
