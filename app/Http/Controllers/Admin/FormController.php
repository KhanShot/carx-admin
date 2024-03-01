<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Form;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index()
    {
        return view('admin.form.index');
    }



    public function getForms()
    {
        $user = auth()->user();
        $forms = Form::query();

        if ($user->role == 'partner'){
            $filter = Campaign::query()->where('user_id',$user->id)->first();
            if ($filter){
                if ($filter->arrested == false)
                    $forms->where('arrested', $filter->arrested);
                if (!$filter->pledged)
                    $forms->where('pledged', $filter->pledged);
                if (!$filter->in_kz)
                    $forms->where('in_kz', $filter->in_kz);
                if (!$filter->crashed)
                    $forms->where('crashed', $filter->crashed);
                if (!$filter->right_hand)
                    $forms->where('right_hand', $filter->right_hand);
            }
        }
        return $forms->with(['user','images'])->orderBy('created_at', 'DESC')->get();
    }
}
