<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store()
    {
        $validated = request()->validate([
            "content" => "required|min:5|max:256",
            "likes" => "max:infinity"
        ]);

        Idea::create($validated);

        return redirect()->route("dashboard")->with("success-create", "Idea created successfully.");
    }

    public function destroy(Idea $id)
    {
        $id->delete();
        return redirect()->route("dashboard")->with("success-create", "Idea deleted successfully.");
    }

    public function show(Idea $id)
    {
        return view("ideas.show", [
            "idea" => $id
        ]);
    }

    public function edit(Idea $id)
    {
        $isEditting = true;

        return view("ideas.show", [
            "idea" => $id,
            "isEditting" => $isEditting
        ]);
    }

    public function update(Idea $id)
    {
        request()->validate([
            "content" => "required|min:5|max:250"
        ]);

        $id->content = request()->get("content");
        $id->save();

        return redirect()->route("ideas.show", $id->id)->with("success-create", "Idea updated successfully.");
    }
}
