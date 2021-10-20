<?php

namespace App\Http\Middleware;

use App\Models\Setting\Website;
use Closure;
use Illuminate\Http\Request;

class Maintenance
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $data = Website::find(1);
        if ($data->maintenance == True) {
            return response()->view('page.maintenance');
        }
        return $next($request);
    }
}
