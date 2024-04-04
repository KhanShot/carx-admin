<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Form;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FormController extends Controller
{
    public function index()
    {
        return view('admin.form.index');
    }



    public function getForms(Request $request)
    {
        $user = auth()->user();

        $forms = Form::query();

        if ($user->role == 'partner'){
            $filter = Campaign::query()->where('user_id',$user->id)->first();
            if ($filter){
                if (!$filter->arrested)
                    $forms->where('arrested', $filter->arrested);
                if (!$filter->pledged)
                    $forms->where('pledged', $filter->pledged);
                if ($filter->in_kz)
                    $forms->where('in_kz', $filter->in_kz);
                if (!$filter->crashed)
                    $forms->where('crashed', $filter->crashed);
                if (!$filter->right_hand)
                    $forms->where('right_hand', $filter->right_hand);
                if ($filter->city)
                    $forms->where('city', $filter->city);

                if ($filter->min_year)
                    $forms->where('year', '>=', $filter->min_year);
                $forms = $forms->whereDate('created_at', '>=', $filter->created_at);
            }
        }

        return $forms->with(['user','images'])->orderBy($request->get('sort'), $request->get('order'))->get();
    }

    public function delete($id)
    {
        $form = Form::query()->with('images')->find($id);

        if (!$form)
            return response()->json('Не удалось удалить',400);

        foreach ($form->images as $image){
            Storage::delete("public". $image->url);
        }

        $form->delete();

        return response()->json('Анкета успешно удалена',200);
    }
}
