<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $campaign = Campaign::query()->where('user_id', $user->id)->first();

        return view('partner.pages.dashboard', compact('campaign'));
    }
}
