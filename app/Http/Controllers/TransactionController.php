<?php

namespace App\Http\Controllers;

use App\Http\Traits\Utils;
use App\Models\Campaign;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function store(Request $request)
    {
        $campaign = Campaign::query()->find($request->get('campaign_id'));

        Transaction::query()->create([
            'campaign_id' => $request->get('campaign_id'),
            'sum' => $request->get('sum'),
            'type' => 'add',
            'user_id' => $campaign->user_id ?? null,
        ]);
        return redirect()->route('admin.campaign.index')->with('success', Utils::$MESSAGE_SUCCESS_UPDATED);

    }
}
