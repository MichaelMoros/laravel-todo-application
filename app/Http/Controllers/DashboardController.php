<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $ideas = Idea::orderBy("created_at", "DESC");

        if (request()->has('search')) {
            $criteria = "%" . request()->get('search', '') . "%";
            $ideas = $ideas->where('content', 'like', $criteria);
        }

        if (Auth::user()) {
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
        } else {
            $topUsers = User::withCount('ideas')
                ->orderBy('ideas_count', 'DESC')
                ->limit(5)
                ->get();
            return view("dashboard.dashboard", [
                "ideas" => $ideas->paginate(5),
                'topUsers' => $topUsers
            ]);
        }
    }
}
