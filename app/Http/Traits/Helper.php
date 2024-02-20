<?php

namespace App\Http\Traits;

use Carbon\Carbon;
use Validator;
trait Helper
{
    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d H:i:s');
    }

    public function without_space_rule()
    {
        return Validator::extend('without_spaces', function($attr, $value){
            return preg_match('/^\S*$/u', $value);
        });
    }
    public function messages()
    {
        return [
            '*.without_spaces' => 'Удалите пробел в строке'
        ];
    }
}
