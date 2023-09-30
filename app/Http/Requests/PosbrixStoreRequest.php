<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PosbrixStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "spta"          => "required|unique:posbrixes|numeric|digits:8",
            "brix"          => "required|numeric|min:5|max:23",
            "category"      => "required",
            "variety_id"    => "required",
            "kawalan_id"    => "required",
            "is_accepted"   => "required",
        ];
    }
}
