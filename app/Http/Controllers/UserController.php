<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $ideas = $user->ideas()->paginate(5);

        $excludedIds = auth()->user()->followings()->pluck('id');
        $excludedIds->push(auth()->id());

        $topUsers = User::withCount('ideas')
            ->whereNotIn('id', $excludedIds)
            ->orderBy('ideas_count', 'DESC')
            ->limit(5)
            ->get();

        return view('users.show', compact('user', 'ideas', 'topUsers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);

        $isEditting = true;
        $ideas = $user->ideas()->paginate(5);

        return view('users.edit', compact('user', 'ideas', 'isEditting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $validated = $request->validated();

        if ($request->has('url')) {
            $imagePath = $request->file('url')->store('profile', 'public');
            $validated['url'] = $imagePath;

            Storage::disk('public')->delete($user->url ?? "");
        }

        $user->update($validated);

        return redirect()->route("profile");
    }

    public function profile()
    {
        return $this->show(auth()->user());
    }
}
