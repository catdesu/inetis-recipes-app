<?php

namespace App\Http\Middleware;

use App\Models\Step;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckStepOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $step = Step::find($request->route('id'));

        if (!$step || $step->recipe->fk_users_id !== auth()->id()) {
            return redirect('recipes')->with('error', 'Unauthorized access to this step.');
        }

        return $next($request);
    }
}
