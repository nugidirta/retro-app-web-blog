<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleDestroyRequest extends FormRequest
{
    /**
     * Determine if the role is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !($this->route('roles') == config('cms.default_role_id')) || 
                ($this->route('roles') == auth()->role()->id);
    }

    /**
     * Get the validation roles that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
