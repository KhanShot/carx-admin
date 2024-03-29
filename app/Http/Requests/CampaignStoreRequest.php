<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CampaignStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'bin' => 'required|unique:campaigns,bin',
            'email' => 'required|unique:users,email',
            'password'=>'required|min:5',
            'address' => 'required|string',
            'website' => 'required|string',
            'phone' => 'required',
            'telegram' => 'required|string',
            'min_year' => 'required',
        ];
    }
}
