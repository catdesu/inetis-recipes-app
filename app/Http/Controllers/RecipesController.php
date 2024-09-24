<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use \Illuminate\Contracts\View\View;
use \Illuminate\Contracts\View\Factory;

class RecipesController extends Controller
{
    /**
     * Show list of recipes
     *
     * @return View|Factory
     */
    public function showList(): View|Factory {
        $recipes = Recipe::all()->where('fk_users_id', '=', Auth()->id());

        $data = [
            'recipes' => $recipes,
            'userId' => Auth()->id()
        ];

        return view('recipes.list', $data);
    }
}
