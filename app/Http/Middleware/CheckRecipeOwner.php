<?php

namespace App\Http\Middleware;

use App\Models\Recipe;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRecipeOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $recipe = Recipe::find($request->route('id'));

        if (!$recipe || $recipe->fk_users_id !== auth()->id()) {
            return redirect('recipes')->with('error', 'Unauthorized access to this recipe.');
        }

        return $next($request);
    }
}
