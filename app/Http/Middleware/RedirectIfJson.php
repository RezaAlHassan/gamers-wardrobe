<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectIfJson
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if ($response->headers->get('Content-Type') === 'application/json') {
            $data = json_decode($response->getContent(), true);

            // Check for a "redirect" key in the JSON response
            if (isset($data['redirect'])) {
                return redirect($data['redirect']);
            }
        }

        return $response;
    }
}
