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


        $user = User::query()->create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'role' => 'partner',
        ]);
//
        Campaign::query()->create([
            'user_id' => $user->id,
            'lead_point' => $request->get('lead_point'),
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
        $campaign = Campaign::query()->find($id);
        return view('admin.campaign.edit', compact('campaign'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $campaign = Campaign::query()->find($id);

        $campaign->update([
            'lead_point' => $request->get('lead_point'),
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

        $data = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
        ];

        if ($request->get('password'))
            $data['password'] = Hash::make($request->get('password'));

        User::query()->find($campaign->user_id)->update($data);

        return redirect()->route('admin.campaign.index')->with('success', 'Компания удалена успешно!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $campaign = Campaign::query()->find( $id);

        if (!$campaign)
            return redirect()->route('admin.campaign.index')->with('error', 'Не удалось удалить.');

        return redirect()->route('admin.campaign.index')->with('success', 'Компания удалена успешно!');

    }
}
