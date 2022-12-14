<?php

namespace App\Http\Requests\Agency;

use Illuminate\Foundation\Http\FormRequest;


class AgencyStoreRequest extends FormRequest
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
        return [
            'agency_name' => 'required|string|min:3|max:50',
            'agency_address' => 'required|string|min:3|max:50',
            'agency_email' => 'required|unique:agencies,email',
            'agency_phone_number' => 'required|min:11',
        ];
    }

}
