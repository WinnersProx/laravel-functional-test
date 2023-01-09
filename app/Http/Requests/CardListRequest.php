<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardListRequest extends FormRequest
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
            'status' => 'nullable|integer',
            'access_token' => 'nullable|string',
            'date' => 'nullable|date:YY-MM-DD'
        ];
    }

    public function hasValidAccessToken()
    {
        $token = $this->access_token;

        return $token === config('services.auth.access_token');
    }
}
