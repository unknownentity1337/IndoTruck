<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Owner;

class ExpiredOwner
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
        $id = auth()->user()->id;
        $owner = Owner::where('user_id', $id)->first();
        if ($owner) {
            if ($owner->expired_at < now()) {
                return redirect()->route('expired');
            }
            return $next($request);
        }
        return redirect()->route('not-active');
    }
}