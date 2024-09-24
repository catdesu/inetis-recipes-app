<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        return view('recipes.list');
    }
}
