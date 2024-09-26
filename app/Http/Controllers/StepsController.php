<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStepPostRequest;
use App\Http\Requests\EditStepPostRequest;
use Illuminate\Http\Request;
use App\Models\Step;
use \Illuminate\Contracts\View\View;
use \Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;

class StepsController extends Controller
{    
    /**
     * Display create step page
     *
     * @param  int $recipeId
     * @return View
     */
    public function create($recipeId): View|Factory {
        $data['recipeId'] = $recipeId;

        return view('steps.create', $data);
    }
    
    /**
     * Create a step
     *
     * @param  int $recipeId
     * @param  CreateStepPostRequest $request
     * @return RedirectResponse
     */
    public function createPost(int $recipeId, CreateStepPostRequest $request): RedirectResponse {
        $validated = $request->validated();
        $step = new Step();

        $step->fk_recipes_id = $recipeId;
        $step->title = $validated['title'];
        $step->description = $validated['description'];
        $step->prep_time = $validated['prep_time'];

        $step->save();

        return redirect("recipes/$recipeId")->with('success', 'Step added successfully!');
    }
        
    /**
     * Display edit step page
     *
     * @param  int $id
     * @return View|Factory
     */
    public function edit(int $id): View|Factory {
        $step = Step::find($id);

        $data['step'] = $step;

        return view('steps.edit', $data);
    }
    
    /**
     * Edit a step
     *
     * @param  int $id
     * @param  EditStepPostRequest $request
     * @return void
     */
    public function editPost(int $id, EditStepPostRequest $request) {
        $validated = $request->validated();
        $step = Step::find($id);

        $step->title = $validated['title'];
        $step->description = $validated['description'];
        $step->prep_time = $validated['prep_time'];

        $step->save();

        return redirect("recipes/$step->fk_recipes_id")->with('success', 'Step updated successfully!');
    }
    
    /**
     * Display delete page
     *
     * @param  int $id
     * @return View|Factory
     */
    public function delete(int $id): View|Factory {
        $step = Step::find($id);

        $data['step'] = $step;

        return view('steps.delete', $data);
    }
    
    /**
     * Delete a step
     *
     * @param  int $id
     * @param  Request $request
     * @return RedirectResponse
     */
    public function deletePost(int $id, Request $request): RedirectResponse {
        $step = Step::find($id);
        
        if ($request->has('btn_delete_step')) {
            $step->delete();
        }
        
        return redirect("recipes/$step->fk_recipes_id")->with('success', 'Step deleted successfully!');
    }
}
