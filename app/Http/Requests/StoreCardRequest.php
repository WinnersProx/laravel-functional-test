<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCardRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $baseRules = [
            'title' => 'required|string',
            'description' => 'required|string'
        ];

        if($this->routeIs('cards.store')) {
            $baseRules['column_id'] = 'required|integer';
        }

        return $baseRules;
    }
}
