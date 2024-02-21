<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index()
    {
        return view('admin.form.index');
    }



    public function getForms()
    {
        $forms = Form::query()->with(['user','images'])->get();
        return $forms;
    }
}
