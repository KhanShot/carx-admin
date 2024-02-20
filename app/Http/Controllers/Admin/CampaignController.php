<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CampaignStoreRequest;
use App\Http\Traits\Utils;
use App\Models\Campaign;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $campaigns = Campaign::query()->with('user')
            ->withSum('balance', 'sum')
            ->get();
        return view('admin.campaign.index', compact('campaigns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.campaign.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CampaignStoreRequest $request)
    {
        $data = $request->all();
//        dd($data);

        $user = User::query()->create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'role' => 'partner',
        ]);
//
        Campaign::query()->create([
            'user_id' => $user->id,
            'bin' => $request->get('bin'),
            'address' => $request->get('address'),
            'website' => $request->get('website'),
            'phone' => $request->get('phone'),
            'telegram' => $request->get('telegram'),
            'min_year' => $request->get('min_year'),
            'pledged' => ($request->has('pledged') && $request->get('pledged') == 'on') ? 1 : 0,
            'arrested' => ($request->has('arrested') && $request->get('arrested') == 'on') ? 1 : 0,
            'crashed' => ($request->has('crashed') && $request->get('crashed') == 'on') ? 1 : 0,
            'right_hand' => ($request->has('right_hand') && $request->get('right_hand') == 'on') ? 1 : 0,
            'in_kz' => ($request->has('in_kz') && $request->get('in_kz') == 'on') ? 1 : 0,
        ]);

        return redirect()->route('admin.campaign.index')->with('success', Utils::$MESSAGE_SUCCESS_ADDED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
