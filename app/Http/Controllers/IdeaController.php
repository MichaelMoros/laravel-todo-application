<?php

namespace App\Http\Controllers;

use App\Http\Requests\Idea\CreateIdeaRequest;
use App\Http\Requests\Idea\UpdateIdeaRequest;
use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IdeaController extends Controller
{
    public function store(CreateIdeaRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->id();
        Idea::create($validated);
        return redirect()->route("dashboard")->with("success", "Idea created successfully.");
    }

    public function destroy(Idea $idea)
    {
        $this->authorize('delete', $idea);
        $idea->delete();
        return redirect()->route("dashboard")->with("success", "Idea deleted successfully.");
    }

    public function show(Idea $idea)
    {
        $isEditting = false;
        return view("ideas.show", [
            "idea" => $idea,
            "isEditting" => $isEditting
        ]);
    }

    public function edit(Idea $idea)
    {
        $this->authorize('update', $idea);
        $isEditting = true;

        return view("ideas.show", [
            "idea" => $idea,
            "isEditting" => $isEditting
        ]);
    }

    public function update(UpdateIdeaRequest $request, Idea $idea)
    {
        $this->authorize('update', $idea);

        $validated = $request->validated();
        $idea->update($validated);
        return redirect()->route("ideas.show", $idea->id)->with("success", "Idea updated successfully.");
    }
}
