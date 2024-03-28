<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Form;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [];

        $data['forms'] = Form::query()->count();
        $data['lead_avg'] = round(Campaign::query()->avg('lead_point'));
        $data['campaigns'] = Campaign::query()->count();
        return view('admin.pages.dashboard', compact('data'));
    }
}
