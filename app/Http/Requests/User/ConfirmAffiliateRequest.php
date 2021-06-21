<?php

namespace App\Http\Requests\User;

use App\Http\Requests\Request;

class ConfirmAffiliateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'affiliate_id' => 'required|exists:users,id',
        ];
    }
}
