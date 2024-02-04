<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = auth()->user();
        $followingIds = $user->followings()->pluck("user_id");

        $ideas = Idea::whereIn("user_id", $followingIds)->with('user:name,url,id', 'comments.user')->orderBy("created_at", "DESC");
        $searchterm = request()->get("search");

        if ($searchterm) {
            $criteria = "%" . $searchterm . "%";
            $ideas = $ideas->where('content', 'like', $criteria);
        }

        $excludedIds = auth()->user()->followings()->pluck('id');
        $excludedIds->push(auth()->id());

        $topUsers = User::withCount('ideas')
            ->whereNotIn('id', $excludedIds)
            ->orderBy('ideas_count', 'DESC')
            ->limit(5)
            ->get();
        return view("dashboard.dashboard", [
            "ideas" => $ideas->paginate(5),
            'topUsers' => $topUsers
        ]);
    }
}
