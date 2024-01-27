<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $ideas = Idea::orderBy("created_at", "DESC");
        $searchterm = request()->get("search");

        if ($searchterm) {
            $criteria = "%" . $searchterm . "%";
            $ideas = $ideas->where('content', 'like', $criteria);
        }

        return view("dashboard.dashboard", [
            "ideas" => $ideas->paginate(5)
        ]);
    }
}
