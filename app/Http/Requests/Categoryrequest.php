<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Categoryrequest extends FormRequest
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
        if (request()->routeIs('category.store')) {
            return [
                'name'=> 'required|string|min:3|max:50|unique:categories',
                "description" =>"required"
            ];
        } else {
            return [
                'name'=> 'required|string|min:3|max:50',
                "description" =>"required"
            ];
        }


    }
}
