<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRecipePostRequest;
use App\Http\Requests\EditRecipePostRequest;
use App\Models\Recipe;
use App\Models\Step;
use \Illuminate\Contracts\View\View;
use \Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RecipesController extends Controller
{
    
    /**
     * Display all recipes related to connected user
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
    
    /**
     * Display a recipe and related steps
     *
     * @param  int $id
     * @return View|Factory
     */
    public function showOne(int $id): View|Factory {
        $recipe = Recipe::findOrFail($id);
        $steps = Step::all()->where('fk_recipes_id', $recipe->id);

        $data = [
            'recipe' => $recipe,
            'steps' => $steps,
        ];

        return view('recipes.showOne', $data);
    }

    /**
     * Display create recipe page
     *
     * @return View|Factory
     */
    public function create(): View|Factory {
        return view('recipes.create');
    }
    
    public function createPost(CreateRecipePostRequest $request) {
        $validated = $request->validated();
        $imagePath = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $imageName = time() . '_' . $image->getClientOriginalName();

            $image->move(public_path('images'), $imageName);

            $imagePath = 'images/' . $imageName;
        }

        $recipe = new Recipe();

        $recipe->fk_users_id = auth()->id();
        $recipe->title = $validated['title'];
        $recipe->description = $validated['description'];
        $recipe->image = $imagePath;

        $recipe->save();

        return redirect('recipes')->with('success', 'Recipe created successfully!');
    }

    /**
     * Display edit recipe page
     *
     * @return View|Factory
     */
    public function edit(int $id): View|Factory {
        $recipe = Recipe::find($id);

        $data['recipe'] = $recipe;

        return view('recipes.edit', $data);
    }

        
    /**
     * Edit a recipe
     *
     * @param  mixed $id
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function editPost(int $id, EditRecipePostRequest $request): RedirectResponse {
        $validated = $request->validated();
        $recipe = Recipe::find($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $imageName = time() . '_' . $image->getClientOriginalName();

            $image->move(public_path('images'), $imageName);

            $imagePath = 'images/' . $imageName;

            if ($recipe->image) {
                $oldImagePath = public_path($recipe->image);

                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $recipe->image = $imagePath;
        }

        $recipe->fk_users_id = auth()->id();
        $recipe->title = $validated['title'];
        $recipe->description = $validated['description'];

        $recipe->save();

        return redirect("recipes/$id")->with('success', 'Recipe updated successfully!');
    }
 
    /**
     * Display delete page
     *
     * @param  int $id
     * @return View|Factory
     */
    public function delete(int $id): View|Factory {
        $recipe = Recipe::find($id);

        $data['recipe'] = $recipe;

        return view('recipes.delete', $data);
    }
    
    /**
     * Delete a recipe
     *
     * @param  int $id
     * @param  Request $request
     * @return RedirectResponse
     */
    public function deletePost(int $id, Request $request): RedirectResponse {
        $recipe = Recipe::find($id);
        $stepsIds = Step::where('fk_recipes_id', $id)->pluck('id');

        if ($request->has('btn_delete_recipe')) {
            if ($recipe->image) {
                $oldImagePath = public_path($recipe->image);

                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            if (!empty($stepsIds)) {
                Step::destroy($stepsIds);
            }

            $recipe->delete();
        }
        
        return redirect('recipes')->with('success', 'Recipe deleted successfully!');
    }
}
